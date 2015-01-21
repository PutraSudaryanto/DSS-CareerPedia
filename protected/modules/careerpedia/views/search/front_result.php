<?php
	/* @var $this SearchController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Careerpedia Positions',
	);
	if(isset($_GET['major']) || isset($_GET['position']) || isset($_GET['industry']))
		$render = '_view_result';
	else
		$render = '_view';
?>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php $this->widget('application.components.system.FListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>$render,
	'pager' => array(
		'header' => '',
	), 
	'summaryText' => '',
	'itemsCssClass' => 'items clearfix',
	'pagerCssClass'=>'pager clearfix',
)); ?>
