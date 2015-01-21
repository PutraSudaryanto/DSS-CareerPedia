<?php
	/* @var $this PositionmajorController */
	/* @var $model CareerpediaPositionMajor */

	$this->breadcrumbs=array(
		'Careerpedia Position Majors'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('/position_major/_form', array('model'=>$model)); ?>