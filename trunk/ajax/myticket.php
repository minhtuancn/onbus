<?php 
include "../defined.php"; 
if(!isset($_SESSION)){
    session_start();
}
$lang = $_SESSION['lang'];
require_once "../backend/model/Home.php";

$model = new Home;

$phone = isset($_POST['phone']) ? $model->processData($_POST['phone']) : "";
$code = isset($_POST['code']) ? $model->processData($_POST['code']) : "";
$arrReturn  = $model->getInfoTicket($phone, $code);
$arrOrder = $arrReturn['arrOrder'];
$arrDetail = $arrReturn['arrDetail'];
$sove = count($arrDetail);
?>
<a href="#" class="close-popup" data-dismiss="modal"></a>
<?php if(empty($arrOrder)){?>
    <div class="box_myticket left">
    <h1><?php echo $lang=="vi" ? "Không tìm thấy thông tin." : "Not found data."; ?></h1>
    </div>
<?php }else{ ?>
<div class="box_myticket left">
    <h1><?php echo $lang=="vi" ? "Thông tin khách hàng" : "Customer information"?></h1>
    <ul>
        <li>
            <span class="bg_full"><?php echo $lang=="vi" ? "Tên khách hàng" : "Full name"; ?></span>
            <span><?php echo $arrOrder['fullname']; ?></span>
        </li>
        <li>
            <span class="bg_full">Email</span>
            <span><?php echo $arrOrder['email']; ?></span>
        </li>
        <li>
            <span class="bg_full"><?php echo $lang=="vi" ? "Số điện thoại" : "Phone number"; ?></span>
            <span><?php echo $arrOrder['phone']; ?></span>
        </li>
    </ul>
</div>
<div class="box_myticket left logo">
    <a class="logo_contact" href="#"><img src="<?php echo STATIC_URL; ?>/images/logo2_final.png" width="250"></a>
</div>
<div class="clear"></div>
<div class="box_myticket left">
    <?php $detailTicketdi = $model->getDetailTicket($arrDetail[1]['ticket_id']); ?>
    <h1><?php if($sove > 1){ ?>
        <?php echo $lang=="vi" ? "Vé chiều đi" : "One way ticket"; ?>
         <?php } ?><p><?php echo $model->getTinhNameByID($detailTicketdi['tinh_id_start'],$lang)?> - <?php echo $model->getTinhNameByID($detailTicketdi['tinh_id_end'],$lang)?> - <?php echo $lang=="vi" ? "Số lượng" : "Quantity"; ?>: <?php echo $arrDetail[1]['amount']; ?></p></h1>
    
    <ul>
    <li>
            <span class="bg_full"><?php echo $lang=="vi" ? "Mã vé" : "Code Ticket"; ?></span>
            <span><?php echo $arrDetail[1]['code']; ?></span>
        </li>
    <li>
        <span class="bg_full"><?php echo $lang=="vi" ? "Điểm khởi hành" : "From"; ?></span>
        <span><?php echo $model->getPlaceNameByID($detailTicketdi['place_id_start'],$lang); ?></span>
    </li>
    <li>
        <span class="bg_full"><?php echo $lang=="vi" ? "Điểm đến" : "To"; ?></span>
        <span><?php echo $model->getPlaceNameByID($detailTicketdi['place_id_end'],$lang); ?></span>
    </li>
    <li>
            <span class="bg_full"><?php echo $lang=="vi" ? "Ngày & Giờ khởi hành" : "Date and Time"; ?></span>
            <span>
                <?php if($lang=='vi'){ 
                    echo date('M d Y',$detailTicketdi['date_start']); 
                }else{ 
                    echo date('d-m-Y',$detailTicketdi['date_start']); 
                } ?>
                <?php echo $model->getTimeByID($arrDetail[1]['time_id']); ?>
            </span>
        </li>   
    </ul>
    <div id="newsletter-signup-button" class="submit-form left"><span class="label">
        <?php echo $lang=="vi" ? "Hủy vé" : "Cancellation"; ?></span></div>
</div>
<?php if($sove > 1) { ?>
<div class="box_myticket left">
    <?php $detailTicketve = $model->getDetailTicket($arrDetail[2]['ticket_id']); ?>
    <h1><?php echo $lang=="vi" ? "Vé chiều về" : "Round trip ticket"; ?><p>
        <?php echo $model->getTinhNameByID($detailTicketve['tinh_id_start'],$lang)?> - 
        <?php echo $model->getTinhNameByID($detailTicketve['tinh_id_end'],$lang)?> - <?php echo $lang=="vi" ? "Số lượng" : "Quantity"; ?>: <?php echo $arrDetail[2]['amount']; ?></p></h1>
    
    <ul>
    <li>
            <span class="bg_full"><?php echo $lang=="vi" ? "Mã vé" : "Code Ticket"; ?></span>
            <span><?php echo $arrDetail[2]['code']; ?></span>
        </li>
    <li>
        <span class="bg_full"><?php echo $lang=="vi" ? "Điểm khởi hành" : "From"; ?></span>
        <span><?php echo $model->getPlaceNameByID($detailTicketve['place_id_start'],$lang); ?></span>
    </li>
    <li>
        <span class="bg_full"><?php echo $lang=="vi" ? "Điểm đến" : "To"; ?></span>
        <span><?php echo $model->getPlaceNameByID($detailTicketve['place_id_end'],$lang); ?></span>
    </li>
    <li>
            <span class="bg_full"><?php echo $lang=="vi" ? "Ngày & Giờ khởi hành" : "Date and Time"; ?></span>
            <span>
                <?php if($lang=='vi'){ 
                    echo date('M d Y',$detailTicketve['date_start']); 
                }else{ 
                    echo date('d-m-Y',$detailTicketve['date_start']); 
                } ?>
                <?php echo $model->getTimeByID($arrDetail[2]['time_id']); ?>
            </span>
        </li>   
    </ul>
</div>
<?php } ?>
<?php } ?>
<div class="clear"></div>   