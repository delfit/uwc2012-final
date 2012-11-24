<?php

class SiteController extends Controller
{


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		$this->render(
			'index'
		);
	}
	
	
		
	public function actionLogin() {		
		
		if( isset( $_GET[ 'state' ] ) ) {
			$identity = new UserIdentity( $_GET[ 'state' ], $_GET[ 'state' ] );
			Yii::app()->user->login( $identity, 1000 );
			
			Yii::app()->session[ 'state' ] = $_GET[ 'state' ];
			Yii::app()->session[ 'AccessToken' ] = Yii::app()->facebook->fb->getAccessToken();
			
			$this->redirect( $this->createUrl( 'site/index' ) );
		}

		$params = array(
			'scope' => 'read_stream',
			'redirect_uri' => 'http://uwc2012-final.delfit.loc/site/login',
			'display' => 'popup'
		);
		
		$loginUrl = Yii::app()->facebook->fb->getLoginUrl( $params );
		$this->redirect( $loginUrl );
	}
	
	
	public function actionLogout() {
			$params = array(
				'next' => 'http://uwc2012-final.delfit.loc/site/index',
			);
			
			$logoutUrl = Yii::app()->facebook->fb->getLogoutUrl( $params );
			
			Yii::app()->user->logout();
			unset( Yii::app()->session[ 'state' ] );
			unset( Yii::app()->session[ 'AccessToken' ] );
			
			$this->redirect( $logoutUrl );
	}


	/**
	 * This is the action to handle external exceptions.
	 * 
	 */
	public function actionError() {
		if( $error = Yii::app()->errorHandler->error ) {
			if( Yii::app()->request->isAjaxRequest ) {
				echo $error[ 'message' ];
			}
			else {
				$this->render( 'error', $error );
			}
		}
	}

}
