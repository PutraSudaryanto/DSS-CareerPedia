<?php
	/* @var $this PositionController */
	/* @var $model CareerpediaPositions */

	$this->breadcrumbs=array(
		'Careerpedia Positions'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>