<?php 

$url = "../index.php?mod=ticket&act=list";

require_once "../model/Ticket.php";

$model = new Ticket;

$ticket_id = (int) $_POST['ticket_id'];
if($ticket_id>0){
	$old_detail = $model->getDetailTicket($ticket_id);
	$key_all_old = $old_detail['key_all'];		
}

$is_new = (int) $_POST['is_new'];

$update_all = (int) $_POST['update_all'];

$arrSer  = $_POST['services'];

$arrTime = $_POST['time_start'];

$amount = (int) $_POST['amount'];

$car_type = (int) $_POST['car_type'];

$stop = (int) $_POST['stop'];

$tinh_id_start = (int) $_POST['tinh_id_start'];

$tinh_id_end = (int) $_POST['tinh_id_end'];

$place_id_start = (int) $_POST['place_id_start'];

$place_id_end = (int) $_POST['place_id_end'];

$date_start = $_POST['date_start'];

$date_start_update = strtotime($_POST['date_start_update']);

$type = (int) $_POST['type'];

$nhaxe_id = (int) $_POST['nhaxe_id'];

$price = str_replace(",", "", $_POST['price']);

$duration = $model->processData($_POST['duration']);

$note = $model->processData($_POST['note']);

$str_month =  trim($model->processData($_POST['month']));
$key_all = md5(time());	

if($str_month!=''){
	
	$arrMonth = explode(';', $str_month);
	$arrDates = array();
	foreach ($arrMonth as $month) {
		$cur_month = date('m');
		if($month > $cur_month){			
			$numday = date('t',strtotime('01-'.$month.'-'.date('Y')));
			for( $i=1; $i<= $numday; $i++){
		 		$arrDates[]= str_pad($i,2,'0', STR_PAD_LEFT) . "-". str_pad($month,2,'0', STR_PAD_LEFT). "-".date('Y') ; 
		 	} 			
		}elseif($month == $cur_month){
			$numday = date('t');
			$s = (int) date('d');
			for( $i= $s; $i<= $numday; $i++){				
		 		$arrDates[]= str_pad($i,2,'0', STR_PAD_LEFT) . "-".str_pad($month,2,'0', STR_PAD_LEFT). "-".date('Y') ;  
		 	}
		}else{
			$year = date('Y') + 1;
			$numday = date('t',strtotime('01-'.$month.'-'.$year));					
			for( $i=1; $i<= $numday; $i++){
		 		$arrDates[]= str_pad($i,2,'0', STR_PAD_LEFT) . "-". str_pad($month,2,'0', STR_PAD_LEFT). "-".$year ;  
		 	} 
		}
	}	
}else{
	$arrDates = explode(',', $date_start);
}

if($ticket_id > 0) {
	if($update_all ==1 ){
		$sql  = "SELECT ticket_id FROM ticket WHERE key_all = '$key_all_old' ";
		$rs = mysql_query($sql);

		while($row = mysql_fetch_assoc($rs)){
			$ticket_id_update =  $row['ticket_id'];
			$date_start_update = -1;
			$model->updateTicket($ticket_id_update,$nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$date_start_update,$arrSer,$arrTime);
		}
		
	}else{ 
		$model->updateTicket($ticket_id,$nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$date_start_update,$arrSer,$arrTime);
	}
	header('location:'.$url);

}else{

	if($is_new == 0){

		$model->insertTicket($nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$arrSer,$arrTime,$arrDates,$key_all,$str_month);

		header('location:'.$url);

	}

}



?>