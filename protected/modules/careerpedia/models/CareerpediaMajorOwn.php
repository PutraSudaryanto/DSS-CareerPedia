<?php

/**
 * This is the model class for table "ommu_careerpedia_major_own".
 *
 * The followings are the available columns in table 'ommu_careerpedia_major_own':
 * @property string $major_own_id
 * @property string $major_id
 * @property string $group_id
 *
 * The followings are the available model relations:
 * @property OmmuCareerpediaMajors $major
 * @property OmmuCareerpediaMajorGroup $group
 */
class CareerpediaMajorOwn extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CareerpediaMajorOwn the static model class
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
		return 'ommu_careerpedia_major_own';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('major_id, group_id', 'required'),
			array('major_id, group_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('major_own_id, major_id, group_id', 'safe', 'on'=>'search'),
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
			'major' => array(self::BELONGS_TO, 'OmmuCareerpediaMajors', 'major_id'),
			'group' => array(self::BELONGS_TO, 'OmmuCareerpediaMajorGroup', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'major_own_id' => 'Major Own',
			'major_id' => 'Major',
			'group_id' => 'Group',
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

		$criteria->compare('t.major_own_id',$this->major_own_id,true);
		$criteria->compare('t.major_id',$this->major_id,true);
		$criteria->compare('t.group_id',$this->group_id,true);

		if(!isset($_GET['CareerpediaMajorOwn_sort']))
			$criteria->order = 'major_own_id DESC';

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
			//$this->defaultColumns[] = 'major_own_id';
			$this->defaultColumns[] = 'major_id';
			$this->defaultColumns[] = 'group_id';
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
			$this->defaultColumns[] = 'major_id';
			$this->defaultColumns[] = 'group_id';

		}
		parent::afterConstruct();
	}

}