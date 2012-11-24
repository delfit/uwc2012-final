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
			
			echo CHtml::openTag('ul', array(
				'class' => 'unstyled',
				'style' => 'display: block; margin: 1% auto; text-align: center;'
			));
				echo CHtml::openTag('li');
					echo CHtml::openTag('b', array(
						'style' => 'color: blue;'
					));
						echo 'Автор: ';
					echo CHtml::closeTag('b');
						echo $data['author'];
				echo CHtml::closeTag('li');
				
				echo CHtml::openTag('li');
					echo CHtml::openTag('b', array(
						'style' => 'color: blue;'
					));
						echo 'Создан: ';
					echo CHtml::closeTag('b');
						echo date( 'd.m.Y G:i:s', $data['createdTimestamp'] );
				echo CHtml::closeTag('li');
				
				echo CHtml::openTag('li');
					echo CHtml::openTag('a',  array(
						'href' => '#',
						'target' => '_self'
					));
						echo CHtml::openTag('b', array(
							'style' => 'color: blue;'
						));
							echo 'Альбом: ';
						echo CHtml::closeTag('b');
							echo '???';
					echo CHtml::closeTag( 'a' );
				echo CHtml::closeTag('li');
			echo CHtml::closeTag('ul');
			
		echo CHtml::closeTag( 'div' );
?>
