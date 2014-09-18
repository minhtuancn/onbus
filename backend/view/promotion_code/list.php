<?php

require_once "model/Code.php";

$model = new Code;

$link = "index.php?mod=promotion_code&act=list";


if (isset($_GET['status']) && $_GET['status'] > -1) {

    $status = (int) $_GET['status'];      

    $link.="&status=$status";

} else {

    $status = -1;

}


$limit = 20;

$arrTotal = $model->getListCode($status, -1, -1);



$total_page = ceil($arrTotal['total'] / $limit);



$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;



$offset = $limit * ($page - 1);



$arrList = $model->getListCode($status,$offset, $limit);

?>



<div class="row">

    <div class="col-md-12">

    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=promotion_code&act=form'">Tạo mới</button>        

         <div class="box-header">

                <h3 class="box-title">Danh sách promotion code</h3>

            </div><!-- /.box-header -->

        <div class="box">

            <div class="box_search">

                

                <form method="get" id="form_search" name="form_search">

                    <input type="hidden" name="mod" value="promotion_code" />

                    <input type="hidden" name="act" value="list" />

                   Status
                    <select name="status" class="event_change select_search">

                        <option value="-1">Tất cả</option>  

                        <option value="1" <?php echo ($status==1) ? "selected" : ""; ?>>Chua duyet</option>   

                        <option value="2" <?php echo ($status==2) ? "selected" : ""; ?>>Da duyet</option>        

                    </select>                   

                </form>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped">

                    <tbody><tr>

                        <th style="width: 10px">No.</th>

                        <th width="300">Code</th>
                        <th width="140">Type</th>
                        <th width="140">Value</th>                                              

                        <th style="width: 40px">Action</th>

                    </tr>

                    <?php

                    $i = ($page-1) * $limit; 

                    if(!empty($arrList['data'])){                   

                    foreach($arrList['data'] as $row){

                    $i++;

                    ?>

                    <tr>

                        <td><?php echo $i; ?></td>                        

                        <td>
                        <?php echo $row['code']; ?>
                       </td>
                            
                        <td>
                        <?php echo $row['type']; ?>
                        </td>
                        <td>
                        <?php echo $row['code_value']; ?>
                        </td>                                       

                        <td style="white-space:nowrap">                            

                            <a href="index.php?mod=promotion_code&act=form&code_id=<?php echo $row['code_id']; ?>">

                                <i class="fa fa-fw fa-edit"></i>

                            </a>

                            <a href="javascript:;" alias="<?php echo $row['title']; ?>" id="<?php echo $row['code_id']; ?>" mod="promotion_code" class="link_delete" >    

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