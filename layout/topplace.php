<div class="dd-hd right box-common-border">
    <h1>TOP điểm đến hấp dẫn nhất</h1>
    <ul>
        <?php foreach ($arrDiemDenHot['data'] as $key => $value) {
            ?>
        <li><a href="#"><img src="<?php echo $value['image_url']; ?>" /><span><?php echo $value['tinh_name_'.$lang]?></span></a></li>
        <?php } ?>
    </ul>
</div>