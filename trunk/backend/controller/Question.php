<?php 

$url = "../index.php?mod=question&act=list";

require_once "../model/Question.php";

$model = new Question;

$question_id = (int) $_POST['question_id'];

$content_vi = $_POST['content_vi'];
$content_en = $_POST['content_en'];

$answer_vi = $_POST['answer_vi'];
$answer_en = $_POST['answer_en'];
if(trim($content_vi)!='' && trim($content_en) !="" && trim($answer_vi) !="" && trim($answer_en) !="" ){

if($question_id > 0) {	

	$model->updateQuestion($question_id,$content_vi,$content_en,$answer_vi,$answer_en);

	header('location:'.$url);

}else{

	$model->insertQuestion($content_vi,$content_en,$answer_vi,$answer_en);

	header('location:'.$url);

}
}else{
	header('location:'.$url);	
}



?>