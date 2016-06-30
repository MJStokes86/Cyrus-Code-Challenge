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
	$a = ['date_of_birth' => '2/13/1943'];
	$b = ['date_of_birth' => '3/3/1985'];
	$results = $a < $b;
	
	$this->assertEquals($results, sortDate($a, $b));
	
	
}


function testSortLastName() {
	$last_name_a = ['last_name' => 'Seles'];
	$last_name_b = ['last_name' => 'Abercrombie'];
	$results = $last_name_a < $last_name_b;
	$this->assertEquals($results, sortLastName($last_name_a, $last_name_b));

}

function testMyExplodeLoopFunc() {
	
	$array = array();


	$pipe_arr = [
		'last_name' => 'Smith',
		'first_name' => 'Steve',
		'gender' => 'Male',
		'date_of_birth' => '3/3/1985',
		'favorite_color' => 'Red'];

	$comma_arr = [
		'last_name' => 'Abercrombie',
		'first_name' => 'Neil',
		'gender' => 'Male',
		'date_of_birth' => '4/23/1967',
		'favorite_color' => 'Tan'];

	$space_arr = [
		'last_name' => 'Kournikova',
		'first_name' => 'Anna',
		'gender' => 'F',
		'date_of_birth' => '6/3/1975',
		'favorite_color' => 'Red'];


	$this->assertEquals($array, myExpldeLoopFunc($pipe_arr, 'Smith Steve M 3-3-1985 Red', 'Smith | Steve | D | M | Red | 3-3-1985
'));
	$this->assertEquals($array, myExpldeLoopFunc($comma_arr, 'Abercrombie Neil M 4-23-1967 Tan', 'Abercrombie , Neil , D ,  M , Tan,  4-23-1967
'));
	$this->assertEquals($array, myExpldeLoopFunc($space_arr, 'Kournikova Anna F 6-3-1975 Red', 'Kournikova Anna M Red 3-3-1985
'));
}



function testSortGenderByLastName() {

	
	$test = array_multisort(['Smith'], SORT_ASC, ['Male'], SORT_ASC);

	$this->assertTrue($test, sortGenderByLastName());


}

function testSortBirthdateByLastName() {

	$date_of_birth = ['6/3/1975'];
	$last_name = ['Kournikova'];

	$sort = usort($date_of_birth, 'sortLastName');
	
	$this->assertTrue($sort, sortBirthDateByLastName());
	
}

function testSortByLastNameDesc() {

	$last_name_a = ['last_name' => 'Seles'];
	$last_name_b = ['last_name' => 'Abercrombie'];

	$sort = array_multisort($last_name_a, SORT_DESC, $last_name_b, SORT_DESC);

	$this->assertTrue($sort, sortByLastNameDesc());
}

}





?>