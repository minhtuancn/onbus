<?php
require_once "model/Route.php";
$model = new Route;
require_once "model/Tinh.php";
$modelTinh = new Tinh;
require_once "model/Nhaxe.php";
$modelNhaxe = new Nhaxe;
$link = "index.php?mod=route&act=list";

/* get ds nha xe */

$arrNhaxe = $modelNhaxe->getListNhaxe('',-1, -1, -1);
/* end get ds nha xe */

/* get ds tinh */
$arrListTinhKey = array();
$arrListTinh = $modelTinh->getListTinh(-1,'',-1,-1,-1);
if(!empty($arrListTinh)){
    foreach ($arrListTinh['data'] as $value) {
        $arrListTinhKey[$value['tinh_id']] = $value;
    }
}
/* end get ds tinh */
if (isset($_GET['hot']) && $_GET['hot'] > -1) {
    $hot = (int) $_GET['hot'];      
    $link.="&hot=$hot";
} else {
    $hot = -1;
}

if (isset($_GET['keyword']) && trim($_GET['keyword']) != '') {
    $keyword = $_GET['keyword'];      
    $link.="&keyword=$keyword";
} else {
    $keyword = '';
}

if (isset($_GET['tinh_id_start']) && $_GET['tinh_id_start'] > 0) {
    $tinh_id_start = (int) $_GET['tinh_id_start'];      
    $link.="&tinh_id_start=$tinh_id_start";
} else {
    $tinh_id_start = -1;
}
if (isset($_GET['tinh_id_end']) && $_GET['tinh_id_end'] > 0) {
    $tinh_id_end = (int) $_GET['tinh_id_end'];      
    $link.="&tinh_id_end=$tinh_id_end";
} else {
    $tinh_id_end = -1;
}

$arrTotal = $model->getListRoute($keyword,$tinh_id_start,$tinh_id_end,$hot, -1, -1);

$total_page = ceil($arrTotal['total'] / LIMIT);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = LIMIT * ($page - 1);

$arrList = $model->getListRoute($keyword,$tinh_id_start,$tinh_id_end,$hot, $offset, LIMIT);

?>
<link href="<?php echo STATIC_URL; ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=route&act=form'">Tạo mới</button>        
         <div class="box-header">
                <h3 class="box-title">Danh sách tuyến đường</h3>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="box_search">                                    
                   Tên tuyến đường &nbsp;
                   <input type="text" class="text_search" id="keyword" name="keyword" value="<?php echo (trim($keyword)!='') ? $keyword: ""; ?>" /> 
                    &nbsp;&nbsp;&nbsp;Nơi đi 
                    <input type="hidden" name="tinh_id_start" id="tinh_id_start" value="<?php echo (isset($_GET['tinh_id_start'])) ? $_GET['tinh_id_start'] : "" ;?>" />
                    <input type="text" name="diem_xp" id="diem_xp" 
                    value="<?php echo isset($_GET['tinh_id_start']) ? $arrListTinhKey[$_GET['tinh_id_start']]['tinh_name_vi'] : ""; ?>"  />
                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;Nơi đến
                    <input type="hidden" name="tinh_id_end" id="tinh_id_end" value="<?php echo (isset($_GET['tinh_id_end'])) ? $_GET['tinh_id_end'] : "" ;?>" />
                    <input type="text" name="diem_den" id="diem_den" 
                    value="<?php echo isset($_GET['tinh_id_end']) ? $arrListTinhKey[$_GET['tinh_id_end']]['tinh_name_vi'] : ""; ?>" />
                    &nbsp;&nbsp;&nbsp;
                    Loại 
                    <select name="hot" class="event_change select_search" id="hot">
                        <option value="-1">Tất cả</option>  
                        <option value="0" <?php echo ($hot==0) ? "selected" : ""; ?>>Bình thường</option>   
                        <option value="1" <?php echo ($hot==1) ? "selected" : ""; ?>>Phổ biến</option>        
                    </select>
                    <button class="btn btn-primary btn-sm right" id="btnSearch" type="button">Tìm kiếm</button>
                
            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>
                        <th>Tên <img src="<?php echo STATIC_URL?>img/vi.png"/></th>
                        <th>Tên <img src="<?php echo STATIC_URL?>img/uk_.png"/></th>
                        <th>Nơi đi</th>
                        <th>Nơi đến</th>
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
                            <a href="index.php?mod=route&act=form&route_id=<?php echo $row['route_id']; ?>">
                                <?php echo $row['route_name_vi']; ?>
                            </a>
                            <?php if($row['hot']==1) { ?>
                            &nbsp;&nbsp;&nbsp;<img src="static/img/ok.gif" width="20" alt="Tuyến đường phổ biến" title="Tuyến đường phổ biến"/>
                            <?php } ?>
                        </td>
                        <td><?php echo $row['route_name_en']; ?></td>
                        <td><?php echo $modelTinh->getTinhNameByID($row['tinh_id_start']); ?></td>
                        <td><?php echo $modelTinh->getTinhNameByID($row['tinh_id_end']); ?></td>
                        <td><?php echo date('d-m-Y',$row['creation_time']); ?></td>                        
                        <td style="white-space:nowrap">
                            <a href="index.php?mod=route&act=form&route_id=<?php echo $row['route_id']; ?>">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <a href="javascript:;" alias="<?php echo $row['route_name_vi']; ?>" id="<?php echo $row['route_id']; ?>" mod="route" class="link_delete" >    
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
  $(function() {

    var arrTinh = [
    <?php foreach($arrListTinh['data'] as $tinh){ ?> 
      {
        value: "<?php echo $tinh['tinh_id']; ?>",
        label: "<?php echo $tinh['tinh_name_vi']; ?>"      
      },
      <?php } ?>
      
    ];
    $("#diem_xp" ).blur(function(){
        if($.trim($(this).val())==''){
            $('#tinh_id_start').val(0);
        }
    });
    $("#diem_den" ).blur(function(){
        if($.trim($(this).val())==''){
            $('#tinh_id_end').val(0);
        }
    });
    $("#diem_xp" ).autocomplete({
      minLength: 0,
      source: arrTinh,
      focus: function( event, ui ) {
        $( "#diem_xp" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#diem_xp" ).val( ui.item.label );
        $( "#tinh_id_start" ).val( ui.item.value );      
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append(item.label)
        .appendTo( ul );
    };
    $("#diem_den" ).autocomplete({
      minLength: 0,
      source: arrTinh,
      focus: function( event, ui ) {
        $( "#diem_den" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#diem_den" ).val( ui.item.label );
        $( "#tinh_id_end" ).val( ui.item.value );      
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append(item.label)
        .appendTo( ul );
    };

  });

    function search(){
        var str_link = "index.php?mod=route&act=list";
        var tmp = $('#hot').val();
        if(tmp > -1){
            str_link += "&hot=" + tmp ;
        }
        tmp = $.trim($('#keyword').val());
        if(tmp != ''){
            str_link += "&keyword=" + tmp ;   
        }
        tmp = $('#tinh_id_start').val();
        if(tmp > 0){
            str_link += "&tinh_id_start=" + tmp ;
        }
        tmp = $('#tinh_id_end').val();
        if(tmp > 0){
            str_link += "&tinh_id_end=" + tmp ;
        }
        location.href= str_link;
    }
    $('#hot').change(function(){
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
  </script>