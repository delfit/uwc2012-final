<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacebookOne
 *
 * @author ivan
 */
class FacebookOne extends CApplicationComponent
{
	public $fb;
	
	public function __construct() {
		require_once( Yii::app()->basePath . "/extensions/facebook/src/facebook.php");
		
		if( isset( $_GET[ 'state' ] ) ) {
			Yii::app()->session[ 'state' ] = $_GET[ 'state' ];
		}
		$config = Yii::app()->params[ 'FaceBook' ];
		
		
		$this->fb = new Facebook( $config );
		
		if( isset( Yii::app()->session[ 'AccessToken' ] ) ) {
			$this->fb->setAccessToken( Yii::app()->session[ 'AccessToken' ] );
		}
	}
	
	
	public function query( $query, $params = array() ) {
		foreach( $params as $paramName => $value ) {
			$query = str_replace( $paramName, '"' . $value . '"', $query );
		}

		return $this->fb->api( '/fql?q=' . urlencode( $query ) );
	}
}

?>
