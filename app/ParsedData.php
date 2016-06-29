
<?php 




	
	$space_txt = './data/input/space.txt';
	$comma_txt = './data/input/comma.txt';
	$pipe_txt = './data/input/pipe.txt';

	$parsed_space_data = file_get_contents($space_txt);
	$parsed_comma_data = file_get_contents($comma_txt);
	$parsed_pipe_data = file_get_contents($pipe_txt);

	

	$space_array = myExpldeLoopFunc("space"," ", $parsed_space_data);
	$comma_array = myExpldeLoopFunc("comma",",", $parsed_comma_data);
	$pipe_array = myExpldeLoopFunc("pipe"," | ", $parsed_pipe_data);


	$finalArray = array_merge($space_array, $comma_array, $pipe_array);


	function changeGender($gender) {
		return $gender === 'F' ? 'Female' : 'Male';
	}

	function normalizeDate($date) {
		return str_replace('-', '/', $date);
		
	}

	function sortDate($a, $b) {
		$a_int = DateTime::createFromFormat('n/j/Y', $a['date_of_birth']);
		$b_int = DateTime::createFromFormat('n/j/Y', $b['date_of_birth']);
		return ($a_int == $b_int) ? 0 : ($a_int > $b_int) ? 1 : -1;
	}

	function sortLastName($a, $b) {
		return ($a['last_name'] < $b['last_name']);
	}


	function myExpldeLoopFunc($name, $sep, $data) {

		$parsedData = explode("\n", $data);
		
		

		$arr = [];
		foreach ($parsedData as $data) {
			if ($data === "") continue;
			$data_arr = explode($sep, $data);



			if($name == 'space'){
					
				$arr[] = [
					"last_name" => trim($data_arr[0]),
					"first_name" => trim($data_arr[1]),
					"gender" => changeGender(trim($data_arr[3])),
					"date_of_birth" => normalizeDate(trim($data_arr[4])),
					"favorite_color" => trim($data_arr[5])
					];

			}

				elseif($name == 'comma') {
					$arr[] = [
					"last_name" => trim($data_arr[0]),
					"first_name" => trim($data_arr[1]),
					"gender" => trim($data_arr[2]),
					"date_of_birth" => normalizeDate(trim($data_arr[4])),
					"favorite_color" => trim($data_arr[3])
					];
				}

			    elseif ($name == 'pipe') {
					$arr[] = [
					"last_name" => trim($data_arr[0]),
					"first_name" => trim($data_arr[1]),
					"gender" => changeGender(trim($data_arr[3])),
					"date_of_birth" => normalizeDate(trim($data_arr[5])),
					"favorite_color" => trim($data_arr[4])
					];


			}
		}

	

	return $arr;
}


function sortGenderByLastName() {
	global $finalArray;

	foreach ($finalArray as $key => $row) {
	$gender[$key] = $row['gender'];
	$last_name[$key] = $row['last_name'];
}

array_multisort($gender, SORT_ASC, $last_name, SORT_ASC, $finalArray);

foreach ($finalArray as $row) {
	echo join(' ', $row) . "<br>\n";
}



}

function sortBirthDateByLastName() {
	global $finalArray;

	usort($finalArray, 'sortLastName');
	usort($finalArray, 'sortDate');

 foreach ($finalArray as $row) {
 	echo join(' ', $row) . "<br>\n";
 }	



}

function sortByLastNameDesc() {
	global $finalArray;

	foreach ($finalArray as $key => $row) {
 	$last_name[$key] = $row['last_name'];
 }

 array_multisort($last_name, SORT_DESC, $finalArray);

 foreach ($finalArray as $row) {
 	echo join(' ', $row) . "<br>\n";
 }	
}




?>

