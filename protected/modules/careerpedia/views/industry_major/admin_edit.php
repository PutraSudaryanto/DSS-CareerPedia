<?php
	/* @var $this IndustrymajorController */
	/* @var $model CareerpediaIndustryMajor */

	$this->breadcrumbs=array(
		'Careerpedia Industry Majors'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/industry_major/_form', array('model'=>$model)); ?>