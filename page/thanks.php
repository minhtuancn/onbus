<?php 
include("backend/model/Payment.php");
$method_id = $_SESSION['method_id'];
if($method_id > 1){
    $payment = new Payment();
    if($method_id==3){
    $payment->setSecureSecret("198BE3F2E8C75A53F38C1C4A5B6DBA27");
    }else{
        $payment->setSecureSecret("B575ED17E000D6E2BD8634FD0E6B042D");
    }
    $payment->checkSum($_GET);
    $error = 0;
    if ($payment->isEmptySecureSecret()) {
        $error = 1;
    } else {
        if ($payment->isValidSecureHash()) {
            $error = 0;
        } else {
            $error = 1;
        }
    }

    $txnResponseCode = $payment->getParameter("vpc_TxnResponseCode");

    // Show this page as an error page if vpc_TxnResponseCode doesn't exist or doesn't equals '0'
    if ($txnResponseCode != "0" || $txnResponseCode == "No Value Returned" || !$payment->isValidSecureHash()) {
        $error = 1;
    }
    $is_pay = $error == 0 ? 1 : 0;
}
if($method_id == 1 ) $error = 0;
$arrCode = $_SESSION['mave'];
?>
<?php 
if($error == 0 && $method_id > 1){
    $arrTicket = $_SESSION['bookticket'];
    //thanh cong
    if(!empty($arrTicket)){
        $i = 0;
    foreach ($arrTicket as $key => $value) {  
        $i++;
        if($i==1){
            $vedi = $value['ticket_id'];
        }if($i==2){
            $veve = $value['ticket_id'];
        }    
    }

    $amount = $_SESSION['total_amount'];
    $total = $_SESSION['total_price'];
    $total_pay = $_SESSION['pay'];

    $discount = $_SESSION['discount'];
    $code_id = $_SESSION['code_id'];

    $fullname = $_SESSION['fullname'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $method_id = $_SESSION['method_id']; 
    $order_code = $_SESSION['order_code'];

    $time = time();
    $sql = "INSERT INTO orders (order_id,order_code,total_amount,total_price,
        fullname,phone,email,status,creation_time,method_id,is_pay,discount,code_id,total_pay)
    VALUES (NULL,'$order_code',$amount,$total,'$fullname','$phone','$email',2,$time,$method_id,1,'$discount',$code_id,$total_pay)";
    mysql_query($sql) or die(mysql_error());
    $order_id = mysql_insert_id();
    if($order_id > 0){
        $i = 0;
        foreach ($arrTicket as $key => $value) {            
            $i++;
            $ticket_id = $value['ticket_id'];
            $detail = $model->getDetailTicket($ticket_id);
            $code = $detail['code'];
            $arrCode[$i] = $code;
            $price = $value['price'];
            $time_id = $value['time'];
            $amount = $value['amount'];
            $type = $value['type'];
            $time=time();
            $sql = "INSERT INTO order_detail VALUES(NULL,$order_id,$ticket_id,$time_id,'$code',$amount,$price,$time,2,$type)";
            mysql_query($sql) or die(mysql_error());
        }
    }
    $_SESSION['mave'] = $arrCode;
        
    }//if not empty
   
   // session_destroy();
}//if
?>
<div class="wrap_thanks">
    <div style="width:600px;text-align:left;margin:auto;">
	<?php if($error == 0 ) {?>
        <h1><?php echo $lang=='vi' ? "Chúc mừng bạn!!!" : "Congratulation!!!"?></h1>
    	<?php if($lang=='vi') { ?>
        <p>Hệ thống xác nhận đơn hàng: <b><?php echo $_SESSION['order_code']; ?></b> 
            của quý khách đã được thanh toán thành công. </p>    
            <p style="margin-bottom:20px;margin-top:15px">Mã vé của quý khách là : <br />

                <?php if(!empty($arrCode)){
                $count = 0; 
foreach ($arrCode as $mave) {
    $count++;
    ?>
        <?php echo $count; ?>. <?php echo $mave; ?><br />
    <?php
        }
                    ?>
                    
                <?php } ?>
            </p>
        <p>
            <?php }else{ ?>
        Our system confirm your approval successful. Your code is : <b><?php echo $_SESSION['order_code']; ?></b></p>    
         <p style="margin-bottom:20px;margin-top:15px">Ticket code : <br />

                <?php if(!empty($arrCode)){
                $count = 0; 
    foreach ($arrCode as $mave) {
    $count++;
    ?>
        <?php echo $count; ?>. <?php echo $mave; ?><br />
    <?php
        }
                    ?>
                    
                <?php } ?>
            </p>

        <?php } ?>
        <p><?php echo $lang=='vi' ? "Thông tin sẽ được chuyển về email" : "The information will send to email"?>: <a href="#"><?php echo $_SESSION['email']; ?></a></p>
    <p><?php echo $lang=="vi" ? "Chân thành cám ơn quý khách đã sử dụng dịch vụ đặt vé của Onbus." : "Thank you for using Onbus service."; ?></p>
    <?php } else{ ?>
        <?php if($lang=='vi') { ?>
        <h1>Thanh toán không thành công!</h1>
        <p>Hệ thống không thể xác nhận đơn hàng.Vui lòng kiểm tra lại thông tin thanh toán của quý khách. </p>    
        <?php }else{ ?>
        <h1>Payment unsuccessful!</h1>
        <p>Our system can not confirm your ticket order.Please check your payment information again. </p>    
        <?php } ?>
    <?php } ?>

    
    <p><?php echo $lang=="vi" ? "Chi tiết vui lòng liên hệ" : "Hotline"; ?>: 08 6650 3399</p>
    
</div>
<p class="img_thanks" style="text-align:center"><img src="<?php echo STATIC_URL; ?>/images/bus-grape-icon.png"></p>
</div>
<?php 
// gui mail
var_dump('vedi,<pre>',$_SESSION['bookticket']['di']);
var_dump('vedi,<pre>',$_SESSION['bookticket']['ve']);


$detailTicketdi = $model->getDetailTicket($_SESSION['bookticket']['di']['ticket_id']);
$di_di = $model->getTinhNameByID($detailTicketdi['tinh_id_start'],$lang);
$den_di = $model->getTinhNameByID($detailTicketdi['tinh_id_end'],$lang);

$ngay_di = $lang == "vi" ? date('d-m-Y',$detailTicketdi['date_start']);
$time_di = $model->getTimeByID($_SESSION['bookticket']['di']['time_id']);
$nhaxe_di = $model->getNhaxeNameByID($detailTicketdi['nhaxe_id'],$lang);

if(!empty($_SESSION['bookticket']['ve'])){
    $detailTicketve = $model->getDetailTicket($_SESSION['bookticket']['ve']['ticket_id']);
    $di_ve = $model->getTinhNameByID($detailTicketve['tinh_id_start'],$lang);
    $den_ve = $model->getTinhNameByID($detailTicketve['tinh_id_end'],$lang);
    $ngay_ve = $lang == "vi" ? date('d-m-Y',$detailTicketve['date_start']);
    $time_ve = $model->getTimeByID($_SESSION['bookticket']['ve']['time_id']);
    $nhaxe_ve = $model->getNhaxeNameByID($detailTicketve['nhaxe_id'],$lang);
}
die;
    $tieudethu="ONBUS ticket confirmation";
    $nd1 = $lang=='en' ? '<div style="width:800px;padding:20px"><div style="float:left"><img src="http://onbus.vn/themes/images/logo2_final.png" width="150px" />
            <div>
            <div>
                <p><strong>Dear Mr/Ms ' : '<div style="width:800px;padding:20px"><div style="float:left"><img src="http://onbus.vn/themes/images/logo2_final.png" width="150px" />
            <div>
            <div>
                <p><strong>Quý khách ' ;
    $nd2 = $lang == "en" ? ',</strong></p> 

<p><strong>Congratulation!!</strong></p>
<p>Your booking with Onbus.vn is confirmed and completed.</p>

<p>Please present either an electronic or paper copy of your ticket attachedbelow upon check-in.</p>

<p>Have a good journey,</p>
<p>Onbus Team</p>

            </div>    
                <div>
                    <table width="600px">
                        <tr>
                            <td colspan="2" align="center"><h3>TICKET BOOKING CONFIRMATION</h3></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left"><p style="color:blue">General</p></td>
                        </tr>
                        <tr>
                            <td width="200px">Lead Guest:</td>
                            <td>' : ' thân mến,</strong></p> 

<p><strong>Chúc mừng quý khách đã đặt vé thành công tại website đặt vé xe trực tuyến Onbus.vn.</strong></p>

<p>Thông tin vé của quý khách đã được xác nhận trong file đính kèm.</p>
<p>Quý khách vui lòng giữ lại thông tin trong file đính kèm để xuất trình với nhân viên tại nhà xe để đối chiếu khi nhận vé.</p>
<p>Cần liên hệ hỗ trợ, quý khách vui lòng liên hệ trực tiếp chúng tôi qua hotline: (08) 66503399</p>
<p>Chân thành cảm ơn,</p>
<p>Onbus team</p>

            </div>    
                <div>
                    <table width="600px">
                        <tr>
                            <td colspan="2" align="center"><h3>PHIẾU XÁC NHẬN ĐẶT VÉ</h3></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left"><p style="color:blue">Thông tin hành khách</p></td>
                        </tr>
                        <tr>
                            <td width="200px">Họ và tên:</td>
                            <td>';
    $nd3 = $lang == "en" ? '</td>
                        </tr>                       
                        <tr>
                            <td>Promotion code:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total charged:</td>
                            <td> VND ' :  '</td>
                        </tr>                       
                        <tr>
                            <td>Mã khuyến mãi:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tổng tiền thanh toán:</td>
                            <td> VND ';
    $nd4 = '</td></tr>';
    $nd5=$lang == "en" ? '<tr>
                            <td colspan="2" align="left"><p style="color:blue">Arrival Ticket</p></td>
                        </tr>' : '<tr>
                            <td colspan="2" align="left"><p style="color:blue">Vé chiều đi</p></td>
                        </tr>' ;
                        $nd6=$lang == "en" ? '<tr>
                            <td width="200px">Bus operator: </td>
                            <td>' : '<tr>
                            <td width="200px">Nhà xe: </td>
                            <td>';
$nd7 = $lang == "en" ? '</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>' :'</td>
                        </tr>
                        <tr>
                            <td>Ngày đi:</td>
                            <td>';
    $nd8 = $lang=="en" ? '</td>
                        </tr>
                        <tr>
                            <td>Departure Time:</td>
                            <td>' : '</td>
                        </tr>
                        <tr>
                            <td>Giờ khởi hành:</td>
                            <td>';
    $nd9 = $lang=="en" ?'</td>
                        </tr>
                        <tr>
                            <td>From:</td>
                            <td>' : '</td>
                        </tr>
                        <tr>
                            <td>Điểm xuất phát:</td>
                            <td>';
    $nd10 = $lang== "en" ? '</td>
                        </tr>
                        <tr>
                            <td>To:</td>
                            <td>' : '</td>
                        </tr>
                        <tr>
                            <td>Điểm đến:</td>
                            <td>';

    $nd11 = '</td>
                        </tr>';

$nd12 = $nd13 = $nd14 = $nd15 = $nd16 = $nd17 = $nd18 = '';
    if(count($_SESSION['bookticket']) > 1) {

        $nd12=$lang == "en" ? '<tr>
                            <td colspan="2" align="left"><p style="color:blue">Return Ticket</p></td>
                        </tr>' : '<tr>
                            <td colspan="2" align="left"><p style="color:blue">Vé chiều về</p></td>
                        </tr>' ;
                        $nd13=$lang =="en" ? '<tr>
                            <td width="200px">Bus operator: </td>
                            <td>' : '<tr>
                            <td width="200px">Nhà xe: </td>
                            <td>';
$nd14 = $lang == "en" ? '</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>' :'</td>
                        </tr>
                        <tr>
                            <td>Ngày đi:</td>
                            <td>';
    $nd15 = $lang=="en" ? '</td>
                        </tr>
                        <tr>
                            <td>Departure Time:</td>
                            <td>' : '</td>
                        </tr>
                        <tr>
                            <td>Giờ khởi hành:</td>
                            <td>';
    $nd16 = $lang=="en" ?'</td>
                        </tr>
                        <tr>
                            <td>From:</td>
                            <td>' : '</td>
                        </tr>
                        <tr>
                            <td>Điểm xuất phát:</td>
                            <td>';
    $nd17 = $lang== "en" ? '</td>
                        </tr>
                        <tr>
                            <td>To:</td>
                            <td>' : '</td>
                        </tr>
                        <tr>
                            <td>Điểm đến:</td>
                            <td>';

    $nd18 = '</td>
                        </tr>';

    }

                        $nd19.='                                          
                        </table>
                </div>
            
        </div>';
    $noidungthu = $nd1.$fullname.$nd2.$fullname.$nd3.number_format($_SESSION['pay']).$nd4.$nd5.$nd6.$nhaxe_di.$nd7;
    $noidungthu.= $ngay_di.$nd8.$time_di;
    $noidungthu.= $nd9.$di_di.$nd10.$den_di.$nd11.$nd12.$nd13.$nhaxe_ve.$nd14.$ngay_ve.$nd15.$time_ve.$nd16.$di_ve.$nd17.$den_ve.$nd18.$nd19;

var_dump("<pre>",$noidungthu);die;
        $model->smtpmailer($email, 'onbusvn@gmail.com', 'ONBUS.VN',$tieudethu,$noidungthu); 
?>
<?php session_destroy(); ?>