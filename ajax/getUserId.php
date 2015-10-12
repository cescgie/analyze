<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['datum'])){
$datum = $_GET['datum'];
}
$query="SELECT UserId,Summe as Sum,Uhrzeit,DateEntered FROM userid_ga WHERE DateEntered = '$datum' AND UserId!='0000000000000000' AND Uhrzeit=24 HAVING Summe > 5000 ORDER BY Summe DESC";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>
