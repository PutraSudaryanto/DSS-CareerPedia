<?php
	/* @var $this IndustrysoftskillController */
	/* @var $model CareerpediaIndustrySoftskill */

	$this->breadcrumbs=array(
		'Careerpedia Industry Softskills'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/industry_softskill/_form', array('model'=>$model)); ?>