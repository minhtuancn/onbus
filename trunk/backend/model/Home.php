<?php
require_once "Db.php";
class Home extends Db {

    function checkCodeRating($code){
        try{
            $email = $nhaxe_id = 0;
            $sql = "SELECT status,email,nhaxe_id,email_id FROM email_rating WHERE code = '$code'";
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
    function searchBus($keyword,$lang){
        $arrReturn = array();
        $column = $lang == 1 ? "nhaxe_name_vi" : "nhaxe_name_en";
        if($keyword!=''){
            $sql = "SELECT * FROM nhaxe WHERE status = 1 AND $column LIKE '$keyword%' ";
        }else{
            $sql = "SELECT * FROM nhaxe WHERE status = 1";
        }
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arrReturn[$row['nhaxe_id']] = $row;
        }
        return $arrReturn;
    }
    function getInfoTicket($phone,$code){
        $arrReturn = $arrDetail = $arrOrder = array();
        $sql = "SELECT order_detail.id,order_detail.order_id FROM orders,order_detail WHERE order_detail.code = '$code' AND orders.phone = '$phone'";
        $rs = mysql_query($sql);
        $no = mysql_num_rows($rs);
        if($no > 0){
            $row = mysql_fetch_assoc($rs);
            $order_id = $row['order_id'];
            $sql = "SELECT * FROM orders WHERE order_id = $order_id  AND status > 0 ";
            $rs_order = mysql_query($sql);
            $arrOrder = mysql_fetch_assoc($rs_order);

            $sql = "SELECT * FROM order_detail WHERE order_id = $order_id AND status > 0";
            $rs_detail = mysql_query($sql);
            while($row_detail = mysql_fetch_assoc($rs_detail)){
                $arrDetail[$row_detail['type']] = $row_detail;
            }
        }
        return array('arrOrder' => $arrOrder,'arrDetail' => $arrDetail);
        
    }
    function getRatingDetailOfNhaxe($nhaxe_id){
        $arrResult = array();
        $sql = "SELECT * FROM rating_detail WHERE nhaxe_id = $nhaxe_id AND status = 1 ORDER BY detail_id DESC ";
        $rs = mysql_query($sql);
        $arrResult['total'] = mysql_num_rows($rs);
        while($row = mysql_fetch_assoc($rs)){
            $arrResult['data'][$row['detail_id']] = $row; 
        }
        return $arrResult;
    }
    function getListTroute($nhaxe_id){
        $arrResult = array();
        $sql = "SELECT * FROM troute WHERE nhaxe_id = $nhaxe_id AND status = 1 ORDER BY troute_id DESC LIMIT 0,15";
        $rs = mysql_query($sql);
        $arrResult['total'] = mysql_num_rows($rs);
        while($row = mysql_fetch_assoc($rs)){
            $arrResult['data'][$row['troute_id']] = $row; 
        }
        return $arrResult;
    }
    function rating($nhaxe_id){
        $arrReturn = array();
        $sql = "SELECT * FROM rating_detail WHERE nhaxe_id = $nhaxe_id AND status = 1";
        $rs = mysql_query($sql);
        $totalRow = mysql_num_rows($rs);
        $terrible = $poor = $average = $good = $excel = 0 ; 
        $total1 = $total2 = $total3 = $total4 = $diemTB = 0;
        if($totalRow>0){
            while($row = mysql_fetch_assoc($rs)){
                
                $total1 += $row['point1'];
                $total2 += $row['point2'];
                $total3 += $row['point3'];
                $total4 += $row['point4'];

                $totalDiem = $row['point1'] +   $row['point2'] + $row['point3'] + $row['point4'];
                $diemTB = $totalDiem/5;
                if($diemTB >= 1 && $diemTB < 2){
                    $terrible++;
                }elseif($diemTB >= 2 && $diemTB < 3){
                    $poor++;
                }elseif($diemTB >= 3 && $diemTB < 4){
                    $average++;
                }elseif($diemTB >= 4 && $diemTB <= 4.5){
                    $good++;
                }else{
                    $excel++;
                }
            }
            $sao1 = $total1/$totalRow;
            $sao2 = $total2/$totalRow;
            $sao3 = $total3/$totalRow;
            $sao4 = $total4/$totalRow;
            

            $sao1 = $this->tinhsao(round($total1/$totalRow,1));
            $sao2 = $this->tinhsao(round($total2/$totalRow,1));
            $sao3 = $this->tinhsao(round($total3/$totalRow,1));
            $sao4 = $this->tinhsao(round($total4/$totalRow,1));        

            $arrReturn['terrible']['vote'] = $terrible;
            $arrReturn['terrible']['percent'] = round($terrible*100/$totalRow);

            $arrReturn['poor']['vote'] = $poor;
            $arrReturn['poor']['percent'] = round($poor*100/$totalRow);

            $arrReturn['average']['vote'] = $average;
            $arrReturn['average']['percent'] = round($average*100/$totalRow);

            $arrReturn['good']['vote'] = $good;
            $arrReturn['good']['percent'] = round($good*100/$totalRow);

            $arrReturn['excel']['vote'] = $excel;
            $arrReturn['excel']['percent'] = round($excel*100/$totalRow);
            $arrReturn['sao'][1] = $sao1;
            $arrReturn['sao'][2] = $sao2;
            $arrReturn['sao'][3] = $sao3;
            $arrReturn['sao'][4] = $sao4;

            $arrReturn['total'] = $totalRow;
        }

        return $arrReturn;
    }
    function countStarByDetail($detail_id){
        $sql = "SELECT * FROM rating_detail WHERE detail_id = $detail_id AND status = 1";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        $total = $row['point1'] + $row['point2'] + $row['point4'] + $row['point3'];
        $sao = $this->tinhsao(round($total/4,1));
        return $sao;
    }
    function tinhsao($val){
        if($val<5 && $val >=4.5) $val = 4.5;
        elseif($val >4 && $val <4.5) $val = 4;
        elseif($val <4 && $val >=3.5) $val = 3.5;
        elseif($val >3 && $val <3.5) $val = 3;
        elseif($val <3 && $val >=2.5) $val = 2.5;
        elseif($val >2 && $val <2.5) $val = 2;
        elseif($val <2 && $val >=1.5) $val = 1.5;
        elseif($val >1 && $val <1.5) $val = 1;
        elseif($val <1 && $val >=0.5) $val = 0.5;
        elseif($val >0 && $val <0.5) $val = 0;
        return $val;
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
    function getCodeTicket($ticket_id){
        $rs = mysql_query("SELECT * FROM ticket WHERE ticket_id = $ticket_id");
        $row = mysql_fetch_assoc($rs);
        $month = date('m',$row['date_start']);
        $day = date('d',$row['date_start']);
        $tmp = str_pad($ticket_id, 3, "0", STR_PAD_LEFT); 
        var_dump($day,$month,$ticket_id);die;
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
        $sql = "INSERT INTO sendcontent VALUES (NULL,'','$email','','',1,$date,$date,1)";
        $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       

        }catch(Exception $ex){            

            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Home','function' => 'insertemailnewsletter' , 'error'=>$ex->getMessage(),'sql'=>$sql);

            $this->logError($arrLog);

        }
    }
    function insertFeedback($email,$mobile,$content){
        $date = time();
        try{
        $sql = "INSERT INTO sendcontent VALUES (NULL,'','$email','$mobile','$content',2,$date,$date,1)";
        $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       

        }catch(Exception $ex){                        
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Home','function' => 'insertFeedback' , 'error'=>$ex->getMessage(),'sql'=>$sql);

            $this->logError($arrLog);

        }
    }
    function insertContact($name,$email,$mobile,$content){
        $date = time();
        try{
        $sql = "INSERT INTO sendcontent VALUES (NULL,'$name','$email','$mobile','$content',3,$date,$date,1)";
        $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       

        }catch(Exception $ex){                        
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Home','function' => 'insertContact' , 'error'=>$ex->getMessage(),'sql'=>$sql);

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
    function getRouteNameByID($id,$lang="vi") {
        $sql = "SELECT route_name_vi,route_name_en FROM route WHERE route_id = $id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row['route_name_'.$lang];
    }
    function countReviewByEmailID($email_id) {
        $sql = "SELECT count(detail_id) as total FROM rating_detail WHERE email_id = $email_id AND status = 1";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row['total'];
    }
    function countUsefulByEmailID($email_id) {
        $sql = "SELECT count(detail_id) as total FROM rating_detail WHERE email_id = $email_id AND status = 1 AND is_helpful = 1";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        return $row['total'];
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
    function checkPromotionCode($code){
        $code_id = 0;
        $sql = "SELECT code_id FROM promotion_code WHERE code = '$code'";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);
        $no = mysql_num_rows($rs);
        return $row > 0 ? $row['code_id'] : 0; 
    }
    function getDetailPromotionCode($code_id){
        $sql = "SELECT * FROM promotion_code WHERE code_id = $code_id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($rs);         
        return $row;
    }
}
?>