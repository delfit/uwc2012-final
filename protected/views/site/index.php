<?php
$this->pageTitle = Yii::app()->name;
$baseURL = Yii::app()->request->baseUrl;

	echo CHtml::image($baseURL."/images/linkedin.jpg", "LinkedIn", array(
		'style' => 'display: block; margin: 0 auto;'
	));
	
	$this->widget( 'bootstrap.widgets.TbButton', array(
		'type' => 'primary',
		'size' => 'large',
		'label' => 'Generate CV',
		'url' => $baseURL.'/profile',
	));
?>

