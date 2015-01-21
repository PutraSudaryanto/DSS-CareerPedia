<?php

/**
 * This is the model class for table "ommu_careerpedia_industry_field".
 *
 * The followings are the available columns in table 'ommu_careerpedia_industry_field':
 * @property string $field_id
 * @property string $type
 * @property string $field
 *
 * The followings are the available model relations:
 * @property OmmuCareerpediaIndustrys[] $ommuCareerpediaIndustrys
 */
class CareerpediaIndustryField extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CareerpediaIndustryField the static model class
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
		return 'ommu_careerpedia_industry_field';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, field', 'required'),
			array('type', 'length', 'max'=>8),
			array('field', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('field_id, type, field', 'safe', 'on'=>'search'),
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
			'ommuCareerpediaIndustrys' => array(self::HAS_MANY, 'OmmuCareerpediaIndustrys', 'field_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'field_id' => 'Field',
			'type' => 'Type',
			'field' => 'Field',
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

		$criteria->compare('t.field_id',$this->field_id,true);
		$criteria->compare('t.type',$this->type,true);
		$criteria->compare('t.field',$this->field,true);

		if(!isset($_GET['CareerpediaIndustryField_sort']))
			$criteria->order = 'field_id DESC';

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
			//$this->defaultColumns[] = 'field_id';
			$this->defaultColumns[] = 'type';
			$this->defaultColumns[] = 'field';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = 'type';
			$this->defaultColumns[] = 'field';

		}
		parent::afterConstruct();
	}

	/**
	 * Get category
	 * 0 = unpublish
	 * 1 = publish
	 */
	public static function getType() {
		$model = self::model()->findAll(array(
			'order' => 'field ASC'
		));

		$items = array();
		if($model != null) {
			foreach($model as $key => $val) {
				$items[$val->field_id] = $val->field;
			}
			return $items;
		} else {
			return false;
		}
	}
}