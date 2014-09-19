<?php 
include "defined.php";
require_once 'backend/model/Home.php';
$model = new Home;
/*
for($i=12; $i<= 40;$i++){
    $email = "emailtest".$i."@gmail.com";
    $time = time();
    $code = md5($email.time());
    $sql = "INSERT INTO email_rating VALUES (NULL,'$email',$time,'$code',20,2)";    
    mysql_query($sql);
}

die('123');
*/

$code = $_GET['code'];
$code = $model->processData($code);

$arrData = $model->checkCodeRating($code);
$error = $arrData['error'];
$nhaxe_id = $arrData['nhaxe_id'];
$email_id = $arrData['email_id'];
if(isset($_POST['btnSave'])){
    $p1 = (int) $_POST['question1'];
    $p2 = (int) $_POST['question2'];
    $p3 = (int) $_POST['question3'];
    $p4 = (int) $_POST['question4'];    
    $title =  $model->processData($_POST['title']);
    $name =  $model->processData($_POST['name']);
    $address =  $model->processData($_POST['address']);
    $content =  $model->processData($_POST['content']);
    $time = time();
    
    if( ($p1 > 0 && $p1<6) && ($p2 > 0 && $p2<6) && ($p3 > 0 && $p3<6) && ($p4 > 0 && $p4<6) && $title !='' && $name!='' && $address!='' && $content!=''){
        $sql = "INSERT INTO rating_detail VALUES(NULL,$email_id,$nhaxe_id,$p1,$p2,$p3,$p4,'$name','$address','$title','$content',$time,2,0)";
        mysql_query($sql) or die(mysql_error());
        $detail_id = mysql_insert_id();
        if($detail_id > 0){
            mysql_query("UPDATE email_rating SET status = 1 WHERE code = '$code'") or die(mysql_error());
            $error= 4;            
        }
    } 

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ONBUS RATING</title>
<base href="<?php echo HOST; ?>/"/>
<link href="<?php echo STATIC_URL; ?>/rating/style.css" type="text/css" rel="stylesheet"  />
</head>
<body class="review_frm">
	<div class="wrap_review clearfix">
    	<div class="top_header padding_common">
        	<span class="bg_review"></span>
            <a href="http://onbus.vn"><img src="<?php echo STATIC_URL; ?>/rating/logo2_final.png" /></a>
        </div>
        <div class="padding_common txt_header">
            <?php if($error == 0) { ?>
            <p>Tell us about your Journey</p>
            <span>Before you begin please read the <a href="#">review guidelines</a></span>
            <span class="start_red">* Required field</span>
            <?php }elseif($error==2){ ?>
            <p style="color:red;margin-bottom:30px">Quý khách đã tham gia đánh giá.</p>
            <?php }elseif($error==3 || $error == 1){ ?>
            <p style="color:red;margin-bottom:30px">Mã đánh giá không hợp lệ.</p>
            <?php }elseif($error==4){ ?>
            <p style="color:red;margin-bottom:30px">Cảm ơn quý khách đã tham gia đánh giá.</p>
            <?php } ?>
        </div>
        <?php if($error == 0) { ?>
        <form action="" method="post" name="frmRating" id="frmRating" >
        <div class="padding_common wrap_line">
        	<p>Ấn tượng của bạn về nhà xe điều hành</p>
        </div>
        <div class="padding_common content_review">
        	<div class="dot_9x9">
            	<p>Please rate the Sky Express Hotel Bukit Bingtang (5 being the best score).<span class="start_red">*</span></p>                
             </div>
             <table>
             	<tr>
                	<td></td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                </tr>
             	<tr>
                	<td>Cơ sở vật chất và tiện ích trên xe</td>
                    <td><input type="radio" name="question1" value="1"/></td>
                    <td><input type="radio" name="question1" value="2"/></td>
                    <td><input type="radio" name="question1" value="3"/></td>
                    <td><input type="radio" name="question1" value="4"/></td>
                    <td><input type="radio" name="question1" value="5"/></td>
                </tr>
             	<tr>
                	<td>Mức độ chuyên nghiệp của quy trình dịch vụ</td>
                    <td><input type="radio" name="question2" value="1" /></td>
                    <td><input type="radio" name="question2" value="2"/></td>
                    <td><input type="radio" name="question2" value="3"/></td>
                    <td><input type="radio" name="question2" value="4"/></td>
                    <td><input type="radio" name="question2" value="5"/></td>
                </tr>
             	<tr>
                	<td>Mức độ phục vụ chuyên nghiệp tại trạm khời hành và trạm đến</td>
                    <td><input type="radio" name="question3" value="1"/></td>
                    <td><input type="radio" name="question3" value="2"/></td>
                    <td><input type="radio" name="question3" value="3"/></td>
                    <td><input type="radio" name="question3" value="4"/></td>
                    <td><input type="radio" name="question3" value="5"/></td>
                </tr>
             	<tr>
                	<td>Quy định về các vấn đề an toàn cho hành khách và hành lý</td>
                    <td><input type="radio" name="question4" value="1"/></td>
                    <td><input type="radio" name="question4" value="2"/></td>
                    <td><input type="radio" name="question4" value="3"/></td>
                    <td><input type="radio" name="question4" value="4"/></td>
                    <td><input type="radio" name="question4" value="5"/></td>
                </tr>             	              
             </table>
             
             
        </div>
        <div class="padding_common wrap_line">
        	<p>Đánh giá phục vụ của hãng xe</p>
        </div>
        <div class="padding_common content_review">
        	<div class="group_field">
                <div class="dot_9x9"><p>Họ và tên:<span class="start_red">*</span></p></div>
                <div class="wrap_frm">
                    <input type="text" name="name"  id="name"/>
                </div>
            </div>
            <div class="group_field">
                <div class="dot_9x9"><p>Đến từ thành phố:<span class="start_red">*</span></p></div>
                <div class="wrap_frm">
                    <input type="text" name="address" id="address" />
                </div>
                
            </div>
            <div class="group_field">
                <div class="dot_9x9"><p>Give your review a title:<span class="start_red">*</span></p></div>
                <div class="wrap_frm">
                    <input type="text" name="title" id="title"/>
                    <span class="noted">maximum 50 characters</span>
                </div>
            </div>
            <div class="group_field">
                <div class="dot_9x9">
                	<p>Chia sẻ cùng onbus về trải nghiệm trong hành trình du lịch xe khách của bạn tại Việt Nam.</p>
                    <span>Please contact our Customer Support if you exprienced any serious issue.<span class="start_red">*</span></span>
                </div>
                <div class="wrap_frm">
                    <textarea name="content" id="content"></textarea>
                    <span class="noted">maximum 2000 characters</span>
                </div>
            </div>
            <div class="btn_footer_review">
				<input type="submit" value="Submit" name="btnSave" id="btnSave"/>
            </div>
        </div>
        </form>
        <?php } ?>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#btnSave').click(function(){
                var p1 = $('input[name="question1"]:checked').val();
                var p2 = $('input[name="question2"]:checked').val();
                var p3 = $('input[name="question3"]:checked').val();
                var p4 = $('input[name="question4"]:checked').val();                
                if(p1 == undefined || p2 == undefined || p3 == undefined || p4 == undefined){
                    alert('Vui lòng đánh giá điểm đầy đủ.'); return false;
                }
                var title = $.trim($('#title').val());
                var name = $.trim($('#name').val());
                var address = $.trim($('#address').val());
                var content = $.trim($('#content').val());
                if(title == '' || name == '' || address == '' || content == ''){
                    alert('Vui lòng nhập đầy đủ thông tin'); return false;
                }
               
            });
        });
    </script>
</body>
</html>