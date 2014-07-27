<?php
require_once "model/Route.php";
$model = new Route;
require_once "model/Place.php";
$modelPlace = new Place;
require_once "model/Nhaxe.php";
$modelNhaxe = new Nhaxe;
$link = "index.php?mod=route&act=list";

/* get ds nha xe */

$arrNhaxe = $modelNhaxe->getListNhaxe('',-1, -1, -1);
/* end get ds nha xe */

/* get ds place */
$arrListPlaceKey = array();
$arrListPlace = $modelPlace->getListPlace(-1,-1,'',-1,-1);
if(!empty($arrListPlace)){
    foreach ($arrListPlace['data'] as $value) {
        $arrListPlaceKey[$value['place_id']] = $value;
    }
}
/* end get ds place */
if (isset($_GET['nhaxe_id']) && $_GET['nhaxe_id'] > 0) {
    $nhaxe_id = (int) $_GET['nhaxe_id'];      
    $link.="&nhaxe_id=$nhaxe_id";
} else {
    $nhaxe_id = -1;
}

if (isset($_GET['keyword']) && trim($_GET['keyword']) != '') {
    $keyword = $_GET['keyword'];      
    $link.="&keyword=$keyword";
} else {
    $keyword = '';
}

if (isset($_GET['place_id_start']) && $_GET['place_id_start'] > 0) {
    $place_id_start = (int) $_GET['place_id_start'];      
    $link.="&place_id_start=$place_id_start";
} else {
    $place_id_start = -1;
}
if (isset($_GET['place_id_end']) && $_GET['place_id_end'] > 0) {
    $place_id_end = (int) $_GET['place_id_end'];      
    $link.="&place_id_end=$place_id_end";
} else {
    $place_id_end = -1;
}

$arrTotal = $model->getListRoute($nhaxe_id,$keyword,$place_id_start,$place_id_end, -1, -1);

$total_page = ceil($arrTotal['total'] / LIMIT);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = LIMIT * ($page - 1);

$arrList = $model->getListRoute($nhaxe_id,$keyword,$place_id_start,$place_id_end, $offset, LIMIT);

?>
<link href="<?php echo STATIC_URL; ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=route&act=form'">Tạo mới</button>        
         <div class="box-header">
                <h3 class="box-title">Danh sách chuyến xe</h3>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="box_search">                 
                    Nhà xe 
                    <select name="nhaxe_id" class="select_search" id="nhaxe_id">
                        <option value="0">Tất cả</option>
                        <?php
                        foreach ($arrNhaxe['data'] as $value) {
                            ?>
                            <option value='<?php echo $value['nhaxe_id']; ?>'
                                <?php if(isset($_GET['nhaxe_id']) && $_GET['nhaxe_id'] == $value['nhaxe_id']) echo "selected";?>
                                ><?php echo $value['nhaxe_name_vi']; ?></option>     
                        <?php
                        } 
                        ?>    
                    </select>
                    &nbsp;&nbsp;&nbsp;
                   Tên chuyến xe &nbsp;
                   <input type="text" class="text_search" id="keyword" name="keyword" value="<?php echo (trim($keyword)!='') ? $keyword: ""; ?>" /> 
                    &nbsp;&nbsp;&nbsp;Điểm XP 
                    <input type="hidden" name="place_id_start" id="place_id_start" value="<?php echo (isset($_GET['place_id_start'])) ? $_GET['place_id_start'] : "" ;?>" />
                    <input type="text" name="diem_xp" id="diem_xp" 
                    value="<?php echo isset($_GET['place_id_start']) ? $arrListPlaceKey[$_GET['place_id_start']]['place_name_vi'] : ""; ?>"  />
                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;Điểm đến
                    <input type="hidden" name="place_id_end" id="place_id_end" value="<?php echo (isset($_GET['place_id_end'])) ? $_GET['place_id_end'] : "" ;?>" />
                    <input type="text" name="diem_den" id="diem_den" 
                    value="<?php echo isset($_GET['place_id_end']) ? $arrListPlaceKey[$_GET['place_id_end']]['place_name_vi'] : ""; ?>" />
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary btn-sm right" id="btnSearch" type="button">Tìm kiếm</button>
                
            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 10px">No.</th>
                        <th>Nhà xe</th>
                        <th>Tên <img src="<?php echo STATIC_URL?>img/vi.png"/></th>
                        <th>Tên <img src="<?php echo STATIC_URL?>img/uk_.png"/></th>
                        <th>Điểm xuất phát</th>
                        <th>Điểm đến</th>
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
                        <td><?php echo $modelNhaxe->getNhaxeNameByID($row['nhaxe_id']); ?></td>
                        <td><?php echo $row['route_name_vi']; ?></td>
                        <td><?php echo $row['route_name_en']; ?></td>
                        <td><?php echo $modelPlace->getPlaceNameByID($row['place_id_start']); ?></td>
                        <td><?php echo $modelPlace->getPlaceNameByID($row['place_id_end']); ?></td>
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

    var arrPlace = [
    <?php foreach($arrListPlace['data'] as $place){ ?> 
      {
        value: "<?php echo $place['place_id']; ?>",
        label: "<?php echo $place['place_name_vi']; ?>"      
      },
      <?php } ?>
      
    ];
    $("#diem_xp" ).blur(function(){
        if($.trim($(this).val())==''){
            $('#place_id_start').val(0);
        }
    });
    $("#diem_den" ).blur(function(){
        if($.trim($(this).val())==''){
            $('#place_id_end').val(0);
        }
    });
    $("#diem_xp" ).autocomplete({
      minLength: 0,
      source: arrPlace,
      focus: function( event, ui ) {
        $( "#diem_xp" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#diem_xp" ).val( ui.item.label );
        $( "#place_id_start" ).val( ui.item.value );      
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
      source: arrPlace,
      focus: function( event, ui ) {
        $( "#diem_den" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#diem_den" ).val( ui.item.label );
        $( "#place_id_end" ).val( ui.item.value );      
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
        var tmp = $('#nhaxe_id').val();
        if(tmp > 0){
            str_link += "&nhaxe_id=" + tmp ;
        }
        tmp = $.trim($('#keyword').val());
        if(tmp != ''){
            str_link += "&keyword=" + tmp ;   
        }
        tmp = $('#place_id_start').val();
        if(tmp > 0){
            str_link += "&place_id_start=" + tmp ;
        }
        tmp = $('#place_id_end').val();
        if(tmp > 0){
            str_link += "&place_id_end=" + tmp ;
        }
        location.href= str_link;
    }
    $('#nhaxe_id').change(function(){
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