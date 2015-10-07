<?php
require_once '../includes/db.php'; // The mysql database connection script
$datum = '%';
$userid = '%';
if(isset($_GET['datum']) && isset($_GET['userid'])){
	$datum = $_GET['datum'];
	$uid = $_GET['userid'];
	$query="SELECT Date(DateEntered) as DateEntered,CampaignId,Summe as Sum WHERE UserId = '$uid' AND Date(DateEntered) = '$datum' GROUP BY CampaignId ORDER BY CampaignId ASC";
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
