<?php 
$url = "../index.php?mod=place&act=list";
require_once "../model/place.php";
$model = new Place;

$place_id = (int) $_POST['place_id'];
$place_name_vi = $model->processData($_POST['place_name_vi']);
$place_name_en = $model->processData($_POST['place_name_en']);

$place_name_safe_vi = $model->changeTitle($place_name_vi);
$place_name_safe_en = $model->changeTitle($place_name_en);

if($place_id > 0) {
	
}else{
	$model->insertPlace($place_name_vi,$place_name_en,$place_name_safe_vi,$place_name_safe_en);
	header('location:'.$url);
}


?>