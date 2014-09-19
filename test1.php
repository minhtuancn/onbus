<?php 
include "defined.php";
require_once 'backend/model/Home.php';
$model = new Home;
$sql = "SELECT * FROM email_rating ";

$rs= mysql_query($sql);
while($row = mysql_fetch_assoc($rs)){
	$nhaxe_id = $row['nhaxe_id'];
	$email_id = $row['email_id'];
	$rs1 = mysql_query("SELECT * FROM rating_detail WHERE nhaxe_id = $nhaxe_id AND email_id= $email_id");
	$no = mysql_num_rows($rs1);
	if($no==0){
		mysql_query("UPDATE email_rating SET status = 3 WHERE nhaxe_id= $nhaxe_id AND email_id = $email_id");
	}	
}

?>