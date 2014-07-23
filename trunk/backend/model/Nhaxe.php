<?php
require_once "Db.php";

class Nhaxe extends Db {

    function getDetailNhaxe($id) {
        $sql = "SELECT * FROM nhaxe WHERE nhaxe_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }

    function getNhaxeNameByID($id) {
        $sql = "SELECT nhaxe_name_vi FROM nhaxe WHERE nhaxe_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row['nhaxe_name_vi'];
    }
   

    function getListNhaxeByStatus($status=-1,$offset = -1, $limit = -1) {
        $arrResult = array();
        $sql = "SELECT * FROM nhaxe WHERE (status = $status OR $status = -1)  AND status > 0 ";
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
        $sql = "UPDATE nhaxe
                    SET status = $status,                 
                    update_time =  $time         
                    WHERE nhaxe_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

    function updateNhaxe($id,$nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url){
        $time = time();
        $sql = "UPDATE nhaxe
                    SET nhaxe_name_vi = '$nhaxe_name_vi',
                    nhaxe_name_en = '$nhaxe_name_en',
                    nhaxe_name_safe_vi  = '$nhaxe_name_safe_vi',
                    nhaxe_name_safe_en = '$nhaxe_name_safe_en',
                    address_vi  = '$address_vi',
                    address_en = '$address_en',
                    phone  = '$phone',
                    description_vi = '$description_vi',
                    description_en  = '$description_en',
                    image_url = '$image_url',
                    update_time =  $time         
                    WHERE nhaxe_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertNhaxe($nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url){
        try{
            $time = time();
            $sql = "INSERT INTO nhaxe VALUES(NULL,'$nhaxe_name_vi','$nhaxe_name_safe_vi','$nhaxe_name_en','$nhaxe_name_safe_en','$address_vi','$address_en','$phone',
                '$description_vi','$description_en','$image_url',$time,$time,1)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Nhaxe','function' => 'insertNhaxe' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>