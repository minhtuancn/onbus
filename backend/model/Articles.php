<?php

require_once "Db.php";
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
class Articles extends Db {

    function getDetailArticle($article_id) {
        $sql = "SELECT * FROM articles WHERE article_id = $article_id";
        $rs = mysql_query($sql) or die(mysql_error());
        $row =mysql_fetch_assoc($rs);
        return $row;
    }  
   
    function getListArticle($keyword='',$lang_id = -1, $hot=-1,$offset = -1, $limit = -1) {
        try{
            $arrResult = array();
            $sql = "SELECT * FROM articles WHERE (lang_id = $lang_id OR $lang_id = -1)
                    AND (hot = $hot OR $hot = -1) ";
            if(trim($keyword) != ''){
                $sql.= " AND title LIKE '%".$keyword."%' " ;
            }    
            $sql.=" AND status = 1 ";
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";
            
            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_assoc($rs)){
               $arrResult['data'][] = $row; 
            }

            $arrResult['total'] = mysql_num_rows($rs);   
            return $arrResult;  
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Articles','function' => 'getListArticle' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }
   

    function insertArticles($title,$title_safe,$image_url,$description,$content,$category_id,$hot,$lang_id) {
        try{
        $user_id = $_SESSION['user_id'];
        $time = time();
        $sql = "INSERT INTO articles VALUES
                        (NULL,'$title','$title_safe','$image_url','$description','$content',
                            $category_id,'$hot',$lang_id,$time,$time,1,$user_id)";
        $rs = mysql_query($sql) or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Articles','function' => 'insertArticle' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }    

    function updateArticles($article_id,$title,$title_safe,$image_url,$description,$content,$category_id,$hot,$lang_id) {
       try{
        $user_id = $_SESSION['user_id'];
        $time = time();
        $sql = "UPDATE articles
                    SET title = '$title',title_safe = '$title_safe',
                    image_url = '$image_url',description = '$description',content = '$content',                    
                    category_id = $category_id, hot = $hot, lang_id = $lang_id,
                    update_time = $time,
                    user_id = $user_id               
                    WHERE article_id = $article_id ";
        mysql_query($sql)  or $this->throw_ex(mysql_error());       
        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Articles','function' => 'updateArticle' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }

}

?>