<?php
session_start();
//require_once 'blocks/seo.php';
$lang_arr=array("vi","en");

if (isset($lang) == true){

  if (in_array($lang,$lang_arr)==true) $lang = $lang;  

}
elseif (isset($_SESSION['lang']) == true){ 

 if (in_array($_SESSION['lang'],$lang_arr) == true) $lang = $_SESSION['lang'];

}else $lang= 'en';

$_SESSION['lang'] = $lang;

setcookie('lang' , $lang , time()+60*60*24*30);

require_once "lang/lang_$lang.php"; 

ob_start(); 

include "home.php"; 

$str=ob_get_clean();

$str = str_replace("{xemtatca}" , xemtatca, $str);

$str = str_replace("{thuvienanh}" , thuvienanh, $str);

$str = str_replace("{trangchu}" , trangchu , $str);

$str = str_replace("{lienhe}" , lienhe , $str); 

$str = str_replace("{gioithieu}" , gioithieu, $str);

$str = str_replace("{dichvu}" , dichvu, $str);

$str = str_replace("{datphong}" , datphong , $str);

$str = str_replace("{dienthoai}" , dienthoai , $str);

$str = str_replace("{ngaydi}" , ngaydi , $str);

$str = str_replace("{ngayden}" , ngayden , $str);



$str = str_replace("{gui}" , gui , $str);

$str = str_replace("{lamlai}" , lamlai , $str);

$str = str_replace("{nguoilon}" , nguoilon , $str);

$str = str_replace("{treem}" , treem , $str);

$str = str_replace("{gioithieuvethepalmyhotel}" , gioithieuvethepalmyhotel , $str);


$str = str_replace("{xembando}" , xembando , $str);

$str = str_replace("{dc}" , dc , $str);



$str = str_replace("{letter}" , letter , $str); 

$str = str_replace("{tuyendung}" , tuyendung , $str); 

$str = str_replace("{diachi}" , diachi , $str);

$str = str_replace("{footer}" , footer , $str);  

$str = str_replace("{gioithieucty}" , gioithieucty , $str);

$str = str_replace("{chitiet}" , chitiet , $str);


$str = str_replace("{tintuctonghop}" , tintuctonghop , $str); 

$str = str_replace("{tinchuyennganh}" , tinchuyennganh , $str);



$str = str_replace("{quatrinhsanxuat}" , quatrinhsanxuat , $str);

$str = str_replace("{thongsonhom}" , thongsonhom , $str);

$str = str_replace("{noidungsanxuat}" , noidungsanxuat , $str);

  

  $str = str_replace("{thuvienanh}" , thuvienanh , $str);

  $str = str_replace("{sanphamchinh}" , sanphamchinh , $str);

  $str = str_replace("{tinlienquan}" , tinlienquan , $str);

  $str = str_replace("{trove}" , trove , $str);

  

  $str = str_replace("{xembando}" , xembando , $str);

  $str = str_replace("{tencty}" , tencty , $str);

  $str = str_replace("{diachilienhe}" , diachilienhe , $str);

  $str = str_replace("{email}" , email , $str);

  $str = str_replace("{noidung}" , noidung , $str);

  $str = str_replace("{gui}" , gui , $str);

  $str = str_replace("{hoten}" , hoten , $str);

  echo $str;

?>