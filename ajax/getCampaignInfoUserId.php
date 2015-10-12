<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['userid']) && isset($_GET['cmpgnid'])){
$userid = $_GET['userid'];
$cmpgnid = $_GET['cmpgnid'];
}
$query="SELECT UserId, DateEntered, CampaignId, CityId, OsId, BrowserId, SUM(Summe) as Sum FROM `uid_webid` WHERE CampaignId = $cmpgnid AND UserId = '$userid' group by DateEntered,UserId,OsId, BrowserId HAVING count(*) >=1 ORDER BY DateEntered DESC";

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
