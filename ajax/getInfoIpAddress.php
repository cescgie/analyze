<?php
require_once '../includes/db.php'; // The mysql database connection script
$ip = '%';
if(isset($_GET['ip'])){
$ip = $_GET['ip'];
}
$query="SELECT IpAddress,UserId, WebsiteId, date(DateEntered) as DateEntered FROM uid_webid WHERE IpAddress='$ip' GROUP BY UserId,WebsiteId,date(DateEntered) ORDER BY DateEntered DESC";

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
