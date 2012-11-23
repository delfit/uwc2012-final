<?php
	echo CHtml::openTag('div', array(
		'class'=>'row-fluid'
	));
		echo CHtml::openTag('div', array(
			'class'=>'span8 offset2'
		));
		
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'settingsForm',
			'htmlOptions'=>array('class'=>'well'),
		));
		
		foreach( $attributes as $array ) {
			foreach( $array as $key=>$value ) {
				if( $key == 'category' ) {
					echo CHtml::openTag('h3');
						echo $value;
					echo CHtml::closeTag('h3');
				}
				if( $key == 'items' ) {
					foreach( $value as $item ) {
						echo $form->checkboxRow($model, $item['name']);
						echo '<br/>';
					}
				}
			}
		}
		$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit'));
		$this->endWidget();
		
		echo CHtml::closeTag( 'div');
	echo CHtml::closeTag( 'div');
?>
