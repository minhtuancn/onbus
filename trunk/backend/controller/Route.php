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
$place_id_start = (int) $_POST['place_id_start'];

$place_id_end = (int) $_POST['place_id_end'];

if($route_id > 0) {	
	$model->updateRoute($route_id,$route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$description,$place_id_start,$place_id_end);
	header('location:'.$url);
}else{
	$model->insertRoute($route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$description,$place_id_start,$place_id_end);
	header('location:'.$url);
}

?>