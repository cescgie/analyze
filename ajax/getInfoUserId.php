<?php
require_once '../includes/db.php'; // The mysql database connection script
$datum = '%';
$uid = '%';
$ip = '%';
$webid = '%';
if(isset($_GET['datum']) && isset($_GET['userid'])){
	$datum = $_GET['datum'];
	$uid = $_GET['userid'];
	$query="SELECT WebsiteId,IpAddress,Hour,Summe FROM uid_webid WHERE UserId = '$uid' AND Date(DateEntered) = '$datum' GROUP BY Hour ORDER BY Hour,IpAddress ASC";
}
if(isset($_GET['datum']) && isset($_GET['userid']) && isset($_GET['ip']) && isset($_GET['webid'])){
	$datum = $_GET['datum'];
	$uid = $_GET['userid'];
	$ip = $_GET['ip'];
	$webid = $_GET['webid'];
	$query="SELECT * FROM uid_webid WHERE UserId = '$uid' AND Date(DateEntered) = '$datum' AND WebsiteId = '$webid' AND IpAddress = '$ip' GROUP BY Hour ORDER BY Hour ASC";
}

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
