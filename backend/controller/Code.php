<?php 

$url = "../index.php?mod=promotion_code&act=list";

require_once "../model/Code.php";

$model = new Code;


$code_id = (int) $_POST['code_id'];

$code = $model->processData($_POST['code']);

$type = (int) $_POST['type'];

$amount = (int) $_POST['amount'];

$value = $_POST['code_value'];

if($code_id > 0) {	

	$model->updateCode($code_id,$code,$amount,$type,$value);

	header('location:'.$url);

}else{

	$model->insertCode($code,$amount, $type,$value,$status);

	header('location:'.$url);

}
?>