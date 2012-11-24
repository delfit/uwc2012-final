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
			
				$this->widget( 'bootstrap.widgets.TbButton', array(
					'type' => 'primary',
					'size' => 'large',
					'label' => 'Добавить альбом',
				));
				
				
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
