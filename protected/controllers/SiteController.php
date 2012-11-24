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
	
	public function actionAlbums() {
		$form = new AlbumForm();
		$this->render(
			'albumsList',
			array(
				'model'=>$form
			)
		);
	}
	
	public function actionAlbum() {
		$this->render(
			'photosList'
		);
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