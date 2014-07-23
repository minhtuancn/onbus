<?php 
if(isset($_GET['tinh_id'])){
    $tinh_id = (int) $_GET['tinh_id'];
    require_once "model/Tinh.php";
    $model = new Tinh;
    $detail = $model->getDetailTinh($tinh_id);
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
        <form method="post" action="controller/Tinh.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($tinh_id > 0) ? "Cập nhật" : "Tạo mới" ?> tỉnh thành</h3>
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
                <button class="btn btn-primary btnSave" type="submit">Save</button>
                <button class="btn btn-primary" type="reset">Cancel</button>
            </div>
           
        </div><!-- nav-tabs-custom -->
    </form>
    </div><!-- /.col --> 
</div>