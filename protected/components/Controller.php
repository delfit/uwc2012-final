<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column1';
//	public $profileURL = Yii::app()->createUrl( 'profile/profile' );
//	public $settingsURL = Yii::app()->createUrl( 'profile/setting' );

	/**
	 * @var array main menu items
	 */
	public $mainMenu = array(
		
	);
		
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array( );

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array( );
	
	
	public function beforeRender( $view ) {
		parent::beforeRender( $view );

		// создать главное меню сайта из категорий
		$this->mainMenu = array(
			array( 'label' => 'Home', 'url' => '#', 'active' => true ),
			array( 
				'label' => 'Profile', 'url' => $this->createUrl( 'profile/view', $this->getActionParams() )
			),
			array( 'label' => 'Settings', 'url' => $this->createUrl( 'profile/setting', $this->getActionParams() ) )
		);

		return true;
	}

}
