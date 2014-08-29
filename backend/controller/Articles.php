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

$tinh_id = (int) $_POST['tinh_id'];

$category_id = 1;

$image_url = str_replace("../", "", $model->processData($_POST['image_url']));

if($article_id > 0) {	

	$model->updateArticles($article_id,$title,$title_safe,$image_url,$description,$content,$category_id,$hot,$lang_id,$tinh_id);

	header('location:'.$url);

}else{

	$model->insertArticles($title,$title_safe,$image_url,$description,$content,$category_id,$hot,$lang_id,$tinh_id);

	header('location:'.$url);

}



?>