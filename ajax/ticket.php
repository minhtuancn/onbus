<?php 
include "../defined.php"; 
$lang = "vi";
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
$vstart = $vend = $dstart = $dend = -1;
$car = $service = ""; 
$page_show = 5;
$limit = 10;
$page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
$offset = $limit * ($page - 1);
if(isset($_POST['type'])){
    $type = (int) $_POST['type'];
    $link.="type=".$type;
}
if(isset($_POST['vstart'])){
    $vstart = (int) $_POST['vstart'];
    $link.="&vstart=".$vstart;
}
if(isset($_POST['vend'])){
    $vend = (int) $_POST['vend'];
    $link.="&vend=".$vend;
}
if(isset($_POST['car']) && trim($_POST['car']!="") && trim($_POST['car']!="Chọn nhà xe")){
    $car = $modelTicket->processData($_POST['car']);
    $link.="&car=".$car;
    $arrCarSearch = explode(',',$car);
}
if(isset($_POST['service']) && trim($_POST['service']!="")){
    $service = $modelTicket->processData($_POST['service']);
    $link.="&service=".rtrim($service,",");
    $arrServiceSearch = explode(',',rtrim($service,","));
}
if(isset($_POST['dstart'])){
    $dstart = $modelTicket->processData($_POST['dstart']);
    $link.="&dstart=".$dstart;
    $dstart = strtotime($dstart) + 3600;
}
if(isset($_POST['dend']) && $type==2){
    $dend = $modelTicket->processData($_POST['dend']);
    $link.="&dend=".$dend;
    $dend = strtotime($dend) + 3600;
}
$arrTicket_end_total = $modelTicket->getListTicketFE($car,$vstart,$vend,$dend,$service,-1,-1);
    $total_page_end = ceil($arrTicket_end_total['total'] / $limit);
    $arrTicket_end = $modelTicket->getListTicketFE($car,$vstart,$vend,$dend,$service,$offset,$limit);
?>

<?php if(!empty($arrTicket_end['data'])){ 
                            foreach($arrTicket_end['data']  as $ticket){
                                $arrServiceTicket = $modelTicket->getServiceTicket($ticket['ticket_id']);                                 
                                 $arrTimeTicket = $modelTicket->getTimeTicket($ticket['ticket_id']);                                 
                            ?>
                            <div class="items">
                            <div class=" infor-tuyen-search">
                                <div class="b-infor">
                                    <div class="img-logo left">
                                        <div data-toggle="tooltip" title="Click để xem hình" class="wrap-slider">
                                        <div class="slider_nx">
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/Du-lich-bui-tren-dao-Binh-Ba_1a.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/img_166x104.png" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/mailinh vanluong.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images.jpg" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/images (1).jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images413681_images337275_anh_tin_Dau_tu_12_ti_mua_them_xe_buyt.JPG" /></a></div>
                                        </div>
                                        </div>
                                        <ul class="icon-tien-ich">
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-wc""></i></li>
                                            <li><i  data-toggle="tooltip" title="Wifi Free" class="icon-wifi""></i></li>
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-ge""></i></li>
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-ta""></i></li>
                                        </ul>
                                        <div class="right rating">
                                            <span>Good: 8.3</span>
                                            <span class="num-rating">(105 rating)</span>
                                        </div>
                                    </div>
                                    <div class="left a-right">
                                        <ul class="list-logo-xe">
                                            <li><a href="#"><?php echo $modelNhaxe->getNhaxeNameByID($ticket['nhaxe_id']); ?></a></li>                                            
                                        </ul>
                                        <div class="clear"></div>
                                        <p><b>DEPART ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_start']); ?></p>
                                        <p><b>ARRIVE ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_end']); ?></p>
                                        <a href="#" class="right show_map" data-url-map="https://dl.dropboxusercontent.com/u/43486987/Hoang/HTML/<?php echo STATIC_URL; ?>/images/map.jpg" data-toggle="modal" data-target="">Xem lộ trình</a>
                                        <div class="type-ticket">
                                        <p>Select time:</p>
                                        <ul>
                                            <?php if(!empty($arrTimeTicket)) { 
                                                foreach ($arrTimeTicket as $time) {                                                   
                                                
                                            ?>
                                            <li><a href="#"><?php echo $modelTime->getTimeByID($time);?></a></li>
                                            <?php }}  ?>                                            
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class=" x-right">
                                <div class="book-btn">
                                    <div class="d-price">
                                        <span><?php echo number_format($ticket['price']); ?><span>VNĐ</span></span>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="#" data-toggle="modal" data-target="#popup_book_ticket" class="btn-muave">book now</a>
                                    <a href="#" class="btn-chitiet"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span>Detail</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>  <!--items-->  
                        <?php } 
                        echo $modelTicket->pagination($page,$page_show,$total_page_end,$link,2);
                         } ?>  
