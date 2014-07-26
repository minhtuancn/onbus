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

if (isset($_GET['status']) && $_GET['status'] > 0) {
    $lang_id = (int) $_GET['status'];      
    $status.="&status=$status";
} else {
    $status = -1;
}

$arrTotal = $model->getListRouteByStatus($status, -1, -1);

$total_page = ceil($arrTotal['total'] / LIMIT);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = LIMIT * ($page - 1);

$arrList = $model->getListRouteByStatus($status, $offset, LIMIT);

?>
<link href="<?php echo STATIC_URL; ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
<section class="content-header">    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=route&act=form'">Tạo mới</button>        
         <div class="box-header">
                <h3 class="box-title">Danh sách chuyến xe</h3>
            </div><!-- /.box-header -->
        <div class="box">
           <div class="box_search">                 
                    Nhà xe 
                    <select name="nhaxe_id" class="select_search">
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
                   Tên chuyến xe &nbsp;<input type="text" class="text_search" name="keyword" value="<?php echo (trim($keyword)!='') ? $keyword: ""; ?>" /> 
                    &nbsp;&nbsp;&nbsp;Điểm đi 
                    <input type="hidden" name="place_id_start" id="place_id_start" />
                    <input type="text" name="diem_xp" id="diem_xp" />
                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;Điểm đến
                    <input type="hidden" name="place_id_end" id="place_id_end" />
                    <input type="text" name="diem_den" id="diem_den" />
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
<?php 
$arrListPlace = $modelPlace->getListPlaceByStatus(1,-1,-1);

?>
 <script>
  $(function() {

    var arrPlace = [
    <?php foreach($arrListPlace['data'] as $place){ ?> 
      {
        value: "<?php echo $place['place_id']; ?>",
        label: "<?php echo $place['place_name_vi']; ?>",
      
      },
      <?php } ?>
      
    ];
 
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
  </script>