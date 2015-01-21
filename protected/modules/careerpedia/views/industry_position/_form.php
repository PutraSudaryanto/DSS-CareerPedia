<?php
	/* @var $this IndustrypositionController */
	/* @var $model CareerpediaIndustryPosition */
	/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'careerpedia-industry-position-form',
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
			<?php echo $form->labelEx($model,'industry_id'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'industry_id',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'industry_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'position_id'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'position_id',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'position_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'priority'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'priority'); ?>
				<?php echo $form->error($model,'priority'); ?>
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
