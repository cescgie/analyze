<?php
require_once '../includes/db.php'; // The mysql database connection script


$query="SELECT CampaignId,count(*) as Summe FROM `uid_webid_test` GROUP BY CampaignId HAVING count(*) >=1 ORDER BY CampaignId ASC";

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
