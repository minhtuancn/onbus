<div class="sidebar-left left">
    <div class="menu-nhaxe left box-common-border">
        <h1 class="title">Nhà xe uy tín</h1>
        <ul>
            <?php foreach ($arrNhaXeUyTin['data'] as $key => $value) {
            ?>
            <li><a href="#"><?php echo $value['nhaxe_name_'.$lang]?></a></li>
            <?php    
            }?>                       
        </ul>
    </div>
    <div class="box-ads box-common-border">
        <a href="#" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/banner-doc.jpg" /></a>
    </div>
    <div class="clear"></div>
</div>