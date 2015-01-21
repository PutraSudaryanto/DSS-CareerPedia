<?php
	/* @var $this PositionController */
	/* @var $model CareerpediaPositions */

	$this->breadcrumbs=array(
		'Careerpedia Positions'=>array('manage'),
		$model->name=>array('view','id'=>$model->position_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>>
