<?php

class SiteController extends Controller
{


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// TODO убрать вшитый токен
		Yii::app()->facebook->fb->setAccessToken( 'AAACEdEose0cBALWR5tGMzoxdz1kzzP1gPtElueKJeYrxNbpqZCKZBXcTZBGtlquxZBM6IUfU7GViV0OI6C2JZAuQv3md71yfsnUKbvw0T3NPq6E9jKJgp' );
		
		
		$FBPhotoStreamPhotos = FBPhotoStream::model()->findAll(array(
			'limit' => 30,
		));
		
		
		// запрос на получение фотографии
		$newPhotoFql = '
			SELECT owner, src_big, created FROM photo WHERE pid = :pid
		';
		
		// запрос на получение пользователя
		$newPhotoFql = '
			SELECT username FROM user WHERE uid = :uid
		';
		
		$newPhotos = array();
		foreach( $FBPhotoStreamPhotos as $FBPhotoStreamPhoto ) {
			$currentPhoto = Yii::app()->facebook->query( $albumCoverFql, array( ':pid' => $FBPhotoStreamPhoto->FBPhotoID ) );
			$currentPhotoOwner = Yii::app()->facebook->query( $newPhotoFql, array( ':uid' => $currentPhoto[ 'data' ][ 'owner' ] ) );
			
			$newPhotos[] = array(
				'username' => $currentPhotoOwner[ 'data' ][ 'username' ],
				'cover' => $currentPhoto[ 'data' ][ 'src_big' ],
				'created' => $currentPhoto[ 'data' ][ 'created' ],
			);
		}
		
		
		$this->render(
			'index',
			array(
				'photos' => new CArrayDataProvider( $newPhotos )
			)
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
