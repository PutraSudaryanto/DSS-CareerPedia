<?php
	/* @var $this IndustrypositionController */
	/* @var $model CareerpediaIndustryPosition */

	$this->breadcrumbs=array(
		'Careerpedia Industry Positions'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('/industry_position/_form', array('model'=>$model)); ?>