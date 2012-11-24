<?php

		echo CHtml::openTag( 'div', array(
			'class' => 'span3',
			'style' => 'margin: 2% 5%; height: 200px;'
		) );
			echo CHtml::openTag('a',  array(
				'href' => '#',
				'target' => '_self'
			));
				echo CHtml::image($data['cover'], 'photo', array(
					'style' => 'display: block; margin: 1% auto; height: 150px;'
				));
			echo CHtml::closeTag( 'a' );
			echo CHtml::openTag('a', array(
				'href' => '#',
				'target' => '_self',
				'style' => 'text-align: center; color: blue; margin: 0; font-weight: bold; display: block;'
			));
				echo $data['name'];
			echo CHtml::closeTag('a');
			echo CHtml::openTag('p', array(
				'style' => 'text-align: center; color: gray; font-size: 0.8em; margin: 0; font-style: italic; padding: 0'
			));
			$photos;
			echo $data['photo_count'].' фотография(-и)';
			echo CHtml::closeTag('p');
		echo CHtml::closeTag( 'div' );
?>
