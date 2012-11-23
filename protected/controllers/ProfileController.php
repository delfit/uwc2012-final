<?php

class ProfileController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {		
		Yii::import( 'application.extensions.linkedin.*' );
		$linkedin = new linkedin();
		$linkedin->init();
		$linkedin->get_public_profile_by_public_url('http://www.linkedin.com/in/nileshgamit');

		$profile = $linkedin->getProfile();
		
		$form = new ProfileForm();
		
		foreach( $profile as $key => $value ) {
			$form->{$key}=$value;
		}

//		$form->id = $profile['id']; 
//		$form->firstName = 'John'; 
//		$form->lastName = 'White'; 
//		$form->pictureUrl = 'http://placehold.it/200x250';
//		$form->publicProfileUrl = '';
//		$form->headline = 'Headline'; 
//		$form->currentStatus = 'Status'; 
//		$form->location = 'USA';
//		$form->distance = ''; 
//		$form->summary = '';
//		$form->industry = ''; 
//		$form->specialties = '';
//		$form->positions = '';
//		$form->educations = '';

		$this->render(
				'profile',
			array(
				'model'=>$form
			)
		);
	}	
	
	public function actionAuth() {
	}
	
	public function actionProfile() {
		$form = new ProfileForm();

		$form->id = 1; 
		$form->firstName = 'John'; 
		$form->lastName = 'White'; 
		$form->pictureUrl = 'http://placehold.it/200x250';
		$form->publicURL = '';
		$form->headLine = 'Headline'; 
		$form->currentStatus = 'Status'; 
		$form->location = 'USA';
		$form->distance = ''; 
		$form->summary = '';
		$form->industry = ''; 
		$form->specialties = '';
		$form->positions = '';
		$form->educations = '';

		$this->render(
				'profile',
			array(
				'model'=>$form
			)
		);
	}
}