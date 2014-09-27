<?php 

$url = "../index.php?mod=nhaxe&act=list";

require_once "../model/Nhaxe.php";

$model = new Nhaxe;
$act = $_POST['act'];
if($act=='order'){		
	$arrID = explode(';',$_POST['str_order']);
	
	$i=0;
	foreach($arrID as $nhaxe_id){
		if($nhaxe_id > 0){
	    	$i++;
		    $sql = "UPDATE nhaxe SET display_order = $i WHERE nhaxe_id = $nhaxe_id";
		    mysql_query($sql) or die(mysql_error());
		}
	}
}else{

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

	$image_url = str_replace("../", "", $model->processData($_POST['image_url']));
	$thumbnail_url = str_replace("../", "", $model->processData($_POST['thumbnail_url']));



	$hot = (int) $_POST['hot'];



	if($nhaxe_id > 0) {	

		$model->updateNhaxe($nhaxe_id,$nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url,$thumbnail_url,$hot);

		header('location:'.$url);

	}else{

		$model->insertNhaxe($nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url,$thumbnail_url,$hot);

		header('location:'.$url);

	}
}


?>