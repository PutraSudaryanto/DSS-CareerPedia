<?php

/**
 * This is the model class for table "ommu_careerpedia_industrys".
 *
 * The followings are the available columns in table 'ommu_careerpedia_industrys':
 * @property string $industry_id
 * @property integer $publish
 * @property string $field_id
 * @property string $name
 * @property string $job_type
 *
 * The followings are the available model relations:
 * @property OmmuCareerpediaIndustryHardskill[] $ommuCareerpediaIndustryHardskills
 * @property OmmuCareerpediaIndustryMajor[] $ommuCareerpediaIndustryMajors
 * @property OmmuCareerpediaIndustryPosition[] $ommuCareerpediaIndustryPositions
 * @property OmmuCareerpediaIndustrySoftskill[] $ommuCareerpediaIndustrySoftskills
 * @property OmmuCareerpediaIndustryField $field
 */
class CareerpediaIndustrys extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CareerpediaIndustrys the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ommu_careerpedia_industrys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('field_id, name, job_type', 'required'),
			array('publish', 'numerical', 'integerOnly'=>true),
			array('field_id', 'length', 'max'=>11),
			array('name, job_type', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('industry_id, publish, field_id, name, job_type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ommuCareerpediaIndustryHardskills' => array(self::HAS_MANY, 'OmmuCareerpediaIndustryHardskill', 'industry_id'),
			'ommuCareerpediaIndustryMajors' => array(self::HAS_MANY, 'OmmuCareerpediaIndustryMajor', 'industry_id'),
			'ommuCareerpediaIndustryPositions' => array(self::HAS_MANY, 'OmmuCareerpediaIndustryPosition', 'industry_id'),
			'ommuCareerpediaIndustrySoftskills' => array(self::HAS_MANY, 'OmmuCareerpediaIndustrySoftskill', 'industry_id'),
			'field' => array(self::BELONGS_TO, 'OmmuCareerpediaIndustryField', 'field_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'industry_id' => 'Industry',
			'publish' => 'Publish',
			'field_id' => 'Field',
			'name' => 'Name',
			'job_type' => 'Job Type',
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.industry_id',$this->industry_id,true);
		if(isset($_GET['type']) && $_GET['type'] == 'publish') {
			$criteria->compare('t.publish',1);
		} elseif(isset($_GET['type']) && $_GET['type'] == 'unpublish') {
			$criteria->compare('t.publish',0);
		} elseif(isset($_GET['type']) && $_GET['type'] == 'trash') {
			$criteria->compare('t.publish',2);
		} else {
			$criteria->addInCondition('t.publish',array(0,1));
			$criteria->compare('t.publish',$this->publish);
		}
		$criteria->compare('t.field_id',$this->field_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.job_type',$this->job_type,true);

		if(!isset($_GET['CareerpediaIndustrys_sort']))
			$criteria->order = 'industry_id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>30,
			),
		));
	}


	/**
	 * Get column for CGrid View
	 */
	public function getGridColumn($columns=null) {
		if($columns !== null) {
			foreach($columns as $val) {
				/*
				if(trim($val) == 'enabled') {
					$this->defaultColumns[] = array(
						'name'  => 'enabled',
						'value' => '$data->enabled == 1? "Ya": "Tidak"',
					);
				}
				*/
				$this->defaultColumns[] = $val;
			}
		}else {
			//$this->defaultColumns[] = 'industry_id';
			$this->defaultColumns[] = 'publish';
			$this->defaultColumns[] = 'field_id';
			$this->defaultColumns[] = 'name';
			$this->defaultColumns[] = 'job_type';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			/*
			$this->defaultColumns[] = array(
				'class' => 'CCheckBoxColumn',
				'name' => 'id',
				'selectableRows' => 2,
				'checkBoxHtmlOptions' => array('name' => 'trash_id[]')
			);
			*/
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = 'field_id';
			$this->defaultColumns[] = 'name';
			$this->defaultColumns[] = 'job_type';
			if(!isset($_GET['type'])) {
				$this->defaultColumns[] = array(
					'name' => 'publish',
					'value' => 'Utility::getPublish(Yii::app()->controller->createUrl("publish",array("id"=>$data->industry_id)), $data->publish, 1)',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Phrase::trans(588,0),
						0=>Phrase::trans(589,0),
					),
					'type' => 'raw',
				);
			}

		}
		parent::afterConstruct();
	}

}