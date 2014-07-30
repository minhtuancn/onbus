<?php 

$url = "../index.php?mod=user&act=list";

require_once "../model/User.php";

$model = new User;

$act = $_POST['act'];

if($act == "checkPass"){

	$user_id = (int) $_POST['user_id'];
	$password = md5($_POST['password']);	
    $row = $model->getDetailUser($user_id);
    if ($password == $row['password'])
        echo "1";
    else
        echo "0";

	exit();

}else{

	$user_id = (int) $_POST['user_id'];
	$group_id = (int) $_POST['group_id'];

	$fullname = $model->processData($_POST['fullname']);

	$email = $model->processData($_POST['email']);

	if($user_id > 0) {	

		$model->updateUser($user_id,$email,$group_id,$fullname);

		header('location:'.$url);

	}else{

		$model->insertUser($email,$group_id,$fullname);

		header('location:'.$url);

	}

}

?>