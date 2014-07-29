<?php 
$url = "../index.php?mod=place&act=list";
require_once "../model/Image.php";
$model = new Image;

$nhaxe_id = (int) $_POST['nhaxe_id'];
$str_hinh_anh = $_POST['str_hinh_anh'];
$arr = explode(';',$str_hinh_anh);
if($nhaxe_id > 0) {
	foreach ($arr as $img) {
		if($img!=''){
			$model->insertImage($img,$nhaxe_id);
		}
	}
}
?>