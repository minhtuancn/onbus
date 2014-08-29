<?php
require_once 'backend/model/Ticket.php';
$model = new Ticket;
function checkCat($uri) {    
    $p_detail = '#details/[a-z0-9\-]+\-\d+.html#';
    $p_tag = '#/tag/[a-z\-]+.html#';
	$p_contact = '#/lien-he+.html#';
    $p_payment = '#/[a-z\-]/payment+.html#';
    $p_about = '#/gioi-thieu+.html#'; 
    $p_thuvienanh = '#/thu-vien-anh+.html#'; 
	$p_tintuc = '#/tin-tuc+.html#';
	$p_tintuc_pt = '#/tin-tuc-\d+.html#';
	$p_giaithuong = '#/giai-thuong+.html#'; 
    $p_accommodation = '#/accommodation+.html#'; 
    $p_dinning = '#/dinning+.html#';
    $p_service =  '#/services+.html#';
    $p_guide =  '#/hanoi-travel-guide+.html#';
    $p_promotion =  '#/promotion+.html#';
    $p_tour =  '#/tour-and-travel+.html#';

    //ve-xe-khach-di-tu-ho-chi-minh-den-ba-ria-vung-tau-ngay-29-08-2014-den-29-09-2014-2-1t3l19.html
    $p_search = "#/ve-xe-khach-[a-z\-]+.html#";

    $mod = "home";
    $page_id = "";    
    if (strpos( $uri,'ve-xe-khach')>-1) {        
        $mod = "search";
    } 
    if (strpos( $uri,'payment')>-1) {        
        $mod = "payment";
    }        
	if (preg_match($p_contact, $uri)) {
        $mod = "contact";
    } 
    if (preg_match($p_about, $uri)) {
        $mod = "about";
    } 
	
    if (preg_match($p_thuvienanh, $uri)) {
        $mod = "thuvienanh";
    }    
    
    if (preg_match($p_detail, $uri)) {
        $mod = "detail";
    }
	if (preg_match($p_tintuc, $uri) || preg_match($p_tintuc_pt, $uri)) {
        $mod = "news";
    } 
    if (preg_match($p_accommodation, $uri)) {
        $mod = "page";
        $page_id = 2;
    } 
    if (preg_match($p_dinning, $uri)) {
        $mod = "page";
        $page_id = 4;
    } 
    if (preg_match($p_service, $uri)) {
        $mod = "page";
        $page_id = 5;
    } 
    if (preg_match($p_guide, $uri)) {
        $mod = "page";
        $page_id = 6;
    } 
    if (preg_match($p_promotion, $uri)) {
        $mod = "promotion";        
    } 
    if (preg_match($p_tour, $uri)) {
        $mod = "tour";        
    } 

    return array("mod" =>$mod,'page_id' => $page_id);
}

$uri = str_replace("/onbus", "", $_SERVER['REQUEST_URI']);
$tmpURI = explode("/",$uri);
if(in_array($tmpURI[1], array("vi","en"))){
    $lang = $tmpURI[1];
    $_SESSION['lang'] = $lang;
    $arrRS = checkCat($tmpURI[2]);        
}else{
    $error404 = true;
}   
$mod = $arrRS['mod']==null ? "home" : $arrRS['mod']; 

$page_id = $arrRS['page_id'];
$uri = str_replace(".html", "", $uri);
$tmp_uri = explode("/", $uri);
switch ($mod) {    
    
    case "news":  
		$tieude_id = $tmp_uri[1];
        $arr = explode("-", $tieude_id);   
		$page = (int) end($arr);
		$page = ($page==0) ? 1 : $page;
		$title = "Tin tức";
		$metaD = "Tin tức";
		$metaK = "Tin tức";        
        break;   
    
    case "contact":
            $title = "Liên hệ";
            $metaD = "Liên hệ";
            $metaK = "Liên hệ";

        break;
		 case "giaithuong":
            $title = "Giải thưởng";
            $metaD = "Giải thưởng";
            $metaK = "Giải thưởng";

        break;
    case "thuvienanh":
            $title = "Thư viện ảnh";
            $metaD = "Thư viện ảnh";
            $metaK = "Thư viện ảnh";

        break;  
    case "about":
            $title = "Giới thiệu";
            $metaD = "Giới thiệu";
            $metaK = "Giới thiệu";
            $rs_article = $modelHome->getDetailPage(1);         
            $arrDetailPage = mysql_fetch_assoc($rs_article); 
        break;   
    case "detail":
        $tieude_id = $tmp_uri[2];
        $arr = explode("-", $tieude_id);
        $article_id = (int) end($arr);
        $rs_article = $modelHome->getDetailPage($article_id);         
        $arrDetailPage = mysql_fetch_assoc($rs_article); 
        $title = $arrDetailPage["title"];
        $metaD = $arrDetailPage["description"];
        $metaK = $arrDetailPage["title"];
        break;
    case "page":                
        $rs_article = $modelHome->getDetailPage($page_id);         
        $arrDetailPage = mysql_fetch_assoc($rs_article); 
        $title = $arrDetailPage["title"];
        $metaD = $arrDetailPage["meta_d"];
        $metaK = $arrDetailPage["meta_k"];
        break;
    case "search":     
        $vstart = $vend = $dstart = $dend = -1;
        $car = "";
        $str1 = strstr($tmp_uri[2], 'ngay');
        $str1 = str_replace("ngay-", "", $str1);
        $tmp_uri = explode("-den-",$str1);        
        
        if(isset($tmp_uri[1])){
            $date_start = $tmp_uri[0];
            $str2 = $tmp_uri[1];
            $tmp_uri = explode("-",$str2);
            $str3 = end($tmp_uri);
            $date_end = str_replace("-".$str3,"", $str2);   
            $tmp_uri = explode("_", $str3);
            $type = (int) $tmp_uri[0];
            //1t3l19
            $tmp = explode("l",$tmp_uri[1]);
            if(isset($tmp[1])){
                $car = $tmp[1];            
            }
            $tmp = explode("t",$tmp[0]);
            $vstart = $tmp[0];
            $vend = $tmp[1];           
        }else{ // ve 1 chieu
            //30-08-2014-1_1t9
            $tmp = explode("-",$tmp_uri[0]);            
            $str2 = end($tmp);
            $date_start = str_replace("-".$str2,"", $tmp_uri[0]);
            $tmp = explode("_", $str2);
            $type = (int) $tmp[0];            
            $tmp = explode("l",$tmp[1]);
            if(isset($tmp[1])){
                $car = $tmp[1];            
            }
            $tmp = explode("t",$tmp[0]);
            $vstart = $tmp[0];
            $vend = $tmp[1];                
        }        
    
        break;    
    default :        
            $title = "The Palmy Hotel";
            $metaD = "The Palmy Hotel";
            $metaK = "The Palmy Hotel";        

        break;
}
?>