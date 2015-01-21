<?php
	/* @var $this MajorgroupController */
	/* @var $model CareerpediaMajorGroup */

	$this->breadcrumbs=array(
		'Careerpedia Major Groups'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('/major_group/_form', array('model'=>$model)); ?>