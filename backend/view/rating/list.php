<?php

require_once "model/Rating.php";

$model = new Rating;

$link = "index.php?mod=rating&act=list";


if (isset($_GET['status']) && $_GET['status'] > -1) {

    $status = (int) $_GET['status'];      

    $link.="&status=$status";

} else {

    $status = 2;

}
if (isset($_GET['nhaxe_id']) && $_GET['nhaxe_id'] > -1) {

    $nhaxe_id = (int) $_GET['nhaxe_id'];      

    $link.="&nhaxe_id=$nhaxe_id";

} else {

    $nhaxe_id = -1;

}
if (isset($_GET['lang']) && $_GET['lang'] > -1) {

    $lang = (int) $_GET['lang'];      

    $link.="&lang=$lang";

} else {

    $lang = -1;

}


$limit = 20;

$arrTotal = $model->getListRating($nhaxe_id,$lang, $status, -1, -1);



$total_page = ceil($arrTotal['total'] / $limit);



$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;



$offset = $limit * ($page - 1);



$arrList = $model->getListRating($nhaxe_id,$lang,$status,$offset, $limit);

require_once "model/Nhaxe.php";

$modelNhaxe = new Nhaxe;
// list nha xe

$arrListNhaxe = $modelNhaxe->getListNhaxe('',-1, -1, -1);

?>



<div class="row">

    <div class="col-md-12">

    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=rating&act=form'">Tạo mới</button>        

         <div class="box-header">

                <h3 class="box-title">Danh sách email đánh giá</h3>

            </div><!-- /.box-header -->

        <div class="box">

            <div class="box_search">

                

                <form method="get" id="form_search" name="form_search">

                    <input type="hidden" name="mod" value="rating" />

                    <input type="hidden" name="act" value="list" />
                    Nhà xe <select class="event_change select_search" style="width:200px" name="nhaxe_id" id="nhaxe_id">

                        <option value="-1">---Tất cả---</option> 

                         <?php if(!empty($arrListNhaxe['data'])){

                            foreach ($arrListNhaxe['data'] as $value) {

                                ?>

                                <option <?php echo $nhaxe_id == $value['nhaxe_id'] ? "selected" : ""; ?> value="<?php echo $value['nhaxe_id']; ?>"><?php echo $value['nhaxe_name_vi']; ?></option> 

                                <?php 

                            }}

                            ?>                           

                    </select>&nbsp;&nbsp;&nbsp;
                    Ngôn ngữ <select class="event_change select_search" style="width:150px" name="lang" id="lang">

                        <option value="-1">---Tất cả---</option> 

                        <option value="1">Tiếng Việt</option> 
                            <option value="2">Tiếng Anh</option>                        

                    </select>&nbsp;&nbsp;&nbsp;
                   Status
                    <select name="status" class="event_change select_search">

                        <option value="0">Chọn</option>  
                        <option value="3" <?php echo ($status==3) ? "selected" : ""; ?>>Chưa đánh giá</option>

                        <option value="1" <?php echo ($status==1) ? "selected" : ""; ?>>Đã duyệt</option>   

                        <option value="2" <?php echo ($status==2) ? "selected" : ""; ?>>Chưa duyệt</option>        

                    </select>                   

                </form>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped">

                    <tbody><tr>

                        <th style="width: 1%">No.</th>
                        <th width="70">Nhà xe</th>
                        <th width="150">Email</th>
                        <th width="50">Ngôn ngữ</th>
                        <th width="140">Link đánh giá</th>
                        
                        <th width="1%">Status</th>                                              

                        <th style="width: 1%">Action</th>

                    </tr>

                    <?php

                    $i = ($page-1) * $limit; 

                    if(!empty($arrList['data'])){                   

                    foreach($arrList['data'] as $row){

                    $i++;

                    ?>

                    <tr>

                        <td align="center"><?php echo $i; ?></td>                        
                        <td>
                        <?php echo $modelNhaxe->getNhaxeNameByID($row['nhaxe_id']); ?>
                       </td>
                        <td>
                        <?php echo $row['email']; ?>
                       </td>
                            
                        <td>
                        <?php echo $row['lang']==1 ? "Tiếng Việt" : "Tiếng Anh"; ?>
                        </td>
                        <td>
                        http://onbus.vn/rating.php?code=<?php echo $row['code'];?>&lang=<?php echo $row['lang']; ?>
                        </td>                                                             
                       
                        <td align="center">
                        <?php if($row['status']==1){ ?>
                            <img src="<?php echo STATIC_URL; ?>/img/ok.png" title="Đã kích hoạt" alt="Đã kích hoạt" class="active" 
                            data-id="<?php echo $row['code_id']; ?>" data-status="2" style="cursor:pointer"
                            />
                        <?php }elseif($row['status']==2){ ?>
                            <img src="<?php echo STATIC_URL; ?>/img/error.png" title="Chưa kích hoạt" alt="Chưa kích hoạt" class="active" 
                            data-id="<?php echo $row['code_id']; ?>" data-status="1" style="cursor:pointer"
                            />
                        <?php }else{ ?>
                        <span style="color:red">Chưa đánh giá</span>
                        <?php } ?>
                        </td>                                    

                        <td style="white-space:nowrap;text-align:center">                            
                            <?php if($row['status']!=3){ ?>    
                            <a href="index.php?mod=rating&act=view&email_id=<?php echo $row['email_id']; ?>&nhaxe_id=<?php echo $row['nhaxe_id']?>" alias="<?php echo $row['code']; ?>" id="<?php echo $row['code_id']; ?>" mod="rating" >    

                                <i class="fa fa-fw fa-file-text-o"></i>

                            </a>
                            <?php } ?>
                            <a href="javascript:;" alias="<?php echo $row['code']; ?>" id="<?php echo $row['code_id']; ?>" mod="rating" class="link_delete" >    

                                <i class="fa fa-fw fa-trash-o"></i>

                            </a>    

                            

                        </td>

                    </tr>      

                    <?php } }else{ ?>              

                    <tr>

                        <td colspan="8" class="error_data">Không tìm thấy dữ liệu!</td>

                    </tr>

                    <?php } ?>

                </tbody></table>

            </div><!-- /.box-body -->

            <div class="box-footer clearfix">           

                <?php echo $model->phantrang($page, PAGE_SHOW, $total_page, $link); ?>

            </div>

        </div><!-- /.box -->                           

    </div><!-- /.col -->

   

</div>
<script type="text/javascript">
$(function(){
    $('img.active').click(function(){
        var obj = $(this);
        var status = obj.attr('data-status');
        var str_confirm = (status==2) ? "Bạn có chắc chắn bỏ kích hoạt ?" : "Bạn có chắc chắn kích hoạt ?";
        var src_img = (status==2) ? "<?php echo STATIC_URL; ?>/img/error.png" : "<?php echo STATIC_URL; ?>/img/ok.png";
        if(confirm(str_confirm)){
            $.ajax({
                url: "ajax/process.php",
                type: "POST",
                async: true,
                data: {
                    'code_id' : obj.attr('data-id'),
                    'status' : status,
                    'mod' : 'code',
                    'action' : 'active'
                },
                success: function(data){                    
                    obj.attr('src',src_img);
                    alert(data);                    
                }
            });
        }else{
            return false;
        }
    });
});
</script>