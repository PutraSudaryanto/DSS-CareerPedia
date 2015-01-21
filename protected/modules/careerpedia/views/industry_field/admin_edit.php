<?php
	/* @var $this IndustryfieldController */
	/* @var $model CareerpediaIndustryField */

	$this->breadcrumbs=array(
		'Careerpedia Industry Fields'=>array('manage'),
		$model->field_id=>array('view','id'=>$model->field_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/industry_field/_form', array('model'=>$model)); ?>