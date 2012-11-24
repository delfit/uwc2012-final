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
			
			$album[ 'cover' ] = isset( $currentCover[ 'data' ][0]['src_big'] ) ? $currentCover[ 'data' ][0]['src_big'] : null;
		}

		
		$this->render( 'albumsList', array( 'albumsProvider' => new CArrayDataProvider( $albums[ 'data' ] ) ) );
	}
	
	public function actionAlbum() {
		$model = new PhotoForm();
		
		$this->render( 
			'photosList',
			array(
				'model' => $model
			)
		);
	}
}

?>
