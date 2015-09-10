<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['webid']) && isset($_GET['datum'])){
$webid = $_GET['webid'];
$datum = $_GET['datum'];
}
$query="SELECT count(*) as Anzahl_UserId from(SELECT count(UserId) FROM `uid_webid` WHERE WebsiteId = $webid AND DateEntered = '$datum' GROUP BY UserId)sq";

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
