<?php
		echo CHtml::openTag( 'div', array(
			'class' => 'span3',
			'style' => 'margin: 2% 5%;'
		) );
			echo CHtml::openTag('a',  array(
				'href' => $data['src_big'],
				'target' => '_self',
				'rel' => 'lightbox-image',
			));
				echo CHtml::image($data['src_big'], 'photo', array(
					'style' => 'display: block; margin: 1% auto;'
				));
			echo CHtml::closeTag( 'a' );
			echo CHtml::openTag('a', array(
				'href' => '#',
				'target' => '_self',
				'style' => 'text-align: center; color: blue; margin: 0; font-weight: bold; display: block;'
			));
				echo $data['caption'];
			echo CHtml::closeTag('a');
			echo CHtml::openTag('p', array(
				'style' => 'text-align: center; color: gray; font-size: 0.8em; margin: 0; font-style: italic; padding: 0'
			));
				echo 'Количество лайков: '.$data['like_info']['like_count'];
			echo CHtml::closeTag('p');
			
		echo CHtml::closeTag( 'div' );
?>
