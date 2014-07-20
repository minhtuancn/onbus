<?php

require_once "Db.php";

class Place extends Db {

    function getDetailPlace($id) {
        $sql = "SELECT * FROM place WHERE id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }
   

    function getListPlaceByStatus($status=-1,$offset = -1, $limit = -1) {
        $sql = "SELECT * FROM place WHERE (status = $status OR $status = -1) ";
        if ($limit > 0 && $offset >= 0)
            $sql .= " LIMIT $offset,$limit";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }    
   

    function updatePlace($id,$status) {        
        $sql = "UPDATE reservation
                    SET status = $status           
                    WHERE id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertPlace($place_name_vi,$place_name_en,$place_name_safe_vi,$place_name_safe_en){
        try{
            $sql = "INSERT INTO place VALUES(NULL,'$place_name_vi','$place_name_safe_vi','$place_name_en','$place_name_safe_en',1)";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){
            var_dump($ex->getMessage());die;
        }
    }

}

?>