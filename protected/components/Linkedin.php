<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LinkedinComponent
 *
 * @author ivan
 */
class Linkedin extends CApplicationComponent
{
	public function getProfileAviableAttributes() {
		return array(
			array(
				'category' => 'Identification data',
				'items' => array(
					array(
						'name' => 'id',
						'title' => Yii::t( 'application', 'ID' )
					),
					array(
						'name' => 'publicURL',
						'title' => Yii::t( 'application', 'publicURL' )
					)
				)
			),
			array(
				'category' => 'Personal data',
				'items' => array(
					array(
						'name' => 'firstName',
						'title' => Yii::t( 'application', 'firstName' )
					),
					array(
						'name' => 'lastName',
						'title' => Yii::t( 'application', 'lastName' )
					),
					array(
						'name' => 'pictureURL',
						'title' => Yii::t( 'application', 'pictureURL' )
					)
				)
			),
			
			array(
				'category' => 'Other',
				'items' => array(
					array(
						'name' => 'headLine',
						'title' => Yii::t( 'application', 'headLine' )
					),
					array(
						'name' => 'currentStatus',
						'title' => Yii::t( 'application', 'currentStatus' )
					),
					array(
						'name' => 'locationName',
						'title' => Yii::t( 'application', 'locationName' )
					),
					array(
						'name' => 'locationCountryCode',
						'title' => Yii::t( 'application', 'locationCountryCode' )
					),
					array(
						'name' => 'distance',
						'title' => Yii::t( 'application', 'distance' )
					),
					array(
						'name' => 'summary',
						'title' => Yii::t( 'application', 'summary' )
					),
					array(
						'name' => 'industry',
						'title' => Yii::t( 'application', 'industry' )
					)
				)	
			)
		);
	}	
	
	
	public function setActiveAttributes( $attributes ) {
		Yii::app()->session[ 'ProfileActiveAttributes' ] = CJSON::encode( $attributes );
	}
	
	
	public function getActiveAttributes() {
		if( isset( Yii::app()->session[ 'ProfileActiveAttributes' ] ) && !empty( Yii::app()->session[ 'ProfileActiveAttributes' ] ) ) {
			
			return CJSON::decode( Yii::app()->session[ 'ProfileActiveAttributes' ] );
		}
		
		return array();
	}
}

?>
