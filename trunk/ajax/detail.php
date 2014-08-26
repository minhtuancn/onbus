<?php 
include "../defined.php"; 
$lang = "en";
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

if(isset($_POST['ticket_id'])){
    $ticket_id = (int) $_POST['ticket_id'];
}
$tab = (int) $_POST['tab'];
$arrDetail = $modelTicket->getDetailTicket($ticket_id);
var_dump($arrDetail);
?>
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
            <div class="abc-dkh"><b>{diemkhoihanh}:</b>Chợ Tân Sơn Nhất (Gò Vấp)<a href="#" class="right">(Xem bản đồ)</a></div>
            <div class="abc-dkh"><b>{noiden}:</b>Chợ Tân Sơn Nhất (Gò Vấp)<a href="#" class="right">(Xem bản đồ)</a></div>
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

