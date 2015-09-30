<?php
require_once '../includes/db.php'; // The mysql database connection script
$ip = '%';
if(isset($_GET['ip'])){
$ip = $_GET['ip'];
}
$query="SELECT IpAddress,UserId, WebsiteId, date(DateEntered) as DateEntered, adtech_webseiten.name WebsiteName FROM testkap.uid_webid_test,absolutebusy.adtech_webseiten  WHERE IpAddress='$ip' AND adtech_webseiten.id = uid_webid_test.WebsiteId GROUP BY UserId,WebsiteId,date(DateEntered) ORDER BY DateEntered DESC";

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
