<?php 

$url = "../index.php?mod=place&act=list";

require_once "../model/Place.php";

$model = new Place;

$act = $_POST['act'];

if($act == "getPlaceByNhaxe"){

	$nhaxe_id = (int) $_POST['nhaxe_id'];

	$arrPlace = $model->getListPlace($nhaxe_id,'', -1, -1);

	echo '<option value="0">---chọn---</option>';	

	if(!empty($arrPlace['data'])){

		foreach($arrPlace['data'] as $place){

			?>

			<option value="<?php echo $place['place_id']; ?>"><?php echo $place['place_name_vi']; ?></option>

			<?php

		}

	}

	exit();

}else{

	$place_id = (int) $_POST['place_id'];

	$place_name_vi = $model->processData($_POST['place_name_vi']);

	$place_name_en = $model->processData($_POST['place_name_en']);



	$place_name_safe_vi = $model->changeTitle($place_name_vi);

	$place_name_safe_en = $model->changeTitle($place_name_en);



	$address_vi = $model->processData($_POST['address_vi']);

	$address_en = $model->processData($_POST['address_en']);



	$nhaxe_id = (int) $_POST['nhaxe_id'];


	if($place_id > 0) {	

		$model->updatePlace($place_id,$nhaxe_id,$place_name_vi,$place_name_en,$place_name_safe_vi,$place_name_safe_en,$address_vi,$address_en);

		header('location:'.$url);

	}else{

		$model->insertPlace($nhaxe_id,$place_name_vi,$place_name_en,$place_name_safe_vi,$place_name_safe_en,$address_vi,$address_en);

		header('location:'.$url);

	}

}



?>