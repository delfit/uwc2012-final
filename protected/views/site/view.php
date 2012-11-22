<?php
    foreach( $products as $key => $value ):
        foreach ( $value as $name => $range ):
?>
            <p>This <?php echo $name; ?> = <?php echo $range; ?> <br/></p>
<?php
            endforeach;
    endforeach;
      $form = $this->beginWidget('CActiveForm', array(
          'method' => 'GET'
      ));
        echo $form->textField($model, 'login');
        echo $form->passwordField($model, 'password');
        echo CHtml::submitButton('Ok');
      $this->endWidget();
?>
