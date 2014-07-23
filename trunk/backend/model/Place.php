<?php
require_once "Db.php";

class Place extends Db {

    function getDetailPlace($id) {
        $sql = "SELECT * FROM place WHERE place_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }

    function getPlaceNameByID($id) {
        $sql = "SELECT place_name_vi FROM place WHERE place_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row['place_name_vi'];
    }
   

    function getListPlaceByStatus($status=-1,$offset = -1, $limit = -1) {
        $arrResult = array();
        $sql = "SELECT * FROM place WHERE (status = $status OR $status = -1)  AND status > 0 ";
        if ($limit > 0 && $offset >= 0)
            $sql .= " LIMIT $offset,$limit";
        $rs = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_assoc($rs)){
            $arrResult['data'][] = $row; 
        }
        $arrResult['total'] = mysql_num_rows($rs);
        return $arrResult;
    }    
    function updateStatus($id,$status) {        
        $time = time();
        $sql = "UPDATE place
                    SET status = $status,                 
                    update_time =  $time         
                    WHERE place_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

    function updatePlace($id,$place_name_vi,$place_name_en,$place_name_safe_vi,$place_name_safe_en,$address_vi,$address_en) {        
        $time = time();
        $sql = "UPDATE place
                    SET place_name_vi = '$place_name_vi',
                    place_name_en = '$place_name_en',
                    place_name_safe_vi  = '$place_name_safe_vi',
                    place_name_safe_en = '$place_name_safe_en',
                    address_vi  = '$address_vi',
                    address_en = '$address_en',
                    update_time =  $time         
                    WHERE place_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertPlace($place_name_vi,$place_name_en,$place_name_safe_vi,$place_name_safe_en,$address_vi,$address_en){
        try{
            $time = time();
            $sql = "INSERT INTO place VALUES(NULL,'$place_name_vi','$place_name_safe_vi','$place_name_en','$place_name_safe_en','$address_vi','$address_en',$time,$time,1)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Place','function' => 'insertPlace' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>