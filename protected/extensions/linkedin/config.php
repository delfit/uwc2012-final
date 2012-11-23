<?php

define('CALLBACK_URL', 'http://uwc2012-final.delfit.loc/profile/view?_api=accesstoken');
define('BASE_API_URL', 'https://api.linkedin.com');

define('REQUEST_PATH', '/uas/oauth/requestToken');
define('AUTH_PATH', '/uas/oauth/authorize');
define('ACC_PATH', '/uas/oauth/accessToken');

define('CUSTOMER_KEY', 'mocs8rt985uh');
define('CUSTOMER_SECRET', 'LcMtFAuU7vHR46IW');

$profileFields = array(
	'id', 
	'first-name', 
	'last-name', 
	'picture-url',
	'public-profile-url',
	'headline', 
	'current-status', 
	'location', 
	'distance', 
	'summary',
	'industry', 
	'specialties',
	'positions',
	'educations'
);

?>
