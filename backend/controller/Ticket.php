<?php 
$url = "../index.php?mod=route&act=list";
require_once "../model/Ticket.php";
$model = new Ticket;

$arrSer  = $_POST['services'];
$arrTime = $_POST['time_start'];

$amount = (int) $_POST['amount'];
$car_type = (int) $_POST['car_type'];
$stop = (int) $_POST['stop'];

$tinh_id_start = (int) $_POST['tinh_id_start'];
$tinh_id_end = (int) $_POST['tinh_id_end'];
$place_id_start = (int) $_POST['place_id_start'];
$place_id_end = (int) $_POST['place_id_end'];

$date_start = trim($_POST['date_start'])!='' ? strtotime($_POST['date_start']) : 0;
$date_end = trim($_POST['date_end'])!='' ? strtotime($_POST['date_end']) : 0;
 
$type = (int) $_POST['type'];
$nhaxe_id = (int) $_POST['nhaxe_id'];
$price = $model->processData($_POST['price']);
$duration = $model->processData($_POST['duration']);

if($route_id > 0) {	
	$model->updateRoute($route_id,$nhaxe_id,$route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$description,$place_id_start,$place_id_end);
	header('location:'.$url);
}else{
	$model->insertRoute($nhaxe_id,$route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$description,$place_id_start,$place_id_end);
	header('location:'.$url);
}

?>