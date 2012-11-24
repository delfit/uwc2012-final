<?php
$albums = array(
	array(
		'id' => 1,
		'author' => 'Album 1',
		'album' => 3,
		'photo' => 'http://placehold.it/320x320',
	),
	array(
		'id' => 1,
		'author' => 'Album 1',
		'album' => 3,
		'photo' => 'http://placehold.it/320x320',
	),
	array(
		'id' => 1,
		'author' => 'Album 1',
		'album' => 3,
		'photo' => 'http://placehold.it/320x320',
	),
	array(
		'id' => 1,
		'author' => 'Album 1',
		'album' => 3,
		'photo' => 'http://placehold.it/320x320',
	),
	array(
		'id' => 1,
		'author' => 'Album 1',
		'album' => 3,
		'photo' => 'http://placehold.it/320x320',
	),
	array(
		'id' => 1,
		'author' => 'Album 1',
		'album' => 3,
		'photo' => 'http://placehold.it/320x320',
	),
);




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

					$thumbDataProvider = new CArrayDataProvider($albums, array(
						'id'=>'albums',
						'pagination'=>array(
							'pageSize'=>12,
						),
					));

					$this->widget('bootstrap.widgets.TbThumbnails', array(
						'dataProvider'=>$thumbDataProvider,
						'template'=>"{items}\n{pager}",
						'itemView'=>'_thumbIndex',
					));
				echo CHtml::closeTag('div');
				
			echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');
?>