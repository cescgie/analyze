<?php
require_once '../includes/db.php'; // The mysql database connection script
$datum = '%';
$uid = '%';
$webid = '%';
if(isset($_GET['datum']) && isset($_GET['userid']) && isset($_GET['webid'])){
	$datum = $_GET['datum'];
	$uid = $_GET['userid'];
	$webid = $_GET['webid'];
	$query="SELECT Date(DateEntered) as DateEntered,WebsiteId,IpAddress,Hour,CityId,OsId,BrowserId,SUM(Summe) as Sum,adtech_webseiten.name WebsiteName FROM yoggi.uid_webid_test,absolutebusy.adtech_webseiten WHERE UserId = '$uid' AND Date(DateEntered) = '$datum' AND WebsiteId = '$webid' AND adtech_webseiten.id = uid_webid_test.WebsiteId GROUP BY Hour,WebsiteId,OsId,BrowserId ORDER BY Hour ASC";
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
