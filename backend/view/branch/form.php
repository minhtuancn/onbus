<?php 
if(isset($_GET['nhaxe_id'])){
    $nhaxe_id = (int) $_GET['nhaxe_id'];
    require_once "model/Nhaxe.php";
    $modelNhaxe = new Nhaxe;
    $detailNhaxe = $modelNhaxe->getDetailNhaxe($nhaxe_id);
}
if(isset($_GET['branch_id'])){
    $branch_id = (int) $_GET['branch_id'];
    require_once "model/Branch.php";
    $modelBranch = new Branch;
    $detail = $modelBranch->getDetailBranch($branch_id);
    
}
require_once "model/Tinh.php";
$modelTinh = new Tinh;
?>
<section class="content-header">    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Branch.php">            
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($branch_id > 0) ? "Cập nhật" : "Tạo mới" ?> chi nhánh nhà xe <?php echo ($nhaxe_id > 0) ? " : ".$detailNhaxe['nhaxe_name_vi'] : ""; ?></h3>
                <?php if($nhaxe_id> 0){ ?>
                <input type="hidden" value="<?php echo $nhaxe_id; ?>" name="nhaxe_id" />
                <?php } ?>
                <?php if($branch_id> 0){ ?>
                <input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id" />
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
                        <label>Tên chi nhánh <span class="required"> ( * ) </span></label>
                        <input type="text" name="branch_name_vi" class="form-control required" value="<?php echo isset($detail['branch_name_vi'])  ? $detail['branch_name_vi'] : "" ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ<span class="required"> ( * ) </span></label>
                        <textarea rows="3" class="form-control required" name="address_vi"><?php if(isset($detail['address_vi'])) echo $detail['address_vi']; ?></textarea>
                    </div>
                </div><!-- /.tab-pane -->
                <div id="tab_2" class="tab-pane">
                    <div class="form-group">
                        <label>Tên chi nhánh <span class="required"> ( * ) </span></label>
                        <input type="text" name="branch_name_en" class="form-control required" value="<?php echo isset($detail['branch_name_en'])  ? $detail['branch_name_en'] : "" ?>">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ <span class="required"> ( * ) </span></label>
                        <textarea rows="3" class="form-control required" name="address_en"><?php if(isset($detail['address_en'])) echo $detail['address_en']; ?></textarea>                       
                    </div>                    
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
            <div class="button">               
                <div class="form-group">
                    <label>Tỉnh/thành<span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="tinh_id">
                        <option value="0">---chọn---</option>   
                        <?php 
                        $arrListTinh = $modelTinh->getListTinhByStatus(1,-1,-1);
                        if(!empty($arrListTinh['data'])){
                            foreach ($arrListTinh['data'] as $key => $value) {
                                ?>
                                <option value='<?php echo $value['tinh_id']; ?>'
                                    <?php if(isset($detail['tinh_id']) && $detail['tinh_id'] == $value['tinh_id']) echo "selected";?>
                                    ><?php echo $value['tinh_name_vi']; ?></option>     
                                <?php
                            }
                        }
                        ?>                     
                    </select>
                </div>
                <div class="form-group">
                    <label>Số điện thoại <span class="required"> ( * ) </span></label>
                    <input type="text" name="phone" class="form-control required" value="<?php echo isset($detail['phone'])  ? $detail['phone'] : "" ?>">
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