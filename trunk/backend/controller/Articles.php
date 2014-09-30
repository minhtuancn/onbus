<?php 

$url = "../index.php?mod=articles&act=list";

require_once "../model/Articles.php";

$model = new Articles;

$article_id = (int) $_POST['article_id'];

$title = $model->processData($_POST['title']);

$title_safe = $model->changeTitle($title);

$description = $model->processData($_POST['description']);

$content = $_POST['content'];

$lang_id = (int) $_POST['lang_id'];

$hot = (int) $_POST['hot'];

$category_id = 1;

$image_url = str_replace("../", "", $model->processData($_POST['image_url']));

$arrTag = array();
$str_tag_new = ($lang_id == 1) ? rtrim(trim($_POST[tags_vi]),";") : rtrim(trim($_POST[tags_en]),";") ;
$str_tag = str_replace(',',';',$str_tag_new);		
$arrTag  = explode(";",$str_tag);	




if($article_id > 0) {	
	
	$model->updateArticles($article_id,$title,$title_safe,$image_url,$description,$content,$category_id,$hot,$lang_id,$arrTag);

	header('location:'.$url);

}else{


	$model->insertArticles($title,$title_safe,$image_url,$description,$content,$category_id,$hot,$lang_id,$arrTag);

	header('location:'.$url);

}



?>