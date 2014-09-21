<?php 
include "defined.php";
require_once 'backend/model/Home.php';
$model = new Home;
function getAbbreviationRoute($tinh_id_start,$tinh_id_end){
    $sql = "SELECT abbreviation FROM route WHERE tinh_id_start = $tinh_id_start AND tinh_id_end = $tinh_id_end"; 
    $rs = mysql_query($sql);
    $row = mysql_fetch_assoc($rs);
    return $row['abbreviation']; 
}
$sql = "SELECT * FROM ticket WHERE status = 1";

$rs= mysql_query($sql);
while($row = mysql_fetch_assoc($rs)){
	$ticket_id = $row['ticket_id'];
	$date_start= $row['date_start'];
	$month = date('m',$date_start);
    $day = date('d',$date_start);
    $tmp = str_pad($ticket_id, 3, "0", STR_PAD_LEFT);
    $tinh_id_start = $row['tinh_id_start'];
    $tinh_id_end = $row['tinh_id_end'];
    $abbreviation = getAbbreviationRoute($tinh_id_start,$tinh_id_end);
    $code = $abbreviation.'-'.$day.$month.$tmp;
    echo $ticket_id."-".date('d-m-Y',$date_start).'-'.$code."<br />";
    mysql_query("UPDATE ticket SET code = '$code' WHERE ticket_id = $ticket_id");
}

?>