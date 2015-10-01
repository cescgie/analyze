<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['userid']) && isset($_GET['cmpgnid'])){
$userid = $_GET['userid'];
$cmpgnid = $_GET['cmpgnid'];
}
$query="SELECT UserId, CampaignId, StateId, OsId, BrowserId, SUM(Summe) as Sum FROM `uid_webid_test` WHERE CampaignId = $cmpgnid AND UserId = '$userid' group by StateId, OsId, BrowserId HAVING count(*) >=1 ORDER BY CampaignId ASC";

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
