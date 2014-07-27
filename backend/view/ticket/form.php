<?php 
if(isset($_GET['place_id'])){
    $place_id = (int) $_GET['place_id'];
    require_once "model/Place.php";
    $model = new Place;
    $detail = $model->getDetailPlace($place_id);
}
require_once "model/Tinh.php";
$modelTinh = new Tinh;
require_once "model/Nhaxe.php";
$modelNhaxe = new Nhaxe;
require_once "model/Car.php";
$modelCar = new Car;
require_once "model/Services.php";
$modelService = new Services;
require_once "model/Time.php";
$modelTime = new Time;
/* list tinh */
$arrListTinh = $modelTinh->getListTinh(-1,'',-1,-1,-1);
// list nha xe
$arrListNhaxe = $modelNhaxe->getListNhaxe('',-1, -1, -1);
// list dich vu
$arrService = $modelService->getListServiceByStatus(-1, -1, -1);
//list loai xe
$arrCar = $modelCar->getListCarByStatus(-1, -1, -1);
//list time_start
$arrTime = $modelTime->getListTimeByStatus(-1, -1, -1);
?>
<link href="<?php echo STATIC_URL; ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
<div class="row">
    <form method="post" action="controller/Ticket.php">
    <div class="col-md-6">                   
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">
                <h3 class="box-title"><?php echo ($place_id > 0) ? "Cập nhật" : "Tạo mới" ?> vé </h3>
                <?php if($place_id> 0){ ?>
                <input type="hidden" value="<?php echo $place_id; ?>" name="place_id" />
                <?php } ?>
            </div><!-- /.box-header -->
            
        <div class="nav-tabs-custom">
            <div class="button">       
                <div class="form-group">
                    <label>Loại vé <span class="required"> ( * ) </span></label> 
                    <div class="radio">
                        <input name="type" class="required" type="radio" value="1" checked/> &nbsp; Vé 1 chiều
                        &nbsp;&nbsp;&nbsp;
                        <input name="type" class="required" type="radio" value="2" /> &nbsp; Vé khứ hồi
                    </div>
                </div> 
                <div class="form-group">
                    <label>Nhà xe<span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="nhaxe_id" id="nhaxe_id">
                        <option value="0">---chọn---</option> 
                         <?php if(!empty($arrListNhaxe['data'])){
                            foreach ($arrListNhaxe['data'] as $value) {
                                ?>
                                <option value="<?php echo $value['nhaxe_id']; ?>"><?php echo $value['nhaxe_name_vi']; ?></option> 
                                <?php 
                            }}
                            ?>                           
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Giá vé<span class="required"> ( * ) </span></label>
                            <input type="text" name="price" id="price" class="form-control required" value="<?php echo isset($detail['price'])  ? $detail['price'] : "" ?>"/>                             
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số lượng vé</label>
                            <input type="text" name="amount" id="amount" class="form-control required" value="<?php echo isset($detail['price'])  ? $detail['price'] : "" ?>"/>                             
                        </div> 
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngày đi<span class="required"> ( * ) </span></label>
                            <input type="text" name="date_start" id="date_start" class="form-control required" value="<?php echo isset($detail['date_start'])  ? $detail['date_start'] : "" ?>"/>                             
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngày về</label>
                            <input type="text" name="date_end" id="date_end" class="form-control" value="<?php echo isset($detail['date_end'])  ? $detail['date_end'] : "" ?>"/>                             
                        </div> 
                    </div>
                </div>
                 
            </div>
    
            
          
           
        </div><!-- nav-tabs-custom -->
    
    </div><!-- /.col -->  
        <div class="col-md-6">                   
            <!-- Custom Tabs -->
            
            <div style="clear:both;margin-bottom:30px"></div>
             <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                  
                </div><!-- /.box-header -->
                
            <div class="nav-tabs-custom" style="margin-top:30px" >
                <div class="button">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nơi đi<span class="required"> ( * ) </span></label>
                                <input type="text" name="noi_di" id="noi_di" class="form-control required" value="<?php echo isset($detail['noidi'])  ? $detail['service_name_vi'] : "" ?>"/>         
                                <input type="hidden" id="tinh_id_start" name="tinh_id_start" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Xuất phát<span class="required"> ( * ) </span></label>
                                <select class="form-control required" name="place_id_start" id="place_id_start">
                                    <option value="0">---chọn---</option> 
                                                                
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nơi đến<span class="required"> ( * ) </span></label>
                                <input type="text" name="noi_den" id="noi_den" class="form-control required" value="<?php echo isset($detail['noidi'])  ? $detail['service_name_vi'] : "" ?>"/>         
                                <input type="hidden" id="tinh_id_end" name="tinh_id_end" />
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Điểm đến<span class="required"> ( * ) </span></label>
                                <select class="form-control required" name="place_id_end" id="place_id_end">
                                    <option value="0">---chọn---</option>                                                    
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                    <label>Loại xe<span class="required"> ( * ) </span></label>
                    <select class="form-control required" name="car_type" id="car_type">
                        <option value="0">---chọn---</option> 
                         <?php while($car = mysql_fetch_assoc($arrCar)){
                                ?>
                                <option value="<?php echo $car['type_id']; ?>"><?php echo $car['type_name_vi']; ?></option> 
                                <?php 
                            }
                            ?>                           
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thời gian đi<span class="required"> ( * ) </span></label>
                            <input type="text" name="duration" id="duration" class="form-control required" value="<?php echo isset($detail['duration'])  ? $detail['duration'] : "" ?>"/>                             
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số trạm dừng</label>
                            <select class="form-control" name="stop" id="stop">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div> 
                    </div>
                </div>                                      
                </div>                
               
            </div><!-- nav-tabs-custom -->
        
        </div><!-- /.col --> 
        <div class="col-md-12 nav-tabs-custom">
            <div class="form-group" style="padding-top:5px">
                <label>Tiện ích đi kèm &nbsp;</label>
                <?php while($ser = mysql_fetch_assoc($arrService)){
                    ?>
                <input type="checkbox" name="services[]" value="<?php echo $ser['service_id']; ?>"/> &nbsp; <?php echo $ser['service_name_vi']; ?>  &nbsp;&nbsp;&nbsp; 
                    
                    <?php 
                }
                ?>    
            </div>
            <div class="form-group" style="padding-top:5px">
                <label>Giờ khởi hành <span class="required"> ( * ) </span>&nbsp;</label>
                <?php while($time = mysql_fetch_assoc($arrTime)){
                    ?>
                <input type="checkbox" name="time_start[]" value="<?php echo $time['time_id']; ?>"/> <?php echo $time['time_start']; ?>  &nbsp;&nbsp;&nbsp; 
                    
                    <?php 
                }
                ?>    
            </div>
            <div class="button">
                <button class="btn btn-primary btnSave" type="submit">Save</button>
                <button class="btn btn-primary" type="reset">Cancel</button>
            </div>
        </div>   
    </form>
</div>
<script type="text/javascript">
function getPlaceByTinh(tinh_id,obj){
    $.ajax({
            url: "Controller/Place.php",
            type: "POST",
            async: true,
            data: {
                'tinh_id' : tinh_id,
                'act' : "getPlaceByTinh"
            },
            success: function(data){                    
                $('#' + obj).html(data);
            }
        });
}
$(function(){    
    $('#date_start,#date_end').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat :'dd/mm/yy'
    });
});
    
</script>
<script type="text/javascript">
  $(function() {

    var arrPlace = [
    <?php foreach($arrListTinh['data'] as $tinh){ ?> 
      {
        value: "<?php echo $tinh['tinh_id']; ?>",
        label: "<?php echo $tinh['tinh_name_vi']; ?>"      
      },
      <?php } ?>
      
    ];
    $("#noi_di" ).blur(function(){
        if($.trim($(this).val())==''){
            $('#tinh_id_start)').val(0);
        }
    });
    $("#noi_den" ).blur(function(){
        if($.trim($(this).val())==''){
            $('#tinh_id_end').val(0);
        }
    });
    $("#noi_di" ).autocomplete({
      minLength: 0,
      source: arrPlace,
      focus: function( event, ui ) {
        $( "#noi_di" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#noi_di" ).val( ui.item.label );
        $( "#tinh_id_start" ).val( ui.item.value );
        getPlaceByTinh(ui.item.value,'place_id_start');      
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append(item.label)
        .appendTo( ul );
    };
    $("#noi_den" ).autocomplete({
      minLength: 0,
      source: arrPlace,
      focus: function( event, ui ) {
        $( "#noi_den" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#noi_den" ).val( ui.item.label );
        $( "#tinh_id_end" ).val( ui.item.value );  
        getPlaceByTinh(ui.item.value,'place_id_end');    
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