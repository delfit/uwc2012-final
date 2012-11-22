<?php
$form = $this->beginWidget( 'CActiveForm', array(
	'method' => 'GET'
));
	echo $form->textField( $model, 'name' );
	echo $form->emailField( $model, 'email' );
	echo $form->textArea( $model, 'text' );
	echo CHtml::submitButton( 'Ok' );
$this->endWidget();
?>
