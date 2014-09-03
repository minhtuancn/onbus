<?php 
if(!isset($_SESSION)){
	session_start();
}
$lang = $_SESSION['lang'];
require_once "../backend/model/Nhaxe.php";
$model = new Nhaxe();
$vend = (int) $_POST['vend'];
$vstart = (int) $_POST['vstart'];
if(isset($_POST['dstart'])){
    $dstart = $model->processData($_POST['dstart']);   
    $dstart = strtotime($dstart);
}
$arrResult = $model->getListNhaxeHaveTicket($vstart,$vend,$dstart);
$str = '<option value="0">Chọn nhà xe</option>';
if(!empty($arrResult) && is_array($arrResult)){
  foreach ($arrResult as $value) {
      $str.='<option value="'.$value["nhaxe_id"].'">'.$value["nhaxe_name_".$lang].'</option>';
  }
}
echo $str;
?>