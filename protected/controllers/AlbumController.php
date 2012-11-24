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

		
		$this->render( 'album', array( 'albumsProvider' => new CArrayDataProvider( $albums[ 'data' ] ) ) );
	}
	
	public function actionView( $aid ) {
		Yii::app()->facebook->fb->setAccessToken( 'AAACEdEose0cBALWR5tGMzoxdz1kzzP1gPtElueKJeYrxNbpqZCKZBXcTZBGtlquxZBM6IUfU7GViV0OI6C2JZAuQv3md71yfsnUKbvw0T3NPq6E9jKJgp' );
		
		// альбом
		$albumFql = '
			SELECT aid, cover_pid, name, photo_count FROM album WHERE aid = :aid
		';
		$album = Yii::app()->facebook->query( $albumFql, array( ':aid' => $aid ) );
		//$album = $this->parseData( $album );
		
		// обложки к альбому
		$albumCoverFql = '
			SELECT src_big FROM photo WHERE pid = :pid
		';
		$cover = Yii::app()->facebook->query( $albumCoverFql, array( ':pid' => $this->getDataFiled( $album, 'cover_pid' ) ) );
		$album[ 'cover' ] = $this->getDataFiled( $cover, 'src_big' );
		
		// фотографии из альбома
		$photosFql = '
			SELECT pid, src_big, src, link, caption, like_info FROM photo WHERE aid= :aid
		';
		$photos = Yii::app()->facebook->query( $photosFql, array( ':aid' => $aid ) );
		
		$this->render( 
			'album', 
			array(
				'album' => $album[ 'data' ],
				'photos' => new CArrayDataProvider( $photos[ 'data' ] )
			)
		);
	}
	
	public function parseData( $data ) {
		return isset( $data[ 'data' ][0] ) ? $data[ 'data' ][0] : null;
	}
	
	public function getDataFiled( $data, $field ) {
		return isset( $data[ 'data' ][0][ $field ] ) ? $data[ 'data' ][0][ $field ] : null;
	}
	
//	public function upload() {
//		$_FI
//		
//		$attributes = array(
//			'message'=> 'Photo message',
//			'image' => null
//		);
//		
//		$albumID = null;
//		
//		//Upload a photo to album of ID...
//		$photo_details = array(
//			'message'=> 'Photo message'
//		);
//
//		$attributes[ 'image' ] = '@' . 
//
//		$upload_photo = $facebook->api('/'..'/photos', 'post', $photo_details);
//	}
}

?>
