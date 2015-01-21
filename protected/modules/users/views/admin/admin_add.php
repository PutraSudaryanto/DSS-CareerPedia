<?php
	/* @var $this AdminController */
	/* @var $model Users */

	$this->breadcrumbs=array(
		'Users'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>