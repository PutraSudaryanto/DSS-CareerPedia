<?php
	/* @var $this MajorgroupController */
	/* @var $model CareerpediaMajorGroup */

	$this->breadcrumbs=array(
		'Careerpedia Major Groups'=>array('manage'),
		$model->name=>array('view','id'=>$model->group_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/major_group/_form', array('model'=>$model)); ?>