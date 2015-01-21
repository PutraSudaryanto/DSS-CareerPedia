<?php
	/* @var $this ThemeController */
	/* @var $model OmmuThemes */

	$this->breadcrumbs=array(
		'Ommu Themes'=>array('manage'),
		'Default',
	);
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'ommu-pages-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>
	<div class="dialog-content">
		<?php echo Phrase::trans(300,0);?>
	</div>
<div class="dialog-submit">
		<?php echo CHtml::submitButton(Phrase::trans(156,0), array('onclick' => 'setEnableSave()')); ?>
		<?php echo CHtml::button(Phrase::trans(174,0), array('id'=>'closed')); ?>
	</div>
<?php $this->endWidget(); ?>