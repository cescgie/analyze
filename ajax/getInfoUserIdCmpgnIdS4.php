<?php
require_once '../includes/db.php'; // The mysql database connection script
$datum = '%';
$uid = '%';
$cmpgnid = '%';
if(isset($_GET['datum']) && isset($_GET['userid']) && isset($_GET['cmpgnid'])){
	$datum = $_GET['datum'];
	$uid = $_GET['userid'];
	$cmpgnid = $_GET['cmpgnid'];
	$query="SELECT Date(DateEntered) as DateEntered,CampaignId,WebsiteId,IpAddress,Hour,CityId,OsId,BrowserId,SUM(Summe) as Sum,adtech_webseiten.name WebsiteName FROM yoggi.uid_webid,absolutebusy.adtech_webseiten WHERE UserId = '$uid' AND Date(DateEntered) = '$datum' AND CampaignId = '$cmpgnid' AND adtech_webseiten.id = uid_webid.WebsiteId GROUP BY Hour,CampaignId,WebsiteId,OsId,BrowserId ORDER BY Hour ASC";
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
