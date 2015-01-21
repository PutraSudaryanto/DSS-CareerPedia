<?php
/**
* SearchController
* Handle SearchController
* Copyright (c) 2012, Ommu Platform (Nirwasita Studio). All rights reserved.
* version: 0.0.1
* Reference start
*
* TOC :
*	Index
*	View
*	Result
*
*	LoadModel
*	performAjaxValidation
*
*----------------------------------------------------------------------------------------------------------
*/

class SearchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $defaultAction = 'index';

	/**
	 * Initialize admin page theme
	 */
	public function init() 
	{
		$arrThemes = Utility::getCurrentTemplate('public');
		Yii::app()->theme = $arrThemes['folder'];
		$this->layout = $arrThemes['layout'];
	}

	/**
	 * @return array action filters
	 */
	public function filters() 
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() 
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','result'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level)',
				//'expression'=>'isset(Yii::app()->user->level) && (Yii::app()->user->level != 1)',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level) && (Yii::app()->user->level == 1)',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() 
	{
		$criteria=new CDbCriteria;
		$criteria->order = 'name ASC';
		$criteria->compare('publish',1);
		$dataProvider = new CActiveDataProvider('CareerpediaPositions', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>10,
			),
		));

		$this->pageTitle = 'Careerpedia Positions';
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('front_index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) 
	{
		$model=$this->loadModel($id);
		
		$education = CareerpediaPositionMajor::model()->findAll(array(
			'condition'=>'position_id = :id',
			'params'=>array(
				':id'=>$model->position_id,
			),
		));

		$this->dialogDetail = true;
		$this->dialogGroundUrl = Yii::app()->controller->createUrl('index');

		$this->pageTitle = $model->name;
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('front_view',array(
			'model'=>$model,
			'education'=>$education,
		));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionResult() 
	{
		if(isset($_GET['major']) || isset($_GET['position']) || isset($_GET['industry'])) {
			$condition = array();
			if(isset($_GET['major']) && ($_GET['major'] != '' && $_GET['major'] != '0')) {
				$major = $_GET['major'] != '' ? $_GET['major'] : '2';
				$condition[] = 'a.position_id IN (SELECT position_id FROM ommu_careerpedia_position_major WHERE major_id = '.$major.')';
			}
			if(isset($_GET['industry']) && ($_GET['industry'] != '' && $_GET['industry'] != '0')) {
				$condition[] = 'a.industry_id IN (SELECT industry_id FROM ommu_careerpedia_industrys WHERE field_id = '.$_GET['industry'].')';
			}
			if(isset($_GET['function']) && ($_GET['function'] != '' && $_GET['function'] != '0')) {
				$condition[] = 'b.function_id = '.$_GET['function'];
			}
			if(isset($_GET['major']) || isset($_GET['position']) || isset($_GET['industry'])) {
				$where = ' WHERE ';
			}
			if(count($condition) > 1) {
				$allCondition = implode(' AND ',$condition);
			} else {
				$allCondition = $condition[0];
			}
			$group = ' GROUP BY a.position_id ORDER BY b.name ASC';
			
			$sql = 'SELECT * FROM ommu_careerpedia_industry_position AS a LEFT JOIN ommu_careerpedia_positions AS b ON a.position_id = b.position_id'.$where.$allCondition.$group;
			$totalData = 'SELECT COUNT(DISTINCT (a.position_id)) FROM ommu_careerpedia_industry_position AS a LEFT JOIN ommu_careerpedia_positions AS b ON a.position_id = b.position_id'.$where.$allCondition;

			$dataProvider=new CSqlDataProvider($sql, array(
				'totalItemCount'=>$count,
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
			
			/*
			$criteria->compare('publish',1);
			$dataProvider = new CActiveDataProvider('CareerpediaIndustryPosition', array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
			*/
			
		} else {
			$criteria=new CDbCriteria;
			if(!empty($_GET))
				$criteria->order = 'name ASC';
			else
				$criteria->order = 'name ASC';
			if(isset($_GET['positions']) && ($_GET['positions'] != '' && $_GET['positions'] != '0'))
				$criteria->condition = 'name LIKE "%'.$_GET['positions'].'%" OR other_name LIKE "%'.$_GET['positions'].'%"';
			$criteria->compare('publish',1);
			$dataProvider = new CActiveDataProvider('CareerpediaPositions', array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
		}

		$this->pageTitle = 'Careerpedia Positions';
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('front_result',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) 
	{
		$model = CareerpediaPositions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, Phrase::trans(193,0));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) 
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='careerpedia-positions-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
