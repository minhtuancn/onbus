<?php 
if(isset($_GET['place_id'])){
    $place_id = (int) $_GET['place_id'];
    require_once "model/Place.php";
    $model = new Place;
    $detail = $model->getDetailPlace($place_id);
}
require_once "model/Tinh.php";
$modelTinh = new Tinh;
?>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Place.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($place_id > 0) ? "Cập nhật" : "Tạo mới" ?> điểm xp/điểm đến</h3>
                <?php if($place_id> 0){ ?>
                <input type="hidden" value="<?php echo $place_id; ?>" name="place_id" />
                <?php } ?>
            </div><!-- /.box-header -->
            
        <div class="nav-tabs-custom">
            <div class="button">
                <div class="form-group">
                    <label>Miền <span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="mien_id" id="mien_id">
                        <option value="0">---chọn---</option>
                        <option value="1" <?php echo ($detail['mien_id']==1) ? "selected" : ""; ?>>Miền Nam</option>
                        <option value="2" <?php echo ($detail['mien_id']==2) ? "selected" : ""; ?>>Miền Trung - Tây Nguyên</option>
                        <option value="3" <?php echo ($detail['mien_id']==3) ? "selected" : ""; ?>>Miền Bắc</option>                                           
                    </select>
                </div>   
                <div class="form-group">
                    <label>Nơi đi/nơi đến <span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="tinh_id" id="tinh_id">
                        <option value="0">---chọn---</option>                                 
                    </select>
                </div>               
            </div>
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
                        <input type="text" name="place_name_vi" class="form-control required" value="<?php echo isset($detail['place_name_vi'])  ? $detail['place_name_vi'] : "" ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ <span class="required"> ( * ) </span></label>
                        <textarea rows="3" class="form-control required" name="address_vi"><?php if(isset($detail['address_vi'])) echo $detail['address_vi']; ?></textarea>
                    </div>
                   
                </div><!-- /.tab-pane -->
                <div id="tab_2" class="tab-pane">
                    <div class="form-group">
                        <label>Tên <span class="required"> ( * ) </span></label>
                        <input type="text" name="place_name_en" class="form-control required" value="<?php echo isset($detail['place_name_en'])  ? $detail['place_name_en'] : "" ?>">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ <span class="required"> ( * ) </span></label>
                        <textarea rows="3" class="form-control required" name="address_en"><?php if(isset($detail['address_en'])) echo $detail['address_en']; ?></textarea>
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
$(function(){    
    $('#mien_id').change(function(){
        var mien_id = $(this).val();        
        $.ajax({
            url: "Controller/Tinh.php",
            type: "POST",
            async: true,
            data: {
                'mien_id' : mien_id,
                'act' : "getTinhByMien"
            },
            success: function(data){                    
                $('#tinh_id').html(data);
            }
        });
    });
    <?php if($detail['mien_id']>0) {?>
        $.ajax({
            url: "Controller/Tinh.php",
            type: "POST",
            async: true,
            data: {
                'mien_id' : <?php echo $detail['mien_id']; ?>,
                'act' : "getTinhByMien"
            },
            success: function(data){                    
                $('#tinh_id').html(data);
                <?php if($detail['tinh_id'] > 0) {?>
                    $('#tinh_id').val(<?php echo $detail['tinh_id']; ?>);
                <?php } ?>
            }
        });
    <?php } ?>
});
    
</script>