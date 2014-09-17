<?php 
include("backend/model/Payment.php");
$payment = new Payment();
$payment->setSecureSecret("198BE3F2E8C75A53F38C1C4A5B6DBA27");
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
?>
<div class="wrap_thanks">
	<?php if($error == 0 ) {?>
    <h1>Congratulation !!!</h1>
	<p>Hệ thống xác nhận đơn hàng: <b><?php echo $_SESSION['order_code']; ?></b> 
        của quý khách đã được thanh toán thành công. </p>    
    <?php } else{ ?>
    <h1>Thanh toán không thành công!</h1>
    <p>Hệ thống xác nhận đơn hàng: <b><?php echo $_SESSION['order_code']; ?></b> 
        của quý khách đã được lưu lại để xác nhận sau. </p>    
    <?php } ?>
    <p>Thông tin sẽ được chuyển về email: <a href="#"><?php echo $_SESSION['email']; ?></a></p>
    <p>Chân thành cám ơn quý khách đã sử dụng dịch vụ đặt vé của Onbus.</p>
    <p>Chi tiết vui lòng liên hệ: 00112223344</p>
    <p class="img_thanks"><img src="<?php echo STATIC_URL; ?>/images/bus-grape-icon.png"></p>
</div>
<?php 

$e = $_GET['e'];
if(!isset($_GET['e'])){
	//thanh cong
	if(!empty($_SESSION['bookticket'])){
		$i = 0;
	foreach ($_SESSION['bookticket'] as $key => $value) {  
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
	VALUES (NULL,'$order_code',$amount,$total,'$fullname','$phone','$email',2,$time,1,$is_pay)";
	mysql_query($sql) or die(mysql_error());

	// gui mail
	$tieudethu="ONBUS ticket confirmation";
	$noidungthu = '<div style="width:800px;padding:20px"><div style="float:left"><img src="http://onbus.vn/themes/images/logo2_final.png" width="150px" />
            <div>
            <div>
                <p><strong>Dear Mr/Ms '.$fullname.',</strong></p> 

<p><strong>Your booking with Onbus.vn is confirmed and completed.</strong></p>

<p>Please present either an electronic or paper copy of your ticket attachedbelow upon check-in.</p>

<p>If you experience problems downloading or opening theticket, please click here to install Adobe Reader </p>
<p>Should you need for more information, please contact our hotline: 08 66503399</p>

            </div>    
                <div>
                    <table width="600px">
                        <tr>
                            <td colspan="2" align="center"><h3>BOOKING INFORMATION</h3></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left"><p style="color:blue">General</p></td>
                        </tr>
                        <tr>
                            <td width="200px">Lead Guest:</td>
                            <td>'.$fullname.'</td>
                        </tr>
                        <tr>
                            <td>Special Notes:</td>
                            <td>All special requests are subject to availability upon arrival.</td>
                        </tr>
                        <tr>
                            <td>Promotion code:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total charged:</td>
                            <td> VND '.number_format($total).'</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left"><p style="color:blue">Arrival Ticket</p></td>
                        </tr>
                        <tr>
                            <td width="200px">Bus operator: </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Departure Time:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td>HCM city</td>
                        </tr>
                        <tr>
                            <td>No.of ticket:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Special Notes:</td>
                            <td>All special requests are subject to availability upon arrival.</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left"><p style="color:blue">Return Ticket</p></td>
                        </tr>
                        <tr>
                            <td width="200px">Bus operator:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Return date:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Departure Time:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td>HCM city</td>
                        </tr>
                        <tr>
                            <td>No.of ticket:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Special Notes:</td>
                            <td>All special requests are subject to availability upon arrival.</td>
                        </tr>
                        
                </div>
            
        </div>';

        var_dump($modelTicket->smtpmailer($email, 'lahavafashion2013@gmail.com', 'ONBUS.VN',$tieudethu,$noidungthu));	
	
		session_destroy();
	}
}
?>