<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['webid'])){
$webid = $_GET['webid'];
}
$query="SELECT WebsiteId,DateEntered,SUM(Summe) as Sum FROM uid_webid_test Where WebsiteId=$webid GROUP BY DateEntered ORDER BY DateEntered DESC";

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
