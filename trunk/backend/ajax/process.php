<?php 
	require_once "../model/Code.php";
	$modelCode = new Code();
	$mod = $_POST['mod'];
	$action = $_POST['action'];

	if($mod=="code"){
		$code_id = (int) $_POST['code_id'];
		$status = (int) $_POST['status'];		
		if($action=="active"){
			$modelCode->updateStatus($code_id,$status);
			echo $status== 2 ? "Bỏ kích hoạt thành công" : "Kích hoạt mã khuyến mãi thành công.";exit();
		}
	}
?>