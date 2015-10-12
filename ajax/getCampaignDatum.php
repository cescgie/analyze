<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['cmpgnid'])){
$cmpgnid = $_GET['cmpgnid'];
}
<<<<<<< HEAD
$query="SELECT CampaignId,DateEntered,SUM(Summe) as Sum FROM tab_campaign Where CampaignId='$cmpgnid' GROUP BY DateEntered ORDER BY DateEntered DESC";
=======
$query="SELECT CampaignId,DateEntered,Summe as Sum FROM tab_campaign Where CampaignId='$cmpgnid' GROUP BY DateEntered ORDER BY DateEntered DESC";
>>>>>>> origin/master

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
