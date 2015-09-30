<?php
require_once '../includes/db.php'; // The mysql database connection script

//$query="SELECT name as WebsiteName FROM adtech_webseiten";
//$query="SELECT adtech_webseiten.name WebsiteName FROM absolutebusy.adtech_webseiten";
$query="SELECT WebsiteId, adtech_webseiten.name WebsiteName,count(*) FROM testkap.uid_webid_test,absolutebusy.adtech_webseiten Where adtech_webseiten.id = uid_webid_test.WebsiteId GROUP BY WebsiteId HAVING count(*) >=1 ORDER BY WebsiteId DESC";
//$query = "SELECT WebsiteId as WebsiteName FROM uid_webid group by WebsiteId having count(*) >= 1 ORDER BY WebsiteId DESC";
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
