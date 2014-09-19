<?php
require_once "Db.php";
class Home extends Db {

    function checkCodeRating($code){
        try{
            $email = $nhaxe_id = 0;
            $sql = "SELECT status,email,nhaxe_id FROM email_rating WHERE code = '$code'";
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());  
            $no = mysql_num_rows($rs);
            if($no==0){
                $error = 1; 
            }else{
                $row = mysql_fetch_assoc($rs);
                $email = $row['email'];
                $nhaxe_id = $row['nhaxe_id'];
                $email_id = $row['email_id'];
                if($row['status']==2) $error = 0; // chua danh gia
                if($row['status'] ==1 ) $error = 2; // da danh gia
                if($row['status'] ==0 ) $error = 3; // ma bi xoa
            }
            return array("error"=> $error, 'email' => $email, 'nhaxe_id' => $nhaxe_id,'email_id' => $email_id);
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Home','function' => 'checkCodeRating' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
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

    function getListTinh($mien_id=-1,$keyword='',$hot=-1,$offset = -1, $limit = -1) {

        $arrResult = array();

        $sql = "SELECT * FROM tinh WHERE (hot = $hot OR $hot = -1) AND (mien_id = $mien_id OR $mien_id = -1) AND status > 0 ";

        if(trim($keyword)!=''){

            $sql.= " AND tinh_name_vi LIKE '%".$keyword."%' "; 

        }
        $sql.="  ORDER BY hot DESC " ;
        if ($limit > 0 && $offset >= 0)

            $sql .= "  LIMIT $offset,$limit";

        $rs = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_assoc($rs)){

            $arrResult['data'][] = $row; 

        }      

        $arrResult['total'] = mysql_num_rows($rs);

        return $arrResult;

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
    function getListTinhHaveTicket(){
        $sql = "SELECT tinh_id_start FROM ticket WHERE status = 1 GROUP BY tinh_id_start";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $str_id .= $row['tinh_id_start'].",";       
        }
        if($str_id){
            $str_id = rtrim($str_id,",");
            $sql = "SELECT * FROM tinh WHERE tinh_id IN ($str_id) ORDER BY hot DESC ";
            
            $rs = mysql_query($sql);
            while($row = mysql_fetch_assoc($rs)){
                $arrResult[$row['tinh_id']] = $row;
            }
        }
        return $arrResult;
    }
    function checkHavePage($tinh_id){
        $sql = "SELECT page_id FROM page WHERE tinh_id = $tinh_id";
        $rs = mysql_query($sql);
        $row = mysql_num_rows($rs);
        return $row > 0 ? true : false;
    }
    function getListImageByNhaxe($nhaxe_id=-1,$offset = -1, $limit = -1) {
        $sql = "SELECT * FROM image WHERE (nhaxe_id = $nhaxe_id OR $nhaxe_id = -1)  AND status > 0 ";
        if ($limit > 0 && $offset >= 0)
            $sql .= " LIMIT $offset,$limit";
        $rs = mysql_query($sql) or die(mysql_error().$sql);
        return $rs;
    }
    function getListQuestion() {
        try{
            $arrResult = array();
            $sql = "SELECT * FROM question WHERE status = 1 ";
            
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";
            
            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_assoc($rs)){
               $arrResult['data'][] = $row; 
            }

            $arrResult['total'] = mysql_num_rows($rs);   
            return $arrResult;  
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Question','function' => 'getListArticle' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }
    function getDetailTicket($id) {
        $sql = "SELECT * FROM ticket WHERE ticket_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
    function getTinhNameByID($id,$lang='vi') {

        $sql = "SELECT tinh_name_vi,tinh_name_en FROM tinh WHERE tinh_id = $id";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);

        return $row['tinh_name_'.$lang];

    }
    function getNhaxeNameByID($id,$lang="vi") {
        $sql = "SELECT * FROM nhaxe WHERE nhaxe_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row['nhaxe_name_'.$lang];
    }
    function getTimeByID($id) {

        $sql = "SELECT time_start FROM time_start WHERE time_id = $id";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);

        return $row['time_start'];

    }
    function getPlaceNameByID($id,$lang="vi") {

        $sql = "SELECT place_name_vi,place_name_en FROM place WHERE place_id = $id";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);

        return $row['place_name_'.$lang];

    }
    function getAddressByID($id,$lang="vi") {

        $sql = "SELECT address_vi,address_en FROM place WHERE place_id = $id";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);
        
        return $row['address_'.$lang];

    }
    function getListTicketFE($nhaxe_id="",$tinh_id_start=-1,$tinh_id_end=-1,$date_start=-1,$service="",$offset = -1, $limit = -1) {
        $arrResult = array();

        try{
            $sql = "SELECT * FROM ticket t1 ";
            if($service!=''){
                $sql.=" INNER JOIN service_ticket t2 ON (t1.ticket_id = t2.ticket_id AND t2.service_id IN ($service))";
            }else{
                $sql.=" WHERE t1.status > 0 ";
            }
            if($nhaxe_id!=""){
                $sql.= " AND nhaxe_id IN (".$nhaxe_id.") ";
            }
            $sql.=" AND (t1.tinh_id_start = $tinh_id_start OR $tinh_id_start = -1)
            AND (t1.tinh_id_end = $tinh_id_end OR $tinh_id_end = -1) AND  (t1.date_start = $date_start OR $date_start = -1)";
            
             $sql.="ORDER BY t1.update_time ASC ";            
              
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";              
            
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());  
            while($row = mysql_fetch_assoc($rs)){
                $arrResult['data'][] = $row; 
            }
            $arrResult['total'] = mysql_num_rows($rs);

        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Ticket','function' => 'getListTicket' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
        
        return $arrResult;
    } 
    function detailRoute($tinh_id_start,$tinh_id_end){
        $sql = "SELECT * FROM route WHERE tinh_id_start = $tinh_id_start AND tinh_id_end = $tinh_id_end"; 
        $rs = mysql_query($sql);
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
    function getDetailNhaxe($id) {
        $sql = "SELECT * FROM nhaxe WHERE nhaxe_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
    function getServiceTicket($ticket_id){
        $arrResult = array();
        $sql = "SELECT * FROM service_ticket WHERE ticket_id = $ticket_id";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
                $arrResult[] = $row['service_id']; 
        }
        return $arrResult;
    } 
    function getTimeTicket($ticket_id){
        $arrResult = array();
        $sql = "SELECT * FROM time_ticket WHERE ticket_id = $ticket_id";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
                $arrResult[] = $row['time_id']; 
        }
        return $arrResult;
    }
    function getIDByTinhNameSafe($str) {

        $sql = "SELECT tinh_id FROM tinh WHERE tinh_name_safe_vi = '$str'";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);

        return $row['tinh_id'];

    }
    function getIDByNameSafe($str) {

        $sql = "SELECT nhaxe_id FROM nhaxe WHERE nhaxe_name_safe_vi = '$str' AND status > 0 ";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);

        return $row['nhaxe_id'];

    }
    function getEndByStartID($tinh_id_start){
        $arrResult = array();
        $sql = "SELECT * FROM route WHERE tinh_id_start = $tinh_id_start"; 
        
        $rs = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_assoc($rs)){
            $str_id .= $row['tinh_id_end'].",";
        };
        
        if($str_id){
            $str_id = rtrim($str_id,",");
            $sql = "SELECT * FROM tinh WHERE tinh_id IN ($str_id) ORDER BY hot DESC ";
            
            $rs = mysql_query($sql);
            while($row = mysql_fetch_assoc($rs)){
                $arrResult[$row['tinh_id']] = $row;
            }
        }
        return $arrResult;
    }
    function insertemailnewsletter($email){
        $date = time();
        try{
        $sql = "INSERT INTO newsletter VALUES (NULL,'$email',$date,$date,1)";
        $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       

        }catch(Exception $ex){            

            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Newsletter','function' => 'insertemailnewsletter' , 'error'=>$ex->getMessage(),'sql'=>$sql);

            $this->logError($arrLog);

        }
    }
    function insertFeedback($email,$mobile,$content){
        $date = time();
        try{
        $sql = "INSERT INTO feedback VALUES (NULL,'$email','$mobile','$content',$date,$date,1)";
        $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       

        }catch(Exception $ex){                        
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Newsletter','function' => 'insertFeedback' , 'error'=>$ex->getMessage(),'sql'=>$sql);

            $this->logError($arrLog);

        }
    }
    function getTinhNameSafeByID($id) {

        $sql = "SELECT tinh_name_safe_vi FROM tinh WHERE tinh_id = $id";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);

        return $row['tinh_name_safe_vi'];

    }
    function getServiceNameByID($id,$lang="vi") {

        $sql = "SELECT service_name_vi,service_name_en FROM services WHERE service_id = $id";

        $rs = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_assoc($rs);
        
        return $row['service_name_'.$lang];

    }
    function pagination($page, $page_show, $total_page,$r=1){        
        $dau = 1;
        $cuoi = 0;
        $dau = $page - floor($page_show / 2);
        if ($dau < 1)
            $dau = 1;
        $cuoi = $dau + $page_show;
        if ($cuoi > $total_page) {

            $cuoi = $total_page + 1;
            $dau = $cuoi - $page_show;
            if ($dau < 1)
                $dau = 1;
        }
        $str='<div class="pagination-page"><div class="left t-page"><p>Page<span> '.$page.'</span> of <span>'.$total_page.'</span></p></div><div class="right t-pagination"><ul>';
        if ($page > 1) {
            ($page == 1) ? $class = " class='active'" : $class = "";
            $str.='<li><a ' . $class . ' href="javascript:;" attr-value="1"><</a><li>';
            echo "";
        }
        for ($i = $dau; $i < $cuoi; $i++) {
            ($page == $i) ? $class = " class='active'" : $class = "";
            $str.='<li><a ' . $class . ' href="javascript:;" attr-value="'.$i.'">'.$i.'</a><li>';            
        }
        if ($page < $total_page) {
            ($page == $total_page) ? $class = " class='active end'" : $class = " class='end' ";
            $str.='<li><a ' . $class . ' href="javascript:;" attr-value="'.$total_page.'">></a><li>';            
        }
        $str.="</ul></div></div>";
        return $str;       
                            
    }
    function getListNhaxeHaveTicket($vstart,$vend,$dstart){
        $arrResult = array();
        try{
            $sql = "SELECT nhaxe_id FROM ticket WHERE status > 0 AND tinh_id_start = $vstart AND tinh_id_end = $vend
            AND date_start = $dstart GROUP BY nhaxe_id "  ;                      
             
            $rs = mysql_query($sql) or $this->throw_ex(mysql_error());  

            while($row = mysql_fetch_assoc($rs)){
                $nhaxe_id = $row['nhaxe_id'];
                $arrResult[$nhaxe_id] = $this->getDetailNhaxe2($nhaxe_id);
            }            

        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Nhaxe','function' => 'getListNhaxeHaveTicket' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
        
        return $arrResult;
    }
    function getDetailNhaxe2($id) {
        $sql = "SELECT nhaxe_id,nhaxe_name_vi,nhaxe_name_en FROM nhaxe WHERE nhaxe_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
}
?>