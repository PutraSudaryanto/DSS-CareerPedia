<?php
	/* @var $this PositionController */
	/* @var $model CareerpediaPositions */
	/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'careerpedia-positions-form',
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
			<?php echo $form->labelEx($model,'publish'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'publish'); ?>
				<?php echo $form->error($model,'publish'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'function_id'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'function_id',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'function_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'name'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
				<?php echo $form->error($model,'name'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'other_name'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'other_name',array('size'=>60,'maxlength'=>128)); ?>
				<?php echo $form->error($model,'other_name'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'task'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'task',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'task'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'job_desc'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'job_desc',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'job_desc'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'skills'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'skills',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'skills'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'knowledge'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'knowledge',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'knowledge'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'personality'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'personality',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'personality'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'average_salary'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'average_salary',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'average_salary'); ?>
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
