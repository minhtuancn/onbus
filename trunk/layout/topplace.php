<div class="dd-hd right box-common-border">
    <h1>{topdiemden}</h1>
    <ul>
        <?php foreach ($arrDiemDenHot['data'] as $key => $value) {
        	$check = $modelTinh->checkHavePage($value['tinh_id']);
        	if($check==true){
        		$link_hot = $lang."/"."diem-den-".$value['tinh_name_safe_vi'].".html";
        	}else{
        		$link_hot = "#";
        	}
            ?>
        <li><a href="<?php echo $link_hot; ?>"><img src="<?php echo $value['image_url']; ?>" /><span><?php echo $value['tinh_name_'.$lang]?></span></a></li>
        <?php } ?>
    </ul>
</div>