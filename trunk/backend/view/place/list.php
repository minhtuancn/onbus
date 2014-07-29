<?php

require_once "model/Place.php";

$model = new Place;

$link = "index.php?mod=place&act=list";



require_once "model/Tinh.php";

$modelTinh = new Tinh;



if (isset($_GET['mien_id']) && $_GET['mien_id'] > 0) {

    $mien_id = (int) $_GET['mien_id'];      

    $link.="&mien_id=$mien_id";

} else {

    $mien_id = -1;

}

if (isset($_GET['tinh_id']) && $_GET['tinh_id'] > 0) {

    $tinh_id = (int) $_GET['tinh_id'];      

    $link.="&tinh_id=$tinh_id";

} else {

    $tinh_id = -1;

}



if (isset($_GET['keyword']) && trim($_GET['keyword']) != '') {

    $keyword = $_GET['keyword'];      

    $link.="&keyword=$keyword";

} else {

    $keyword = '';

}





$arrTotal = $model->getListPlace($mien_id,$tinh_id,$keyword, -1, -1);



$total_page = ceil($arrTotal['total'] / LIMIT);



$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;



$offset = LIMIT * ($page - 1);



$arrList = $model->getListPlace($mien_id,$tinh_id,$keyword,$offset, LIMIT);

?>

<div class="row">

    <div class="col-md-12">

    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=place&act=form'">Tạo mới</button>        

         <div class="box-header">

                <h3 class="box-title">Danh sách điểm xp/điểm đến</h3>

            </div><!-- /.box-header -->

        <div class="box">

            <div class="box_search">                 

                    Miền 

                    <select class="select_search" name="mien_id" id="mien_id">

                        <option value="0">---Tất cả---</option>

                        <option value="1" <?php echo ($_GET['mien_id']==1) ? "selected" : ""; ?>>Miền Nam</option>

                        <option value="2" <?php echo ($_GET['mien_id']==2) ? "selected" : ""; ?>>Miền Trung - Tây Nguyên</option>

                        <option value="3" <?php echo ($_GET['mien_id']==3) ? "selected" : ""; ?>>Miền Bắc</option>                                           

                    </select>

                    &nbsp;&nbsp;&nbsp;

                    Nơi đi/nơi đến 

                    <select class="select_search" style="width:170px" name="tinh_id" id="tinh_id">

                        <option value="0">---Tất cả---</option>                        

                    </select>

                    &nbsp;&nbsp;&nbsp;

                   Tên  &nbsp;

                   <input type="text" class="text_search" id="keyword" name="keyword" value="<?php echo (trim($keyword)!='') ? $keyword: ""; ?>" /> 

                    &nbsp;&nbsp;&nbsp;

                    <button class="btn btn-primary btn-sm right" id="btnSearch" type="button">Tìm kiếm</button>

                

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped">

                    <tbody><tr>

                        <th style="width: 10px">No.</th>

                        <th style="width:150px;white-space:nowrap">Nơi đi/nơi đến</th>

                        <th>Tên <img src="<?php echo STATIC_URL?>img/vi.png"/></th>

                        <th>Tên <img src="<?php echo STATIC_URL?>img/uk_.png"/></th>

                        <th>Địa chỉ</th>

                        <th>Ngày tạo</th>                        

                        <th style="width: 40px">Action</th>

                    </tr>

                    <?php
                    if(!empty($arrList['data'])){
                    $i = ($page-1) * LIMIT;                    

                    foreach($arrList['data'] as $row){

                    $i++;

                    ?>

                    <tr>

                        <td><?php echo $i; ?></td>

                        <td><?php echo $modelTinh->getTinhNameByID($row['tinh_id']); ?></td>

                        <td>

                            <a href="index.php?mod=place&act=form&place_id=<?php echo $row['place_id']; ?>">

                                <?php echo $row['place_name_vi']; ?>

                            </a>

                        </td>

                        <td><?php echo $row['place_name_en']; ?></td>

                        <td><?php echo $row['address_vi']; ?></td>

                        <td><?php echo date('d-m-Y',$row['creation_time']); ?></td>                        

                        <td style="white-space:nowrap">

                            <a href="index.php?mod=place&act=form&place_id=<?php echo $row['place_id']; ?>">

                                <i class="fa fa-fw fa-edit"></i>

                            </a>

                            <a href="javascript:;" alias="<?php echo $row['place_name_vi']; ?>" id="<?php echo $row['place_id']; ?>" mod="place" class="link_delete" >    

                                <i class="fa fa-fw fa-trash-o"></i>

                            </a>    

                            

                        </td>

                    </tr>      

                    <?php } }else{ ?>              

                    <tr>

                        <td colspan="7" class="error_data">Không tìm thấy dữ liệu!</td>

                    </tr>

                    <?php } ?>  
                </tbody></table>

            </div><!-- /.box-body -->

            <div class="box-footer clearfix">

                <!--

                <ul class="pagination pagination-sm no-margin pull-right">

                    <li><a href="#">«</a></li>

                    <li><a href="#">1</a></li>

                    <li><a href="#">2</a></li>

                    <li><a href="#">3</a></li>

                    <li><a href="#">»</a></li>

                </ul>-->

                <?php echo $model->phantrang($page, PAGE_SHOW, $total_page, $link); ?>

            </div>

        </div><!-- /.box -->                           

    </div><!-- /.col -->

   

</div>

<script type="text/javascript">

$(function(){    

    $('#mien_id').change(function(){

        var mien_id = $(this).val();        

        $.ajax({

            url: "controller/Tinh.php",

            type: "POST",

            async: true,

            data: {

                'mien_id' : mien_id,

                'act' : "getTinhByMien"

            },

            success: function(data){                    

                $('#tinh_id').html(data);

            }

        });

    });



});

$(function(){

    <?php if($mien_id>0) {?>

        $.ajax({

            url: "controller/Tinh.php",

            type: "POST",

            async: true,

            data: {

                'mien_id' : <?php echo $mien_id; ?>,

                'act' : "getTinhByMien"

            },

            success: function(data){                    

                $('#tinh_id').html(data);

                <?php if($tinh_id>0) {?>

                    $('#tinh_id').val(<?php echo $tinh_id; ?>);

                <?php } ?>

            }

        });

    <?php } ?>

    $('#tinh_id').change(function(){

        search();

    });

    $('#btnSearch').click(function(){

        search();

    });

    $('#keyword').keypress(function (e) {

      if (e.which == 13) {

        search();

      }

    });

});   

function search(){

    var str_link = "index.php?mod=place&act=list";

    var tmp = $('#tinh_id').val();

    if(tmp > 0){

        str_link += "&tinh_id=" + tmp ;

    }

    tmp = $('#mien_id').val();

    if(tmp > 0){

        str_link += "&mien_id=" + tmp ;

    }

    tmp = $.trim($('#keyword').val());

    if(tmp != ''){

        str_link += "&keyword=" + tmp ;   

    }    

    location.href= str_link;

}       



</script>