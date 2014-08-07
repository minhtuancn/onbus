<?php 
$url = "../index.php?mod=car_type&act=list";
require_once "../model/Car.php";
$model = new Car;

$type_id = (int) $_POST['type_id'];
$type_name_vi = $model->processData($_POST['type_name_vi']);
$type_name_en = $model->processData($_POST['type_name_en']);

if($time_id > 0) {	
	$model->updateCar($type_id,$type_name_vi,$type_name_en);
	header('location:'.$url);
}else{
	$model->insertCar($type_name_vi,$type_name_en);
	header('location:'.$url);
}

?>