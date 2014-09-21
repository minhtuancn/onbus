<footer>
        <div class="center w-center">
<div class="left column w1-4">
        <div class="medBox">            
            <div class="left col_left_footer">
                <a href="<?php echo HOST; ?>"><img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" /></a>
                <ul>
                    <li><a href="<?php echo $lang; ?>/method.html">{phuongthucthanhtoan}</a></li>
                    <li><a href="<?php echo $lang; ?>/pay-policy.html">{chinhsachthanhtoan}</a></li>
                    <li><a href="<?php echo $lang; ?>/terms-and-conditions.html">{dieukhoansudung}</a></li>
                    <li><a href="<?php echo $lang; ?>/privacy-policy.html">{chinhsachriengtu}</a></li>
                </ul>
            </div>

            <div class="left"><h4 class="smallBoxHeader">{datvequaonbus}</h4>
<p><?php if($lang=="vi") { ?>Chia sẻ cùng chúng tôi hành trình của bạn, <br />chúng tôi sẽ giúp bạn có được giá vé và chất lượng dịch vụ tốt nhất từ những thương hiệu nhà xe uy tín hàng đầu. Đảm bảo cho bạn sự tiện lợi, an toàn và tiết kiệm.
<?php }else{ ?>
Share with us your journey,<br /> we will help you choose your ticket with best price and the best quality service from the prestige bus cooperator. Ensure your convenience, safety and savings.
<?php } ?>

</p>
            <ul>
                <li><a href="#"><span class="helper"></span><img src="<?php echo STATIC_URL; ?>/images/SSL-logo.png" /></a></li>
                <li><a href="#"><span class="helper"></span><img src="<?php echo STATIC_URL; ?>/images/cash-on-delivery.jpg" /></a></li>
            </ul>
            </div>
        </div>
    </div>
        
    <div class="column w1-4 left">
        <div class="medBox">
            <h4 class="smallBoxHeader">{nhaxehangdau}</h4>
            <ul>
                <?php foreach ($arrNhaXeUyTin['data'] as $key => $value) {
                ?>
                <li><a id="BaseFooter_HyperLinkFlights" href="<?php echo $lang;?>/chi-tiet-nha-xe-<?php echo $value['nhaxe_name_safe_vi']; ?>.html"><?php echo $value['nhaxe_name_'.$lang]?></a></li>
                <?php    
                }?> 
        
            </ul>
        </div>
    </div>
        
    <div class="column w1-4 right">
        <div class="medBox">
            <h4 class="smallBoxHeader">{tuyenduongphobien}</h4>
            <ul>
                
                <?php foreach ($arrRoute['data'] as $key => $value) {                    
                ?>
                    <li><a href="<?php echo $lang;?>/ve-xe-khach-di-tu-<?php echo $model->getTinhNameSafeByID($value['tinh_id_start']);?>-den-<?php echo $model->getTinhNameSafeByID($value['tinh_id_end'])?>-ngay-<?php echo date('d-m-Y',strtotime('tomorrow')); ?>-1_<?php echo $value['tinh_id_start'];?>t<?php echo $value['tinh_id_end']?>.html"><?php echo str_replace("-","→",$value['route_name_'.$lang]); ?></a></li>
                <?php } ?>                
          </ul>
        </div>
    </div>
<div id="BaseFooter_domainLinks" class="medBox seoLinks">
    <ul>
        <li><a href="<?php echo $lang; ?>/about-us.html">{vechungtoi}</a></li>
        <li><a href="<?php echo $lang; ?>/contact.html">{lienhe}</a></li>
        <li><a href="<?php echo $lang; ?>/faq.html">{hoidap}</a></li>
        <!--
        <li><a href="<?php echo $lang; ?>/pay-policy.html">{chinhsachthanhtoan}</a></li>
        <li><a href="<?php echo $lang; ?>/terms-and-conditions.html">{dieukhoansudung}</a></li>
        <li><a href="<?php echo $lang; ?>/method.html">{phuongthucthanhtoan}</a></li>
        <li><a href="<?php echo $lang; ?>/privacy-policy.html">{chinhsachriengtu}</a></li>
        -->
        <li><a href="#">Blog</a></li>
    </ul>
</div>

                <!--End-->
                <div class="clear"></div>
  </div>
            <div class="clear"></div>
    </footer>