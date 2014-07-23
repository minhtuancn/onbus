<?php
require_once "Db.php";

class Services extends Db {

    function getDetailService($id) {
        $sql = "SELECT * FROM services WHERE service_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
   

    function getListServiceByStatus($status=-1,$offset = -1, $limit = -1) {
        $sql = "SELECT * FROM services WHERE (status = $status OR $status = -1)  AND status > 0 ";
        if ($limit > 0 && $offset >= 0)
            $sql .= " LIMIT $offset,$limit";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }    
    function updateStatus($id,$status) {        
        $time = time();
        $sql = "UPDATE services
                    SET status = $status,                 
                    update_time =  $time         
                    WHERE service_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

    function updateService($id,$service_name_vi,$service_name_en,$service_name_safe_vi,$service_name_safe_en) {        
        $time = time();
        $sql = "UPDATE services
                    SET service_name_vi = '$service_name_vi',
                    service_name_en = '$service_name_en',
                    service_name_safe_vi  = '$service_name_safe_vi',
                    service_name_safe_en = '$service_name_safe_en',
                    update_time =  $time         
                    WHERE service_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertService($service_name_vi,$service_name_en,$service_name_safe_vi,$service_name_safe_en){
        try{
            $time = time();
            $sql = "INSERT INTO services VALUES(NULL,'$service_name_vi','$service_name_safe_vi','$service_name_en','$service_name_safe_en',NULL,$time,$time,1)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Services','function' => 'insertServices' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>