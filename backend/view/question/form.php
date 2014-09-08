<?php 
if(isset($_GET['question_id'])){
    $question_id = (int) $_GET['question_id'];
    require_once "model/Question.php";
    $model = new Question;
    $detail = $model->getDetailQuestion($question_id);
}
?>

<script type="text/javascript" src="static/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="static/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
function BrowseServer( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#hinh_dai_dien').attr('src','../' + fileUrl).show();
}
</script>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Question.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($question_id > 0) ? "Cập nhật" : "Tạo mới" ?> câu hỏi</h3>
                <?php if($question_id> 0){ ?>
                <input type="hidden" value="<?php echo $question_id; ?>" name="question_id" />
                <?php } ?>
            </div><!-- /.box-header -->
        <div class="nav-tabs-custom">
            
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab_1">
                    <img src="<?php echo STATIC_URL?>img/vi.png"/>
                </a></li>
                <li class=""><a data-toggle="tab" href="#tab_2">
                    <img src="<?php echo STATIC_URL?>img/uk_.png"/>
                </a></li>              
                <li class="pull-right"><a class="text-muted" href="#"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div id="tab_1" class="tab-pane active">                                    
                    <div class="form-group">

                        <label>Câu hỏi <span class="required"> ( * ) </span></label>                        

                        <textarea rows="5" id="content_vi" class="form-control" name="content_vi"><?php if(isset($detail['content_vi'])) echo $detail['content_vi']; ?></textarea>

                    </div>
                    <div class="form-group">

                        <label>Trả lời <span class="required"> ( * ) </span></label>                        

                        <textarea rows="5" id="answer_vi" class="form-control" name="answer_vi"><?php if(isset($detail['answer_vi'])) echo $detail['answer_vi']; ?></textarea>

                    </div> 
                </div><!-- /.tab-pane -->
                <div id="tab_2" class="tab-pane">
                    <div class="form-group">

                        <label>Question <span class="required"> ( * ) </span></label>                        

                        <textarea rows="5" id="content_en" class="form-control" name="content_en"><?php if(isset($detail['content_en'])) echo $detail['content_en']; ?></textarea>

                    </div>
                    <div class="form-group">

                        <label>Answer <span class="required"> ( * ) </span></label>                        

                        <textarea rows="5" id="answer_en" class="form-control" name="answer_en"><?php if(isset($detail['answer_en'])) echo $detail['answer_en']; ?></textarea>

                    </div>                     
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->            
            <div class="button">
                <button class="btn btn-primary btnSave" type="submit">Save</button>
                <button class="btn btn-primary" type="reset">Cancel</button>
            </div>        
        </div><!-- nav-tabs-custom -->
    </form>
    </div><!-- /.col --> 
</div>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'content_vi',{
    uiColor : '#9AB8F3',
    language:'vi',
    height:100,
    skin:'office2003',
    filebrowserImageBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                
    toolbar:[
    ['Source','-','Save','NewQuestion','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','QuestionBreak'],
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
    ]
});   
var editor2 = CKEDITOR.replace( 'content_en',{
    uiColor : '#9AB8F3',
    language:'vi',
    height:100,
    skin:'office2003',
    filebrowserImageBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                
    toolbar:[
    ['Source','-','Save','NewQuestion','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','QuestionBreak'],
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
    ]
});  
var editor3 = CKEDITOR.replace( 'answer_vi',{
    uiColor : '#9AB8F3',
    language:'vi',
    height:300,
    skin:'office2003',
    filebrowserImageBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                
    toolbar:[
    ['Source','-','Save','NewQuestion','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','QuestionBreak'],
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
    ]
});  
var editor4 = CKEDITOR.replace( 'answer_en',{
    uiColor : '#9AB8F3',
    language:'vi',
    height:300,
    skin:'office2003',
    filebrowserImageBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'static/ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'static/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                
    toolbar:[
    ['Source','-','Save','NewQuestion','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','QuestionBreak'],
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
    ]
});   
</script>