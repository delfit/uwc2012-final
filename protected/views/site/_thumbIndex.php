<?php

		echo CHtml::openTag( 'div', array(
			'class' => 'span3',
			'style' => 'margin: 2% 5%; height: 200px;'
		) );
			echo CHtml::openTag('a',  array(
				'href' => '#',
				'target' => '_self'
			));
				echo CHtml::image($data['photo'], 'photo', array(
					'style' => 'display: block; margin: 1% auto; height: 150px;'
				));
			echo CHtml::closeTag( 'a' );
			
		echo CHtml::closeTag( 'div' );
?>
