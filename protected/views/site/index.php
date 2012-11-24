<?php

$this->pageTitle = Yii::app()->name;

echo CHtml::openTag('div', array(
		'class' => 'row-fluid',
	));
	
		echo CHtml::openTag('div', array(
			'class' => 'span8 offset2',
		));
				echo CHtml::openTag('div', array(
					'class' => 'photo',
				));
				
					echo CHtml::openTag('h3', array(
						'style' => 'color: blue; text-align: center;'
					));
						echo 'Недавно добавленные:';
					echo CHtml::closeTag('h3');

					$this->widget('bootstrap.widgets.TbThumbnails', array(
						'dataProvider'=>$newPhotosProvider,
						'template'=>"{items}\n{pager}",
						'itemView'=>'_thumbIndex',
					));
					
				echo CHtml::closeTag('div');
				
			echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');
?>
