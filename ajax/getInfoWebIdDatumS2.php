<?php
require_once '../includes/db.php'; // The mysql database connection script
$datum = '%';
$webid = '%';
if(isset($_GET['datum']) && isset($_GET['webid'])){
  $datum = $_GET['datum'];
  $webid = $_GET['webid'];
}
$query="SELECT Date(DateEntered) as DateEntered,UserId,WebsiteId,SUM(Summe) as Sum FROM uid_webid_test WHERE Date(DateEntered) = '$datum' AND WebsiteId = '$webid' GROUP BY UserId ORDER BY Sum DESC";

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
