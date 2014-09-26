<?php 

if(isset($_GET['article_id'])){

    $article_id = (int) $_GET['article_id'];

    require_once "model/Articles.php";

    $model = new Articles;

    $detail = $model->getDetailArticle($article_id);

}
require_once "model/Tinh.php";

$modelTinh = new Tinh;
$arrHot = $modelTinh->getListTinh(-1,'',1,0, 20);
?>

<script type="text/javascript" src="static/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="static/js/ajaxupload.js"></script>
<div class="row">

    <div class="col-md-8">

        <form method="post" action="controller/Articles.php">            

        <!-- Custom Tabs -->

        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=articles&act=list'">Danh sách tin tức</button>

        <div style="clear:both;margin-bottom:10px"></div>
        <div class="box box-primary">    
         <div class="box-header">

                <h3 class="box-title"><?php echo ($article_id > 0) ? "Cập nhật" : "Tạo mới" ?> tin tức <?php echo ($article_id > 0) ? " : ".$detail['title'] : ""; ?></h3>

                <?php if($article_id> 0){ ?>

                <input type="hidden" value="<?php echo $article_id; ?>" name="article_id" />

                <?php } ?>

            </div><!-- /.box-header -->

        <div class="box-body">            
            <div class="form-group">

                <label>Ngôn ngữ <span class="required"> ( * ) </span></label>

                <select class="form-control required" name="lang_id" id="lang_id">

                    <option value="0">---chọn---</option>

                    <option value="1" <?php echo ($detail['lang_id']==1) ? "selected" : ""; ?>>Tiếng Việt</option>

                    <option value="2" <?php echo ($detail['lang_id']==2) ? "selected" : ""; ?>>Tiếng Anh</option>

                </select>

            </div>    
            <div class="form-group">

                    <label>Tiêu đề <span class="required"> ( * ) </span></label>

                    <input type="text" name="title" class="form-control required" value="<?php echo isset($detail['title'])  ? $detail['title'] : "" ?>">

            </div>
            <div class="form-group">

                <label>Mô tả ngắn </label>                        

                <textarea rows="5" class="form-control" name="description"><?php if(isset($detail['description'])) echo $detail['description']; ?></textarea>

            </div>
            <div class="form-group">

                    <label>Hình đại diện &nbsp;&nbsp;&nbsp;</label>

                    <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php echo isset($detail['image_url'])  ? $detail['image_url'] : "" ?>">    

                    <img src="<?php echo $detail['image_url']!=""  ? "../".$detail['image_url'] : "" ?>" id="hinh_dai_dien" width="400" style="<?php echo $detail['image_url']!=""  ? "" : "display:none;" ?>margin-top:5px"/>

                    <button class="btn btn-primary" type="button" onclick="BrowseServer('Images:/','image_url')" >Chọn ảnh</button>

<div style="color:red;font-size:19px">
Tin thường : 280 x 185 px<br />
Tin HOT : 475 x 300 px<br />
</div>


                </div>
            <div class="checkbox" style="margin-bottom:20px">

                <label class="">

                    <input type="checkbox" name="hot" value="1" <?php echo ($detail['hot']==1) ? "checked" : ""; ?> />               

                    <strong>TIN HOT (SLIDE)</strong>

                </label>                                                

                </div>                
            <div class="form-group">

                <label>Nội dung <span class="required"> ( * ) </span></label>                        

                <textarea rows="5" id="content" class="form-control" name="content"><?php if(isset($detail['content'])) echo $detail['content']; ?></textarea>

            </div>           

            <div class="button">

                <button class="btn btn-primary btnSave" type="submit">Save</button>

                <button class="btn btn-primary" type="reset">Cancel</button>

            </div>

           

        </div><!-- nav-tabs-custom -->
        </div>
    </form>

    </div><!-- /.col --> 

</div>
<div style="display: none" id="box_uploadimages">
    <div class="upload_wrapper block_auto">
        <div class="note" style="text-align:center;">Hold <strong>Ctrl</strong> to select multiple image files.</div>
        <form id="upload_files_new" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="ajax/upload.php"> 
            <fieldset style="width: 100%; margin-bottom: 10px; height: 47px; padding: 5px;">
                <legend><b>&nbsp;&nbsp;Insert form PC:&nbsp;&nbsp;</b></legend>
                <input style="border-radius:2px;" type="file" id="myfile" name="myfile[]" multiple/>
                <div class="clear"></div>
                <div class="progress_upload" style="text-align: center;border: 1px solid;border-radius: 3px;position: relative;display: none;">
                    <div class="bar_upload" style="background-color: grey;border-radius: 1px;height: 13px;width: 0%;"></div >
                    <div class="percent_upload" style="color: #FFFFFF;left: 140px;position: absolute;top: 1px;">0%</div >
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'content',{
    uiColor : '#9AB8F3',
    language:'vi',
    height:400,
    skin:'office2003',
    toolbar:[
    ['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
    ]
});     
</script>