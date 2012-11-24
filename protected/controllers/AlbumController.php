<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlbumController
 *
 * @author ivan
 */
class AlbumController extends Controller
{
	public function actionCreateAlbum() {
//		//$formModel = new AlbumForm;
//
//		if( isset( $_POST[ 'AlbumForm' ] ) ) {
//			$formModel->attributes = $_POST[ 'AlbumForm' ];
//			
//			if( $formModel->save() ) {
			//Create an album
			$album_details = array(
				'message'=> 'Album desc',
				'name'=> 'Album name'
			);
			$createdAlbum = Yii::app()->facebook->fb->api( '/me/albums', 'post', $formModel->attributes );
		
		
			if(1) {
				Yii::app()->user->setFlash( 'success', 'Альбом создан' );
			}
			else {
				Yii::app()->user->setFlash( 'error', $formModel->getError( 'Name' ) );
			}
//		}
		
		
		$this->redirect( 'album/list' );
	}
	
	
	public function actionList() {
		Yii::app()->facebook->fb->setAccessToken( 'AAACEdEose0cBALWR5tGMzoxdz1kzzP1gPtElueKJeYrxNbpqZCKZBXcTZBGtlquxZBM6IUfU7GViV0OI6C2JZAuQv3md71yfsnUKbvw0T3NPq6E9jKJgp' );
		
		// альбомы
		$albumsFql = '
			SELECT aid, cover_pid, name, photo_count FROM album WHERE owner = me()
		';
		$albums = Yii::app()->facebook->query( $albumsFql );
		
		// обложки к альбомам
		$albumCoverFql = '
			SELECT src_big FROM photo WHERE pid = :pid
		';
		foreach( $albums[ 'data' ] as &$album ) {
			$currentCover = Yii::app()->facebook->query( $albumCoverFql, array( ':pid' => $album[ 'cover_pid' ] ) );
			
			$album[ 'id' ] = $album[ 'aid' ];
			$album[ 'cover' ] = isset( $currentCover[ 'data' ][0]['src_big'] ) ? $currentCover[ 'data' ][0]['src_big'] : 'http://placehold.it/300x200';
		}

		
		$this->render( 'list', array( 
			'albumsProvider' => new CArrayDataProvider( $albums[ 'data' ], array(
				'id'=>'albums',
			)),
			'model' => new AlbumForm()
		));
	}
}

?>
