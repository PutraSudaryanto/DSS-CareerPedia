<?php
	/* @var $this PositionfunctionController */
	/* @var $model CareerpediaPositionFunction */

	$this->breadcrumbs=array(
		'Careerpedia Position Functions'=>array('manage'),
		$model->function_id=>array('view','id'=>$model->function_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/position_function/_form', array('model'=>$model)); ?>