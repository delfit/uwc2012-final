<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// 
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '..',
	
	'name' => 'UWC2012 Final',
	
	'language' => 'ru',
	
	// preloading 'log' component
	'preload' => array( 
		'log',
		
		php_sapi_name() !== 'cli' ? 'bootstrap' : '',
	),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),
	
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'uwc2012',
			 // If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
			
			'generatorPaths' => array(
				'bootstrap.gii'
			),
		),
	),
	
	// application components
	'components' => array(
		'bootstrap' => array(
			'class' => 'ext.bootstrap.components.Bootstrap',
			'responsiveCss' => true,
		),
		
		'cache' => array(
			'class' => 'system.caching.CDummyCache' // CFileCache, CDummyCache
		),
		
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=uwc2012',
			'emulatePrepare' => true,
			'username' => 'uwc2012-final',
			'password' => 'uwc2012-final',
			'charset' => 'utf8',
		),
		 
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
				
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		
		'linkedin' => array(
			'class' => 'application.components.LinkedinOne',
		),
		
		'session' => array (
			'autoStart' => true,
		),
			
		'urlManager' => array(
			'urlFormat' => 'path',
			
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),

			// hide index.php in URLs
			'showScriptName' => false,
		),
	 

		
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
	),
	
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		
	),
);
