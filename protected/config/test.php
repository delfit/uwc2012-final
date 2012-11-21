<?php
return CMap::mergeArray(
	require(dirname( __FILE__ ) . '/main.php'), array(
		'components' => array(
			'cache' => array(
				'class' => 'system.caching.CDummyCache',
			),
			
			'fixture' => array(
				'class' => 'system.test.CDbFixtureManager',
			),
			
			'db' => array(
				'connectionString' => 'mysql:host=localhost;dbname=uwc2012-final_test',
				'emulatePrepare' => true,
				'username' => 'uwc2012-final',
				'password' => 'uwc2012-final',
				'charset' => 'utf8',
			),
		),
	)
);
