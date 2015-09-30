<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['webid']) && isset($_GET['datum'])){
$webid = $_GET['webid'];
$datum = $_GET['datum'];
}
$query="SELECT UserId,DateEntered,SUM(Summe) as Sum, adtech_webseiten.name WebsiteName FROM testkap.uid_webid,absolutebusy.adtech_webseiten Where WebsiteId=$webid AND DateEntered='$datum' AND adtech_webseiten.id = uid_webid.WebsiteId GROUP BY UserId ORDER BY SUM(Summe) DESC";

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
