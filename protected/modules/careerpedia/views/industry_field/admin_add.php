<?php
	/* @var $this IndustryfieldController */
	/* @var $model CareerpediaIndustryField */

	$this->breadcrumbs=array(
		'Careerpedia Industry Fields'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('/industry_field/_form', array('model'=>$model)); ?>