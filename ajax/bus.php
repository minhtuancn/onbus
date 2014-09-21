<?php 
if(!isset($_SESSION)){
	session_start();
}
$lang = $_SESSION['lang'];
require_once "../backend/model/Home.php";
$model = new Home();
$keyword = $model->processData($_POST['keyword']);
$arr = $model->searchBus($keyword,$lang);
if(!empty($arr)){
	foreach ($arr as $xe) {
		$img = (strlen($xe['thumbnail_url']) > 10) ? $xe['thumbnail_url'] :  "http://onbus.vn/themes/images/bus-2.jpg"; 
		?>
		<li>
            <a class="wrap_img" href="<?php echo $lang;?>/chi-tiet-nha-xe-<?php echo $xe['nhaxe_name_safe_vi']; ?>.html"><img src="<?php echo $img; ?>"><span class="arrow_pic"></span></a>
            <h2><?php echo $xe['nhaxe_name_'.$lang]; ?></h2>
            <div class="rate sprite-rating_s rating_s">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        </li>
		<?php
	}

}
?>