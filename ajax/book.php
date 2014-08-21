<?php 
session_start();
$ticket_id =  $_POST['ticket_id_book'];
$price =  $_POST['price_book'];
$amount =  $_POST['amount'];
$tab =  $_POST['tab'];
$time = $_POST['time_book'];
$key = ($tab==1) ? "di" : "ve";

$_SESSION['bookticket'][$key]['ticket_id'] = $ticket_id;
$_SESSION['bookticket'][$key]['price'] = $price;
$_SESSION['bookticket'][$key]['time'] = $time;
$_SESSION['bookticket'][$key]['amount'] = $amount;
$_SESSION['bookticket'][$key]['total'] = $amount*$price;

var_dump("<pre>",$_SESSION['bookticket']);
?>