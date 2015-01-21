<?php
	/* @var $this PositionmajorController */
	/* @var $model CareerpediaPositionMajor */

	$this->breadcrumbs=array(
		'Careerpedia Position Majors'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/position_major/_form', array('model'=>$model)); ?>