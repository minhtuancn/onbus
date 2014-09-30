<?php
require_once 'backend/model/Home.php';
$model = new Home;

function checkCat($uri) {    
    $p_detail = '#details/[a-z0-9\-]+\-\d+.html#';
    $p_tag = '#/tag/[a-z\-]+.html#';
	$p_contact = '#/lien-he+.html#';
    $p_payment = '#/[a-z\-]/payment+.html#';    
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
    $p_hot_detail =  '#/diem-den-[a-z-\]+.html#';
        
    $p_search = "#/ve-xe-khach-[a-z\-]+.html#";

    $mod = "home";
    $page_id = "";   
    if (strpos( $uri,'ve-xe-khach')>-1) {        
        $mod = "search";
    } 
    if (strpos( $uri,'about-us')>-1) {        
        $mod = "about";
    } 
    if (strpos( $uri,'thanks-you')>-1) {        
        $mod = "thanks";
    } 
    if (strpos( $uri,'pay-policy')>-1) {        
        $mod = "pay-policy";
    } 
    if (strpos( $uri,'privacy-policy')>-1) {        
        $mod = "privacy";
    } 
    if (strpos( $uri,'method')>-1) {        
        $mod = "method";
    } 
    if (strpos( $uri,'chi-tiet-nha-xe')>-1) {        
        $mod = "detail-nhaxe";
    } 
    if (strpos( $uri,'payment')>-1) {        
        $mod = "payment";
    } 
    if (strpos( $uri,'terms')>-1) {        
        $mod = "term";
    } 
    if (strpos( $uri,'tags')>-1) {        
        $mod = "tags";
    } 
    if (strpos( $uri,'faq')>-1) {        
        $mod = "faq";
    } 
    if (strpos( $uri,'thong-tin-nha-xe')>-1) {        
        $mod = "nhaxe";
    }
    if (strpos( $uri,'details')>-1) {        
        $mod = "details";
    }
    if (strpos( $uri,'tin-tuc')>-1) {        
        $mod = "news";
    }   
    if (strpos( $uri,'payment')>-1) {        
        $mod = "payment";
    } 
    if (strpos( $uri,'diem-den')>-1) {        
        $mod = "hot-detail";
    }      
	if (strpos( $uri,'contact')>-1) {        
        $mod = "contact";
    }  
    
    if (preg_match($p_thuvienanh, $uri)) {
        $mod = "thuvienanh";
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
    
    case "details":  
		$tieude_id = $tmp_uri[3];
        
        $arr = explode("-", $tieude_id);   
		$article_id = (int) end($arr);
        $sql = "SELECT * FROM articles WHERE article_id = $article_id";
        $rs = mysql_query($sql);
        $row_details = mysql_fetch_assoc($rs);        
		$title = $row['title'];
		$metaD = $row['title'];
		$metaK = $row['title'];        
        break;

    case "tags":  
        $tieude_id = $tmp_uri[3];
        
        $arr = explode("-", $tieude_id);   
        $tag_id = (int) end($arr);
        $str_article_id = $model->getArticleIdByTagID($tag_id);
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
        break;   
    case "hot-detail":
        $tinh_name_safe_vi = str_replace("diem-den-", "", $tmp_uri[2]);
        $tinh_id = $model->getIDByTinhNameSafe($tinh_name_safe_vi);
        $sql = "SELECT * FROM page WHERE tinh_id = $tinh_id";
        $rs = mysql_query($sql);
        $row_hot = mysql_fetch_assoc($rs);
        break;
    case "detail-nhaxe":
        $nhaxe_name_safe_vi = str_replace("chi-tiet-nha-xe-", "", $tmp_uri[2]);
        $nhaxe_id = (int) $model->getIDByNameSafe($nhaxe_name_safe_vi);                
        $row_nhaxe = $model->getDetailNhaxe($nhaxe_id);        
        break;    
    case "page":                
        $rs_article = $model->getDetailPage($page_id);         
        $arrDetailPage = mysql_fetch_assoc($rs_article); 
        $title = $arrDetailPage["title"];
        $metaD = $arrDetailPage["meta_d"];
        $metaK = $arrDetailPage["meta_k"];
        break;
    case "faq":                        
        //$title = $arrDetailPage["title"];
        //$metaD = $arrDetailPage["meta_d"];
        //$metaK = $arrDetailPage["meta_k"];
        break;
    case "search":     
        $vstart = $vend = $dstart = $dend = -1;
        $car = "";
        $str1 = strstr($tmp_uri[2], 'ngay');
        if(strpos($str1,"?")> 0){
            $params = strstr($str1, '?');
            $sort = (int) str_replace("?sort=","" ,$params);            
            if(!in_array($sort,array(1,2))){                
                $str1 = str_replace($params, '',$str1);   
                $sort = 1;   
            }
            $str1 = str_replace($params, '',$str1);
        }else{
            $sort=1;
        }        
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