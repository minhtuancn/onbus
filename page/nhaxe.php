<?php 
$arrNhaxe = $model->getListNhaxe("",-1,-1,-1);
?>
<div class="page_profile">
            <div class="block_search_nhaxe">
                <input type="text" placeholder="Tìm kiếm nhà xe..." class="form-control">
                <input type="submit" id="btn_search_nhaxe" value="">
            </div>
            <ul class="list_box">
                <?php foreach ($arrNhaxe['data'] as $xe) {
                  $img = (strlen($xe['thumbnail_url']) > 10) ? $xe['thumbnail_url'] :  STATIC_URL."/images/bus-2.jpg"; 
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
                <?php } ?>
                
            </ul>
            <div class="clear"></div>
        </div>