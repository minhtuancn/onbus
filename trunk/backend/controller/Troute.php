<?php 



$url = "../index.php?mod=troute&act=list";



require_once "../model/Troute.php";



$model = new Route;

$troute_id = (int) $_POST['troute_id'];

$nhaxe_id = (int) $_POST['nhaxe_id'];
$route_id = (int) $_POST['route_id'];

$min_time = $_POST['min_time'];

$max_time = $_POST['max_time'];

$distance = $_POST['distance'];



$duration = $_POST['duration'];



$tinh_id_start = (int) $_POST['tinh_id_start'];


$tinh_id_end = (int) $_POST['tinh_id_end'];



$hot = (int) $_POST['hot'];


if($troute_id > 0) {	


	$model->updateTroute($troute_id,$route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$abbreviation,$hot,$description,$tinh_id_start,$tinh_id_end,$distance,$duration);


	header('location:'.$url);



}else{



	$model->insertTroute($route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$abbreviation,$hot,$description,$tinh_id_start,$tinh_id_end,$distance,$duration);



	header('location:'.$url);



}







?>