<?php
$settings = array(
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
		
		foreach( $settings as $key => $value ) {
			echo CHtml::openTag('h2');
				echo $key[category];
			echo CHtml::closeTag('h2');
		}
		
		echo CHtml::closeTag( 'div');
	echo CHtml::closeTag( 'div');
?>
