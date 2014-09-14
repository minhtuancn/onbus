<?php 
include "../defined.php"; 
if(!isset($_SESSION)){
    session_start();
}
$lang = $_SESSION['lang'];
require_once "../backend/model/Ticket.php";
$modelTicket = new Ticket();

require_once "../backend/model/Nhaxe.php";

$modelNhaxe = new Nhaxe;
require_once "../backend/model/Place.php";

$modelPlace = new Place;

require_once "../backend/model/Car.php";

$modelCar = new Car;

require_once "../backend/model/Services.php";

$modelService = new Services;

require_once "../backend/model/Time.php";

$modelTime = new Time;
require_once "../backend/model/Route.php";

$modelRoute = new Route;

if(isset($_POST['ticket_id'])){
    $ticket_id = (int) $_POST['ticket_id'];
}
$tab = (int) $_POST['tab'];
$arrDetail = $modelTicket->getDetailTicket($ticket_id);
$routeDetail = $modelRoute->detailRoute($arrDetail['tinh_id_start'],$arrDetail['tinh_id_end']);
 $arrServiceTicket = $modelTicket->getServiceTicket($ticket_id);  
?>
<div class="modal-dialog">
    <?php //var_dump($arrDetail);?>
    <div class="modal-content">
      <div class="modal-body">
        <div class="popup_detail">
    <div class="wrap-popup">
        <a href="#" class="close-popup" data-dismiss="modal"></a>
        <div class="title-detail">
            <h1><?php echo ($lang=="vi") ? "Chi tiết vé" : "Check your details"; ?> : <span>
                <?php 
                 if($tab==1){ 
                     echo ($lang=="vi") ? "Chiều đi" : "Onward Trip"; 
                 }else{ 
                    echo ($lang=="vi") ? "Chiều về" : "Return Trip"; 
                 } 
                 ?>
            </span></h1>            
        </div>
        <div class="left detail-a">
            <h1 class="bg-x"><span><?php echo ($lang=="vi") ? "Chi tiết" : "Detail"; ?></span></h1>
            <div class="ab-dd">
                <ul class="right">
                    <?php if(!empty($arrServiceTicket)) { 
                            foreach ($arrServiceTicket as $ser) {         
                                                                    
                            if($ser==1) $classIcon = "icon-nuoc";
                            elseif($ser==2) $classIcon = "icon-wifi";
                            elseif($ser==3) $classIcon = "icon-khan";
                            elseif($ser==4) $classIcon = "icon-chan";
                            elseif($ser==5) $classIcon = "icon-wc";
                        ?>
                        <li><i  data-toggle="tooltip" title="<?php echo $modelService->getServiceNameByID($ser,$lang); ?>" class="<?php echo $classIcon; ?>"></i></li>
                        <?php }}?>
                </ul>
                <h1><?php echo $routeDetail['route_name_'.$lang]; ?></h1>
                <div class="clear"></div>
            </div>
            <div class="abc-dkh"><b><?php echo ($lang=="vi") ? "Điểm khởi hành" : "Depart"; ?>:</b>
                <?php echo $modelPlace->getPlaceNameByID($arrDetail['place_id_start'],$lang); ?> (<?php echo $modelPlace->getAddressByID($arrDetail['place_id_start'],$lang); ?>)<a href="#" class="right">(<?php echo ($lang=="vi") ? "Xem bản đồ" : "View on map"; ?>)</a></div>
            <div class="abc-dkh"><b><?php echo ($lang=="vi") ? "Điểm đến" : "Arrive"; ?>:</b>
                <?php echo $modelPlace->getPlaceNameByID($arrDetail['place_id_end'],$lang); ?> (<?php echo $modelPlace->getAddressByID($arrDetail['place_id_end'],$lang); ?>)<a href="#" class="right">(<?php echo ($lang=="vi") ? "Xem bản đồ" : "View on map"; ?>)</a></div>
            <div class="type-ticket" id="time_popup_<?php echo $arrDetail['ticket_id']; ?>">
                <p><?php echo ($lang=="vi") ? "Chọn thời gian khởi hành trước khi mua vé" : "Choose your departure time before booking tickets"; ?>*</p>
                <ul>
                    <?php $arrTimeTicket = $modelTicket->getTimeTicket($arrDetail['ticket_id']); 

                    ?>
                    <?php if(!empty($arrTimeTicket)) { 
                        foreach ($arrTimeTicket as $time) {                                                   
                        
                    ?>
                    <li><a href="javascript:void(0)" data-value="<?php echo $time; ?>"><?php echo $modelTime->getTimeByID($time);?></a></li>
                    <?php } }?>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="left abc-sche">
                <h1>SCHEDULE:</h1>
                <div class="dd-point">
                    <p style="text-align:center"><?php echo $arrDetail['duration']; ?></p>
                    <div class="line-dd"></div>
                    <?php for($i=1;$i<=$arrDetail['stop']; $i++){                        ?>
                    <span class="point point-<?php echo $i; ?>"></span>
                    <?php } ?>                    
                    <p><?php echo $arrDetail['stop']; ?> <?php echo ($lang=="vi") ? "trạm dừng" : "bus-stop"; ?> </p>
                </div>
            </div>
            <div class="right abc-sche">
                <h1><?php echo ($lang=="vi") ? "GIÁ" : "PRICE"; ?>:</h1>
                <div class="abc-price">
                    <span><?php echo number_format($arrDetail['price']); ?><span>VNĐ</span></span>
                </div>
            </div>
        </div>
        <div class="right option-a">
            <h1 class="bg-x"><span><?php echo ($lang=="vi") ? "Ghi chú" : "Notes"; ?></span></h1>         
            <div class="ab-dd">
                <p><?php echo ($lang=="vi") ? "Quý khách có thể thanh toán bằng các hình thức sau:" : "Quý khách có thể thanh toán bằng các hình thức sau:"; ?> </p>
            </div>
            <div style="padding-left:20px;text-align:justify;font-weight:bold">
            <ul>
                <li style="list-style-type: circle;margin:left:15px">
                    Đặt chỗ v&agrave; thanh to&aacute;n ngay&nbsp;</li>
                <li style="list-style-type: circle;margin:left:15px">
                    Thanh to&aacute;n quốc tế: &nbsp;VISA, MasterCard.</li>
                <li style="list-style-type: circle;margin:left:15px">
                    Internet banking</li>
                <li style="list-style-type: circle;margin:left:15px">
                    Giao v&eacute; tận nơi</li>
                <li style="list-style-type: circle;margin:left:15px">
                    Chủ thẻ c&oacute; thể thanh to&aacute;n cho bản th&acirc;n hoặc cho người kh&aacute;c.</li>
                <li style="list-style-type: circle;margin:left:15px">
                    Kh&aacute;ch h&agrave;ng c&oacute; mặt tại trạm khởi h&agrave;nh trước 15p để nhận v&eacute;. Trong trường hợp trễ thời gian quy định tr&ecirc;n Onbus sẽ đảm bảo cho kh&aacute;ch h&agrave;ng c&oacute; chỗ cho chuyến xe c&oacute; thời gian gần nhất tiếp theo.</li>
            </ul>

            </div>
        </div>
        <div class="clear"></div>    
    </div>
</div>
      </div>
    </div>
  </div>
<script type="text/javascript">

$('.type-ticket ul li a').unbind( "click" ).bind("click",function(){
    var _this = $(this);
    var value = _this.attr('data-value');
    $('#time_<?php echo $ticket_id; ?>').find('ul').find('li a').removeClass('active');
    $('#time_<?php echo $ticket_id; ?>').find('ul').find('li a[data-value="'+value+'"]').addClass('active');

    _this.parents('ul').find('li a').removeClass('active');
    if(_this.hasClass('active')){
        _this.removeClass('active');
    }else{
        _this.addClass('active');
    }
    return false;
});  

</script>