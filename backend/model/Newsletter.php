<?php

require_once "Db.php";

class Newsletter extends Db {

    function getDetailNewsletter($id) {
        $sql = "SELECT * FROM newsletter WHERE id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }
   

    function getListNewsletterByStatus($status=-1,$offset = -1, $limit = -1) {
        $sql = "SELECT * FROM newsletter WHERE (status = $status OR $status = -1) ";
        if ($limit > 0 && $offset >= 0)
            $sql .= " LIMIT $offset,$limit";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }    
   

    function updateStatus($id,$status) {        
        $sql = "UPDATE newsletter
                    SET status = $status           
                    WHERE id = $id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }

}

?>