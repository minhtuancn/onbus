<?php

require_once "Db.php";

class Album extends Db {

    function getDetailAlbum($album_id) {
        $sql = "SELECT * FROM album WHERE album_id = $album_id";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }
    function getListAlbum($offset = -1, $limit = -1) {
        $sql = "SELECT * FROM album WHERE status = 1 ";
        if ($limit > 0 && $offset >= 0)
            $sql .= " LIMIT $offset,$limit";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }
    function getListImageByAlbum($album_id = -1, $offset = -1, $limit = -1) {
        $sql = "SELECT * FROM images WHERE (album_id = $album_id OR $album_id = -1) AND status = 1 ORDER BY image_id DESC ";
        if ($limit > 0 && $offset >= 0)
            $sql .= " LIMIT $offset,$limit";     
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }
    function insertImage() {        

        $album_id = (int) $_POST['album_id'];        

        $status = 1;    

        $url_images = $this->processData($_POST['url_image']);

        $sql = "INSERT INTO images VALUES(NULL,'$url_images',1,$album_id)";

        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function deleteImage(){        

        $image_id = (int) $_POST['image_id'];        

        $sql = "DELETE FROM images WHERE image_id = $image_id" ;
        
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function insertAlbum() {        

        $album_name_vi = $this->processData($_POST['album_name_vi']);
        $album_name_en = $this->processData($_POST['album_name_en']);

        $status = 1;    

        $url_images = $this->processData($_POST['url_image']);
        $description_vi = $this->processData($_POST['description_vi']);
        $description_en = $this->processData($_POST['description_en']);

        $seo_title = $seo_description = $seo_keyword = $album_name_vi;
        $album_alias = $this->changeTitle($album_name_vi);

        $sql = "INSERT INTO album VALUES(NULL,'$album_name_vi','$album_name_en','$album_alias',
                                    '$description_vi','$description_en',
                                    '$url_images',1,'$seo_title','$seo_description','$seo_keyword')";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function updateAlbum($album_id) {       

       $album_name_vi = $this->processData($_POST['album_name_vi']);
        $album_name_en = $this->processData($_POST['album_name_en']);

        $status = 1;    

        $url_images = $this->processData($_POST['url_image']);
        $description_vi = $this->processData($_POST['description_vi']);
        $description_en = $this->processData($_POST['description_en']);

        $seo_title = $seo_description = $seo_keyword = $album_name_vi;
        $album_alias = $this->changeTitle($album_name_vi);

        $sql = "UPDATE album
					SET album_name_vi = '$album_name_vi',album_name_en = '$album_name_en',album_alias = '$album_alias',
                    description_vi = '$description_vi',description_en = '$description_en',url_image = '$url_images',				
					title = '$seo_title',meta_d = '$seo_description',meta_k = '$seo_keyword'					
					WHERE album_id = $album_id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    

}

?>