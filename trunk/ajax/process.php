<?php 
require_once '../backend/model/Home.php';
$model = new Home;

$arrMod = array("newsletter","feedback",'code','myticket');

$mod = isset($_POST['mod']) ? $model->processData($_POST['mod']) : "";

if(in_array($mod,$arrMod)){
	if($mod=="myticket"){
		$phone = isset($_POST['phone']) ? $model->processData($_POST['phone']) : "";
		$code = isset($_POST['code']) ? $model->processData($_POST['code']) : "";
		if($phone!='' && $code!=''){
			$result = $model->getInfoTicket($phone,$code);
		}
	}
	if($mod=="newsletter"){
		$email = isset($_POST['email']) ? $model->processData($_POST['email']) : "";
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
		  echo "Email của quý khách không hợp lệ!"; exit();
		}else{
			$return = $model->checkemailexist($email);
			if($return == "1"){
					$model->insertemailnewsletter($email);
					echo "Đăng ký thành công.";
			}else{
				echo "Email đã được đăng ký trước đó.";exit();
			}
		}
	}
	if($mod=="feedback"){
		$email = isset($_POST['email']) ? $model->processData($_POST['email']) : "";
		$mobile = isset($_POST['mobile']) ? $model->processData($_POST['mobile']) : "";
		$content = isset($_POST['content']) ? $model->processData($_POST['content']) : "";
		if($email=='' || $mobile == '' || $content==''){
			echo "Quý khách cần nhập đầy đủ thông tin.";exit();
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
			  echo "Email không hợp lệ!"; exit();
			}else{
				
				$model->insertFeedback($email,$mobile,$content);
				echo "Gửi feedback thành công.";exit();
				
			}
		}
	}

	if($mod=='datphong'){
		$arrData['fullname'] = isset($_POST['fullname']) ? $model->processData($_POST['fullname']) : "";
		$arrData['phone_number'] = isset($_POST['phone_number']) ? $model->processData($_POST['phone_number']) : "";
		$arrData['ngay_di'] = isset($_POST['ngay_di']) ? $_POST['ngay_di'] : "";
		$arrData['ngay_den'] = isset($_POST['ngay_den']) ? $_POST['ngay_den'] : "";
		$arrData['nguoilon'] = isset($_POST['nguoilon']) ? (int) $_POST['nguoilon'] : 0;
		$arrData['treem'] = isset($_POST['treem']) ? (int) $_POST['treem'] : 0;
		if($arrData['fullname'] != '' && $arrData['phone_number']!='' && $arrData['ngay_den']!='' && $arrData['ngay_di']!=''){
			$model->datphong($arrData);
			echo "Cảm ơn quý khách đã đặt phòng. Chúng tôi sẽ liên hệ lại với quý khách trong thời gian sớm nhất.";
		}else{
			echo "Quý khách cần nhập đầy đủ thông tin.";exit();
		}		
	}

}else{
	echo "Stop here!";
	exit();
}	
?>