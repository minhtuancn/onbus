<?php
require_once "model/Branch.php";
$model = new Branch;
$link = "index.php?mod=branch&act=list";
if(isset($_GET['nhaxe_id'])){
    $nhaxe_id = (int) $_GET['nhaxe_id'];
    require_once "model/Nhaxe.php";
    $modelNhaxe = new Nhaxe;
    $detailNhaxe = $modelNhaxe->getDetailNhaxe($nhaxe_id);
}
if (isset($_GET['nhaxe_id']) && $_GET['nhaxe_id'] > 0) {
    $nhaxe_id = (int) $_GET['nhaxe_id'];      
    $link.="&nhaxe_id=$nhaxe_id";
} else {
    $nhaxe_id = -1;
}

$arrTotal = $model->getListBranchByNhaxe($nhaxe_id, -1, -1);
$limit = LIMIT;

$total_page = ceil($arrTotal['total'] / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = $limit * ($page - 1);

$arrList = $model->getListBranchByNhaxe($nhaxe_id, $offset, $limit);
?>
<section class="content-header">    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" 
    onclick="location.href='index.php?mod=branch&act=form&nhaxe_id=<?php echo $nhaxe_id; ?>'">Tạo mới chi nhánh</button> 
    <button class="btn btn-primary btn-sm right" 
    onclick="location.href='index.php?mod=nhaxe&act=form&nhaxe_id=<?php echo $nhaxe_id; ?>'">Chi tiết nhà xe</button>        
         <div class="box-header">
                <h3 class="box-title">Danh sách chi nhánh nhà xe <?php echo ($nhaxe_id > 0) ? " : ".$detailNhaxe['nhaxe_name_vi'] : ""; ?> </h3>
            </div><!-- /.box-header -->
        <div class="box">
           
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>
                        <th>Tên <img src="<?php echo STATIC_URL?>img/vi.png"/></th>
                        <th>Tên <img src="<?php echo STATIC_URL?>img/uk_.png"/></th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Ngày tạo</th>                                            
                        <th style="width: 40px">Action</th>
                    </tr>
                    <?php
                    $i = ($page-1) * $limit;                    
                    foreach($arrList['data'] as $row){
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['branch_name_vi']; ?> 
                            <?php if($row['hot']==1) { ?>
                            &nbsp;&nbsp;&nbsp;<img src="static/img/ok.gif" width="20" alt="Nhà xe uy tín" title="Nhà xe uy tín"/>
                            <?php } ?>
                        </td>
                        <td><?php echo $row['branch_name_en']; ?></td>
                        <td><?php echo $row['address_vi']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo date('d-m-Y',$row['creation_time']); ?></td>   
                                        
                        <td style="white-space:nowrap">                            
                            <a href="index.php?mod=branch&act=form&branch_id=<?php echo $row['branch_id']; ?>&nhaxe_id=<?php echo $nhaxe_id; ?>">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <a href="javascript:;" alias="<?php echo $row['branch_name_vi']; ?>" id="<?php echo $row['branch_id']; ?>" mod="branch" class="link_delete" >    
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