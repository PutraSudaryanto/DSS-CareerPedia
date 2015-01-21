<?php
	/* @var $this SearchController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Careerpedia Positions',
	);
?>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php $this->widget('application.components.system.FListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pager' => array(
		'header' => '',
	), 
	'summaryText' => '',
	'itemsCssClass' => 'items clearfix',
	'pagerCssClass'=>'pager clearfix',
)); ?>
