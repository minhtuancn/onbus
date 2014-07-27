<?php
require_once "Db.php";

class Ticket extends Db {

    function getDetailTicket($id) {
        $sql = "SELECT * FROM ticket WHERE ticket_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }   

    function getListTicket($nhaxe_id=-1,$keyword='',$place_id_start=-1,$place_id_end=-1,$offset = -1, $limit = -1) {
        $arrResult = array();
        try{
            $sql = "SELECT * FROM ticket WHERE status > 0 
            AND (nhaxe_id = $nhaxe_id OR $nhaxe_id = -1 ) AND (place_id_start = $place_id_start OR $place_id_start = -1)
            AND (place_id_end = $place_id_end OR $place_id_end = -1) ";
            if(trim($keyword)!=''){
                $sql.= " AND ticket_name_vi LIKE '%".$keyword."%' "; 
            }
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

    function updateTicket($ticket_id,$nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$date_start,$date_end) {        
        $time = time();
        try{
        $sql = "UPDATE ticket
                    SET nhaxe_id = $nhaxe_id,
                    tinh_id_start = $tinh_id_start,
                    tinh_id_end = $tinh_id_end,
                    price = '$price',
                    type  = '$type',
                    duration = '$duration',
                    amount =  $amount,
                    car_type = '$car_type',
                    stop =  $stop,
                    note =  '$note',
                    date_start = $date_start,
                    date_end = $date_end
                    WHERE ticket_id = $ticket_id ";
        mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Ticket','function' => 'updateTicket' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }
    function insertTicket($nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,$price,$type,$duration,$amount,$car_type,$stop,$note,$date_start,$date_end){
        try{
            $time = time();
            $sql = "INSERT INTO ticket VALUES(NULL,$nhaxe_id,$tinh_id_start,$tinh_id_end,$place_id_start,$place_id_end,'$price',$type,'$duration',
                $amount,$car_type,$stop,'$note','$date_start','$date_end',$time,$time,1)";        
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());              
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Ticket','function' => 'insertTicket' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>