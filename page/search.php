<?php 
$arrTinhHaveTicket = $modelTinh->getListTinhHaveTicket($vstart);

$link = "index.php?mod=search&";
$vstart = $vend = $dstart = $dend = -1;
$car = $service = ""; 
$page_show = 5;
$limit = 10;
if(isset($_GET['type'])){
    $type = (int) $_GET['type'];
    $link.="type=".$type;
}
if(isset($_GET['vstart'])){
    $vstart = (int) $_GET['vstart'];
    $link.="&vstart=".$vstart;
}
if(isset($_GET['vend'])){
    $vend = (int) $_GET['vend'];
    $link.="&vend=".$vend;
}
if(isset($_GET['car']) && trim($_GET['car']!="") && trim($_GET['car']!="Chọn nhà xe")){
    $car = $modelTicket->processData($_GET['car']);
    $link.="&car=".$car;
    $arrCarSearch = explode(',',$car);
}
if(isset($_GET['service']) && trim($_GET['service']!="")){
    $service = $modelTicket->processData($_GET['service']);
    $link.="&service=".rtrim($service,",");
    $arrServiceSearch = explode(',',rtrim($service,","));
}
if(isset($_GET['dstart'])){
    $dstart = $modelTicket->processData($_GET['dstart']);
    $link.="&dstart=".$dstart;
    $dstart = strtotime($dstart) + 3600;
}
if(isset($_GET['dend']) && $type==2){
    $dend = $modelTicket->processData($_GET['dend']);
    $link.="&dend=".$dend;
    $dend = strtotime($dend) + 3600;
}

$arrNhaXeID = array();

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = $limit * ($page - 1);

$arrTicket_start_nhaxe = $modelTicket->getListTicketFE("",$vstart,$vend,$dstart,$service,-1,-1);
if(!empty($arrTicket_start_nhaxe['data'])){
    foreach ($arrTicket_start_nhaxe['data'] as $ticket) {
        $arrNhaXeID[$ticket['nhaxe_id']] = $ticket['nhaxe_id'];
    }
}

$arrTicket_start_total = $modelTicket->getListTicketFE($car,$vstart,$vend,$dstart,$service,-1,-1);
$total_page_start = ceil($arrTicket_start_total['total'] / $limit);
$arrTicket_start = $modelTicket->getListTicketFE($car,$vstart,$vend,$dstart,$service,$offset,$limit);

if($type==2){
    $arrTicket_end_total = $modelTicket->getListTicketFE($car,$vend,$vstart,$dend,$service,-1,-1);
    $total_page_end = ceil($arrTicket_end_total['total'] / $limit);
    $arrTicket_end = $modelTicket->getListTicketFE($car,$vend,$vstart,$dend,$service,$offset,$limit);
}

$arrNhaXeUyTin = $modelNhaxe->getListNhaxe('',1,0,8);

$arrNhaXe = $modelNhaxe->getListNhaxe('',-1,-1,-1);

$arrNoidi = $modelTinh->getListTinh(-1,'',-1,-1, -1);
$arrListTinhKey = array();
if(!empty($arrNoidi)){

    foreach ($arrNoidi['data'] as $value) {

        $arrListTinhKey[$value['tinh_id']] = $value;

    }

}
$arrRoute = $modelRoute->getListRoute('',-1,-1,1, 0, 8);

$routeDetail = $modelRoute->detailRoute($vstart,$vend);
?>
<!-- InstanceBeginEditable name="Container" -->
        <div class="w-950">
            <div class="process_bar nav">
                <ul>
                    <li class="finish_process active">
                        <a class="btn-search-bus ic-search " id="select-trip"><span class="glyphicon glyphicon-ok form-control-feedback"></span>Tìm kiếm</a>
                        <span class="line_process"></span>
                    </li>
                    <li class="finish_process active">
                        <a class="btn-seat ic-seat" id="select-seat"><span class="glyphicon glyphicon-ok form-control-feedback"></span>Kết quả</a>
                        <span class="line_process"></span>
                    </li>
                    <li class="end">
                        <a class="btn-payment ic-cart"><span class="glyphicon glyphicon-ok form-control-feedback"></span>Thanh toán</a>
                    </li>
                </ul>
                <div class="dotted-line"></div>
            </div>
            
            <div class="block-subpage-col">
                <div class="detail-search w-240">
                    <div class="route"><?php echo $routeDetail['route_name_'.$lang]; ?></div>                    
                    <div class="filter tien-ich">
                        <div class="tabs">
                            <ul>
                                <li><a href="#">Tìm vé xe</a></li>
                            </ul>
                        </div>
                        <form class="frm-search-vx">
                            <div class=" item-search">
                                 <input type="hidden" name="vstart_search" id="vstart_search" value="<?php echo $vstart; ?>" />
                                <input type="hidden" name="vend_search" id="vend_search" value="<?php echo $vend; ?>" />
                                <label for="departPlace2">Điểm đi</label>
                                <input id="departPlace2" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Chọn điểm đi" accesskey="1" tabindex="1" autocomplete="off" value="<?php echo $arrListTinhKey[$vstart]['tinh_name_'.$lang];?>">
                                <div id="departPlaceSelector2" class="place-selector rounded-5 clearfix" style="display: none;">
                                    <div class="inner rel-pos">
                                        <div class="region-col first left clearfix">
                                            <ul class="city-list left">
                                                <?php if(!empty($arrTinhHaveTicket)){?>
                                              <?php                                              
                                              foreach ($arrTinhHaveTicket as $value) {                                                
                                                $str = ($value['hot']==1) ? "<strong>".$value['tinh_name_'.$lang]."</strong>" : $value['tinh_name_'.$lang];
                                                ?>
                                                <li class="city"><a href="javascript:;" data-state="<?php echo $value['tinh_id']; ?>"><?php echo $str; ?></a></li>
                                                <?php                                                   
                                              }
                                               ?>
                                               <?php }?>                                                  
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" item-search">
                                <label for="destination2">Điểm đến</label>
                                <input id="destination2" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Chọn điểm đến" accesskey="1" tabindex="1" autocomplete="off" value="<?php echo $arrListTinhKey[$vend]['tinh_name_'.$lang];?>">
                                <div id="destinationSelector2" class="place-selector rounded-5 clearfix" style="display: none;">
                                    <div class="inner rel-pos">
                                        <div class="region-col first left clearfix">
                                            <ul class="city-list left">
                                                <li class="city2"><a href="javascript:;" data-state="29" data-city="0">Hồ Chí Minh</a></li>                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" item-search">
                                <label for="start_date">Ngày đi</label>
                                <input id="departDate" type="text" class="input-txt form-control" placeholder="Chọn ngày đi" accesskey="3" tabindex="3" value="<?php echo date('d-m-Y',$dstart); ?>">
        
                            </div>
                            <?php if($type==2){ ?>
                            <div class=" item-search">
                                <label for="start_date">Ngày về</label>
                                <input id="returnDate" type="text" class="input-txt form-control" placeholder="Chọn ngày về" accesskey="4" tabindex="4" value="<?php echo date('d-m-Y',$dend); ?>">        
                            </div>
                            <?php } ?>
                            
                            <div class="btn-search-ticket">
                                <button id="btnSearchTicket" type="button" class="btn btn-warning right btn-blue">Tìm vé xe</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                    <input type="hidden" name="vstart" id="vstart" value="<?php echo $vstart; ?>" />
                    <input type="hidden" name="vend" id="vend" value="<?php echo $vend; ?>" />
                    <input type="hidden" name="dstart" id="dstart" value="<?php echo date('d-m-Y',$dstart); ?>" />
                    <input type="hidden" name="dend" id="dend" value="<?php echo date('d-m-Y',$dend); ?>" />
                    <input type="hidden" name="service" id="str_service" value="<?php echo $service; ?>" />
                    <input type="hidden" name="car" id="str_car" value="<?php echo $car; ?>" />
                    
                    <div class="filter tien-ich">
                        <div class="header">
                            <h2>Tiện ích</h2>
                        </div>
                        <div class="radio">
                        <?php 
                        $arrSer = $modelService->getListServiceByStatus(1,-1,-1);
                        while($ser = mysql_fetch_assoc($arrSer)){
                        ?>
                        <div class="line">
                            <div class="control">
                                <label>
                                    <input type="checkbox" <?php if(is_array($arrServiceSearch) && in_array($ser['service_id'],$arrServiceSearch)) echo "checked"; ?> value="<?php echo $ser['service_id']?>" name="service[]">
                                    <?php echo $ser['service_name_vi']?>
                                </label>                                
                            </div>                                                        
                         </div>
                         <?php } ?>
                        
                     </div>
                    </div>
                    <div class="filter hang-xe">
                        <div class="header">
                            <h2>Các Hãng Xe</h2>                            
                        </div>
                        <div class="radio">
                        <?php if(!empty($arrNhaXeID)){ 
                            foreach($arrNhaXeID as $nhaxe_id){
                                $row = $modelNhaxe->getDetailNhaxe($nhaxe_id);
                            ?>
                        <div class="line">
                            <div class="control">
                                <label>
                                    <input type="checkbox" name="car[]" <?php if(is_array($arrCarSearch) && in_array($row['nhaxe_id'],$arrCarSearch)) echo "checked"; ?> value="<?php echo $row['nhaxe_id']?>">
                                    <?php echo $row['nhaxe_name_vi']?>
                                </label>                                
                            </div>                            
                         </div>
                         <?php } }?>                        
                     </div>
                    </div>
                </div>
                <div class="ticket-options w-710 col_margin_left">
                    <div class="left ticket-tn">
                        <div class="tab-option">
                            <ul class="nav nav-tabs" role="tablist">
                              <li class="active" ><a href="#vechieudi"  role="tab" data-toggle="tab"><span class="icon-font active">Vé chiều đi</span></a></li>
                              <?php if($type==2){ ?>
                              <li class=""><a href="#vechieuve" role="tab" data-toggle="tab"><span class="icon-font active">Vé chiều về</span></a></li>
                              <?php } ?>
                            </ul>
                            <input type="hidden" name="tab" value="1" id="tab"/>
                        </div>
                        <div class="infor-ticket-tn">
                            <div class="price-ticket right">
                                <label for="departPlace">Sort by:</label>
                                <select class="form-control input-sm left">
                                    <option selected="selected">rating ̣low to high</option>
                                    <option>rating ̣low to high</option>
                                </select>
                            </div>
                            <div class="left txt-vtn">
                                <p>Length:<span><?php echo $routeDetail['distance'];?>km</span></p>
                                <p>Duration: <span><?php echo $routeDetail['duration'];?></span></p>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="list-ticket-search tab-content">
                        <div class="tab-pane fade in active" id="vechieudi">
                            <?php if(!empty($arrTicket_start['data'])){ 
                            foreach($arrTicket_start['data']  as $ticket){
                                $arrServiceTicket = $modelTicket->getServiceTicket($ticket['ticket_id']);                                 
                                 $arrTimeTicket = $modelTicket->getTimeTicket($ticket['ticket_id']);
									$arrDetailNhaxe = $modelNhaxe->getDetailNhaxe($ticket['nhaxe_id']);
                            ?>
                            <div class="items">
                            <div class=" infor-tuyen-search">
                                <div class="b-infor">
                                    <div class="img-logo left">
                                        <div data-toggle="tooltip" title="Click để xem hình" class="wrap-slider">
                                        <div class="slider_nx">
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/Du-lich-bui-tren-dao-Binh-Ba_1a.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/img_166x104.png" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/mailinh vanluong.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images.jpg" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/images (1).jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images413681_images337275_anh_tin_Dau_tu_12_ti_mua_them_xe_buyt.JPG" /></a></div>
                                        </div>
                                        </div>
                                        <ul class="icon-tien-ich">
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-wc""></i></li>
                                            <li><i  data-toggle="tooltip" title="Wifi Free" class="icon-wifi""></i></li>
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-ge""></i></li>
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-ta""></i></li>
                                        </ul>
                                        <div class="right rating">
                                            <span>Good: 8.3</span>
                                            <span class="num-rating">(105 rating)</span>
                                        </div>
                                    </div>
                                    <div class="left a-right">
                                        <ul class="list-logo-xe">
                                            <li><a href="#"><img src="<?php echo $arrDetailNhaxe['image_url']; ?>" style="height:30px" alt="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>" title="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>"/></a></li>                                            
                                        </ul>
                                        <div class="clear"></div>
                                        <p><b>DEPART ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_start']); ?></p>
                                        <p><b>ARRIVE ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_end']); ?></p>
                                        <a href="#" class="right show_map" data-url-map="https://dl.dropboxusercontent.com/u/43486987/Hoang/HTML/<?php echo STATIC_URL; ?>/images/map.jpg" data-toggle="modal" data-target="">Xem lộ trình</a>
                                        <div class="type-ticket" id="time_<?php echo $ticket['ticket_id']; ?>">
                                        <p>Select time:</p>
                                        <ul>
                                            <?php if(!empty($arrTimeTicket)) { 
                                                foreach ($arrTimeTicket as $time) {                                                   
                                                
                                            ?>
                                            <li><a href="javascript:void(0)" data-value="<?php echo $time; ?>"><?php echo $modelTime->getTimeByID($time);?></a></li>
                                            <?php }}  ?>                                            
                                        </ul>
                                        <p class="error_time" id="error_time_<?php echo $ticket['ticket_id']; ?>" style="display:none;padding-top:10px;color:red;font-style:italic">Vui lòng chọn giờ khởi hành trước khi đặt vé.</p>
                                        <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class=" x-right">
                                <div class="book-btn">
                                    <div class="d-price">
                                        <input type="hidden" id="price_<?php echo $ticket['ticket_id']; ?>" value="<?php echo $ticket['price']; ?>"/>
                                        <span><?php echo number_format($ticket['price']); ?><span>VNĐ</span></span>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="javascript:void(0)" data-value="<?php echo $ticket['ticket_id']; ?>" data-toggle="modal" data-target="#popup_book_ticket" class="btn-muave">book now</a>
                                    <a href="#" class="btn-chitiet"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span>Detail</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>  <!--items-->  
                        <?php } 
                        echo $modelTicket->pagination($page,$page_show,$total_page_start,$link); 
                        } ?>                   
                        </div> <!-- chieu di -->
                        <div class="tab-pane fade" id="vechieuve">
                             <?php if(!empty($arrTicket_end['data'])){ 
                            foreach($arrTicket_end['data']  as $ticket){
                                $arrServiceTicket = $modelTicket->getServiceTicket($ticket['ticket_id']);                                 
                                 $arrTimeTicket = $modelTicket->getTimeTicket($ticket['ticket_id']);       
                                 $arrDetailNhaxe = $modelNhaxe->getDetailNhaxe($ticket['nhaxe_id']);                          
                            ?>
                            <div class="items">
                            <div class=" infor-tuyen-search">
                                <div class="b-infor">
                                    <div class="img-logo left">
                                        <div data-toggle="tooltip" title="Click để xem hình" class="wrap-slider">
                                        <div class="slider_nx">
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/Du-lich-bui-tren-dao-Binh-Ba_1a.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/img_166x104.png" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/mailinh vanluong.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images.jpg" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/images (1).jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images413681_images337275_anh_tin_Dau_tu_12_ti_mua_them_xe_buyt.JPG" /></a></div>
                                        </div>
                                        </div>
                                        <ul class="icon-tien-ich">
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-wc""></i></li>
                                            <li><i  data-toggle="tooltip" title="Wifi Free" class="icon-wifi""></i></li>
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-ge""></i></li>
                                            <li><i  data-toggle="tooltip" title="Toilet" class="icon-ta""></i></li>
                                        </ul>
                                        <div class="right rating">
                                            <span>Good: 8.3</span>
                                            <span class="num-rating">(105 rating)</span>
                                        </div>
                                    </div>
                                    <div class="left a-right">
                                        <ul class="list-logo-xe">
                                            <li><a href="#"><img src="<?php echo $arrDetailNhaxe['image_url']; ?>" style="height:30px" alt="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>" title="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>"/></a></li>                                            
                                        </ul>
                                        <div class="clear"></div>
                                        <p><b>DEPART ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_start']); ?></p>
                                        <p><b>ARRIVE ::</b><?php echo $modelPlace->getAddressByID($ticket['place_id_end']); ?></p>
                                        <a href="#" class="right show_map" data-url-map="https://dl.dropboxusercontent.com/u/43486987/Hoang/HTML/<?php echo STATIC_URL; ?>/images/map.jpg" data-toggle="modal" data-target="">Xem lộ trình</a>
                                        <div class="type-ticket" id="time_<?php echo $ticket['ticket_id']; ?>">
                                        <p>Select time:</p>
                                        <ul>
                                            <?php if(!empty($arrTimeTicket)) { 
                                                foreach ($arrTimeTicket as $time) {                                                   
                                                
                                            ?>
                                            <li><a href="javascript:void(0)" data-value="<?php echo $time; ?>"><?php echo $modelTime->getTimeByID($time);?></a></li>
                                            <?php }}  ?>                                            
                                        </ul>
                                        <p class="error_time" id="error_time_<?php echo $ticket['ticket_id']; ?>" style="display:none;padding-top:10px;color:red;font-style:italic">Vui lòng chọn giờ khởi hành trước khi đặt vé.</p>
                                        <div class="clear"></div>
                                    </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class=" x-right">
                                <div class="book-btn">
                                    <div class="d-price">
                                        <span><?php echo number_format($ticket['price']); ?><span>VNĐ</span></span>
                                        <input type="hidden" id="price_<?php echo $ticket['ticket_id']; ?>" value="<?php echo $ticket['price']; ?>"/>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="javascript:void(0)" data-value="<?php echo $ticket['ticket_id']; ?>" data-toggle="modal" data-target="#popup_book_ticket" class="btn-muave">book now</a>
                                    <a href="#" class="btn-chitiet"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span>Detail</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>  <!--items-->  
                        <?php } 
                        echo $modelTicket->pagination($page,$page_show,$total_page_end,$link,2);
                         } ?>  

                        </div>
                        
                    </div>
                </div>
                <div class="clear"></div>
            </div>
                
                
            <div class="clear"></div>
        </div>
        <!-- InstanceEndEditable -->
        <div class="clear"></div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="popup_detail">
    <div class="wrap-popup">
        <a href="#" class="close-popup" data-dismiss="modal"></a>
        <div class="title-detail">
            <h1>Check your details: <span>Return Trip</span><span class="a-num"><b>1</b><span>x</span><i></i></span></h1>
        </div>
        <div class="left detail-a">
            <h1 class="bg-x"><span>Detail</span></h1>
            <div class="ab-dd">
                <ul class="right">
                    <li><i class="icon-wifi"></i></li>
                    <li><i class="icon-ge"></i></li>
                </ul>
                <h1>hồ chí minh - vũng tàu</h1>
                <div class="clear"></div>
            </div>
            <div class="abc-dkh"><b>Điểm khởi hành:</b>Chợ Tân Sơn Nhất (Gò Vấp)<a href="#" class="right">(Xem bản đồ)</a></div>
            <div class="abc-dkh"><b>Điểm đến:</b>Chợ Tân Sơn Nhất (Gò Vấp)<a href="#" class="right">(Xem bản đồ)</a></div>
            <div class="type-ticket">
                <p>Chọn thời gian khởi hành trước khi mua vé*</p>
                <ul>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                    <li><a href="#">08:40 AM</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="left abc-sche">
                <h1>SCHEDULE:</h1>
                <div class="dd-point">
                    <p>2 giờ 30 phút</p>
                    <div class="line-dd"></div>
                    <span class="point point-1" data-toggle="tooltip" title="" data-original-title="Trạm dừng 1"></span>
                    <span class="point point-2" data-toggle="tooltip" title="" data-original-title="Trạm dừng 2"></span>
                    <p>2 trạm dừng</p>
                </div>
            </div>
            <div class="right abc-sche">
                <h1>PRICE:</h1>
                <div class="abc-price">
                    <span>150,000<span>VNĐ</span></span>
                </div>
            </div>
        </div>
        <div class="right option-a">
            <h1 class="bg-x"><span>Service Included</span></h1>         
            <div class="ab-dd">
                <p>Giá trên đã bao gồm các dịch vụ</p>
            </div>
            <div>
                <p><b>- Holine 24/24 hỗ trợ:</b> Mô tả mô tả mô tảt Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô</p>
                <p><b>- Bản đồ và cẩm nang du lịch onbus.vn:</b> Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảt</p>
                <p><b>- Vé chiều đi của hành trình:</b> Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảt</p>
                <p><b>- Phí Bảo Hiểm Du Lịch:</b> Mô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tảtMô tả mô tả mô tả</p>
            </div>
        </div>
        <div class="clear"></div>    
    </div>
</div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mymap">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="popup_detail">
            <div class="wrap-popup">
                <a href="#" class="close-popup" data-dismiss="modal"></a>
                <img src="" />
                <div class="clear"></div>    
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popup_book_ticket">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Select Seat</h4>
          </div>
      <div class="modal-body">
        <div class="popup_detail">
            <div class="wrap-popup">
                <a href="#" class="close-popup" data-dismiss="modal"></a>
                <p>Seat selection is not available. Please choose the number of passengers from the drop down list below.</p>
                <form class="form-horizontal" role="form" id="paymentForm" method="post" action="index.php?mod=payment">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No. of tickets: </label>
                    <div class="col-sm-10">
                      <select class="form-control" id="amount" name="amount">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                  </div>
                  <p>Seats will be assigned closed to one another and at middle area by the best effort.</p>
                  <div class="btn-center">
                    <input type="button" value="book now" class="button2">
                  </div>
                  <input type="hidden" name="time" id="time_book" value="" />
                  <input type="hidden" name="ticket_id" id="ticket_id_book" value="" />
                  <input type="hidden" name="price" id="price_book" value="" />
                </form>
                <div class="clear"></div>    
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/lightbox.min.js"></script>
<script type="text/javascript">
         $(document).ready(function(){
              $(function () {
                initSearchTicketWidget();                
                $('.btn-muave').on('click',function(){
                    var ticket_id = $(this).attr('data-value');
                    var check_time = $('#time_' + ticket_id).find('a.active').length;
                    if(check_time==0){
                        $('#error_time_' + ticket_id).show();
                        return false;
                    }else{
                        $('#error_time_' + ticket_id).hide();
                        $('#time_book').val($('#time_' + ticket_id).find('a.active').attr('data-value'));
                        $('#ticket_id_book').val(ticket_id);   
                        $('#price_book').val($('#price_' + ticket_id).val());                        
                        return true;
                    }

                });
                $('.button2').click(function(){
                    $('#paymentForm').submit();
                })
                $('#btnSearchTicket').click(function(){
                    var vstart = $('#vstart_search').val();
                    var vend = $('#vend_search').val();
                    var dstart = $('#departDate').val();
                    var type = <?php echo $type; ?>;
                    if(vstart >0 ){
                        if(vend > 0){
                            if(dstart !=''){
                                search();
                                if(type==2){
                                    var dend = $('#returnDate').val();
                                    if(dend!=''){
                                        search();
                                    }else{
                                        $('#returnDate').focus();return false;
                                    }
                                }else{
                                    search();
                                }
                            }else{
                                $('#departDate').focus();return false;
                            }
                        }else{
                            $('#destination2').focus();return false;
                        }
                    }else{
                        $('#departPlace2').focus();return false;
                    }
                });
                $('#destination2').blur(function(){
                    if($.trim($(this).val())=='' || $(this).val()=='Chọn điểm đến'){
                        $('#vend_search').val(0);
                    }
                });
                $('#departPlace2').blur(function(){                          
                    if($.trim($(this).val())=='' || $(this).val()=='Chọn điểm đi'){
                        $('#vstart_search').val(0);
                    }
                });
                $("#departDate").datepicker({
                    minDate: new Date,
                    numberOfMonths: 2
                });
                <?php if(isset($_GET['r']) && $_GET['r']==2){ ?>
                    $('a[href="#vechieuve"]').click();
                <?php } ?>    
                $('input[name="car[]"]').click(function(){
                    var str_car = "";
                    $('input[name="car[]"]:checked').each(function(){                        
                        str_car += $(this).val() +',';
                    });                    
                    $('#str_car').val(str_car.replace(/,+$/, ''));                    
                    searchByServiceAndCar();
                });
                $('input[name="service[]"]').click(function(){
                    var str_service = "";
                    $('input[name="service[]"]:checked').each(function(){                        
                        str_service += $(this).val() +',';
                    });                    
                    $('#str_service').val(str_service.replace(/,+$/, ''));                    
                    searchByServiceAndCar();
                });
             });
            $("#departPlace2").catcomplete({
                autoFocus: !0,
                delay: 0,
                source: function(a, b) {
                    var c = slug(a.term);            
                    b($.map(statecity3, function(a) {
                        var b = slug(a.label);
                        if (0 === b.indexOf(c)) return a
                    }))
                },
                select: function(a, b) {
                    $("#departPlace2").val(b.item.label);                        
                    $("#vstart_search").val(b.item.StateId); 
                    $.ajax({
                        url: "ajax/destination.php",
                        type: "POST",
                        async: false,
                         dataType: "json",
                        data: {"vstart":b.item.StateId,"type":2},
                        success: function(data){                    
                            $('#destinationSelector2').html(data.str1);
                        }
                    });
                    $.ajax({
                        url: "ajax/destination.php",
                        type: "POST",
                        async: false,
                         dataType: "json",
                        data: {"vstart":b.item.StateId,"type":3},
                        success: function(data){               
                            $('#scr').html(data.str1);
                            $("#destination2").catcomplete({
                            autoFocus: !0,
                            delay: 0,
                            source: function(a, b) {
                                var c = slug(a.term);
                                b($.map(statecity2, function(a) {
                                    var b = slug(a.label);
                                    if (0 === b.indexOf(c)) return a
                                }))
                            },
                            select: function(a, b) {
                                $("#destination2").val(b.item.label);                                  
                                 $("#vend_search").val(b.item.StateId);                                
                                $("#departDate").focus();
                                return !1
                            }
                        })                   
                        }
                    });  
                    $("#destination2").focus();

                    return !1
                }
            });
            $("#departPlace2").focus(function() {    
                closeSelector();            
                $(this).next("#departPlaceSelector2").css("display", "block")
            });
            $("#destination2").focus(function() {    
                closeSelector();            
                $(this).next("#destinationSelector2").css("display", "block")
            });

            $("#departPlace2").keypress(function(a) {    
                if(13 == a.keyCode ) {
                    if($(this).val()){
                        $("#destination2").focus(); 
                    }else{
                        $(this).focus();
                        $('#vstart_search').val(0);
                    }
                } else{
                    closeSelector();
                }          
            });
            $("#destination2").keypress(function(a) {                
                if(13 == a.keyCode ) {
                    if($(this).val()){
                        $("#departDate").focus(); 
                    }else{
                        $(this).focus();
                        $('#vend_search').val(0);
                    }
                } else{
                    closeSelector();
                }                 
            });
            $("li.city > a").click(function() {
                var a = $(this).parent().parent().parent().parent().parent(),
                    b = $(this).attr("data-state");
                    if(a.attr("id") == "departPlaceSelector2"){
                        $("#departPlace2").val($(this).text());        
                        $("#vstart_search").val(b);
                        $("#destination2").focus(); 
                        $.ajax({
                            url: "ajax/destination.php",
                            type: "POST",
                            async: false,
                             dataType: "json",
                            data: {"vstart":b,"type":2},
                            success: function(data){                    
                                $('#destinationSelector2').html(data.str1);
                            }
                        });
                    }
                    if(a.attr("id") == "destinationSelector2"){
                        $("#destination2").val($(this).text()); 
                        $("#vend_search").val(b);            
                        $("#departDate").focus();
                    }         
                return !1
            });
            $("a.close").click(function() {
                closeSelector();
            });
        });
        var statecity3 = [
        <?php 
foreach ($arrTinhHaveTicket as $value) {
    ?>
    {
            value: <?php echo json_encode($value['tinh_name_'.$lang]) ; ?>,
            StateId: <?php echo $value['tinh_id']; ?>,           
            label: <?php echo json_encode($value['tinh_name_'.$lang]) ; ?>            
        },
    <?php 
}
        ?>
        ];
        function closeSelector() {
            $(".place-selector").hide();
        }
        function search(){
            var strLink = "index.php?mod=search";
            var tmp = $('#vstart_search').val();
            if(tmp > 0){
                strLink += "&vstart=" + tmp;
            }
            tmp = $('#vend_search').val();
            if(tmp > 0){
                strLink += "&vend=" + tmp;
            }
            tmp = $('#departDate').val();
            if(tmp){
                strLink += "&dstart=" + tmp;
            }
            tmp = $('#returnDate').val();
            if(tmp){
                strLink += "&dend=" + tmp;
                strLink += "&type=2";
            }
            showLoading();            
            location.href= strLink;
        }
        function showLoading(){jQuery(".vxr-loading-overlay").height($(window).height()).show();jQuery(".vxr-loading-overlay img").css("margin-top",($(window).height()-75)/2+"px")}function hideLoading(){jQuery(".vxr-loading-overlay").hide()};
         function searchByServiceAndCar(){                        
            $.ajax({
                url: "ajax/ticket.php",
                type: "POST",
                async: false,                 
                data: {
                    "vstart":$('#vstart').val(),
                    "vend":$('#vend').val(),'dstart':$('#dstart').val(),
                    'dend':$('#dend').val(),'car':$('#str_car').val(),'service':$('#str_service').val(),'tab' : 1},
                success: function(data){
                    $('#vechieudi').html(data);
                }
            });
            $.ajax({
                url: "ajax/ticket.php",
                type: "POST",
                async: false,                 
                data: {"vstart":$('#vstart').val(),"vend":$('#vend').val(),'dstart':$('#dstart').val(),
                'dend':$('#dend').val(),'car':$('#str_car').val(),'service':$('#str_service').val(),'tab':2},
                success: function(data){
                    $('#vechieuve').html(data);
                }
            });
         }
         $('.t-pagination a').click(function(){
            var tab = $('#tab').val();
            var page = $(this).attr('attr-value');
            if(tab==1){
                $.ajax({
                    url: "ajax/ticket.php",
                    type: "POST",
                    async: false,                 
                    data: {
                        "vstart":$('#vstart').val(),
                        "vend":$('#vend').val(),'dstart':$('#dstart').val(),
                        'dend':$('#dend').val(),'car':$('#str_car').val(),'service':$('#str_service').val(),'tab' : 1,'page':page},
                    success: function(data){
                        $('#vechieudi').html(data);
                    }
                });
            }else{
                $.ajax({
                    url: "ajax/ticket.php",
                    type: "POST",
                    async: false,                 
                    data: {"vstart":$('#vstart').val(),"vend":$('#vend').val(),'dstart':$('#dstart').val(),
                    'dend':$('#dend').val(),'car':$('#str_car').val(),'service':$('#str_service').val(),'tab':2,'page':page},
                    success: function(data){
                        $('#vechieuve').html(data);
                    }
                });
            }          
         });
    </script>        