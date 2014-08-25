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
    $dstart = strtotime($dstart);
}
if(isset($_POST['dend'])){
    $dend = $modelTicket->processData($_POST['dend']);
    $link.="&dend=".$dend;
    $dend = strtotime($dend);
}
$tab = (int) $_POST['tab'];
if($tab==1){
$arrTicket_start_total = $modelTicket->getListTicketFE($car,$vstart,$vend,$dstart,$service,-1,-1);
$total_page = ceil($arrTicket_start_total['total'] / $limit);
$arrTicket_end = $modelTicket->getListTicketFE($car,$vstart,$vend,$dstart,$service,$offset,$limit);
}else{
    $arrTicket_end_total = $modelTicket->getListTicketFE($car,$vend,$vstart,$dend,$service,-1,-1);
    $total_page = ceil($arrTicket_end_total['total'] / $limit);
    $arrTicket_end = $modelTicket->getListTicketFE($car,$vend,$vstart,$dend,$service,$offset,$limit);
}
?>

<?php if(!empty($arrTicket_end['data'])){ 
                            foreach($arrTicket_end['data']  as $ticket){
                                $arrServiceTicket = $modelTicket->getServiceTicket($ticket['ticket_id']);                                 
                                 $arrTimeTicket = $modelTicket->getTimeTicket($ticket['ticket_id']);
                                 $arrDetailNhaxe = $modelNhaxe->getDetailNhaxe($ticket['nhaxe_id']);                                 
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
                <div class="rate sprite-rating_s rating_s">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="left a-right">
                <ul class="list-logo-xe">
                    <li><a href="#"><img src="<?php echo $arrDetailNhaxe['image_url']; ?>" style="height:30px" alt="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>" title="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>"/></a>
                        <span><?php echo $arrDetailNhaxe['nhaxe_name_'.$lang]; ?></span>
                    </li>                                            
                </ul>
                <div class="clear"></div>
                <p><b>DEPART ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_start']); ?></p>
                <p><b>ARRIVE ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_end']); ?></p>
                <a href="#" class="right show_map" data-url-map="https://dl.dropboxusercontent.com/u/43486987/Hoang/HTML/<?php echo STATIC_URL; ?>/images/map.jpg" data-toggle="modal" data-target="">{xemlotrinh}</a>
                <div class="type-ticket" id="time_<?php echo $ticket['ticket_id']; ?>">
                <p>Select time:</p>
                <ul>
                    <?php if(!empty($arrTimeTicket)) { 
                        foreach ($arrTimeTicket as $time) {                                                   
                        
                    ?>
                    <li><a href="javascript:void(0)" data-original-title="" title=""><?php echo $modelTime->getTimeByID($time);?></a></li>
                    <?php }}  ?>                                            
                </ul>
                <p class="error_time" id="error_time_<?php echo $ticket['ticket_id']; ?>" style="display:none;padding-top:10px;color:red;font-style:italic">Vui lòng chọn giờ khởi hành trước khi đặt vé.</p>
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
            <a href="javascript:void(0)" data-value="<?php echo $ticket['ticket_id']; ?>" data-toggle="modal" data-target="#popup_book_ticket" class="btn-muave">book now</a>
            <a href="#" class="btn-chitiet"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span>Detail</a>
        </div>
    </div>
    <div class="clear"></div>
</div>  <!--items-->  
<?php } 
echo $modelTicket->pagination($page,$page_show,$total_page,$link,2);
 } ?>  
<script type="text/javascript">
$(function(){
    $('.type-ticket ul li a').unbind( "click" ).bind("click",function(){
        var _this = $(this);
        _this.parents('ul').find('li a').removeClass('active');
        if(_this.hasClass('active')){
            _this.removeClass('active');
        }else{
            _this.addClass('active');
        }
        return false;
    });     
});
$('.btn-muave').unbind( "click" ).bind("click",function(){
    var ticket_id = $(this).attr('data-value');
    var check_time = $('#time_' + ticket_id).find('a.active').length;
    if(check_time==0){
        $('#error_time_' + ticket_id).show();
        return false;
    }else{
        $('#error_time_' + ticket_id).hide();
        return true;
    }

});
$('.t-pagination a').unbind( "click" ).bind("click",function(){
    var tab = $('#tab').val();
    var page = $(this).attr('attr-value');
    if(tab==1){
        $.ajax({
            url: "ajax/ticket.php",
            type: "POST",
            async: false,                 
            data: {
                "vstart":$('#vstart').val(),
                "vend":$('#vend').val(),'dstart':$('#dstart').val(),
                'dend':$('#dend').val(),'car':$('#str_car').val(),'service':$('#str_service').val(),'tab' : 1,'page':page},
            success: function(data){
                $('#vechieudi').html(data);
            }
        });
    }else{
        $.ajax({
            url: "ajax/ticket.php",
            type: "POST",
            async: false,                 
            data: {"vstart":$('#vstart').val(),"vend":$('#vend').val(),'dstart':$('#dstart').val(),
            'dend':$('#dend').val(),'car':$('#str_car').val(),'service':$('#str_service').val(),'tab':2,'page':page},
            success: function(data){
                $('#vechieuve').html(data);
            }
        });
    }
 });
</script>