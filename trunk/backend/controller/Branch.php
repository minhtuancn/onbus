<?php 
$url = "../index.php?mod=branch&act=list";
require_once "../model/Branch.php";
$model = new Branch;

$branch_id = (int) $_POST['branch_id'];
$branch_name_vi = $model->processData($_POST['branch_name_vi']);
$branch_name_en = $model->processData($_POST['branch_name_en']);

$branch_name_safe_vi = $model->changeTitle($branch_name_vi);
$branch_name_safe_en = $model->changeTitle($branch_name_en);

$address_vi = $model->processData($_POST['address_vi']);
$address_en = $model->processData($_POST['address_en']);

$phone = $model->processData($_POST['phone']);

$tinh_id = (int) $_POST['tinh_id'];
$nhaxe_id = (int) $_POST['nhaxe_id'];
$url.='&nhaxe_id='.$nhaxe_id;
if($branch_id > 0) {	
	$model->updateBranch($branch_id,$branch_name_vi,$branch_name_en,$branch_name_safe_vi,$branch_name_safe_en,$address_vi,$address_en,$phone,$tinh_id);
	header('location:'.$url);
}else{
	$model->insertBranch($nhaxe_id,$branch_name_vi,$branch_name_en,$tinh_id,$address_vi,$address_en,$phone,$branch_name_safe_vi,$branch_name_safe_en);
	header('location:'.$url);
}

?>