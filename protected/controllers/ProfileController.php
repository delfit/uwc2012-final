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
		
		$this->render( 'profile', array( 'profile' => $profile )  );
	}	
	
	public function actionAuth() {
	}
}