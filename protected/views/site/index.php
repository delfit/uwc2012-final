<?php
$this->pageTitle = Yii::app()->name;
$baseURL = Yii::app()->request->baseUrl;

	echo CHtml::image($baseURL."/images/linkedin.jpg", "LinkedIn", array(
		'style' => 'display: block; margin: 10% auto 0;'
	));
	echo CHtml::openTag('div', array(
		'style' => 'margin: 5% auto 10%; width: 20%;'
	));
		$this->widget( 'bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'size' => 'large',
			'label' => 'Generate CV',
			'url' => $baseURL.'/profile/view',
			'htmlOptions' => array(
				'style'=>'margin: 0 auto; display: block;'
			)
		));
	echo CHtml::closeTag( 'div' );
?>

