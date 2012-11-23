<?php
$attributes = array(
		array(
			'category' => 'Identification data',
			'items' => array(
				array(
					'name' => 'id',
					'title' => Yii::t( 'application', 'ID' )
				),
				array(
					'name' => 'publicURL',
					'title' => Yii::t( 'application', 'publicURL' )
				)
			)
		),
		array(
			'category' => 'Personal data',
			'items' => array(
				array(
					'name' => 'firstName',
					'title' => Yii::t( 'application', 'firstName' )
				),
				array(
					'name' => 'lastName',
					'title' => Yii::t( 'application', 'lastName' )
				),
				array(
					'name' => 'pictureURL',
					'title' => Yii::t( 'application', 'pictureURL' )
				)
			)
		),

		array(
			'category' => 'Other',
			'items' => array(
				array(
					'name' => 'headLine',
					'title' => Yii::t( 'application', 'headLine' )
				),
				array(
					'name' => 'currentStatus',
					'title' => Yii::t( 'application', 'currentStatus' )
				),
				array(
					'name' => 'locationName',
					'title' => Yii::t( 'application', 'locationName' )
				),
				array(
					'name' => 'locationCountryCode',
					'title' => Yii::t( 'application', 'locationCountryCode' )
				),
				array(
					'name' => 'distance',
					'title' => Yii::t( 'application', 'distance' )
				),
				array(
					'name' => 'summary',
					'title' => Yii::t( 'application', 'summary' )
				),
				array(
					'name' => 'industry',
					'title' => Yii::t( 'application', 'industry' )
				)
			)	
		));



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
