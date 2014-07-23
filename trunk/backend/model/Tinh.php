<?php
require_once "Db.php";

class Tinh extends Db {

    function getDetailTinh($id) {
        $sql = "SELECT * FROM tinh WHERE tinh_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }

    function getTinhNameByID($id) {
        $sql = "SELECT tinh_name_vi FROM tinh WHERE tinh_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row['tinh_name_vi'];
    }
   

    function getListTinhByStatus($status=-1,$offset = -1, $limit = -1) {
        $arrResult = array();
        $sql = "SELECT * FROM tinh WHERE (status = $status OR $status = -1)  AND status > 0 ";
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
        $sql = "UPDATE tinh
                    SET status = $status,                 
                    update_time =  $time         
                    WHERE tinh_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

    function updateTinh($id,$tinh_name_vi,$tinh_name_en,$tinh_name_safe_vi,$tinh_name_safe_en) {        
        $time = time();
        $sql = "UPDATE tinh
                    SET tinh_name_vi = '$tinh_name_vi',
                    tinh_name_en = '$tinh_name_en',
                    tinh_name_safe_vi  = '$tinh_name_safe_vi',
                    tinh_name_safe_en = '$tinh_name_safe_en',                    
                    update_time =  $time         
                    WHERE tinh_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertTinh($tinh_name_vi,$tinh_name_en,$tinh_name_safe_vi,$tinh_name_safe_en){
        try{
            $time = time();
            $sql = "INSERT INTO tinh VALUES(NULL,'$tinh_name_vi','$tinh_name_safe_vi','$tinh_name_en','$tinh_name_safe_en',$time,$time,1)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Tinh','function' => 'insertTinh' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>