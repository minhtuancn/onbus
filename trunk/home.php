<?php 
include "defined.php"; 

require_once "backend/model/Ticket.php";
$modelTicket = new Ticket;

require_once "backend/model/Tinh.php";

$modelTinh = new Tinh;

require_once "backend/model/Nhaxe.php";

$modelNhaxe = new Nhaxe;
require_once "backend/model/Place.php";

$modelPlace = new Place;

require_once "backend/model/Car.php";

$modelCar = new Car;

require_once "backend/model/Services.php";

$modelService = new Services;

require_once "backend/model/Time.php";

$modelTime = new Time;

require_once "backend/model/Route.php";

$modelRoute = new Route;

require_once "backend/model/Image.php";

$modelImage = new Image;
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
<title>Onbus.vn</title>
<base href="<?php echo HOST; ?>/"/>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap-theme.min.css">
<link href="<?php echo STATIC_URL; ?>/css/style.css" type="text/css" rel="stylesheet"  />
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script src="<?php echo STATIC_URL; ?>/js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div id="socialmedia">
    <a id="googleplus" href="#" rel="publisher" title="Follow onBus on Google+" target="_blank">
        <span>Google+</span>
    </a>
    <a id="youtube" href="#" title="Subscribe to momondo on YouTube" target="_blank">
        <span>YouTube</span>
    </a>
    <a id="facebook" href="#" title="Follow momondo on Facebook" target="_blank">
        <span>Facebook</span>
    </a>
    <a id="twitter" href="#" title="Follow momondo on Twitter" target="_blank">
        <span>Twitter</span>
    </a>
</div>
<div id="FeedbackButton" class="chrm-btn chrm-feedback">
    <div class="chrm-toggle"><a href="#" data-toggle="modal" data-target="#popup_feedback">Feedback</a></div>
</div>
    <?php include URL_LAYOUT."/header.php"; ?>    
    <?php if($mod =="privacy" || $mod =="pay-policy"){ ?>
    <div class="page_cstt">
    <?php }?>
    <?php if($mod=="hot-detail" || $mod=="details") {?>
    <div class="wrap_layout_2">
    <?php } ?>
    <?php if($mod=="contact") { ?>
    <div class="page_lienhe">
    <?php } ?>
    <?php if($mod=="faq") {?>
    <div class="faq_page">
        <div class="title_faq">
            <div class="w-center">
            <h2>FAQ Accordion</h2>
            <p>Find answers and help fast</p>
            </div>
        </div>
    <?php } ?>
    <div id="wrapper-container" class="w-center <?php if($mod=="thanks") echo "thanks_page"; ?> <?php if($mod=="about") echo "about-page" ; ?>">
        <?php include "page/".$mod.".php"; ?>
    </div>
    <?php if($mod=="contact" || $mod=="faq" || $mod=="hot-detail" || $mod=="details" || $mod=="privacy" || $mod =="pay-policy") { ?>
    </div>
    <?php } ?>    
   
<?php include URL_LAYOUT."/footer.php"; ?>
<!-- InstanceBeginEditable name="EditRegion3" -->
<div id="scr"></div>
<!-- InstanceEndEditable --> 

    <!-- InstanceBeginEditable name="JS" -->
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customDatePicker1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customAutoComplete1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/searchWidget1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/helper1.0.min.js"></script>    
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.bxslider.js"></script>
    <?php if($mod=="detail-nhaxe"){ ?>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.slimscroll.js"></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/common.js"></script> 

    <?php if($mod!="payment") {?>   
    <script type="text/javascript">
    <?php if($mod=="home" || $mod =="search") { ?>
        var statecity = [
        <?php 
foreach ($arrTinhHaveTicket as $value) {
    ?>
    {
            value: <?php echo json_encode($value['tinh_name_'.$lang]) ; ?>,
            StateId: <?php echo $value['tinh_id']; ?>,           
            label: <?php echo json_encode($value['tinh_name_'.$lang]) ; ?>            
        },
    <?php 
}
        ?>
        ];        
        <?php } ?>
        $(document).ready(function(){
          $('.ticket-2').hide();  
          $('.bxslider').bxSlider({
            slideWidth: 560,
            minSlides: 1,
            maxSlides: 1,
            slideMargin: 0,
            pager: false,
            auto: true,
            pause: 3000
          });
          $(function () {
           
            initSearchTicketWidget();           
         });
        });
    function tripunicode(str){        
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    return str;
    }
    
    </script>
    <?php } ?>
    <!-- InstanceEndEditable -->
    <div class="vxr-loading-overlay">
    <img src="themes/images/ajax_loader.gif" style="width: 75px; height: 75px;" />
</div>
<!-- InstanceEndEditable --> 
    <div class="modal fade" id="popup_feedback">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          </div>
      <div class="modal-body">
        <div class="popup_detail">
            <div class="wrap-popup">
                <a href="#" class="close-popup" data-dismiss="modal"></a>
                <p><b>Onbus</b> chân thành cảm ơn sự quan tâm của quý khách hàng đến dịch vụ của chúng tôi. Để gửi nội dung phản hồi, quý khách vui lòng điền thông tin vào ô bên dưới:</p>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Điện thoại:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group txt_feedback">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nội dung:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group btn_feedback">
                    <a class="logo_contact" href="#"><img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" width="150"></a>
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Gửi</button>
                    </div>
                  </div>
                </form>
                <div class="clear"></div>    
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popup_myticket">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          </div>
      <div class="modal-body">
        <div class="popup_detail">
            <div class="wrap-popup">
                <a href="#" class="close-popup" data-dismiss="modal"></a>
                <div class="box_myticket left">
                    <h1>Thông tin khách hàng</h1>
                    <ul>
                        <li>
                            <span class="bg_full">Tên khách hàng</span>
                            <span>Điển Trương Hoàng</span>
                        </li>
                        <li>
                            <span class="bg_full">Email</span>
                            <span>Điển Trương Hoàng</span>
                        </li>
                        <li>
                            <span class="bg_full">Số điện thoại</span>
                            <span>Điển Trương Hoàng</span>
                        </li>
                    </ul>
                </div>
                <div class="box_myticket left logo">
                    <a class="logo_contact" href="#"><img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" width="250"></a>
                </div>
                <div class="clear"></div>
                <div class="box_myticket left">
                    <h1>Vé chiều đi<p>hồ chí minh - bến tre - số lượng: 01</p></h1>
                    
                    <ul>
                    <li>
                            <span class="bg_full">Mã vé</span>
                            <span>Điển Trương Hoàng</span>
                        </li>
                    <li>
                        <span class="bg_full">Điểm khởi hành</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    <li>
                        <span class="bg_full">Điểm đến</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    <li>
                            <span class="bg_full">Ngày & Giờ khởi hàng</span>
                            <span>Điển Trương Hoàng</span>
                        </li>
                    <li>
                        <span class="bg_full">Số ghế</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    <li>
                        <span class="bg_full">Số xe</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    </ul>
                    <div id="newsletter-signup-button" class="submit-form left"><span class="label">Hủy vé</span></div>
                </div>
                <div class="box_myticket left">
                    <h1>Vé chiều về<p>hồ chí minh - bến tre - số lượng: 01</p></h1>
                    <ul>
                    <li>
                            <span class="bg_full">Mã vé</span>
                            <span>Điển Trương Hoàng</span>
                        </li>
                    <li>
                        <span class="bg_full">Điểm khởi hành</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    <li>
                        <span class="bg_full">Điểm đến</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    <li>
                            <span class="bg_full">Ngày & Giờ khởi hàng</span>
                            <span>Điển Trương Hoàng</span>
                        </li>
                    <li>
                        <span class="bg_full">Số ghế</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    <li>
                        <span class="bg_full">Số xe</span>
                        <span>Điển Trương Hoàng</span>
                    </li>
                    </ul>
                </div>
                <div class="clear"></div>    
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mymap">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="popup_detail">
            <div class="wrap-popup" id="loadmap">
                                      

                 
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
.vxr-loading-overlay{background:none repeat scroll 0 0 #FFFFFF;height:100%;opacity:0.5;position:fixed;text-align:center;width:100%;z-index:9999;top:0;left:0;display:none}.vxr-loading-overlay img{margin-top:40%}
.icon-nuoc {
    width: 16px;
    height: 16px;
    background: url(themes/css/images/nuoc.png) no-repeat;
    display: block;
}
.icon-khan {
    width: 16px;
    height: 16px;
    background: url(themes/css/images/khan.png) no-repeat;
    display: block;
}
.icon-chan {
    width: 16px;
    height: 16px;
    background: url(themes/css/images/chan.png) no-repeat;
    display: block;
}
.list-logo-xe li span{float:none !important;}
p.error_time{display: none;font-style: italic;}
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54111010-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
<!-- InstanceEnd --></html>
