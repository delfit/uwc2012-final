<?php
$albums = array(
	array(
		'pid' => 1,
		'src_big' => 'http://placehold.it/320x320',
		'caption' => 'Description4',
		'like_info' => array(
			'can_like' => 1,
            'like_count' => 0
		)
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
			));
				
				echo CHtml::openTag('div', array(
					'class' => 'addAlbum',
				));
					$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id' => 'inlineForm',
						'type' => 'inline',
						'action' => Yii::app()->createUrl( 'album/upload' ),
						'method' => 'POST',
						'htmlOptions' => array(
							'class'=>'well',
							'enctype' => 'multipart/form-data'
						),
					));
					
					echo CHtml::openTag('fieldset');
						echo CHtml::openTag('legend');
							echo 'Добавить фотографию';
						echo CHtml::closeTag('legend');
						
						echo $form->textFieldRow( $model, 'caption', array(
							'class' => 'input-xlarge',
							'style' => 'margin-right: 5%;'
						));
						echo $form->fileField( $model, 'file', array(
							'class' => 'input-xlarge',
							'style' => 'margin-right: 5%;'
						));
						echo $form->hiddenField( $model, 'aid', array(
							'class' => 'input-xlarge',
							'style' => 'margin-right: 5%;'
						));
						$this->widget('bootstrap.widgets.TbButton', array(
							'type' => 'primary', 
							'buttonType' => 'submit', 
							'label' => 'Добавить',
							'htmlOptions' => array(
								'class' => 'pull-right'
							)
						));
					echo CHtml::closeTag('fieldset');
					
					$this->endWidget();
					
					
				
				echo CHtml::closeTag('div');
				
			echo CHtml::closeTag('div');
			
			echo CHtml::tag('hr');
			
//			echo CHtml::openTag('div', array(
//				'class' => 'photo',
//			));
//				echo CHtml::openTag('h4', array(
//					'style' => 'text-align: center; color: blue;'
//				));
//					echo 'Album Name (hardcoded)';
//				echo CHtml::closeTag('h4');
//				$thumbDataProvider = new CArrayDataProvider($photosProvider, array(
//					'id'=>'albums',
//					'pagination'=>array(
//						'pageSize'=>12,
//					),
//				));
//				
//				$this->widget('bootstrap.widgets.TbThumbnails', array(
//					'dataProvider'=>$thumbDataProvider,
//					'template'=>"{items}\n{pager}",
//					'itemView'=>'_thumbPhoto',
//				));
//			echo CHtml::closeTag('div');
//			
//		echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');
?>
