<?php 
$url = "../index.php?mod=tinh&act=list";
require_once "../model/Tinh.php";
$model = new Tinh;
$act = $_POST['act'];
if($act=='getTinhByMien'){
	$mien_id = (int) $_POST['mien_id'];
	$arrListTinh = $model->getListTinh($mien_id,'',-1,-1,-1);
	echo '<option value="0">---chọn---</option>';		
	if(!empty($arrListTinh['data'])){
		foreach($arrListTinh['data'] as $tinh){
			?>
			<option value="<?php echo $tinh['tinh_id']; ?>"><?php echo $tinh['tinh_name_vi']; ?></option>
			<?php
		}
	}
	exit();
}else{
	$tinh_id = (int) $_POST['tinh_id'];
	$tinh_name_vi = $model->processData($_POST['tinh_name_vi']);
	$tinh_name_en = $model->processData($_POST['tinh_name_en']);

	$tinh_name_safe_vi = $model->changeTitle($tinh_name_vi);
	$tinh_name_safe_en = $model->changeTitle($tinh_name_en);

	$price_between = $model->processData($_POST['price_between']);
	$image_url = $model->processData($_POST['image_url']);

	$hot = (int) $_POST['hot'];

	$mien_id = (int) $_POST['mien_id'];


	if($tinh_id > 0) {	
		$model->updateTinh($tinh_id,$tinh_name_vi,$tinh_name_en,$tinh_name_safe_vi,$tinh_name_safe_en,$mien_id,$hot,$image_url,$price_between);
		header('location:'.$url);
	}else{
		$model->insertTinh($tinh_name_vi,$tinh_name_en,$tinh_name_safe_vi,$tinh_name_safe_en,$mien_id,$hot,$image_url,$price_between);
		header('location:'.$url);
	}

}
?>