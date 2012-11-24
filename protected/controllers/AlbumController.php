<?php
class AlbumController extends Controller
{	
	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl',
		);
	}
	

	/**
	 * Определяет правила доступа
	 * Используется в 'accessControl' фильтре.
	 * 
	 * @return array правила доступа
	 */
	public function accessRules() {
		return array(
			array( 'allow',
				'actions' => array( 'list', 'view', 'upload' ),
				'users' => array( '@' ),
			),
			array( 'deny', // deny all users
				'users' => array( '*' ),
			),
		);
	}
	
	
	public function actionList() {		
		$albumForm = new AlbumForm;
		
		if( isset( $_POST[ 'AlbumForm' ] ) ) {
			$albumForm->attributes = $_POST[ 'AlbumForm' ];
			if( $albumForm->validate() ) {
				// создать альбом на FB
				$createdAlbum = Yii::app()->facebook->fb->api( '/me/albums', 'post', $albumForm->attributes );
				
				if( isset( $createdAlbum[ 'id' ] ) ) {
					Yii::app()->user->setFlash( 'success', 'Альбом создан' );
				}
				else {
					Yii::app()->user->setFlash( 'error', 'Ошибка при создании альбома на Facebook' );
				}
			}
			else {
				Yii::app()->user->setFlash( 'error', $createdAlbum->getError( 'name' ) );
			}
		}
		
		
		// запрос на получение альбомов
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
				'id'=>'albums'
			)),
			'model' => $albumForm
		));
	}
	
	public function actionView( $aid ) {
		// загружаем фото
		if( isset( $_POST[ 'PhotoForm' ] ) ) {
			if( isset( $_FILES[ 'PhotoForm' ][ 'tmp_name' ] ) ) {
				$upload_photo = Yii::app()->facebook->fb->api('/'. $_POST[ 'PhotoForm' ][ 'aid' ] .'/photos', 'post', array(
					'caption'=> $_POST[ 'PhotoForm' ][ 'caption' ],
					'image' => '@' . realpath( $_FILES[ 'PhotoForm' ][ 'tmp_name' ][ 'file' ] )
				) );

				if( isset( $upload_photo[ 'id' ] ) ) {
					$newPhoto = new FBPhotoStream();
					$newPhoto->FBPhotoID = $upload_photo[ 'id' ];
					$newPhoto->save();
				}
			}
		}
		
		// альбом
		$albumFql = '
			SELECT aid, cover_pid, name, photo_count FROM album WHERE aid = :aid
		';
		$album = Yii::app()->facebook->query( $albumFql, array( ':aid' => $aid ) );
		
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
		
		foreach( $photos[ 'data' ] as &$photo ) {
			$photo[ 'id' ] = $photo[ 'pid' ];
		} 

		$photoForm = new PhotoForm();
		$photoForm->aid = $aid;

		$this->render( 
			'album', 
			array(
					'model' => $photoForm,
					'album' => $album[ 'data' ][0],
					'photosProvider' => new CArrayDataProvider( $photos[ 'data' ], array(
						'id'=>'photos',
						'pagination'=>array(
							'pageSize'=>12,
						),
					) 
				)
			)
		);
	}
	
	public function parseData( $data ) {
		return isset( $data[ 'data' ][0] ) ? $data[ 'data' ][0] : null;
	}
	
	public function getDataFiled( $data, $field ) {
		return isset( $data[ 'data' ][0][ $field ] ) ? $data[ 'data' ][0][ $field ] : null;
	}
}

?>
