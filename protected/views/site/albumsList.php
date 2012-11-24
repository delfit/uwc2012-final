<?php
$albums = array(
	array(
		'id' => 1,
		'name' => 'Album 1',
		'count' => 3,
		'photo' => 'http://placehold.it/320x320',
		'description' => 'Description4',
		'can_upload' => true,
	),
	array(
		'id' => 2,
		'name' => 'Album 2',
		'count' => 34,
		'photo' => 'http://placehold.it/320x320',
		'description' => 'Description3',
		'can_upload' => true,
	),
	array(
		'id' => 3,
		'name' => 'Album 3',
		'count' => 13,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description2',
		'can_upload' => true,
	),
	array(
		'id' => 4,
		'name' => 'Album 4',
		'count' => 5,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description1',
		'can_upload' => true,
	),
	array(
		'id' => 1,
		'name' => 'Album 1',
		'count' => 3,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description4',
		'can_upload' => true,
	),
	array(
		'id' => 2,
		'name' => 'Album 2',
		'count' => 34,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description3',
		'can_upload' => true,
	),
	array(
		'id' => 3,
		'name' => 'Album 3',
		'count' => 13,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description2',
		'can_upload' => true,
	),
	array(
		'id' => 4,
		'name' => 'Album 4',
		'count' => 5,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description1',
		'can_upload' => true,
	),
	array(
		'id' => 1,
		'name' => 'Album 1',
		'count' => 3,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description4',
		'can_upload' => true,
	),
	array(
		'id' => 2,
		'name' => 'Album 2',
		'count' => 34,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description3',
		'can_upload' => true,
	),
	array(
		'id' => 3,
		'name' => 'Album 3',
		'count' => 13,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description2',
		'can_upload' => true,
	),
	array(
		'id' => 4,
		'name' => 'Album 4',
		'count' => 5,
		'photo' => 'http://placehold.it/300x300',
		'description' => 'Description1',
		'can_upload' => true,
	)
);
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
						echo $form->textFieldRow( $model, 'description', array(
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
				
				$thumbDataProvider = new CArrayDataProvider($albums, array(
					'id'=>'albums',
					'pagination'=>array(
						'pageSize'=>12,
					),
				));
				
				$this->widget('bootstrap.widgets.TbThumbnails', array(
					'dataProvider'=>$thumbDataProvider,
					'template'=>"{items}\n{pager}",
					'itemView'=>'_thumb',
				));
			echo CHtml::closeTag('div');
			
		echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');
?>
