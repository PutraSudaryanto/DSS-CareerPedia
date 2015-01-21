<?php
	/* @var $this IndustryhardskillController */
	/* @var $model CareerpediaIndustryHardskill */

	$this->breadcrumbs=array(
		'Careerpedia Industry Hardskills'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/industry_hardskill/_form', array('model'=>$model)); ?>