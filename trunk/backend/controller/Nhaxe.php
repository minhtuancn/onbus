<?php 
$url = "../index.php?mod=nhaxe&act=list";
require_once "../model/Nhaxe.php";
$model = new Nhaxe;

$nhaxe_id = (int) $_POST['nhaxe_id'];
$nhaxe_name_vi = $model->processData($_POST['nhaxe_name_vi']);
$nhaxe_name_en = $model->processData($_POST['nhaxe_name_en']);

$nhaxe_name_safe_vi = $model->changeTitle($nhaxe_name_vi);
$nhaxe_name_safe_en = $model->changeTitle($nhaxe_name_en);

$address_vi = $model->processData($_POST['address_vi']);
$address_en = $model->processData($_POST['address_en']);

$description_vi = $model->processData($_POST['description_vi']);
$description_en = $model->processData($_POST['description_en']);

$phone = $model->processData($_POST['phone']);
$phone = $model->processData($_POST['image_url']);

if($nhaxe_id > 0) {	
	$model->updateNhaxe($nhaxe_id,$nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url);
	header('location:'.$url);
}else{
	$model->insertNhaxe($nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url);
	header('location:'.$url);
}

?>