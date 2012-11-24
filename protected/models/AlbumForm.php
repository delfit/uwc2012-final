<?php
class AlbumForm extends CFormModel{	
        public $name;
        public $message;
		
		public function rules() {
			return array(
				array( 'name', 'required' ),
				array( 'aid', 'safe' ),
				array( 'rememberMe, message, aid', 'safe' ),
			);
		}
}
?>
