<?php
	/* @var $this IndustrypositionController */
	/* @var $data CareerpediaIndustryPosition */
?>

<div class="sep">
	<a href="<?php echo Yii::app()->controller->createUrl('view', array('id'=>$data['position_id'], 't'=>Utility::getUrlTitle($data['name'])));?>" title="<?php echo $data['name'];?>"><h2><?php echo $data['name'];?></h2></a>
	<?php echo $data['other_name'] != '' ? '<em>'.$data['other_name'].'</em>' : ''?>
	<?php echo Utility::shortText(Utility::hardDecode($data['task']),300,' ...');?>
</div>