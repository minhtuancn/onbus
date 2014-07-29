<?php
require_once "Db.php";

class Route extends Db {

    function getDetailRoute($id) {
        $sql = "SELECT * FROM route WHERE route_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
   

    function getListRoute($keyword='',$tinh_id_start=-1,$tinh_id_end=-1,$hot=-1,$offset = -1, $limit = -1) {
        $arrResult = array();
        try{
            $sql = "SELECT * FROM route WHERE status > 0 
            AND  (tinh_id_start = $tinh_id_start OR $tinh_id_start = -1)
            AND  (hot = $hot OR $hot = -1)
            AND (tinh_id_end = $tinh_id_end OR $tinh_id_end = -1) ";
            if(trim($keyword)!=''){
                $sql.= " AND route_name_vi LIKE '%".$keyword."%' "; 
            }
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";  

            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());  
            while($row = mysql_fetch_assoc($rs)){
                $arrResult['data'][] = $row; 
            }
            $arrResult['total'] = mysql_num_rows($rs);

        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Route','function' => 'getListRoute' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
        
        return $arrResult;
    }    
    function updateStatus($id,$status) {        
        $time = time();
        $sql = "UPDATE route
                    SET status = $status,                 
                    update_time =  $time         
                    WHERE route_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

    function updateRoute($id,$route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$hot,$description,$tinh_id_start,$tinh_id_end) {        
        $time = time();
        $sql = "UPDATE route
                    SET route_name_vi = '$route_name_vi',                    
                    route_name_en = '$route_name_en',
                    route_name_safe_vi  = '$route_name_safe_vi',
                    route_name_safe_en = '$route_name_safe_en',
                    update_time =  $time,
                    description = '$description',
                    tinh_id_start =  $tinh_id_start,
                    tinh_id_end =  $tinh_id_end,
                    hot = $hot
                    WHERE route_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertRoute($route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$hot,$description,$tinh_id_start,$tinh_id_end){
        try{
            $time = time();
            $sql = "INSERT INTO route VALUES(NULL,'$route_name_vi','$route_name_safe_vi','$route_name_en','$route_name_safe_en',$hot,'$description',$tinh_id_start,$tinh_id_end,$time,$time,1)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Route','function' => 'insertRoute' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>