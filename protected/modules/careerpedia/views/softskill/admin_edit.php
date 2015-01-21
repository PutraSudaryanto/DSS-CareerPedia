<?php
	/* @var $this SoftskillController */
	/* @var $model CareerpediaSoftskill */

	$this->breadcrumbs=array(
		'Careerpedia Softskills'=>array('manage'),
		$model->softskill_id=>array('view','id'=>$model->softskill_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>