<?php 

if(isset($_GET['code_id'])){

    $code_id = (int) $_GET['code_id'];

    require_once "model/Code.php";

    $model = new Code;

    $detail = $model->getDetailCode($code_id);

}
?>

<div class="row">

    <div class="col-md-8">

        <form method="post" action="controller/Code.php">            

        <!-- Custom Tabs -->

        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=promotion_code&act=list'">Danh sách</button>

        <div style="clear:both;margin-bottom:10px"></div>
        <div class="box box-primary">    
         <div class="box-header">

                <h3 class="box-title"><?php echo ($code_id > 0) ? "Cập nhật" : "Tạo mới" ?> promotion code <?php echo ($code_id > 0) ? " : ".$detail['title'] : ""; ?></h3>

                <?php if($code_id> 0){ ?>

                <input type="hidden" value="<?php echo $code_id; ?>" name="code_id" />

                <?php } ?>

            </div><!-- /.box-header -->

        <div class="box-body">            
            <div class="form-group">

                <label>Type <span class="required"> ( * ) </span></label>

                <select class="form-control required" name="type" id="type">

                    <option value="0">---chọn---</option>

                    <option value="1" <?php echo ($detail['type']==1) ? "selected" : ""; ?>>Giam gia</option>

                    <option value="2" <?php echo ($detail['type']==2) ? "selected" : ""; ?>>Tru tien</option>

                    <option value="3" <?php echo ($detail['type']==3) ? "selected" : ""; ?>>Qua tang</option>

                </select>

            </div>    
            <div class="form-group">

                    <label>CODE <span class="required"> ( * ) </span></label>

                    <input type="text" name="code" class="form-control required" value="<?php echo isset($detail['code'])  ? $detail['code'] : "" ?>">

            </div>
            <div class="form-group">

                <label>Value <span class="required"> ( * ) </span></label>                        

                <textarea rows="5" class="form-control required" name="code_value"><?php if(isset($detail['code_value'])) echo $detail['code_value']; ?></textarea>

            </div>
            <div class="form-group">

                <label>Ghi chu </label>                        

                <div>
                    <p>Neu Type la "Giam gia"  thi nhap nhu VD sau : 30% </p>
                    <p>Neu Type la "Tru tien"  thi nhap nhu VD sau : 30000 hoac 0.5 USD </p>
                    <p>Neu Type la "Qua tang"  thi nhap nhu VD sau : Tang gau bong onbus </p>
                </div>

            </div>
        
             
                  

            <div class="button">

                <button class="btn btn-primary btnSave" type="submit">Save</button>

                <button class="btn btn-primary" type="reset">Cancel</button>

            </div>

           

        </div><!-- nav-tabs-custom -->
        </div>
    </form>

    </div><!-- /.col --> 

</div>