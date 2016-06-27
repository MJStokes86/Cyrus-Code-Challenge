<?php 

use PHPUnit\Framework\TestCase;




class parsed_data_test extends TestCase {


public function testmy_addition() {
	include "./data/functions.php";
	$result = my_addition(1,1);
	$this->assertEquals(2, $result);

}


}






 ?>
