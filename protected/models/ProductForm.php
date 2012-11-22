<?php
    class ProductForm extends CFormModel{
        public $login;
        public $password;
        
        public function rules () {
            return array(
                array(
                    'login, password', 'required'
                ),
                array(
                    'login', 'length', 'max'=>10, 'min'=>'3'
                )
            );
        }
    }
?>
