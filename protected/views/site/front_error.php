<?php
	/* @var $this SiteController */
	/* @var $error array */

	$this->breadcrumbs=array(
		'Error',
	);
?>

<h1>Error <?php echo $code; ?></h1>
<h2><?php echo CHtml::encode($message); ?></h2>
