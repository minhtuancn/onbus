<?php
require_once "Db.php";

class Route extends Db {

    function getDetailRoute($id) {
        $sql = "SELECT * FROM route WHERE route_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
   

    function getListRouteByStatus($status=-1,$offset = -1, $limit = -1) {
        $arrResult = array();
        $sql = "SELECT * FROM route WHERE (status = $status OR $status = -1)  AND status > 0 ";
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
        $sql = "UPDATE route
                    SET status = $status,                 
                    update_time =  $time         
                    WHERE route_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

    function updateRoute($id,$route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$description,$place_id_start,$place_id_end) {        
        $time = time();
        $sql = "UPDATE route
                    SET route_name_vi = '$route_name_vi',
                    route_name_en = '$route_name_en',
                    route_name_safe_vi  = '$route_name_safe_vi',
                    route_name_safe_en = '$route_name_safe_en',
                    update_time =  $time,
                    description = '$description',
                    place_id_start =  $place_id_start,
                    place_id_end =  $place_id_end
                    WHERE route_id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertRoute($route_name_vi,$route_name_en,$route_name_safe_vi,$route_name_safe_en,$description,$place_id_start,$place_id_end){
        try{
            $time = time();
            $sql = "INSERT INTO route VALUES(NULL,'$route_name_vi','$route_name_safe_vi','$route_name_en','$route_name_safe_en','$description',$place_id_start,$place_id_end,$time,$time,1)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Route','function' => 'insertRoute' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

}

?>