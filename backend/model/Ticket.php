<?php
require_once "Db.php";
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
class Ticket extends Db {

    function getDetailTicket($id) {
        $sql = "SELECT * FROM ticket WHERE ticket_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }

    function getTimeTicket($ticket_id){
        $arrResult = array();
        $sql = "SELECT * FROM time_ticket WHERE ticket_id = $ticket_id";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
                $arrResult[] = $row['time_id']; 
        }
        return $arrResult;
    }  
    function getServiceTicket($ticket_id){
        $arrResult = array();
        $sql = "SELECT * FROM service_ticket WHERE ticket_id = $ticket_id";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
                $arrResult[] = $row['service_id']; 
        }
        return $arrResult;
    } 

    function getListTicket($nhaxe_id=-1,$tinh_id_start=-1,$tinh_id_end=-1,$date_start=-1,$offset = -1, $limit = -1) {
        $arrResult = array();
        try{
            $sql = "SELECT * FROM ticket WHERE status > 0 
            AND (nhaxe_id = $nhaxe_id OR $nhaxe_id = -1 ) AND (tinh_id_start = $tinh_id_start OR $tinh_id_start = -1)
            AND (tinh_id_end = $tinh_id_end OR $tinh_id_end = -1)  AND (date_start = $date_start OR $date_start = -1)  ORDER BY update_time DESC ";            
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";  
            
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());  
            while($row = mysql_fetch_assoc($rs)){
                $arrResult['data'][] = $row; 
            }
            $arrResult['total'] = mysql_num_rows($rs);

        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Ticket','function' => 'getListTicket' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
        
        return $arrResult;
    }    
    function updateStatus($id,$status) {        
        $time = time();
        $sql = "UPDATE ticket
                    SET status = $status,                 
                    update_time =  $time         
                    WHERE ticket_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

    function updateTicket($ticket_id,$nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$date_start,$arrSer,$arrTime) {        
        $time = time(); 
        $user_id = $_SESSION['user_id'];               
        try{
            $sql = "UPDATE ticket
                        SET nhaxe_id = $nhaxe_id,
                        tinh_id_start = $tinh_id_start,
                        tinh_id_end = $tinh_id_end,
                        place_id_start = $place_id_start,
                        place_id_end = $place_id_end,
                        price = '$price',
                        type  = '$type',
                        duration = '$duration',
                        amount =  $amount,
                        car_type = '$car_type',
                        stop =  $stop,
                        note =  '$note',
                        date_start = $date_start,
                        user_id = $user_id                      
                        WHERE ticket_id = $ticket_id ";
            mysql_query($sql) or $this->throw_ex(mysql_error());  

            if(!empty($arrTime)){
                foreach ($arrTime as $time_id) {
                    $this->insertTimeTicket($ticket_id,$time_id);
                }
            }else{
                $this->deleteTimeTicket($ticket_id);
            }   
            if(!empty($arrSer)){
                foreach ($arrSer as $service_id) {
                    $this->insertServiceTicket($ticket_id,$service_id);
                }
            }else{
                $this->deleteServiceTicket($ticket_id);
            }    
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Ticket','function' => 'updateTicket' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }

            
    }
    function insertTicket($nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$arrSer,$arrTime,$arrDates){        
        $user_id = $_SESSION['user_id'];
        if(!empty($arrDates)){
            foreach ($arrDates as $datestart) {
                $date_start = strtotime($datestart);
                try{
                    $time = time();
                    $sql = "INSERT INTO ticket VALUES(NULL,$nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,
                        '$price',$type,'$duration',
                        $amount,$car_type,$stop,'$note','$date_start',$time,$time,1,$user_id)";        
                    $rs = mysql_query($sql) or $this->throw_ex(mysql_error());  
                    $ticket_id = mysql_insert_id();
                    if(!empty($arrTime)){
                        foreach ($arrTime as $time_id) {
                            $this->insertTimeTicket($ticket_id,$time_id);
                        }
                    } 
                    if(!empty($arrSer)){
                        foreach ($arrSer as $service_id) {
                            $this->insertServiceTicket($ticket_id,$service_id);
                        }
                    }    
                }catch(Exception $ex){            
                    $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Ticket','function' => 'insertTicket' , 'error'=>$ex->getMessage(),'sql'=>$sql);
                    $this->logError($arrLog);
                }
            }
        }
    }    

    function deleteTimeTicket($ticket_id){
        $sql = "DELETE FROM time_ticket WHERE ticket_id = $ticket_id ";
        mysql_query($sql);
    }

    function insertTimeTicket($ticket_id,$time_id){
        $sql = "INSERT into time_ticket VALUES($ticket_id,$time_id)";
        mysql_query($sql);
    }

    function deleteServiceTicket($ticket_id){
        $sql = "DELETE FROM service_ticket WHERE ticket_id = $ticket_id ";
        mysql_query($sql);
    }

    function insertServiceTicket($ticket_id,$service_id){
        $sql = "INSERT into service_ticket VALUES($ticket_id,$service_id)";
        mysql_query($sql);
    }

}

?>