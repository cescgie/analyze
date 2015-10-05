<?php
require_once '../includes/db.php'; // The mysql database connection script
$datum = '%';
$uid = '%';
if(isset($_GET['datum']) && isset($_GET['userid'])){
	$datum = $_GET['datum'];
	$uid = $_GET['userid'];
	$query="SELECT Date(DateEntered) as DateEntered,CampaignId,SUM(Summe) as Sum from uid_webid_test WHERE UserId = '$uid' AND Date(DateEntered) = '$datum' GROUP BY CampaignId ORDER BY CampaignId ASC";
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
