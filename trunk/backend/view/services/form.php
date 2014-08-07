<?php 
if(isset($_GET['service_id'])){
    $service_id = (int) $_GET['service_id'];
    require_once "model/Services.php";
    $model = new Services;
    $detail = $model->getDetailService($service_id);
}
?>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Services.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($service_id > 0) ? "Cập nhật" : "Tạo mới" ?> tiện ích nhà xe</h3>
                <?php if($service_id> 0){ ?>
                <input type="hidden" value="<?php echo $service_id; ?>" name="service_id" />
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
                        <label>Tên</label>
                        <input type="text" name="service_name_vi" class="form-control required" value="<?php echo isset($detail['service_name_vi'])  ? $detail['service_name_vi'] : "" ?>"/>
                    </div>
                   
                </div><!-- /.tab-pane -->
                <div id="tab_2" class="tab-pane">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="service_name_en" class="form-control required" value="<?php echo isset($detail['service_name_en'])  ? $detail['service_name_en'] : "" ?>">
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