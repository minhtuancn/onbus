<?php
//date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
require_once 'ajax/seo.php';
$lang_arr=array("vi","en");
if (isset($_SESSION['onbustigia']) == true){ 

 if (in_array($_SESSION['onbustigia'],array('1,2')) == true) $tigia = $_SESSION['onbustigia'];

}else { $tigia= 1;
$_SESSION['onbustigia'] = 1; 
}

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
$str = str_replace("{trangchu}" , trangchu, $str);
$str = str_replace("{vecuaban}" , vecuaban, $str);
$str = str_replace("{tintuc}" , tintuc , $str);
$str = str_replace("{thongtinnhaxe}" , thongtinnhaxe , $str); 
$str = str_replace("{datvequaonbus}" , datvequaonbus, $str);
$str = str_replace("{timvexe}" , timvexe, $str);
$str = str_replace("{ve1chieu}" , ve1chieu , $str);
$str = str_replace("{vekhuhoi}" , vekhuhoi , $str);
$str = str_replace("{diemkhoihanh}" , diemkhoihanh , $str);
$str = str_replace("{noiden}" , noiden , $str);
$str = str_replace("{ngaydi}" , ngaydi , $str);
$str = str_replace("{ngayve}" , ngayve , $str);
$str = str_replace("{nhaxe}" , nhaxe , $str);
$str = str_replace("{chonnhaxe}" , chonnhaxe , $str);
$str = str_replace("{thongtinmoinhat}" , thongtinmoinhat , $str);
$str = str_replace("{nhanthongtin}" , nhanthongtin , $str);
$str = str_replace("{nhapemail}" , nhapemail , $str);
$str = str_replace("{nhanemail}" , nhanemail , $str);
$str = str_replace("{timkiem}" , timkiem , $str); 
$str = str_replace("{ketqua}" , ketqua , $str); 
$str = str_replace("{thanhtoan}" , thanhtoan , $str);
$str = str_replace("{nhaxeuytin}" , nhaxeuytin , $str); 
$str = str_replace("{topdiemden}" , topdiemden , $str); 
$str = str_replace("{nhaxehangdau}" , nhaxehangdau , $str);
$str = str_replace("{vechungtoi}" , vechungtoi , $str); 
$str = str_replace("{lienhe}" , lienhe , $str);
$str = str_replace("{hoidap}" , hoidap , $str);
$str = str_replace("{tongtien}" , tongtien , $str);
$str = str_replace("{dieukhoansudung}" , dieukhoansudung , $str);
$str = str_replace("{phanhoi}" , phanhoi , $str);
$str = str_replace("{chinhsachriengtu}" , chinhsachriengtu , $str);
$str = str_replace("{vechieude}" , vechieude , $str);
$str = str_replace("{chieudai}" , chieudai , $str);
$str = str_replace("{thoigian}" , thoigian , $str);
$str = str_replace("{sapxep}" , sapxep , $str);
$str = str_replace("{xemlotrinh}" , xemlotrinh , $str);
$str = str_replace("{tienich}" , tienich , $str);
$str = str_replace("{nuocuong}" , nuocuong , $str);
$str = str_replace("{cachangxe}" , cachangxe , $str);
$str = str_replace("{tuyenduongphobien}" , tuyenduongphobien , $str);
$str = str_replace("{soluongve}" , soluongve , $str);
$str = str_replace("{xemthongtin}" , xemthongtin , $str);
$str = str_replace("{chitiet}" , chitiet , $str);
$str = str_replace("{chonnoidi}" , chonnoidi , $str);
$str = str_replace("{chonnoiden}" , chonnoiden , $str);
$str = str_replace("{chiasehanhtrinhcuaban}" , chiasehanhtrinhcuaban , $str);
$str = str_replace("{tatcanhaxe}" , tatcanhaxe , $str);
$str = str_replace("{chinhsachthanhtoan}" , chinhsachthanhtoan , $str);
$str = str_replace("{phuongthucthanhtoan}" , phuongthucthanhtoan , $str);
$str = str_replace("{dieukhoansudung}" , dieukhoansudung , $str); 
$str = str_replace("{tongtien}" , tongtien , $str);
$str = str_replace("{vecuabans}" , vecuabans , $str);
$str = str_replace("{tongsove}" , tongsove , $str);
$str = str_replace("{tienvetongcong}" , tienvetongcong , $str);
$str = str_replace("{giamgia}" , giamgia , $str);
$str = str_replace("{quydinhvexe}" , quydinhvexe , $str);
$str = str_replace("{dieukhoanthanhtoan}" , dieukhoanthanhtoan , $str);
$str = str_replace("{tienve}" , tienve , $str);
$str = str_replace("{thongtinhanhkhach}" , thongtinhanhkhach , $str);
$str = str_replace("{batbuocnhap}" , tongtien , $str);
$str = str_replace("{hoten}" , vecuabans , $str);
$str = str_replace("{dienthoai}" , tongsove , $str);
$str = str_replace("{diachi}" , tienvetongcong , $str);
$str = str_replace("{nhapmakhuyenmai}" , giamgia , $str);
$str = str_replace("{chonphuongthuc}" , quydinhvexe , $str);  
$str = str_replace("{whenchoosingthis}" , tienve , $str);
$str = str_replace("{thequocte}" , thongtinhanhkhach , $str); 
$str = str_replace("{thenoidia}" , tongsove , $str);
$str = str_replace("{thanhtoankhinhanve}" , tienvetongcong , $str);
$str = str_replace("{youpaycash}" , giamgia , $str);
$str = str_replace("{whichevermethod}" , quydinhvexe , $str);  
$str = str_replace("{youmustclick}" , tienve , $str);

echo $str;

?>