<?php 
$url = "../index.php?mod=tinh&act=list";
require_once "../model/Tinh.php";
$model = new Tinh;

$tinh_id = (int) $_POST['tinh_id'];
$tinh_name_vi = $model->processData($_POST['tinh_name_vi']);
$tinh_name_en = $model->processData($_POST['tinh_name_en']);

$tinh_name_safe_vi = $model->changeTitle($tinh_name_vi);
$tinh_name_safe_en = $model->changeTitle($tinh_name_en);

$address_vi = $model->processData($_POST['address_vi']);
$address_en = $model->processData($_POST['address_en']);


if($tinh_id > 0) {	
	$model->updateTinh($tinh_id,$tinh_name_vi,$tinh_name_en,$tinh_name_safe_vi,$tinh_name_safe_en);
	header('location:'.$url);
}else{
	$model->insertTinh($tinh_name_vi,$tinh_name_en,$tinh_name_safe_vi,$tinh_name_safe_en);
	header('location:'.$url);
}

?>