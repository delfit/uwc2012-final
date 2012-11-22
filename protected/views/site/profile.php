<?php
	echo CHtml::openTag('div', array(
		'class'=>'row-fluid'
	));
		echo CHtml::image($model['pictureUrl'], 'photo', array(
			'class'=>'pull-left',
			'style'=>'margin-top: 10px;',
		));
		echo CHtml::openTag('div', array(
			'class'=>'span8'
		));
			echo CHtml::openTag('h1');
				if( $model['firstName'] ) {
					$this->widget('bootstrap.widgets.TbEditableField', array(
						'type'      => 'text',
						'model'     => $model,
						'attribute' => 'firstName',
						'url'       => $this->createUrl('#'),  //url for submit data
						'enabled'   => true,
						'placement'    => 'bottom',
						'htmlOptions' => array(
							'style' => 'margin-right: 10px;'
						)
					 ));
				}

				if( $model['lastName'] ) {
					$this->widget('bootstrap.widgets.TbEditableField', array(
						'type'      => 'text',
						'model'     => $model,
						'attribute' => 'lastName',
						'url'       => $this->createUrl('#'),  //url for submit data
						'enabled'   => true,
						'placement'    => 'bottom',
					 ));
				}
			echo CHtml::closeTag('h1');
			
			if( $model['headline'] ) {
				$this->widget('bootstrap.widgets.TbEditableField', array(
					'type'      => 'text',
					'model'     => $model,
					'attribute' => 'headline',
					'url'       => $this->createUrl('#'),  //url for submit data
					'enabled'   => true,
					'placement'    => 'bottom',
					'htmlOptions' => array(
						'class' => 'pull-left'
					)
				 ));
			}
			$fields = array();
			foreach( $model as $key=>$value ) {
				if( $key == 'pictureUrl' || $key == 'firstName' || $key == 'lastName' || $key == 'headline' ) {
					continue;
				}
				if( $key == 'id' ) {
					echo CHtml::hiddenField( $value, $value );
					continue;
				}
				if( $value ) {
					$fields[] = $key;
				}

			}
			
			echo CHtml::openTag('div', array(
				'class'=>'span6'
			));
				$this->widget('bootstrap.widgets.TbEditableDetailView', array(
					'id' => 'user-details',
					'data' => $model,
					'url' => $this->createUrl('#'),  //common submit url for all editables
					'attributes'=>$fields
				));
			echo CHtml::closeTag('div');

				
		echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');

?>
