<?php
require_once '../includes/db.php'; // The mysql database connection script
$datum = '%';
$uid = '%';
if(isset($_GET['datum']) && isset($_GET['userid'])){
	$datum = $_GET['datum'];
	$uid = $_GET['userid'];
	$query="SELECT Date(DateEntered) as DateEntered,WebsiteId,SUM(Summe) as Sum,adtech_webseiten.name WebsiteName FROM yoggi.uid_webid,absolutebusy.adtech_webseiten WHERE UserId = '$uid' AND Date(DateEntered) = '$datum' AND adtech_webseiten.id = uid_webid.WebsiteId GROUP BY WebsiteName ORDER BY Sum DESC";
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
