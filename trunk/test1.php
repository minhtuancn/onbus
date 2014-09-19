<?php 
include "defined.php";
require_once 'backend/model/Home.php';
$model = new Home;
$sql = "SELECT * FROM email_rating";

$rs= mysql_query($sql);
while($row = mysql_fetch_assoc($rs)){
	echo $row['email_id']." - ".$row['email'].' - '.$row['code'].' - '.$row['status'].' - '.$row['nhaxe_id']."<br />";
}

?>