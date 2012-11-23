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
class LinkedinOne extends CApplicationComponent
{
	public function __construct() {
		unset(  Yii::app()->session[ 'ProfileActiveAttributes' ] );
		if( !isset( Yii::app()->session[ 'ProfileActiveAttributes' ] ) ) {
			$aviableAttributes = $this->getProfileAviableAttributes();
			$activeAttributes = array();
			foreach( $aviableAttributes as $category ) {
				foreach( $category[ 'items' ] as $item ) {
					$activeAttributes[] = $item[ 'name' ];
				}
			}
			
			$this->setActiveAttributes( $activeAttributes );
		}
	}

	public function getProfileAviableAttributes() {
		return array(
			array(
				'category' => Yii::t( 'application', 'Identification data' ),
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
				'category' => Yii::t( 'application', 'Personal data' ),
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
				'category' => Yii::t( 'application', 'Other' ),
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
//					array(
//						'name' => 'locationCountryCode',
//						'title' => Yii::t( 'application', 'locationCountryCode' )
//					),
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
	
	public function getRemouteActiveAttributes() {
		$localToRemoute = array(
			'id' => 'id', 
			'firstName' => 'first-name', 
			'lastName' => 'last-name', 
			'pictureURL' => 'picture-url',
			'publicURL' => 'public-profile-url',
			'headLine' => 'headline', 
			'currentStatus' => 'current-status', 
			'locationName' => 'location', 
			'distance' => 'distance', 
			'summary' => 'summary',
			'industry' => 'industry', 
			'specialties' => 'specialties',
			'positions' => 'positions',
			'educations' => 'educations'
		);
		
		$activeAttributes = $this->getActiveAttributes();
		$remouteActiveAttributes = array();
		foreach( $activeAttributes as $activeAttribute ) {
			if( key_exists( $activeAttribute, $localToRemoute ) ) {
				$remouteActiveAttributes[] = $localToRemoute[ $activeAttribute ];
			}
		}
		
		
		return  $remouteActiveAttributes;
	}
}

?>
