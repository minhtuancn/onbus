<?php
require_once "model/Tinh.php";
$model = new Tinh;
$link = "index.php?mod=tinh&act=list";

if (isset($_GET['mien_id']) && $_GET['mien_id'] > 0) {
    $mien_id = (int) $_GET['mien_id'];      
    $link.="&mien_id=$mien_id";
} else {
    $mien_id = -1;
}

if (isset($_GET['keyword']) && trim($_GET['keyword']) != '') {
    $keyword = $_GET['keyword'];      
    $link.="&keyword=$keyword";
} else {
    $keyword = '';
}

if (isset($_GET['hot']) && $_GET['hot'] > 0) {
    $hot = (int) $_GET['hot'];      
    $link.="&hot=$hot";
} else {
    $hot = -1;
}

$arrTotal = $model->getListTinh($mien_id,$keyword,$hot, -1, -1);
$limit = 64;
$total_page = ceil($arrTotal['total'] / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = $limit * ($page - 1);

$arrList = $model->getListTinh($mien_id,$keyword,$hot, $offset, $limit);
?>
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=tinh&act=form'">Tạo mới</button>        
    <button class="btn btn-primary btn-sm right" id="capnhat_thutu">Cập nhật thứ tự</button>        
         <div class="box-header">
                <h3 class="box-title">Danh sách nơi đi/nơi đến</h3>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="box_search">                 
                    Miền 
                    <select name="mien_id" class="select_search" id="mien_id">
                        <option value="0">Tất cả</option>
                        <option value="1" <?php echo ($_GET['mien_id']==1) ? "selected" : ""; ?>>Miền Nam</option>
                        <option value="2" <?php echo ($_GET['mien_id']==2) ? "selected" : ""; ?>>Miền Trung - Tây Nguyên</option>
                        <option value="3" <?php echo ($_GET['mien_id']==3) ? "selected" : ""; ?>>Miền Bắc</option>        
                    </select>
                    &nbsp;&nbsp;&nbsp;
                   Tên điểm đến &nbsp;
                   <input type="text" class="text_search" id="keyword" name="keyword" value="<?php echo (trim($keyword)!='') ? $keyword: ""; ?>" /> 
                    &nbsp;&nbsp;&nbsp;Loại 
                    <select name="hot" class="select_search" id="hot">
                        <option value="0">Tất cả</option>
                        <option value="1" <?php echo ($_GET['hot']==1) ? "selected" : ""; ?>>Điểm đến hot</option>                        
                    </select>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary btn-sm right" id="btnSearch" type="button">Tìm kiếm</button>
                
            </div>
            <div class="box-body">
                <input type="hidden" id="str_order" value="">
                <table class="table table-bordered table-striped" id="drag">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>
                        <th width="170">Miền</th>
                        <th>Tên  <img src="<?php echo STATIC_URL?>img/vi.png"/></th>
                        <th>Tên  <img src="<?php echo STATIC_URL?>img/uk_.png"/></th>                  
                        <th>Ngày tạo</th>                        
                        <th style="width: 40px">Action</th>
                    </tr>
                    <?php
                    if(!empty($arrList['data'])){
                    $i = ($page-1) * $limit;                    
                    foreach($arrList['data'] as $row){
                    $i++;
                    ?>
                    <tr id="rows_<?php echo $row['tinh_id']; ?>">
                        <td><?php echo $i; ?></td>
                        <td><?php if($row['mien_id'] == 1) echo "Miền Nam" ;
                            elseif ($row['mien_id']==2 ) echo "Miền Trung- Tây Nguyên" ;
                            else echo "Miền Bắc"; ?>
                        <td><?php echo $row['tinh_name_vi']; ?>

                             <?php if($row['hot']==1) { ?>
                            &nbsp;&nbsp;&nbsp;<img src="static/img/ok.gif" width="20" alt="Điểm đến HOT" title="Điểm đến HOT"/>
                            <?php } ?>
                        </td>
                        <td><?php echo $row['tinh_name_en']; ?></td>                        
                        <td><?php echo date('d-m-Y',$row['creation_time']); ?></td>                        
                        <td style="white-space:nowrap">
                            <a href="index.php?mod=tinh&act=form&tinh_id=<?php echo $row['tinh_id']; ?>">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <a href="javascript:;" alias="<?php echo $row['tinh_name_vi']; ?>" id="<?php echo $row['tinh_id']; ?>" mod="tinh" class="link_delete" >    
                                <i class="fa fa-fw fa-trash-o"></i>
                            </a>    
                            
                        </td>
                    </tr>      
                    <?php }  }else{ ?>              
                    <tr>
                        <td colspan="6" class="error_data">Không tìm thấy dữ liệu!</td>
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
<script type="text/javascript" src="static/js/drag.js"></script>
<script type="text/javascript">
    $(function(){
        $("table#drag").tableDnD({        
            onDrop: function(table, row) {
                var rows = table.tBodies[0].rows;
                var strOrder = '';
                var strTemp = '';
                for (var i=0; i<rows.length; i++) {
                    strTemp = rows[i].id;
                    strOrder += strTemp.replace('rows_','') + ";";
                }                
                $('#str_order').val(strOrder);
            },
            onDragClass: "myDragClass"
        });
        $('#mien_id,#hot').change(function(){
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
        $('#capnhat_thutu').click(function(){
              $.ajax({
                  url: "controller/Tinh.php",
                  type: "POST",
                  async: false,
                  data: {"str_order":$('#str_order').val(),'act':'order'},
                  success: function(data){      
                      alert('Cập nhật thành công');
                      window.location.reload();
                  }
              });           
          });
    });   
    function search(){
        var str_link = "index.php?mod=tinh&act=list";
        var tmp = $('#mien_id').val();
        if(tmp > 0){
            str_link += "&mien_id=" + tmp ;
        }
        tmp = $.trim($('#keyword').val());
        if(tmp != ''){
            str_link += "&keyword=" + tmp ;   
        }
        tmp = $('#hot').val();
        if(tmp > 0){
            str_link += "&hot=" + tmp ;
        }        
        location.href= str_link;
    }   
</script>