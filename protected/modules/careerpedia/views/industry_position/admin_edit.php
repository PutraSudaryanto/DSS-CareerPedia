<?php
	/* @var $this IndustrypositionController */
	/* @var $model CareerpediaIndustryPosition */

	$this->breadcrumbs=array(
		'Careerpedia Industry Positions'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/industry_position/_form', array('model'=>$model)); ?>