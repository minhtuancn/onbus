<?php 



require_once "model/Tinh.php";



require_once "model/Route.php";







$modelTinh = new Tinh;



$modelRoute = new Route;


require_once "model/Nhaxe.php";

$modelNhaxe = new Nhaxe;
// list nha xe

$arrListNhaxe = $modelNhaxe->getListNhaxe('',-1, -1, -1);



$arrListTinh = $modelTinh->getListTinh(-1,'',-1,-1,-1);

$arrRoute = $modelRoute->getListRoute('',-1,-1,-1, -1, -1);

if(isset($_GET['troute_id'])){



    $troute_id = (int) $_GET['troute_id'];



    require_once "model/Troute.php";



    $model = new Troute;



    $detail = $model->getDetailTroute($troute_id);



}



?>



<div class="row">



    <div class="col-md-8">



        <form method="post" action="controller/Troute.php">            



        <!-- Custom Tabs -->



        <button class="btn btn-primary btn-sm">Danh sách</button>



        <div style="clear:both;margin-bottom:10px"></div>



         <div class="box-header">



                <h3 class="box-title"><?php echo ($route_id > 0) ? "Cập nhật" : "Tạo mới" ?> tuyến đường phổ biến</h3>



                <?php if($troute_id> 0){ ?>



                <input type="hidden" value="<?php echo $troute_id; ?>" name="troute_id" />



                <?php } ?>



            </div><!-- /.box-header -->



        <div class="nav-tabs-custom"> 


            <div class="button"> 
                <div class="form-group">

                        <label>Nhà xe<span class="required"> ( * ) </span></label>

                        <select class="form-control required" name="nhaxe_id" id="nhaxe_id">

                            <option value="0">---chọn---</option> 

                             <?php if(!empty($arrListNhaxe['data'])){

                                foreach ($arrListNhaxe['data'] as $value) {

                                    ?>

                                    <option <?php echo $detail['nhaxe_id'] == $value['nhaxe_id'] ? "selected" : ""; ?> value="<?php echo $value['nhaxe_id']; ?>"><?php echo $value['nhaxe_name_vi']; ?></option> 

                                    <?php 

                                }}

                                ?>                           

                        </select>

                </div> 
                <div class="form-group">

                        <label>Tuyến đường<span class="required"> ( * ) </span></label>

                        <select class="form-control required" name="route_id" id="route_id">

                            <option value="0">---chọn---</option> 

                             <?php if(!empty($arrRoute['data'])){

                                foreach ($arrRoute['data'] as $value) {

                                    ?>

                                    <option <?php echo $detail['route_id'] == $value['route_id'] ? "selected" : ""; ?> value="<?php echo $value['route_id']; ?>"><?php echo $value['route_name_vi']; ?></option> 

                                    <?php 

                                }}

                                ?>                           

                        </select>

                </div>              
                

                <div class="row">

                    <div class="col-md-6" >

                        <div class="form-group">

                            <label>First Bus<span class="required"> ( * ) </span></label>

                            <input type="text" name="min_time" class="form-control required" value="<?php echo (isset($detail['min_time']))  ? $detail['min_time'] : "" ?>"/>

                        </div>

                    </div>

                    <div class="col-md-6">



                        <div class="form-group">

                            <label>Last Bus<span class="required"> ( * ) </span></label>
                            <input type="text" name="max_time" class="form-control required" value="<?php echo isset($detail['max_time'])  ? $detail['max_time'] : "" ?>"/>



                        </div> 

                    </div>

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