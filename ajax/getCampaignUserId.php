<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['cmpgnid'])){
$cmpgnid = $_GET['cmpgnid'];
}
$query="SELECT UserId,CampaignId,SUM(Summe) as Sum FROM uid_webid Where CampaignId=$cmpgnid GROUP BY UserId,CampaignId ORDER BY Sum DESC";

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
