<?php
	/* @var $this MajorController */
	/* @var $model CareerpediaMajors */

	$this->breadcrumbs=array(
		'Careerpedia Majors'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>