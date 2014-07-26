<?php
require_once "model/Place.php";
$model = new Place;
$link = "index.php?mod=place&act=list";

if (isset($_GET['status']) && $_GET['status'] > 0) {
    $lang_id = (int) $_GET['status'];      
    $status.="&status=$status";
} else {
    $status = -1;
}

$arrTotal = $model->getListPlaceByStatus($status, -1, -1);

$total_page = ceil($arrTotal['total'] / LIMIT);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = LIMIT * ($page - 1);

$arrList = $model->getListPlaceByStatus($status, $offset, LIMIT);
?>
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=place&act=form'">Tạo mới</button>        
         <div class="box-header">
                <h3 class="box-title">Danh sách địa điểm</h3>
            </div><!-- /.box-header -->
        <div class="box">
           
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>
                        <th>Tên VI</th>
                        <th>Tên EN</th>
                        <th>Địa chỉ</th>
                        <th>Ngày tạo</th>                        
                        <th style="width: 40px">Action</th>
                    </tr>
                    <?php
                    $i = ($page-1) * LIMIT;                    
                    foreach($arrList['data'] as $row){
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['place_name_vi']; ?></td>
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