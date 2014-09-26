<?php 
$url = "../index.php?mod=order&act=list";
require_once "../model/Order.php";
$model = new Order;

$order_id = (int) $_POST['order_id'];
$status = (int) $_POST['status'];
$is_pay = (int) $_POST['is_pay'];

if($order_id > 0) {	
	$model->updateOrder($order_id,$status,$is_pay);
	header('location:'.$url."&status=".$status."&is_pay=".$is_pay);
}

?>