<?php 
include "defined.php"; 

$arrNhaXeUyTin = $model->getListNhaxe('',1,0,8);

$arrNhaXe = $model->getListNhaxe('',-1,-1,-1);

$arrNoidi = $model->getListTinh(-1,'',-1,-1, -1);
$arrDiemDenHot = $model->getListTinh(-1,'',1,0, 9);

$arrRoute = $model->getListRoute('',-1,-1,1, 0, 8);

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
    <?php if($mod=="term" || $mod=="method" || $mod =="privacy" || $mod =="pay-policy"){ ?>
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
    <?php if($mod=="term" || $mod=="method" || $mod=="contact" || $mod=="faq" || $mod=="hot-detail" || $mod=="details" || $mod=="privacy" || $mod =="pay-policy") { ?>
    </div>
    <?php } ?>    
   
<?php include URL_LAYOUT."/footer.php"; ?>
<!-- InstanceBeginEditable name="EditRegion3" -->
<div id="scr"></div>
<!-- InstanceEndEditable --> 

    <!-- InstanceBeginEditable name="JS" -->
    <?php if($mod!="detail-nhaxe") { ?>
    <?php if($lang=='vi'){?>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customDatePicker1.0.min.js"></script>
    <?php }else{ ?>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customDatePickeren.min.js"></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customAutoComplete1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/searchWidget1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/helper1.0.min.js"></script> 
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.bxslider.js"></script>   
    <?php } ?>
    
    <?php if($mod=="detail-nhaxe"){ ?>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.slimscroll.js"></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/common.js"></script> 

    <?php if(!in_array($mod, array('payment','detail-nhaxe'))) {?>   
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
          
        });
        $(function () {
           
            initSearchTicketWidget();           
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
                <p><?php if($lang=="vi") {?>
                    <b>Onbus</b> chân thành cảm ơn sự quan tâm của quý khách hàng đến dịch vụ của chúng tôi. Để gửi nội dung phản hồi, quý khách vui lòng điền thông tin vào ô bên dưới:
                <?php } else{ ?>
                Thank you for your interest in our services. Please fill in the feedback box below.
                <?php } ?>
                </p>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" id="f_email" name="f_email"  class="form-control"  placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $lang =="vi" ? "Điện thoại" : "Phone number"; ?></label>
                    <div class="col-sm-10">
                      <input type="text" id="f_mobile" name="f_mobile"  class="form-control" placeholder="<?php echo $lang =="vi" ? "Điện thoại" : "Your phone number"; ?>">
                    </div>
                  </div>
                  <div class="form-group txt_feedback">
                    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $lang =="vi" ? "Nội dung" : "Content"; ?></label>
                    <div class="col-sm-10">
                      <textarea type="textarea" id="f_content" name="f_content" class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group btn_feedback">
                    <a class="logo_contact" href="#"><img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" width="150"></a>
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" id="btnFeedBack" class="btn btn-default"><?php echo $lang =="vi" ? "Gửi" : "Send"; ?></button>
                    </div>
                  </div>
                </form>
                <div class="clear"></div>
                <p id="mess_feedback" style="text-align:center;color:red" class="error_time">Vui lòng nhập đầy đủ thông tin!</p>    
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54111010-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
$(function(){
    $('#btnDK').click(function(){
        
        var  email = $.trim($('#emailregis').val());

        if(email!=''){
            $.ajax({
                url: "ajax/process.php",
                type: "POST",
                async: true,
                data: {
                    'mod':'newsletter',
                    'email': email
                },
                success: function(data){
                    if($.trim(data)!=''){
                        $('#mess_letter').html(data).show(); 
                        setTimeout(function(){
                            $('#mess_letter').hide();
                            $('#emailregis').val('');
                        }, 4000);
                    }
                }
                });
        }else{
            $('#mess_letter').show();
            $('#emailregis').focus();
            setTimeout(function(){$('#mess_letter').hide();}, 4000);            
            return false;
        }
    });
    $('#btnFeedBack').click(function(){
        
        var  email = $.trim($('#f_email').val());
        var  mobile = $.trim($('#f_mobile').val());
        var  content = $.trim($('#f_content').val());

        if(email!='' && mobile !='' && content !=''){
            $.ajax({
                url: "ajax/process.php",
                type: "POST",
                async: true,
                data: {
                    'mod':'feedback',
                    'email': email,
                    'mobile' : mobile,
                    'content' : content
                },
                success: function(data){
                    if($.trim(data)!=''){
                        $('#mess_feedback').html(data).show();
                        if($.trim(data)=="Gửi feedback thành công."){
                            $('#f_email, #f_mobile, #f_content').val('');  
                        }                        
                        setTimeout(function(){
                            $('#mess_feedback').hide();                            
                            $('#f_email, #f_mobile, #f_content').val('');
                        }, 4000);                        
                    }
                }
                });
        }else{
            $('#mess_feedback').show();
            $('#f_email').focus();
            setTimeout(function(){$('#mess_feedback').hide();}, 4000);            
            return false;
        }
    });
});
    
</script>
</body>
<!-- InstanceEnd --></html>