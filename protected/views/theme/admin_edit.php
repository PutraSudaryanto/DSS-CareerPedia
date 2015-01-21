<?php
	/* @var $this ThemeController */
	/* @var $model OmmuThemes */

	$this->breadcrumbs=array(
		'Ommu Themes'=>array('manage'),
		$model->name=>array('view','id'=>$model->theme_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>