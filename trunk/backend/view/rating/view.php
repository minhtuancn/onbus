<?php 
require_once "model/Rating.php";

$model = new Rating;

require_once "model/Nhaxe.php";

$modelNhaxe = new Nhaxe;
if(isset($_GET['nhaxe_id']) && isset($_GET['email_id'])){

    $nhaxe_id = (int) $_GET['nhaxe_id'];
    $email_id = (int) $_GET['email_id'];

    

    $detail = $model->getDetailRating($nhaxe_id,$email_id);

}
if(isset($_POST['btnSave'])){
    $nhaxe_id = (int) $_POST['nhaxe_id'];
    $email_id = (int) $_POST['email_id'];
    $status = (int) $_POST['status'];
    mysql_query("UPDATE email_rating SET status = $status WHERE nhaxe_id = $nhaxe_id AND email_id = $email_id");
    mysql_query("UPDATE rating_detail SET status = $status WHERE nhaxe_id = $nhaxe_id AND email_id = $email_id");
    header("location:index.php?mod=rating&act=list&nhaxe_id=".$nhaxe_id);
}
?>

<div class="row">

    <div class="col-md-8">

        <form method="post" action="">            

        <!-- Custom Tabs -->

        <button class="btn btn-primary btn-sm" type="button" onclick="location.href='index.php?mod=rating&act=list&nhaxe_id=<?php echo $nhaxe_id; ?>'">Back</button>

        <div style="clear:both;margin-bottom:10px"></div>
        <div class="box box-primary">    
         <div class="box-header">

                <h3 class="box-title">Chi tiết email <span style="color:blue">"<?php echo $model->getEmailByEmailID($email_id); ?>"</span>
đánh giá nhà xe <span style="color:blue">"<?php echo $modelNhaxe->getNhaxeNameByID($nhaxe_id); ?>"</span>
                </h3>                

            </div><!-- /.box-header -->

        <div class="box-body">            
            
            <div class="form-group">

                    <label>Chất lượng xe </label> : 

                    <i><?php echo ($detail['point1']);?></i>

            </div> 
            <div class="form-group">

                    <label>Thái độ phục vụ </label> : 

                    <i><?php echo ($detail['point2']);?></i>

            </div>    
            <div class="form-group">

                    <label>Đúng giờ </label> : 

                    <?php echo ($detail['point3']);?>

            </div>  
            <div class="form-group">

                    <label>An toàn </label> : 

                    <i><?php echo ($detail['point4']);?></i>

            </div>

            <div class="form-group">

                    <label>Tên</label> : 

                    <?php echo ($detail['name']);?>

            </div> 
            <div class="form-group">

                    <label>Địa chỉ </label> : 

                    <i><?php echo ($detail['title']);?></i>

            </div> 
            <div class="form-group">

                    <label>Nội dung</label> : 

                    <i><?php echo ($detail['content']);?></i>

            </div>                             
                  

            <div class="button">
                <input type="hidden" value="<?php echo $email_id; ?>" name="email_id" />
                <input type="hidden" value="<?php echo $nhaxe_id?>" name="nhaxe_id" />
                <?php 
var_dump($detail['status']);
                if($detail['status']==2) { ?>
                <button class="btn btn-primary btnSave" name="btnSave" type="submit">Duyệt đánh giá</button>
                <input type="hidden" value="1" name="status" />
                <?php }else{ ?>
                <button class="btn btn-primary btnSave" name="btnSave" type="submit">Bỏ duyệt đánh giá</button>
                <input type="hidden" value="2" name="status" />
                <?php } ?>


            </div>

           

        </div><!-- nav-tabs-custom -->
        </div>
    </form>

    </div><!-- /.col --> 

</div>