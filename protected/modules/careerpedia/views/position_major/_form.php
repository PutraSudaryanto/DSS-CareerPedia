<?php
	/* @var $this PositionmajorController */
	/* @var $model CareerpediaPositionMajor */
	/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'careerpedia-position-major-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

<div class="dialog-content">

	<fieldset>

		<?php //begin.Messages ?>
		<div id="ajax-message">
			<?php echo $form->errorSummary($model); ?>
		</div>
		<?php //begin.Messages ?>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'position_id'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'position_id',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'position_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'major_id'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'major_id',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'major_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'degree'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'degree',array('size'=>32,'maxlength'=>32)); ?>
				<?php echo $form->error($model,'degree'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'spesification'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'spesification',array('size'=>60,'maxlength'=>64)); ?>
				<?php echo $form->error($model,'spesification'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

	</fieldset>
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Phrase::trans(1,0) : Phrase::trans(2,0) ,array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Phrase::trans(4,0), array('id'=>'closed')); ?>
</div>
<?php $this->endWidget(); ?>
