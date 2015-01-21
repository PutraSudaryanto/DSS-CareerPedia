<?php
	/* @var $this IndustryController */
	/* @var $model CareerpediaIndustrys */

	$this->breadcrumbs=array(
		'Careerpedia Industrys'=>array('manage'),
		$model->name=>array('view','id'=>$model->industry_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>