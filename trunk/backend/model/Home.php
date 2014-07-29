<?php 
require_once "Db.php";
class Home extends Db{	
	
	function getDetailArticle($article_id){
		$sql = "SELECT * FROM article WHERE article_id = $article_id";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function getDetailPage($service_id){
		$sql = "SELECT * FROM services WHERE service_id = $service_id";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function menu_list($type=-1){
		$sql = "SELECT * FROM menu WHERE type = $type OR $type=-1 ORDER BY menu_id ASC";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}	
	function getBlockContent($block_id){
		$sql = "SELECT block_content FROM blocks WHERE block_id = $block_id";
		$rs = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($rs);
		return $row['block_content'];
	}
	function getMenuIdByAlias($menu_alias){
		$sql = "SELECT menu_id FROM menu WHERE menu_alias = '$menu_alias'";
		$rs = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($rs);
		return $row['menu_id'];
	}
	function getDetailMenuByAlias($menu_alias){
		$sql = "SELECT * FROM menu WHERE menu_alias = '$menu_alias'";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function getListArticleByCategory($category_id=-1,$offset=-1,$limit=-1){
		$sql = "SELECT * FROM article WHERE category_id = $category_id OR $category_id = -1";
		if($limit > 0 && $offset >=0) $sql .= " LIMIT $offset,$limit";		
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function getListArticleByCategoryNew($category_id=-1,$offset=-1,$limit=-1){
		$sql = "SELECT * FROM article WHERE category_id = $category_id OR $category_id = -1 ORDER BY article_id DESC ";
		if($limit > 0 && $offset >=0) $sql .= " LIMIT $offset,$limit";		
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function getNewsRelated($article_id){
		$sql = "SELECT * FROM article WHERE category_id = 2 AND article_id <> $article_id ORDER BY article_id DESC LIMIT 0,5";
		$rs = mysql_query($sql);
		return $rs;
	}
	function getNewsHome(){
		$sql = "SELECT * FROM article WHERE category_id = 2 ORDER BY article_id DESC LIMIT 0,4";
		$rs = mysql_query($sql);
		return $rs;
	}
	function getListServiceByCategory($category_id=-1,$offset=-1,$limit=-1){
		$sql = "SELECT * FROM services WHERE (category_id = $category_id OR $category_id = -1) AND status = 1 ";
		if($limit > 0 && $offset >=0) $sql .= " LIMIT $offset,$limit";				
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function checkemailexist($email){
		$sql = "SELECT id FROM newsletter WHERE email = '$email' AND status = 1 ";
		$rs = mysql_query($sql) or die(mysql_error());
		$row = mysql_num_rows($rs);
		if($row==0){
			return "1";
		}else{
			return "0";
		}
	}
	function insertemailnewsletter($email){
		$date = time();
		$sql = "INSERT INTO newsletter VALUES (NULL,'$email',1,$date,$date)";
		$rs = mysql_query($sql) or die(mysql_error());
	}
	function datphong($arrData){
		$fullname = $arrData['fullname'];
		$ngay_di = strtotime($arrData['ngay_di']);
		$ngay_den = strtotime($arrData['ngay_den']);
		$phone_number = $arrData['phone_number'];
		$nguoilon = (int) $arrData['nguoilon'];
		$treem = (int) $arrData['treem'];
		$date = time();
		$sql = "INSERT INTO reservation VALUES (NULL,'$fullname','$ngay_di','$ngay_den','$phone_number',$nguoilon,$treem,$date,$date,2)";
		$rs = mysql_query($sql) or die(mysql_error());
	}
	public function Truncate($string, $max_length)
    {

        if (mb_strlen($string, 'UTF-8') > $max_length)
        {
            $string = mb_substr($string, 0, $max_length, 'UTF-8');
            $pos = mb_strrpos($string, ' ', false, 'UTF-8');
            if ($pos === false)
            {
                return mb_substr($string, 0, $max_length, 'UTF-8') . '…';
            }
            return mb_substr($string, 0, $pos, 'UTF-8') . '…';
        } else
        {
            return $string;
        }
    }
		
}

?>