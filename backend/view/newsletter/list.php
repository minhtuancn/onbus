<?php
require_once "model/Newsletter.php";
$model = new Newsletter;
$link = "index.php?mod=newsletter&act=list";

if (isset($_GET['status']) && $_GET['status'] > 0) {
    $lang_id = (int) $_GET['status'];      
    $status.="&status=$status";
} else {
    $status = -1;
}

$listTotal = $model->getListContentByStatus(1, $status, -1, -1);

$total_record = mysql_num_rows($listTotal);

$total_page = ceil($total_record / LIMIT);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = LIMIT * ($page - 1);

$list = $model->getListContentByStatus(1, $status, $offset, LIMIT);

?>
<div class="row">
    <div class="col-md-12">    
         <div class="box-header">
                <h3 class="box-title">Danh sách newsletter</h3>
            </div><!-- /.box-header -->
        <div class="box">
           
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>
                        <th>Email</th>                        
                        <th>Ngày DK</th>                        
                        <th style="width: 1%">Action</th>
                    </tr>
                    <?php
                    $i = ($page-1) * LIMIT;;
                    while ($row = mysql_fetch_assoc($list)) {                       
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['email']; ?></td>                        
                        <td><?php echo date('d-m-Y H:i',$row['creation_time']); ?></td>                        
                        <td style="white-space:nowrap;text-align:center">                            
                            <a href="javascript:;" alias="<?php echo $row['email']; ?>" id="<?php echo $row['id']; ?>" mod="newsletter" class="link_delete" >    
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