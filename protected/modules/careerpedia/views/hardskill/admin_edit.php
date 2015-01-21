<?php
	/* @var $this HardskillController */
	/* @var $model CareerpediaHardskill */

	$this->breadcrumbs=array(
		'Careerpedia Hardskills'=>array('manage'),
		$model->hardskill_id=>array('view','id'=>$model->hardskill_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>