<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Альбомы';
$this->breadcrumbs = array(
	'Альбомы',
);
?>


<?php
$this->widget( 'bootstrap.widgets.TbAlert', array(
	'block' => true,
	'fade' => true, 
	'closeText' => '×', 
	'alerts' => array( 
		'success',
		'info',
		'warning',
		'error',
		'danger'
	),
));
?>


<?php

	echo CHtml::openTag('div', array(
		'class' => 'row-fluid',
	));
	
		echo CHtml::openTag('div', array(
			'class' => 'span8 offset2',
		));
		
			echo CHtml::openTag('div', array(
				'class' => 'add-button',
				'style' => 'margin-top: 2%;'
			));
				
				echo CHtml::openTag('div', array(
					'class' => 'addAlbum',
				));
					$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id' => 'inlineForm',
						'type' => 'inline',
						'htmlOptions' => array(
							'class'=>'well'
						),
					));
					
					echo CHtml::openTag('fieldset');
						echo CHtml::openTag('legend');
							echo 'Создать альбом';
						echo CHtml::closeTag('legend');
						echo $form->textFieldRow( $model, 'name', array(
							'class' => 'input-xlarge',
							'style' => 'margin-right: 5%;'
						));
						echo $form->textFieldRow( $model, 'message', array(
							'class'=>'input-xlarge',
							'style' => 'margin-right: 5%;'
						));
						$this->widget('bootstrap.widgets.TbButton', array(
							'type' => 'primary', 
							'buttonType'=>'submit', 
							'label'=>'Создать'
						));
					echo CHtml::closeTag('fieldset');
					
					$this->endWidget();
				
				echo CHtml::closeTag('div');
				
			echo CHtml::closeTag('div');
			
			echo CHtml::tag('hr');
			
			echo CHtml::openTag('div', array(
				'class' => 'photo',
			));
				
				$this->widget('bootstrap.widgets.TbThumbnails', array(
					'dataProvider' => $albumsProvider,
					'template' => "{items}\n{pager}",
					'itemView' => '_thumb',
				));
			echo CHtml::closeTag('div');
			
		echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');
?>
