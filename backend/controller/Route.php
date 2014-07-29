<?php 
$url = "../index.php?mod=route&act=list";
require_once "../model/Route.php";
$model = new Route;

$route_id = (int) $_POST['route_id'];
$route_name_vi = $model->processData($_POST['route_name_vi']);
$route_name_en = $model->processData($_POST['route_name_en']);

$route_name_safe_vi = $model->changeTitle($route_name_vi);
$route_name_safe_en = $model->changeTitle($route_name_en);

$description = $_POST['description'];
$tinh_id_start = (int) $_POST['tinh_id_start'];

$tinh_id_end = (int) $_POST['tinh_id_end'];
$hot = (int) $_POST['hot'];

if($route_id > 0) {	
	$model->updateRoute($route_id,$route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$hot,$description,$tinh_id_start,$tinh_id_end);
	header('location:'.$url);
}else{
	$model->insertRoute($route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$hot,$description,$tinh_id_start,$tinh_id_end);
	header('location:'.$url);
}

?>