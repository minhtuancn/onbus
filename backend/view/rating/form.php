<?php 
require_once "model/Rating.php";


$modelRating = new Rating;


require_once "model/Nhaxe.php";

$modelNhaxe = new Nhaxe;
// list nha xe

$arrListNhaxe = $modelNhaxe->getListNhaxe('',-1, -1, -1);

?>



<div class="row">



    <div class="col-md-8">



        <form method="post" action="controller/Rating.php">            



        <!-- Custom Tabs -->



        <button class="btn btn-primary btn-sm">Danh sách email đánh giá</button>



        <div style="clear:both;margin-bottom:10px"></div>



         <div class="box-header">



                <h3 class="box-title">Tạo mới danh sách email đánh giá</h3>



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

                        <label>Ngôn ngữ<span class="required"> ( * ) </span></label>

                        <select class="form-control required" name="lang" id="lang">

                            <option value="0">---chọn---</option> 
                            <option value="1">Tiếng Việt</option> 
                            <option value="2">Tiếng Anh</option> 
                                                       

                        </select>

                </div>                            
                <div class="form-group">
                    <label>List email <span class="required"> ( * ) </span></label>                        
                    <textarea rows="10" class="form-control required" name="list_email"></textarea>
                </div>
                <p style="font-size:18px">Lưu ý : list email cách nhau bằng dấu ";" <br />
                    VD : <span style="color:red">email_1@gmail.com; email_2@gmail.com; email_3@gmail.com</span>
                </p>
              

            </div>

            <div class="button">

                <button class="btn btn-primary btnSave" type="submit">Save</button>

                <button class="btn btn-primary" type="reset">Cancel</button>

            </div>

        </div><!-- nav-tabs-custom -->



    </form>



    </div><!-- /.col --> 



</div>