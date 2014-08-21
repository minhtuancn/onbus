<footer>
        <div class="center w-center">
<div class="left column w1-4">
        <div class="medBox">
            <a href="/"><img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" /></a>
            <div class="left"><h4 class="smallBoxHeader">Đặt vé qua vipbus</h4>
<p>Chia sẻ cùng chúng tôi hành trình của bạn, chúng tôi sẽ giúp bạn có được giá vé và chất lượng dịch vụ tốt nhất từ những thương hiệu nhà xe uy tín hàng đầu. Đảm bảo cho bạn sự tiện lợi, an toàn và tiết kiệm.</p>
            <ul>
                <li><a href="#"><span class="helper"></span><img src="<?php echo STATIC_URL; ?>/images/comodo-secure-padlock.png" /></a></li>
                <li><a href="#"><span class="helper"></span><img src="<?php echo STATIC_URL; ?>/images/NortonSecuredSeal-Symantec.jpg" /></a></li>
            </ul>
            </div>
        </div>
    </div>
        
    <div class="column w1-4 left">
        <div class="medBox">
            <h4 class="smallBoxHeader">Nhà xe hàng đầu</h4>
            <ul>
                <?php foreach ($arrNhaXeUyTin['data'] as $key => $value) {
                ?>
                <li><a id="BaseFooter_HyperLinkFlights" href="#"><?php echo $value['nhaxe_name_'.$lang]?></a></li>
                <?php    
                }?> 
        
            </ul>
        </div>
    </div>
        
    <div class="column w1-4 right">
        <div class="medBox">
            <h4 class="smallBoxHeader">Tuyến đường phổ biến</h4>
            <ul>
                <?php foreach ($arrRoute['data'] as $key => $value) {
                ?>
                    <li><a href="#"><?php echo str_replace("-","→",$value['route_name_'.$lang]); ?></a></li>
                <?php } ?>                
          </ul>
        </div>
    </div>
<div id="BaseFooter_domainLinks" class="medBox seoLinks">
    <ul>
        <li><a href="#">Về chúng tôi</a></li>
        <li><a href="#">Liên hệ</a></li>
        <li><a href="#">Hỏi đáp</a></li>
        <li><a href="#">Điều khoản sử dụng</a></li>
        <li><a href="#">Phản hồi</a></li>
        <li><a href="#">Chính sách riêng tư</a></li>
        <li><a href="#">Blog</a></li>
    </ul>
</div>

                <!--End-->
                <div class="clear"></div>
  </div>
            <div class="clear"></div>
    </footer>