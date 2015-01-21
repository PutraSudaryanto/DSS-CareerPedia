<?php
	/* @var $this ThemeController */
	/* @var $model OmmuThemes */

$this->breadcrumbs=array(
	'Ommu Themes'=>array('manage'),
	'Create',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>