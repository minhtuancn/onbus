<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
require_once 'ajax/seo.php';
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

$onbus=ob_get_clean();

$onbus = str_replace("{trangchu}" , trangchu, $onbus);
$onbus = str_replace("{vecuaban}" , vecuaban, $onbus);
$onbus = str_replace("{tintuc}" , tintuc , $onbus);
$onbus = str_replace("{thongtinnhaxe}" , thongtinnhaxe , $onbus); 
$onbus = str_replace("{datvequaonbus}" , datvequaonbus, $onbus);
$onbus = str_replace("{timvexe}" , timvexe, $onbus);
$onbus = str_replace("{ve1chieu}" , ve1chieu , $onbus);
$onbus = str_replace("{vekhuhoi}" , vekhuhoi , $onbus);
$onbus = str_replace("{diemkhoihanh}" , diemkhoihanh , $onbus);
$onbus = str_replace("{noiden}" , noiden , $onbus);
$onbus = str_replace("{ngaydi}" , ngaydi , $onbus);
$onbus = str_replace("{ngayve}" , ngayve , $onbus);
$onbus = str_replace("{nhaxe}" , nhaxe , $onbus);
$onbus = str_replace("{chonnhaxe}" , chonnhaxe , $onbus);
$onbus = str_replace("{thongtinmoinhat}" , thongtinmoinhat , $onbus);
$onbus = str_replace("{nhanthongtin}" , nhanthongtin , $onbus);
$onbus = str_replace("{nhapemail}" , nhapemail , $onbus);
$onbus = str_replace("{nhanemail}" , nhanemail , $onbus);
$onbus = str_replace("{timkiem}" , timkiem , $onbus); 
$onbus = str_replace("{ketqua}" , ketqua , $onbus); 
$onbus = str_replace("{thanhtoan}" , thanhtoan , $onbus);
$onbus = str_replace("{nhaxeuytin}" , nhaxeuytin , $onbus); 
$onbus = str_replace("{topdiemden}" , topdiemden , $onbus); 
$onbus = str_replace("{nhaxehangdau}" , nhaxehangdau , $onbus);
$onbus = str_replace("{vechungtoi}" , vechungtoi , $onbus); 
$onbus = str_replace("{lienhe}" , lienhe , $onbus);
$onbus = str_replace("{hoidap}" , hoidap , $onbus);
$onbus = str_replace("{tongtien}" , tongtien , $onbus);
$onbus = str_replace("{dieukhoansudung}" , dieukhoansudung , $onbus);
$onbus = str_replace("{phanhoi}" , phanhoi , $onbus);
$onbus = str_replace("{chinhsachriengtu}" , chinhsachriengtu , $onbus);
$onbus = str_replace("{vechieude}" , vechieude , $onbus);
$onbus = str_replace("{chieudai}" , chieudai , $onbus);
$onbus = str_replace("{thoigian}" , thoigian , $onbus);
$onbus = str_replace("{sapxep}" , sapxep , $onbus);
$onbus = str_replace("{xemlotrinh}" , xemlotrinh , $onbus);
$onbus = str_replace("{tienich}" , tienich , $onbus);
$onbus = str_replace("{nuocuong}" , nuocuong , $onbus);
$onbus = str_replace("{cachangxe}" , cachangxe , $onbus);
$onbus = str_replace("{tuyenduongphobien}" , tuyenduongphobien , $onbus);
$onbus = str_replace("{soluongve}" , soluongve , $onbus);
$onbus = str_replace("{xemthongtin}" , xemthongtin , $onbus);
$onbus = str_replace("{chitiet}" , chitiet , $onbus);
$onbus = str_replace("{chonnoidi}" , chonnoidi , $onbus);
$onbus = str_replace("{chonnoiden}" , chonnoiden , $onbus);
$onbus = str_replace("{chiasehanhtrinhcuaban}" , chiasehanhtrinhcuaban , $onbus);
$onbus = str_replace("{tatcanhaxe}" , tatcanhaxe , $onbus);
$onbus = str_replace("{chinhsachthanhtoan}" , chinhsachthanhtoan , $onbus);
$onbus = str_replace("{phuongthucthanhtoan}" , phuongthucthanhtoan , $onbus);
$onbus = str_replace("{dieukhoansudung}" , dieukhoansudung , $onbus); 
$onbus = str_replace("{tongtien}" , tongtien , $onbus);
$onbus = str_replace("{vecuabans}" , vecuabans , $onbus);
$onbus = str_replace("{tongsove}" , tongsove , $onbus);
$onbus = str_replace("{tienvetongcong}" , tienvetongcong , $onbus);
$onbus = str_replace("{giamgia}" , giamgia , $onbus);
$onbus = str_replace("{quydinhvexe}" , quydinhvexe , $onbus);
$onbus = str_replace("{dieukhoanthanhtoan}" , dieukhoanthanhtoan , $onbus);
$onbus = str_replace("{tienve}" , tienve , $onbus);
$onbus = str_replace("{thongtinhanhkhach}" , thongtinhanhkhach , $onbus);
$onbus = str_replace("{batbuocnhap}" , batbuocnhap , $onbus);
$onbus = str_replace("{hoten}" , hoten , $onbus);
$onbus = str_replace("{dienthoai}" , dienthoai , $onbus);
$onbus = str_replace("{diachi}" , diachi , $onbus);
$onbus = str_replace("{nhapmakhuyenmai}" , nhapmakhuyenmai , $onbus);
$onbus = str_replace("{chonphuongthuc}" , chonphuongthuc , $onbus);  
$onbus = str_replace("{whenchoosingthis}" , whenchoosingthis , $onbus);
$onbus = str_replace("{thequocte}" , thequocte , $onbus); 
$onbus = str_replace("{thenoidia}" , thenoidia , $onbus);
$onbus = str_replace("{thanhtoankhinhanve}" , thanhtoankhinhanve , $onbus);
$onbus = str_replace("{youpaycash}" , youpaycash , $onbus);
$onbus = str_replace("{whichevermethod}" , whichevermethod , $onbus);  
$onbus = str_replace("{youmustclick}" , youmustclick , $onbus);
$onbus = str_replace("{chonsoluongve}" , chonsoluongve , $onbus);
$onbus = str_replace("{datve}" , datve , $onbus);  
$onbus = str_replace("{chonvechieuconlai}" , chonvechieuconlai , $onbus);
$onbus = str_replace("{chongiokhoihanh}" , chongiokhoihanh , $onbus);
$onbus = str_replace("{errortime}" , errortime , $onbus);
$onbus = str_replace("{tong}" , tong , $onbus);
$onbus = str_replace("{dongythanhtoan}" , dongythanhtoan , $onbus);
$onbus = str_replace("{chatluongxe}" , chatluongxe , $onbus);
$onbus = str_replace("{thaido}" , thaido , $onbus);
$onbus = str_replace("{dunggio}" , dunggio , $onbus);
$onbus = str_replace("{antoan}" , antoan , $onbus);
$onbus = str_replace("{tinhtrangve}" , tinhtrangve , $onbus);
$onbus = str_replace("{tieptuc}" , tieptuc , $onbus);
$onbus = str_replace("{mave}" , mave , $onbus);
$onbus = str_replace("{kotimthaydulieu}" , kotimthaydulieu , $onbus);
$onbus = str_replace("{noidung}" , noidung , $onbus);
$onbus = str_replace("{gui}" , gui , $onbus);
$onbus = str_replace("{lienheonbus}" , lienheonbus , $onbus);
$onbus = str_replace("{timkiemnhaxe}" , timkiemnhaxe , $onbus);
$onbus = str_replace("{cauhoithuonggap}" , cauhoithuonggap , $onbus);
$onbus = str_replace("{thamkhao}" , thamkhao , $onbus);
$onbus = str_replace("{tintucganday}" , tintucganday , $onbus);
$onbus = str_replace("{khachhanghoi}" , khachhanghoi , $onbus);
$onbus = str_replace("{tencongty}" , tencongty , $onbus);
$onbus = str_replace("{diachicongty}" , diachicongty , $onbus);

$onbus = str_replace("{danhanxet}" , danhanxet , $onbus);
$onbus = str_replace("{tuhanhkhach}" , tuhanhkhach , $onbus);
$onbus = str_replace("{danhgia}" , danhgia , $onbus);
$onbus = str_replace("{hinhanh}" , hinhanh , $onbus);
$onbus = str_replace("{cactuyenphobien}" , cactuyenphobien , $onbus);
$onbus = str_replace("{tongketdanhgia}" , tongketdanhgia , $onbus);
$onbus = str_replace("{danhgiahuuich}" , danhgiahuuich , $onbus);
$onbus = str_replace("{tuyenduong}" , tuyenduong , $onbus);
$onbus = str_replace("{chuyendau}" , chuyendau , $onbus);
$onbus = str_replace("{chuyencuoi}" , chuyencuoi , $onbus);
$onbus = str_replace("{bando}" , bando , $onbus);
$onbus = str_replace("{giave}" , giave , $onbus);
$onbus = str_replace("{tongtienthanhtoan}" , tongtienthanhtoan , $onbus);
$onbus = str_replace("{kiemtrave}" , kiemtrave , $onbus);
$onbus = str_replace("{xuatsac}" , xuatsac , $onbus);
$onbus = str_replace("{rattot}" , rattot , $onbus);
$onbus = str_replace("{trungbinh}" , trungbinh , $onbus);
$onbus = str_replace("{te}" , te , $onbus);
$onbus = str_replace("{ratte}" , ratte , $onbus);
$onbus = str_replace("{xemtiep}" , xemtiep , $onbus);
echo $onbus;
?>