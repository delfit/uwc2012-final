<?php

$this->pageTitle = Yii::app()->name;

echo CHtml::openTag('div', array(
		'class' => 'row-fluid',
	));
	
		echo CHtml::openTag('div', array(
			'class' => 'span8 offset2',
		));

			$this->widget( 'bootstrap.widgets.TbButton', array(
				'type' => 'primary',
				'size' => 'large',
				'label' => 'Авторизация Facebook',
			));

			echo CHtml::tag('hr');

				echo CHtml::openTag('div', array(
					'class' => 'photo',
				));

					$this->widget('bootstrap.widgets.TbThumbnails', array(
						'dataProvider'=>$newPhotosProvider,
						'template'=>"{items}\n{pager}",
						'itemView'=>'_thumbIndex',
					));
					
				echo CHtml::closeTag('div');
				
			echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');
?>