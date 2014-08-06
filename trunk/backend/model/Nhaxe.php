<?php
require_once "Db.php";
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
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
   

    function getListNhaxe($keyword = '',$hot = -1,$offset = -1, $limit = -1) {
        try{
            $arrResult = array();
            $sql = "SELECT * FROM nhaxe WHERE (hot = $hot OR $hot = -1)  AND status > 0 ";
            if($keyword!=''){
                $sql.=" AND nhaxe_name_vi LIKE '%".$keyword."%' "; 
            }
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";        
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());  
            while($row = mysql_fetch_assoc($rs)){
                $arrResult['data'][] = $row; 
            }

            $arrResult['total'] = mysql_num_rows($rs);     
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Nhaxe','function' => 'getListNhaxe' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
        
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

    function updateNhaxe($id,$nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url,$hot){
        $time = time();
        $user_id = $_SESSION['user_id'];
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
                    hot = $hot,
                    update_time =  $time,
                    user_id = $user_id         
                    WHERE nhaxe_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertNhaxe($nhaxe_name_vi,$nhaxe_name_en,$nhaxe_name_safe_vi,$nhaxe_name_safe_en,$address_vi,$address_en,$phone,$description_vi,$description_en,$image_url,$hot){
        try{
            $user_id = $_SESSION['user_id'];
            $time = time();
            $sql = "INSERT INTO nhaxe VALUES(NULL,'$nhaxe_name_vi','$nhaxe_name_safe_vi','$nhaxe_name_en','$nhaxe_name_safe_en','$address_vi','$address_en','$phone',
                '$description_vi','$description_en','$image_url',$time,$time,$hot,1,$user_id)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Nhaxe','function' => 'insertNhaxe' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>