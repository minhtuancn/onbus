<div class="sidebar-left left">
    <div class="menu-nhaxe left box-common-border">
        <h1 class="title">{nhaxeuytin}</h1>
        <ul>
            <?php foreach ($arrNhaXe['data'] as $key => $value) {
            ?>
            <li><a href="<?php echo $lang;?>/chi-tiet-nha-xe-<?php echo $value['nhaxe_name_safe_vi']; ?>.html"><?php echo $value['nhaxe_name_'.$lang]?></a></li>
            <?php    
            }?>                       
        </ul>
    </div>
    <div class="box-ads box-common-border">
        <img src="<?php echo STATIC_URL; ?>/images/call-center.jpg" />
    </div>
    <div class="clear"></div>
</div>