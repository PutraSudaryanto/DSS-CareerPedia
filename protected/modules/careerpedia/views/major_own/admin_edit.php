<?php
	/* @var $this MajorownController */
	/* @var $model CareerpediaMajorOwn */

	$this->breadcrumbs=array(
		'Careerpedia Major Owns'=>array('manage'),
		$model->major_own_id=>array('view','id'=>$model->major_own_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('/major_own/_form', array('model'=>$model)); ?>