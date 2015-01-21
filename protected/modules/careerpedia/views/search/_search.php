<?php
	/* @var $this Admin1Controller */
	/* @var $model Books */
	/* @var $form CActiveForm */
	$action = strtolower(Yii::app()->controller->action->id);
?>


<div id="search">
	<?php $form=$this->beginWidget('OActiveForm', array(
		'id'=>'dinamis',
		'action'=>Yii::app()->controller->createUrl('result'),
		'method'=>'get',
	)); ?>	
		<?php echo CHtml::dropDownList('major', $_GET['major'], CareerpediaMajors::getMajor(1), array('prompt'=>'Semua Jurusan')); ?>
		<?php echo CHtml::dropDownList('position', $_GET['position'], CareerpediaPositionFunction::getFunction(1), array('prompt'=>'Semua Tipe Posisi')); ?>
		<?php echo CHtml::dropDownList('industry', $_GET['industry'], CareerpediaIndustryField::getType(), array('prompt'=>'Semua Tipe Industri')); ?>
		<?php echo CHtml::submitButton('GO'); ?>
	<?php $this->endWidget(); ?>
	
	<?php //if($action != 'result') {?>
	<?php $form=$this->beginWidget('OActiveForm', array(
		'id'=>'statis',
		'action'=>Yii::app()->controller->createUrl('result'),
		'method'=>'get',
	)); ?>	
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
			'name'=>'positions',
			'source'=>CareerpediaPositions::getPosition(1),
			'htmlOptions'=>array(
				'value'=>$_GET['positions'],
				'placeholder'=>'Cari nama posisi',
			),
		)); ?>
		<?php echo CHtml::submitButton('CARI'); ?>
	<?php $this->endWidget(); ?>
	<?php //}?>
</div>
