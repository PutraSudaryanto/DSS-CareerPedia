<?php
	/* @var $this MajorownController */
	/* @var $model CareerpediaMajorOwn */

	$this->breadcrumbs=array(
		'Careerpedia Major Owns'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('/major_own/_form', array('model'=>$model)); ?>