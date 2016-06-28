<?php 


require 'vendor/autoload.php';
require 'app/ParsedData.php';

class ParsedDataTest extends PHPUnit_Framework_TestCase {

 function testChangeGender() {
	$female = 'Female';
	$male = 'Male';
	$this->assertEquals($female, changeGender('F'));
	$this->assertEquals($male, changeGender('M'));
}

function testNormalizeDate() {
	$charReplace = '/';
	$this->assertEquals($charReplace, normalizeDate('-'));
}

function testSortDate() {

	
	$dateFormat = 'n/j/Y';
	

	
	$this->assertEquals(sortDate('2/13/1979','4/12/1985' ));
}
}





?>