<?php 
$url = "../index.php?mod=ticket&act=list";
require_once "../model/Ticket.php";
$model = new Ticket;

$ticket_id = (int) $_POST['ticket_id'];

$is_new = (int) $_POST['is_new'];

$arrSer  = $_POST['services'];
$arrTime = $_POST['time_start'];

$amount = (int) $_POST['amount'];

$car_type = (int) $_POST['car_type'];
$stop = (int) $_POST['stop'];

$tinh_id_start = (int) $_POST['tinh_id_start'];
$tinh_id_end = (int) $_POST['tinh_id_end'];
$place_id_start = (int) $_POST['place_id_start'];
$place_id_end = (int) $_POST['place_id_end'];

$date_start = strtotime($_POST['date_start']);
$date_end = $date_start;
 
$type = (int) $_POST['type'];
$nhaxe_id = (int) $_POST['nhaxe_id'];
$price = $model->processData($_POST['price']);
$duration = $model->processData($_POST['duration']);
$note = $model->processData($_POST['note']);

if($ticket_id > 0) {		
	$model->updateTicket($ticket_id,$nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$date_start,$date_end,$arrSer,$arrTime);
	header('location:'.$url);
}else{
	if($is_new == 0){
		$model->insertTicket($nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$date_start,$date_end,$arrSer,$arrTime);
		header('location:'.$url);
	}
}

?>