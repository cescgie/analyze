<?php
require '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['datum'])){
$status = $_GET['datum'];
}
$query="SELECT DateEntered FROM userid_ga group by DateEntered having count(*) >= 1 ORDER BY DateEntered DESC";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
/*
public function index(){
	require_once '../includes/db.php'; // The mysql database connection script
	$query="SELECT DateEntered FROM userid_ga group by DateEntered having count(*) >= 1 ORDER BY DateEntered DESC";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$arr = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
	}

	# JSON-encode the response
	echo $json_response = json_encode($arr);
}*/
?>
