<?php 
require_once "model/Tinh.php";
require_once "model/Route.php";

$modelTinh = new Tinh;
$modelRoute = new Route;

$arrListTinh = $modelTinh->getListTinh(-1,'',-1,-1,-1);
if(isset($_GET['route_id'])){
    $route_id = (int) $_GET['route_id'];
    require_once "model/Route.php";
    $model = new Route;
    $detail = $model->getDetailRoute($route_id);
}
?>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Route.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($route_id > 0) ? "Cập nhật" : "Tạo mới" ?> tuyến đường</h3>
                <?php if($route_id> 0){ ?>
                <input type="hidden" value="<?php echo $route_id; ?>" name="route_id" />
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
                        <input type="text" name="route_name_vi" class="form-control required" value="<?php echo isset($detail['route_name_vi'])  ? $detail['route_name_vi'] : "" ?>"/>
                    </div>
                   
                </div><!-- /.tab-pane -->
                <div id="tab_2" class="tab-pane">
                    <div class="form-group">
                        <label>Name <span class="required"> ( * ) </span></label>
                        <input type="text" name="route_name_en" class="form-control required" value="<?php echo isset($detail['route_name_en'])  ? $detail['route_name_en'] : "" ?>">
                    </div>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
            <div class="button">                
                <div class="form-group">
                    <label>Nơi đi<span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="tinh_id_start">
                        <option value='0'>---chọn---</option>   
                        <?php 
                        if(!empty($arrListTinh['data'])){
                            foreach ($arrListTinh['data'] as $key => $value) {
                                ?>
                                <option value='<?php echo $value['tinh_id']; ?>'
                                    <?php if(isset($detail['tinh_id_start']) && $detail['tinh_id_start'] == $value['tinh_id']) echo "selected";?>
                                    ><?php echo $value['tinh_name_vi']; ?></option>     
                                <?php
                            }
                        }
                        ?>                     
                    </select>
                </div>
                <div class="form-group">
                    <label>Nơi đến <span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="tinh_id_end">
                        <option value="0">---chọn---</option>
                        <?php 
                        if(!empty($arrListTinh['data'])){
                            foreach ($arrListTinh['data'] as $key => $value) {
                                ?>
                                <option value='<?php echo $value['tinh_id']; ?>'
                                    <?php if(isset($detail['tinh_id_end']) && $detail['tinh_id_end'] == $value['tinh_id']) echo "selected";?>
                                    ><?php echo $value['tinh_name_vi']; ?></option>     
                                <?php
                            }
                        }
                        ?>                            
                    </select>
                </div>
                <div class="checkbox" style="margin-bottom:20px">
                <label class="">
                    <input type="checkbox" name="hot" value="1" <?php echo ($detail['hot']==1) ? "checked" : ""; ?> />               
                    <strong>TUYẾN ĐƯỜNG PHỔ BIẾN</strong>
                </label>                                                
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea rows="3" class="form-control" name="description"><?php if(isset($detail['description'])) echo $detail['description']; ?></textarea>
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