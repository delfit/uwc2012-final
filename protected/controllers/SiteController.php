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
			Yii::app()->session[ 'state' ] = $_GET[ 'state' ];
			$this->redirect( $this->createUrl( 'site/index' ) );
		}
		
		$params = array(
			'scope' => 'read_stream',
			'redirect_uri' => 'http://uwc2012-final.delfit.loc/site/login',
			'display' => 'popup'
		);
		
		$loginUrl = Yii::app()->facebook->fb->getLoginUrl($params);
		$this->redirect( $loginUrl );
	}
	
	
	public function actionLogout() {		
			$params = array(
				'redirect_uri' => 'http://uwc2012-final.delfit.loc/site/login',
				'display' => 'popup'
			);

			$logoutUrl = Yii::app()->facebook->fb->getLogout($params);
		
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
