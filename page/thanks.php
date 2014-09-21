<?php 
//ini_set('display_errors',1);
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
        $amount+= $value['amount'];        
        $total+=$value['total'];
    } 
    $fullname = $_SESSION['fullname'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $method_id = $_SESSION['method_id']; 
    $order_code = $_SESSION['order_code'];

    $time = time();
    $sql = "INSERT INTO orders (order_id,order_code,total_amount,total_price,
        fullname,phone,email,status,creation_time,method_id,is_pay)
    VALUES (NULL,'$order_code',$amount,$total,'$fullname','$phone','$email',2,$time,$method_id,1)";
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
            $time = $value['time'];
            $amount = $value['amount'];
            $type = $value['type'];
            $time=time();
            echo $sql = "INSERT INTO order_detail VALUES(NULL,$order_id,$ticket_id,$time,'$code',$amount,$price,$time,2,$type)";
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

<?php session_destroy(); ?>