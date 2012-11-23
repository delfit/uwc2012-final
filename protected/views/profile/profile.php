<?php
	echo CHtml::openTag('div', array(
		'class'=>'row-fluid'
	));
		echo CHtml::openTag('div', array(
			'class'=>'span6 offset2'
		));
			echo CHtml::openTag('div', array(
				'class'=>'span2 image-block'
			));
				echo CHtml::image($model['pictureURL'], 'photo');

				$this->widget('bootstrap.widgets.TbButton',array(
					'label' => 'Print',
					'type' => 'primary',
					'size' => 'large',
					'htmlOptions' => array(
						'class' => 'print-button',
						'onclick'=>"window.print();",
					)
				));
			echo CHtml::closeTag('div');
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
			
			if( $model['headLine'] ) {
				$this->widget('bootstrap.widgets.TbEditableField', array(
					'type'      => 'text',
					'model'     => $model,
					'attribute' => 'headLine',
					'url'       => $this->createUrl('#'),  //url for submit data
					'enabled'   => true,
					'placement'    => 'bottom'
				 ));
			}
			$fields = array();
			foreach( $model as $key=>$value ) {
				if( $key == 'pictureURL' || $key == 'firstName' || $key == 'lastName' || $key == 'headLine' || $key == 'primaryKey' ) {
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
				
			$this->widget('bootstrap.widgets.TbEditableDetailView', array(
				'id' => 'user-details',
				'data' => $model,
				'url' => $this->createUrl('#'),  //common submit url for all editables
				'attributes'=>$fields
			));
		echo CHtml::closeTag('div');
		
	echo CHtml::closeTag('div');

?>
