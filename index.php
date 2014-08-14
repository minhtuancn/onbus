<?php 
include "defined.php"; 
$lang = "vi";
require_once "backend/model/Nhaxe.php";
$modelNhaxe = new Nhaxe();
require_once "backend/model/Tinh.php";
$modelTinh = new Tinh();
require_once "backend/model/Route.php";
$modelRoute = new Route();
$arrNhaXeUyTin = $modelNhaxe->getListNhaxe('',1,0,8);

$arrNhaXe = $modelNhaxe->getListNhaxe('',-1,-1,-1);

$arrNoidi = $modelTinh->getListTinh(-1,'',-1,-1, -1);
$arrDiemDenHot = $modelTinh->getListTinh(-1,'',1,0, 9);

$arrRoute = $modelRoute->getListRoute('',-1,-1,1, 0, 8);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/common.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap-theme.min.css">
<link href="<?php echo STATIC_URL; ?>/css/style.css" type="text/css" rel="stylesheet"  />
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
    <header>
        <div class="w-center header-wrap">
            <div class="right">
                <div class="dropdown tiente">
                    <div class="cell_header">CURRENCY</div>
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    VNĐ<span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">VNĐ - Vietnamese</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">USD - United States Dollars</a></li>
                  </ul>
                </div>
                <div class="dropdown">
                <div class="cell_header">Language</div>
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    Tiếng Việt <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="flag-vn"></span>Tiếng Việt</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="flag-en"></span>English</a></li>
                  </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="left"><a href="#" class="logo-header"><img src="<?php echo STATIC_URL; ?>/images/momondo_logo_v6.png" /></a></div>
            <div class="menu-header">
                <ul class="nav nav-pills">
                  <li class="active hv-1"><a href="#">Trang chủ<span></span></a></li>
                  <li class="hv-4"><a href="#">Moto bike taxi<span></span></a></li>
                  <li class="hv-3"><a href="#">Tin tức và khuyến mãi<span></span></a></li>
                  <li class="hv-4"><a href="#">Thông tin nhà xe<span></span></a></li>
                  
                  <!--<li class="cart-icon">
                    <a href="#"><i>&nbsp;</i><b>0</b>Vé</a>
                  </li>-->
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </header>    
    <div id="wrapper-container" class="w-center">
        <!-- InstanceBeginEditable name="Container" -->
        <div class="block-home box-infor left">
            <h1>Đặt vé qua Vipbus</h1>
            <div class="description">
               Chia sẻ cùng chúng tôi hành trình của bạn, chúng tôi sẽ giúp bạn có được giá vé và chất lượng dịch vụ tốt nhất từ những thương hiệu nhà xe uy tín hàng đầu. Đảm bảo cho bạn sự tiện lợi, an toàn và tiết kiệm.
            </div>
        </div>
        <div class="block-home box-infor right">
            <ul>
                <li><a href="#"><span class="helper"></span><img src="<?php echo STATIC_URL; ?>/images/tripadvisor.jpg" /></a></li>            
                <li><a href="#"><span class="helper"></span><img src="<?php echo STATIC_URL; ?>/images/888611550047375.png" /></a></li>
                <li><a href="#"><span class="helper"></span><img src="<?php echo STATIC_URL; ?>/images/pata.jpg" /></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="ticket-book box-css3 block-home">
            <div class="box-sear-ticket">
                <div class="wrap">
                    <div class="tabs">
                        <ul>
                            <li><a href="#">Tìm vé xe</a></li>
                        </ul>
                    </div>
                    <div class="wrap-frm-search">
                    <form>
                    <ul class="menu triptype clearfix">
                        <li class="oneway">
                            <input data-ticket="type-1" id="ticket-1" type="radio" name="ticket-type" />
                            <label for="ticket-1">Vé 1 chiều</label>
                        </li>
                        <li class="return selected">
                            <input type="radio" data-ticket="type-2" id="ticket-2" name="ticket-type" checked="checked" />
                            <label for="ticket-2">Vé khứ hồi</label>
                        </li>
                    </ul>
                    <div class="left item-search">
                        <label for="departPlace">Điểm khởi hành</label>
                        <input id="departPlace" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Default input" accesskey="1" tabindex="1" autocomplete="off">
                        <div id="departPlaceSelector" class="place-selector rounded-5 clearfix" style="display: none;">
                            <div class="inner rel-pos">
                                <div class="region-col first left clearfix">
                                    <ul class="city-list left">
                                        <li class="city"><a href="javascript:;" data-state="29" data-city="0">Hồ Chí Minh</a></li>
                                        <li class="city"><a href="javascript:;" data-state="13" data-city="0">Cần Thơ</a></li>
                                        <li class="city"><a href="javascript:;" data-state="2" data-city="0">Bà Rịa-Vũng Tàu</a></li>
                                        <li class="city"><a href="javascript:;" data-state="12" data-city="0">Cà Mau</a></li>
                                        <li class="city"><a href="javascript:;" data-state="1" data-city="0">An Giang</a></li>
                                        <li class="city"><a href="javascript:;" data-state="5" data-city="0">Bạc Liêu</a></li>
                                        <li class="city"><a href="javascript:;" data-state="7" data-city="0">Bến Tre</a></li>
                                        <li class="city"><a href="javascript:;" data-state="9" data-city="0">Bình Dương</a></li>
                                        <li class="city"><a href="javascript:;" data-state="10" data-city="0">Bình Phước</a></li>
                                        <li class="city"><a href="javascript:;" data-state="19" data-city="0">Đồng Nai</a></li>
                                        <li class="city"><a href="javascript:;" data-state="20" data-city="0">Đồng Tháp</a></li>
                                        <li class="city"><a href="javascript:;" data-state="28" data-city="0">Hậu Giang</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <span class="replay-position">&nbsp;</span>
                    </div>
                    <div class="right item-search">
                        <label for="departPlace">Nơi đến</label>
                        <input id="destination" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Default input" accesskey="1" tabindex="1" autocomplete="off">
                        <div id="destinationSelector" class="place-selector rounded-5 clearfix" style="display: none;">
                            <div class="inner rel-pos">
                                <div class="region-col first left clearfix">
                                    <ul class="city-list left">
                                        <li class="city"><a href="javascript:;" data-state="29" data-city="0">Hồ Chí Minh</a></li>
                                        <li class="city"><a href="javascript:;" data-state="13" data-city="0">Cần Thơ</a></li>
                                        <li class="city"><a href="javascript:;" data-state="2" data-city="0">Bà Rịa-Vũng Tàu</a></li>
                                        <li class="city"><a href="javascript:;" data-state="12" data-city="0">Cà Mau</a></li>
                                        <li class="city"><a href="javascript:;" data-state="1" data-city="0">An Giang</a></li>
                                        <li class="city"><a href="javascript:;" data-state="5" data-city="0">Bạc Liêu</a></li>
                                        <li class="city"><a href="javascript:;" data-state="7" data-city="0">Bến Tre</a></li>
                                        <li class="city"><a href="javascript:;" data-state="9" data-city="0">Bình Dương</a></li>
                                        <li class="city"><a href="javascript:;" data-state="10" data-city="0">Bình Phước</a></li>
                                        <li class="city"><a href="javascript:;" data-state="19" data-city="0">Đồng Nai</a></li>
                                        <li class="city"><a href="javascript:;" data-state="20" data-city="0">Đồng Tháp</a></li>
                                        <li class="city"><a href="javascript:;" data-state="28" data-city="0">Hậu Giang</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left item-search">
                        <label for="departPlace">Ngày đi</label>
                        <input id="departDate" type="text" class="input-txt date form-control" placeholder="Chọn ngày đi" accesskey="3" tabindex="3" />

                    </div>
                    <div class="right item-search ticket-2">
                        <label for="departPlace">Ngày về</label>
                        <input id="returnDate" type="text" class="input-txt date form-control" placeholder="Chọn ngày về" accesskey="4" tabindex="4" />

                    </div>
                    <div class="btn-search-ticket">
                        <button type="button" class="btn btn-warning right btn-blue">Tìm vé xe</button>
                        <div class="left item-search">
                            <label for="departPlace">Nhà xe</label>
                            <select class="form-control input-sm left">
                                <option>Chọn nhà xe</option>
                                <?php foreach ($arrNhaXe['data'] as $key => $value) {
                                ?>
                                <option><?php echo $value['nhaxe_name_'.$lang];?></option>
                                <?php } ?>                               
                            </select>
                        </div>
                    </div>
                    <div class="clear"></div>
                </form>
                    </div>
                </div>
            </div>
            <div class="slide-box">
                <div class="bxslider">
                  <div class="slide"><img src="<?php echo STATIC_URL; ?>/images/farealert_500x500_0008_en_2.jpg"></div>
                  <div class="slide"><img src="<?php echo STATIC_URL; ?>/images/farealert_500x500_0008_en_2.jpg"></div>
                  <div class="slide"><img src="<?php echo STATIC_URL; ?>/images/farealert_500x500_0008_en_2.jpg"></div>
                  <div class="slide"><img src="<?php echo STATIC_URL; ?>/images/farealert_500x500_0008_en_2.jpg"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="subscriber block-home">
            <div class="message">
                <div class="title">Thông tin mới nhất từ VIPBUS</div>
                <div class="subtitle">Nhận thông tin du lịch, khuyến mãi hấp dẫn mỗi ngày từ vipbus.vn</div>
            </div>
            <div id="newsletter-signup-form" class="subscribe-form">
                <div class="inputs">
                    <div class="input"><input id="newsletter-signup-email-input" type="email" name="" value="" class="watermark" placeholder="Nhập Email của bạn "></div>
                    <div id="newsletter-signup-button" class="submit-form"><span class="label">Nhận Email</span></div>
                </div>
            </div>
        </div>
        <div class="block-page block-home">
            <div class="container-block">
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
                    <a href="#" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/Untitled-5.jpg" /></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dd-hd right box-common-border">
                <h1>TOP điểm đến hấp dẫn nhất (Giá từ 120,000đ)</h1>
                <ul>
                    <?php foreach ($arrDiemDenHot['data'] as $key => $value) {
                        ?>
                    <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/generic.jpg" /><span><?php echo $value['tinh_name_'.$lang]?></span></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clear"></div>
            </div>
        </div>
        <!-- InstanceEndEditable -->
        <div class="clear"></div>
</div>
<footer>
        <div class="center w-center">
<div class="left column w1-4">
        <div class="medBox">
            <a href="/"><img src="<?php echo STATIC_URL; ?>/images/momondo_logo_v6.png" /></a>
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
<!-- InstanceBeginEditable name="EditRegion3" -->

<!-- InstanceEndEditable --> 
<script src="<?php echo STATIC_URL; ?>/js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InstanceBeginEditable name="JS" -->
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customDatePicker1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customAutoComplete1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/searchWidget1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/common.js"></script>    
    <script type="text/javascript">
        $(document).ready(function(){
          $('.bxslider').bxSlider({
            slideWidth: 560,
            minSlides: 1,
            maxSlides: 1,
            slideMargin: 0,
            pager: false,
            auto: true
          });
          $(function () {
            initSearchTicketWidget();
         });
        });
    </script>
    <!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
