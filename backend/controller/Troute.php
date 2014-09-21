<?php 
$url = "../index.php?mod=troute&act=list";
require_once "../model/Troute.php";

$model = new Troute;

$troute_id = (int) $_POST['troute_id'];

$nhaxe_id = (int) $_POST['nhaxe_id'];
$route_id = (int) $_POST['route_id'];

$min_time = $_POST['min_time'];

$max_time = $_POST['max_time'];
$price = $_POST['price'];



if($troute_id > 0) {	


	$model->updateTroute($troute_id,$nhaxe_id,$route_id,$min_time,$max_time,$price);


	header('location:'.$url."&nhaxe_id=".$nhaxe_id);



}else{



	$model->insertTroute($nhaxe_id,$route_id,$min_time,$max_time,$price);



	header('location:'.$url."&nhaxe_id=".$nhaxe_id);



}







?>