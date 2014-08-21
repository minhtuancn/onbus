<?php 
session_start();
$ticket_id =  (int) $_POST['ticket_id_book'];
$price =  (int) $_POST['price_book'];
$amount =  (int) $_POST['amount'];
$tab =  (int) $_POST['tab'];
$time = (int) $_POST['time_book'];
$key = ($tab==1) ? "di" : "ve";

$_SESSION['bookticket'][$key]['ticket_id'] = $ticket_id;
$_SESSION['bookticket'][$key]['price'] = $price;
$_SESSION['bookticket'][$key]['time'] = $time;
$_SESSION['bookticket'][$key]['amount'] = $amount;
$_SESSION['bookticket'][$key]['total'] = $amount*$price;

?>