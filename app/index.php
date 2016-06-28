<?php require_once("./ParsedData.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cyrus Code Test</title>
</head>
<body>

<h1>Cyrus Code Test</h1>
<h3>by Michael J. Stokes</h3>

<h1>Output 1</h1>


<?php 


foreach ($finalArray as $key => $row) {
	$gender[$key] = $row['gender'];
	$last_name[$key] = $row['last_name'];
}

array_multisort($gender, SORT_ASC, $last_name, SORT_ASC, $finalArray);

foreach ($finalArray as $row) {
	echo join(' ', $row) . "<br>\n";
}


?>

 <h1>Output 2</h1>

 <?php 

usort($finalArray, 'sortLastName');
usort($finalArray, 'sortDate');

 foreach ($finalArray as $row) {
 	echo join(' ', $row) . "<br>\n";
 }	

?>


 <h1>Output 3</h1>

 <?php 

 foreach ($finalArray as $key => $row) {
 	$last_name[$key] = $row['last_name'];
 }

 array_multisort($last_name, SORT_DESC, $finalArray);

 foreach ($finalArray as $row) {
 	echo join(' ', $row) . "<br>\n";
 }	

?>








	
</body>
</html>