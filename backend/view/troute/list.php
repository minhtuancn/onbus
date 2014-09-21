<?php


require_once "model/Route.php";


$model = new Route;
require_once "model/Troute.php";


$modelTroute = new Troute;


require_once "model/Tinh.php";


$modelTinh = new Tinh;


require_once "model/Nhaxe.php";


$modelNhaxe = new Nhaxe;


$link = "index.php?mod=troute&act=list";





/* get ds nha xe */





$arrListNhaxe = $modelNhaxe->getListNhaxe('',-1, -1, -1);


/* end get ds nha xe */





if (isset($_GET['nhaxe_id']) && $_GET['nhaxe_id'] > -1) {


    $nhaxe_id = (int) $_GET['nhaxe_id'];      


    $link.="&nhaxe_id=$nhaxe_id";


} else {


    $nhaxe_id = 0;


}






$arrTotal = $modelTroute->getListTroute($nhaxe_id, -1, -1);





$total_page = ceil($arrTotal['total'] / LIMIT);





$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;





$offset = LIMIT * ($page - 1);





$arrList = $modelTroute->getListTroute($nhaxe_id, $offset, LIMIT);





?>


<link href="<?php echo STATIC_URL; ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />


<div class="row">


    <div class="col-md-12">


    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=troute&act=form'">Tạo mới</button>        


         <div class="box-header">


                <h3 class="box-title">Danh sách tuyến đường phổ biến</h3>


            </div><!-- /.box-header -->


        <div class="box">


            <div class="box_search"> 

                    Nhà xe 


                    <select class="event_change select_search" name="nhaxe_id" id="nhaxe_id">

                        <option value="0">---chọn---</option> 

                         <?php if(!empty($arrListNhaxe['data'])){

                            foreach ($arrListNhaxe['data'] as $value) {

                                ?>

                                <option <?php echo $_GET['nhaxe_id'] == $value['nhaxe_id'] ? "selected" : ""; ?> value="<?php echo $value['nhaxe_id']; ?>"><?php echo $value['nhaxe_name_vi']; ?></option> 

                                <?php 

                            }}

                            ?>                           

                    </select>
            </div>


            <div class="box-body">





                <table class="table table-bordered table-striped">


                    <tbody><tr>


                        <th style="width: 10px">No.</th>


                        <th>Nhà xe</th>


                        <th>Tuyến đường</th>
                      
                        <th>First Bus</th>   
                        <th>Last Bus</th>
                        <th>Price</th>   
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


                        <td>


                            


                                <?php echo $modelNhaxe->getNhaxeNameByID($row['nhaxe_id']); ?>


                            </a>
                            

                        </td>


                        <td>
<a href="index.php?mod=troute&act=form&troute_id=<?php echo $row['troute_id']; ?>">
                            <?php echo $model->getRouteNameByID($row['route_id']); ?>
                        </a></td>

                        <td><?php echo $row['min_time']; ?></td>  
                        <td><?php echo $row['max_time']; ?></td>
                        <td><?php echo number_format($row['price']); ?></td>  
                        

                        <td><?php echo date('d-m-Y',$row['creation_time']); ?></td>                        


                        <td style="white-space:nowrap">


                            <a href="index.php?mod=troute&act=form&troute_id=<?php echo $row['troute_id']; ?>">


                                <i class="fa fa-fw fa-edit"></i>


                            </a>


                            <a href="javascript:;" alias="<?php echo $row['troute_name_vi']; ?>" id="<?php echo $row['troute_id']; ?>" mod="troute" class="link_delete" >    


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

function search(){


        var str_link = "index.php?mod=troute&act=list";


        var tmp = $('#nhaxe_id').val();


        if(tmp > -1){


            str_link += "&nhaxe_id=" + tmp ;


        }     


        location.href= str_link;


    }
  $(function() {

    


    $('#nhaxe_id').change(function(){

        
        search();


    });


    $('#btnSearch').click(function(){


        search();


    });

});

  </script>