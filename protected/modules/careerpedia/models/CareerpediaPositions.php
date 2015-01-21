<?php

/**
 * This is the model class for table "ommu_careerpedia_positions".
 *
 * The followings are the available columns in table 'ommu_careerpedia_positions':
 * @property string $position_id
 * @property integer $publish
 * @property string $function_id
 * @property string $name
 * @property string $other_name
 * @property string $task
 * @property string $job_desc
 * @property string $skills
 * @property string $knowledge
 * @property string $personality
 * @property string $average_salary
 *
 * The followings are the available model relations:
 * @property OmmuCareerpediaIndustryPosition[] $ommuCareerpediaIndustryPositions
 * @property OmmuCareerpediaPositionMajor[] $ommuCareerpediaPositionMajors
 * @property OmmuCareerpediaPositionFunction $function
 */
class CareerpediaPositions extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CareerpediaPositions the static model class
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
		return 'ommu_careerpedia_positions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('function_id, name, other_name, task, job_desc, skills, knowledge, personality, average_salary', 'required'),
			array('publish', 'numerical', 'integerOnly'=>true),
			array('function_id', 'length', 'max'=>11),
			array('name, other_name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('position_id, publish, function_id, name, other_name, task, job_desc, skills, knowledge, personality, average_salary', 'safe', 'on'=>'search'),
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
			'ommuCareerpediaIndustryPositions' => array(self::HAS_MANY, 'OmmuCareerpediaIndustryPosition', 'position_id'),
			'ommuCareerpediaPositionMajors' => array(self::HAS_MANY, 'OmmuCareerpediaPositionMajor', 'position_id'),
			'function' => array(self::BELONGS_TO, 'OmmuCareerpediaPositionFunction', 'function_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'position_id' => 'Position',
			'publish' => 'Publish',
			'function_id' => 'Function',
			'name' => 'Name',
			'other_name' => 'Other Name',
			'task' => 'Task',
			'job_desc' => 'Job Desc',
			'skills' => 'Skills',
			'knowledge' => 'Knowledge',
			'personality' => 'Personality',
			'average_salary' => 'Average Salary',
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

		$criteria->compare('t.position_id',$this->position_id,true);
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
		$criteria->compare('t.function_id',$this->function_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.other_name',$this->other_name,true);
		$criteria->compare('t.task',$this->task,true);
		$criteria->compare('t.job_desc',$this->job_desc,true);
		$criteria->compare('t.skills',$this->skills,true);
		$criteria->compare('t.knowledge',$this->knowledge,true);
		$criteria->compare('t.personality',$this->personality,true);
		$criteria->compare('t.average_salary',$this->average_salary,true);

		if(!isset($_GET['CareerpediaPositions_sort']))
			$criteria->order = 'position_id DESC';

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
			//$this->defaultColumns[] = 'position_id';
			$this->defaultColumns[] = 'publish';
			$this->defaultColumns[] = 'function_id';
			$this->defaultColumns[] = 'name';
			$this->defaultColumns[] = 'other_name';
			$this->defaultColumns[] = 'task';
			$this->defaultColumns[] = 'job_desc';
			$this->defaultColumns[] = 'skills';
			$this->defaultColumns[] = 'knowledge';
			$this->defaultColumns[] = 'personality';
			$this->defaultColumns[] = 'average_salary';
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
			$this->defaultColumns[] = 'function_id';
			$this->defaultColumns[] = 'name';
			$this->defaultColumns[] = 'other_name';
			$this->defaultColumns[] = 'task';
			$this->defaultColumns[] = 'job_desc';
			$this->defaultColumns[] = 'skills';
			$this->defaultColumns[] = 'knowledge';
			$this->defaultColumns[] = 'personality';
			$this->defaultColumns[] = 'average_salary';
			if(!isset($_GET['type'])) {
				$this->defaultColumns[] = array(
					'name' => 'publish',
					'value' => 'Utility::getPublish(Yii::app()->controller->createUrl("publish",array("id"=>$data->position_id)), $data->publish, 1)',
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

	/**
	 * Get category
	 * 0 = unpublish
	 * 1 = publish
	 */
	public static function getPosition($publish=null) {
		if($publish == null) {
			$model = self::model()->findAll(array(
				'order' => 'name ASC',
			));
			
		} else {
			$model = self::model()->findAll(array(
				//'select' => 'publish, name',
				'condition' => 'publish = :publish',
				'params' => array(
					':publish' => $publish,
				),
				'order' => 'name ASC'
			));
		}

		$items = array();
		if($model != null) {
			foreach($model as $val) {
				$items[] = $val->name;
			}
			return $items;
		} else {
			return false;
		}
	}

}