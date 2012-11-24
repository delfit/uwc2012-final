<?php
class PhotoForm extends CFormModel{	
	public $caption;
	public $file;
	public $aid;
	
	public function rules() {
		return array(
			array( 'caption', 'required' ),
			array( 'aid', 'safe' ),
			array( 'caption, aid', 'safe' ),
		);
	}
}
?>
