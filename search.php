<?php 
$query  = $_SERVER['QUERY_STRING'];
include "defined.php"; 
$lang = "vi";
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

$arrTinhHaveTicket = $modelTinh->getListTinhHaveTicket($vstart);

$link = "search.php?";
$vstart = $vend = $dstart = $dend = -1;
$car = $service = ""; 
$page_show = 5;
$limit = 10;
if(isset($_GET['type'])){
    $type = (int) $_GET['type'];
    $link.="type=".$type;
}
if(isset($_GET['vstart'])){
    $vstart = (int) $_GET['vstart'];
    $link.="vstart=".$vstart;
}
if(isset($_GET['vend'])){
    $vend = (int) $_GET['vend'];
    $link.="&vend=".$vend;
}
if(isset($_GET['car']) && trim($_GET['car']!="") && trim($_GET['car']!="Chọn nhà xe")){
    $car = $modelTicket->processData($_GET['car']);
    $link.="&car=".$car;
    $arrCarSearch = explode(',',$car);
}
if(isset($_GET['service']) && trim($_GET['service']!="")){
    $service = $modelTicket->processData($_GET['service']);
    $link.="&service=".rtrim($service,",");
    $arrServiceSearch = explode(',',rtrim($service,","));
}
if(isset($_GET['dstart'])){
    $dstart = $modelTicket->processData($_GET['dstart']);
    $link.="&dstart=".$dstart;
    $dstart = strtotime($dstart);
}
if(isset($_GET['dend']) && $type==2){
    $dend = $modelTicket->processData($_GET['dend']);
    $link.="&dend=".$dend;
    $dend = strtotime($dend);
}

$arrNhaXeID = array();

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = $limit * ($page - 1);

$arrTicket_start_nhaxe = $modelTicket->getListTicketFE("",$vstart,$vend,$dstart,$service,-1,-1);
if(!empty($arrTicket_start_nhaxe['data'])){
    foreach ($arrTicket_start_nhaxe['data'] as $ticket) {
        $arrNhaXeID[$ticket['nhaxe_id']] = $ticket['nhaxe_id'];
    }
}

$arrTicket_start_total = $modelTicket->getListTicketFE($car,$vstart,$vend,$dstart,$service,-1,-1);
$total_page_start = ceil($arrTicket_start_total['total'] / $limit);
$arrTicket_start = $modelTicket->getListTicketFE($car,$vstart,$vend,$dstart,$service,$offset,$limit);

if($type==2){
    $arrTicket_end_total = $modelTicket->getListTicketFE($car,$vstart,$vend,$dend,$service,-1,-1);
    $total_page_end = ceil($arrTicket_end_total['total'] / $limit);
    $arrTicket_end = $modelTicket->getListTicketFE($car,$vstart,$vend,$dend,$service,$offset,$limit);
}

$arrNhaXeUyTin = $modelNhaxe->getListNhaxe('',1,0,8);

$arrNhaXe = $modelNhaxe->getListNhaxe('',-1,-1,-1);

$arrNoidi = $modelTinh->getListTinh(-1,'',-1,-1, -1);
$arrListTinhKey = array();
if(!empty($arrNoidi)){

    foreach ($arrNoidi['data'] as $value) {

        $arrListTinhKey[$value['tinh_id']] = $value;

    }

}
$arrRoute = $modelRoute->getListRoute('',-1,-1,1, 0, 8);

$routeDetail = $modelRoute->detailRoute($vstart,$vend);

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
    <div class="chrm-toggle"><span class="">Feedback</span></div>
</div>
    <?php include URL_LAYOUT."/header.php"; ?>    
    <div id="wrapper-container" class="w-center">
        
</div>
<?php include URL_LAYOUT."/footer.php"; ?>
<!-- InstanceBeginEditable name="EditRegion3" -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="popup_detail">
    <div class="wrap-popup">
        <a href="#" class="close-popup" data-dismiss="modal"></a>
        <div class="title-detail">
            <h1>Check your details: <span>Return Trip</span><span class="a-num"><b>1</b><span>x</span><i></i></span></h1>
        </div>
        <div class="left detail-a">
            <h1 class="bg-x"><span>Detail</span></h1>
            <div class="ab-dd">
                <ul class="right">
                    <li><i class="icon-wifi"></i></li>
                    <li><i class="icon-ge"></i></li>
                </ul>
                <h1>hồ chí minh - vũng tàu</h1>
                <div class="clear"></div>
            </div>
            <div class="abc-dkh"><b>Điểm khởi hành:</b>Chợ Tân Sơn Nhất (Gò Vấp)<a href="#" class="right">(Xem bản đồ)</a></div>
            <div class="abc-dkh"><b>Điểm đến:</b>Chợ Tân Sơn Nhất (Gò Vấp)<a href="#" class="right">(Xem bản đồ)</a></div>
            <div class="type-ticket">
                <p>Chọn thời gian khởi hành trước khi mua vé*</p>
                <ul>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="left abc-sche">
                <h1>SCHEDULE:</h1>
                <div class="dd-point">
                    <p>2 giờ 30 phút</p>
                    <div class="line-dd"></div>
                    <span class="point point-1" data-toggle="tooltip" title="" data-original-title="Trạm dừng 1"></span>
                    <span class="point point-2" data-toggle="tooltip" title="" data-original-title="Trạm dừng 2"></span>
                    <p>2 trạm dừng</p>
                </div>
            </div>
            <div class="right abc-sche">
                <h1>PRICE:</h1>
                <div class="abc-price">
                    <span>150,000<span>VNĐ</span></span>
                </div>
            </div>
        </div>
        <div class="right option-a">
            <h1 class="bg-x"><span>Service Included</span></h1>         
            <div class="ab-dd">
                <p>Giá trên đã bao gồm các dịch vụ</p>
            </div>
            <div>
                <p><b>- Holine 24/24 hỗ trợ:</b> Mô tả mô tả mô tảt Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô</p>
                <p><b>- Bản đồ và cẩm nang du lịch onbus.vn:</b> Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảt</p>
                <p><b>- Vé chiều đi của hành trình:</b> Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảt</p>
                <p><b>- Phí Bảo Hiểm Du Lịch:</b> Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tả</p>
            </div>
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
            <div class="wrap-popup">
                <a href="#" class="close-popup" data-dismiss="modal"></a>
                <img src="" />
                <div class="clear"></div>    
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popup_book_ticket">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Select Seat</h4>
          </div>
      <div class="modal-body">
        <div class="popup_detail">
            <div class="wrap-popup">
                <a href="#" class="close-popup" data-dismiss="modal"></a>
                <p>Seat selection is not available. Please choose the number of passengers from the drop down list below.</p>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No. fo tickets: </label>
                    <div class="col-sm-10">
                      <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                  </div>
                  <p>Seats will be assigned closed to one another and at middle area by the best effort.</p>
                  <div class="btn-center">
                    <input type="button" value="book now" class="button2">
                  </div>
                </form>
                <div class="clear"></div>    
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="scr"></div>
<div class="vxr-loading-overlay">
    <img src="themes/images/ajax_loader.gif" style="width: 75px; height: 75px;" />
</div>
<style type="text/css">
.vxr-loading-overlay{background:none repeat scroll 0 0 #FFFFFF;height:100%;opacity:0.5;position:fixed;text-align:center;width:100%;z-index:9999;top:0;left:0;display:none}.vxr-loading-overlay img{margin-top:40%}
</style>
<!-- InstanceEndEditable --> 
<script src="<?php echo STATIC_URL; ?>/js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InstanceBeginEditable name="JS" -->
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customDatePicker1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customAutoComplete1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/helper1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/city.js"></script>    
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/searchWidget1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/common.js"></script>     
    
    <!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>

