<?php

class ProfileController extends Controller
{
	public function actionIndex() {		
		Yii::import( 'application.extensions.linkedin.*' );
		$linkedin = new linkedin();
		$linkedin->init();
		//$linkedin->get_public_profile_by_public_url('http://www.linkedin.com/pub/alexey-slobodiskiy/36/344/61b');
		$linkedin->get_logged_in_users_profile();

		$profile = $linkedin->getProfile();
		$form = new ProfileForm();
		
		foreach( $profile as $key => $value ) {
			$form->{$key}=$value;
		}

		$this->render(
				'profile',
			array(
				'model'=>$form
			)
		);
	}
	
	public function actionSetting() {
		$model = new ProfileForm();
		if( isset( $_POST[ 'ProfileForm' ] ) && is_array( $_POST[ 'ProfileForm' ] ) ) {
			$attributes = array();
			foreach( $_POST[ 'ProfileForm' ] as $rawAttributeName => $rawAttributeValue ) {
				if( $rawAttributeValue ) {
					$attributes[] = $rawAttributeName;
				}
			}
		
			Yii::app()->linkedin->setActiveAttributes( $attributes );
		}

		$this->render( 
			'setting',
			array(
				'attributes' => Yii::app()->linkedin->getProfileAviableAttributes(),
				'checkedAttributes' => Yii::app()->linkedin->getActiveAttributes(),
				'model' => $model,
			)
		);
	}
}
