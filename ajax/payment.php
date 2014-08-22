<?php 
session_start();
require_once "../backend/model/Db.php";
$model = new Db();

$fullname = $model->processData($_POST['fullname']);
$email = $model->processData($_POST['email']);
$phone = $model->processData($_POST['phone']);
$method = (int) $_POST['payment_card'];
$pickup = (int) $_POST['pickup'];

if($pickup==1){
	$address_pickup = $_POST['address_pickup'];
	$phone_pickup = $_POST['phone_pickup'];
	$note = $_POST['note'];
}
$amount=$total = 0;
if(!empty($_SESSION['bookticket'])){    
    foreach ($_SESSION['bookticket'] as $key => $value) {                   
        $amount+= $value['amount'];        
        $total+=$value['total'];
    }        
}
//get order code
$sql = "SELECT order_code FROM orders ORDER BY order_id DESC limit 0,1";
$rs = mysql_query($sql) or die(mysql_error());
$no = mysql_num_rows($rs);

if($no==0){
	$order_code_new = "OB00001";
}else{
	$row = mysql_fetch_assoc($rs);	
	$order_code = $row['order_code'];	
	$order_code = (int) str_replace('OB',"",$order_code) + 1;
	$code = str_pad($order_code, 5, "0", STR_PAD_LEFT); 
	$order_code_new = "OB".$code;	
}

// luu session
$_SESSION['order_code'] = $order_code_new;
$_SESSION['email'] = $email;
$_SESSION['fullname'] = $fullname;
$_SESSION['phone'] = $phone;
$_SESSION['method_id'] = $method;
// 

if($method==1){
	$address = $model->processData($_POST['address']);
	$phone_contact = $model->processData($_POST['phone_contact']);
	$time = time();
	$sql = "INSERT INTO orders (order_id,order_code,total_amount,total_price,fullname,phone,email,address,phone_contact,status,creation_time,method_id)
	VALUES (NULL,'$order_code_new',$amount,$total,'$fullname','$phone','$email','$address','$phone_contact',2,$time,1)";
	mysql_query($sql) or die(mysql_error());
	$order_id = mysql_insert_id();
}elseif($method== 2){
	include("../backend/model/Payment.php");
$payment = new Payment();
$payment->setSecureSecret("B575ED17E000D6E2BD8634FD0E6B042D");
$payment->setVirtualPaymentUrl("https://migs.mastercard.com.au/vpcpay");


 
$_params= array("vpc_Version" => "1", "vpc_Command" => "pay", "vpc_AccessCode" => "72AD46B6", "vpc_MerchTxnRef" => "$order_code_new".time(),
 "vpc_Merchant" => "test03051980", "vpc_OrderInfo" => "Order infoaaa", "vpc_Amount" => $total, "vpc_Locale" => "vn" ,
 "vpc_Currency" => "VND", "vpc_ReturnURL" => "http://onbus.vn/index.php?mod=thanks", "vpc_BackURL" => "http://onbus.vn/index.php?mod=thanks&e=1");

$payment->redirect($_params);
}elseif($method==3){	

	include("../backend/model/Payment.php");

	$payment = new Payment();
	$payment->setSecureSecret("198BE3F2E8C75A53F38C1C4A5B6DBA27");
	$payment->setVirtualPaymentUrl("https://paymentcert.smartlink.com.vn:8181/vpcpay.do");
	

	$_params= array(
		"vpc_Version" => "1", 
		"vpc_Command" => "pay", 
		"vpc_AccessCode" => "ECAFAB", 
		"vpc_MerchTxnRef" => $order_code_new.time(),
	 	"vpc_Merchant" => "SMLTEST", 
	 	"vpc_OrderInfo" => "Thanh toan cho don hang $order_code_new tai onbus.vn", 
	 	"vpc_Amount" => $total*100, 
	 	"vpc_Locale" => "vn" ,	 	
	 	"vpc_Currency" => "VND", 
	 	"vpc_ReturnURL" => "http://onbus.vn/index.php?mod=thanks", 
	 	"vpc_BackURL" => "http://onbus.vn/index.php?mod=thanks&e=1");	
	$payment->redirect($_params);	
	
}




?>