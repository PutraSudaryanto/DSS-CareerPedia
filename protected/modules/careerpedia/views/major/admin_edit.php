<?php
	/* @var $this MajorController */
	/* @var $model CareerpediaMajors */

	$this->breadcrumbs=array(
		'Careerpedia Majors'=>array('manage'),
		$model->name=>array('view','id'=>$model->major_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>