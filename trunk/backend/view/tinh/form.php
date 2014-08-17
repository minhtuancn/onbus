<?php 
if(isset($_GET['tinh_id'])){
    $tinh_id = (int) $_GET['tinh_id'];
    require_once "model/Tinh.php";
    $model = new Tinh;
    $detail = $model->getDetailTinh($tinh_id);
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
        <form method="post" action="controller/Tinh.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($tinh_id > 0) ? "Cập nhật" : "Tạo mới" ?> nơi đi/nơi đến</h3>
                <?php if($tinh_id> 0){ ?>
                <input type="hidden" value="<?php echo $tinh_id; ?>" name="tinh_id" />
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
                        <label>Tên <span class="required"> ( * ) </span></label>
                        <input type="text" name="tinh_name_vi" class="form-control required" value="<?php echo isset($detail['tinh_name_vi'])  ? $detail['tinh_name_vi'] : "" ?>"/>
                    </div>                   
                   
                </div><!-- /.tab-pane -->
                <div id="tab_2" class="tab-pane">
                    <div class="form-group">
                        <label>Tên <span class="required"> ( * ) </span></label>
                        <input type="text" name="tinh_name_en" class="form-control required" value="<?php echo isset($detail['tinh_name_en'])  ? $detail['tinh_name_en'] : "" ?>">
                    </div>                    
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
            <div class="button">
                <div class="form-group">
                    <label>Miền <span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="mien_id">
                        <option value="0">---chọn---</option>
                        <option value="1" <?php echo ($detail['mien_id']==1) ? "selected" : ""; ?>>Miền Nam</option>
                        <option value="2" <?php echo ($detail['mien_id']==2) ? "selected" : ""; ?>>Miền Trung - Tây Nguyên</option>
                        <option value="3" <?php echo ($detail['mien_id']==3) ? "selected" : ""; ?>>Miền Bắc</option>                                           
                    </select>
                </div>
                <div class="checkbox" style="margin-bottom:20px;margin-top:20px">
                    <label class="">
                        <input type="checkbox" name="hot" value="1" <?php echo ($detail['hot']==1) ? "checked" : ""; ?> />               
                        <strong>ĐIỂM ĐẾN HOT</strong>
                    </label>                                                
                </div>
                <div class="form-group is_hot">
                    <label>Giá từ ( chỉ nhập nếu là điểm đến HOT )</label>
                    <input type="text" name="price_between" class="form-control" value="<?php echo isset($detail['price_between'])  ? $detail['price_between'] : "" ?>">
                </div>
                <div class="form-group is_hot">
                    <label>Hình đại diện ( chỉ nhập nếu là điểm đến HOT, size : 289 x 220 px ) &nbsp;&nbsp;&nbsp;</label>
                    <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php echo isset($detail['image_url'])  ? $detail['image_url'] : "" ?>">
                    <img src="<?php echo (isset($detail['image_url']) && $detail['image_url']!=null)  ? "../".$detail['image_url'] : "" ?>" id="hinh_dai_dien" width="400" style="<?php echo isset($detail['image_url'])  ? "" : "display:none;" ?>margin-top:5px"/>
                    <button class="btn btn-primary" type="button" onclick="BrowseServer('Images:/','image_url')" >Chọn ảnh</button>
                </div>
            </div>
            <div class="button">
                <button class="btn btn-primary btnSave" type="submit">Save</button>
                <button class="btn btn-primary" type="reset">Cancel</button>
            </div>        
        </div><!-- nav-tabs-custom -->
    </form>
    </div><!-- /.col --> 
</div>