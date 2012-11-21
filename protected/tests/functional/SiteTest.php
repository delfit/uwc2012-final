<?php

class SiteTest extends WebTestCase
{

	public function testIndex() {
		$this->openHomePage();
		
		$this->assertTextPresent( 'UWC2012 Final' );
	}
}
