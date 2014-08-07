<?php

require_once "Db.php";

class Home extends Db {



    function nhaXeUyTin($limit=8) {
        $arrResult = array();

        $sql = "SELECT * FROM nhaxe WHERE status = 1 AND hot = 1 LIMIT 0,$limit ";

        $rs = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_assoc($rs)){
            $arrResult[] = $row; 
        }

        return $arrResult;

    }

    function getCarNameByID($id) {

        $sql = "SELECT type_name_vi FROM car_type WHERE type_id = $id";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);

        return $row['type_name_vi'];

    }



    function getListCarByStatus($status=-1,$offset = -1, $limit = -1) {

        $sql = "SELECT * FROM car_type WHERE (status = $status OR $status = -1)  AND status > 0 ";

        if ($limit > 0 && $offset >= 0)

            $sql .= " LIMIT $offset,$limit";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }    

    function updateStatus($id,$status) {        

        $time = time();

        $sql = "UPDATE car_type

                    SET status = $status,                 

                    update_time =  $time         

                    WHERE type_id = $id ";

        mysql_query($sql) or die(mysql_error() . $sql);

    }



    function updateCar($id,$type_name_vi,$type_name_en) {        

        $time = time();

        $sql = "UPDATE car_type

                    SET type_name_vi = '$type_name_vi',                  

                    type_name_en = '$type_name_en',

                    update_time =  $time         

                    WHERE type_id = $id ";

        mysql_query($sql) or die(mysql_error() . $sql);

    }

    function insertCar($type_name_vi,$type_name_en){

        try{

            $time = time();

            $sql = "INSERT INTO car_type VALUES(NULL,'$type_name_vi','$type_name_en',$time,$time,1)";

            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       

        }catch(Exception $ex){            

            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Car','function' => 'insertCar' , 'error'=>$ex->getMessage(),'sql'=>$sql);

            $this->logError($arrLog);

        }

    }    



}



?>