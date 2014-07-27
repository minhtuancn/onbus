<?php 
if(isset($_GET['type_id'])){
    $type_id = (int) $_GET['type_id'];
    require_once "model/Time.php";
    $model = new Time;
    $detail = $model->getDetailTime($type_id);
}
?>
<div class="row">
    <div class="col-md-8">
        
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo ($type_id > 0) ? "Cập nhật" : "Tạo mới" ?> loại xe</h3>                
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="controller/Car.php">
                <?php if($type_id> 0){ ?>
                <input type="hidden" value="<?php echo $type_id; ?>" name="type_id" />
                <?php } ?>
                <div class="box-body">
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
                                <label>Loại xe</label>
                                <input type="text" name="type_name_vi" class="form-control required" value="<?php echo isset($detail['type_name_vi'])  ? $detail['type_name_vi'] : "" ?>"/>
                            </div>
                           
                        </div><!-- /.tab-pane -->
                        <div id="tab_2" class="tab-pane">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type_name_en" class="form-control required" value="<?php echo isset($detail['type_name_en'])  ? $detail['type_name_en'] : "" ?>">
                            </div>
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->                
                </div><!-- /.box-body -->

                <div class="box-footer">
                     <button class="btn btn-primary btnSave" type="submit">Save</button>
                     <button class="btn btn-primary" type="reset">Cancel</button>
                </div>
            </form>
        </div>

    </div><!-- /.col --> 
</div>