<?php
require_once 'admin/Model/Home.php';
$modelHome = new home;
$mod = isset($_GET['mod']) ? $_GET['mod'] : "";
function checkCat($uri) {
    $p_lang = '#lang/[a-z]#';
    $p_detail = '#details/[a-z0-9\-]+\-\d+.html#';
    $p_tag = '#/tag/[a-z\-]+.html#';
	$p_contact = '#/lien-he+.html#';
    $p_reservation = '#/dat-phong+.html#';
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



    $mod = "";
    $page_id = "";
    if (preg_match($p_lang, $uri)) {
        $tmp_lang = explode("/", $uri);        
        $lang = $tmp_lang[2];        
    } 
	if (preg_match($p_contact, $uri)) {
        $mod = "contact";
    } 
    if (preg_match($p_about, $uri)) {
        $mod = "about";
    } 
	if (preg_match($p_giaithuong, $uri)) {
        $mod = "giaithuong";
    } 
    if (preg_match($p_thuvienanh, $uri)) {
        $mod = "thuvienanh";
    } 
    if (preg_match($p_reservation, $uri)) {
        $mod = "reservation";
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

    return array("lang"=>$lang, "mod" =>$mod,'page_id' => $page_id);
}

$uri = str_replace("/palmy", "", $_SERVER['REQUEST_URI']);

$arrRS = checkCat($uri);
$mod = $arrRS['mod'];
$lang = $arrRS['lang'];
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

    default :        
            $title = "The Palmy Hotel";
            $metaD = "The Palmy Hotel";
            $metaK = "The Palmy Hotel";        

        break;
}
?>