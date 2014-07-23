<?php 
if(isset($_GET['place_id'])){
    $place_id = (int) $_GET['place_id'];
    require_once "model/Place.php";
    $model = new Place;
    $detail = $model->getDetailPlace($place_id);
}
?>
<section class="content-header">    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Place.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($place_id > 0) ? "Cập nhật" : "Tạo mới" ?> địa điểm</h3>
                <?php if($place_id> 0){ ?>
                <input type="hidden" value="<?php echo $place_id; ?>" name="place_id" />
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