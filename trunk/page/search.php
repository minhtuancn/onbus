<?php 
$arrTinhHaveTicket = $modelTinh->getListTinhHaveTicket($vstart);
$link = "index.php?mod=search&";
 
$page_show = 5;
$limit = 10;
if($type== 1 || $type==2){    
    $link.="type=".$type;
}
if($vstart){    
    $link.="&vstart=".$vstart;
}
if($vend){    
    $link.="&vend=".$vend;
}
if($car > 0){    
    $link.="&car=".$car;    
}
if($date_start){    
    $link.="&dstart=".$date_start;
    $dstart = strtotime($date_start) + TIMEPLUS;
}
if($date_end){    
    $link.="&dend=".$date_end;
    $dend = strtotime($date_end) + TIMEPLUS;
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
                        <a class="btn-search-bus ic-search " id="select-trip" href="http://onbus.vn"><span class="glyphicon glyphicon-ok form-control-feedback"></span>{timkiem}</a>
                        <span class="line_process"></span>
                    </li>
                    <li class="finish_process active">
                        <a class="btn-seat ic-seat" id="select-seat" href="<?php echo $_SERVER['REQUEST_URI']; ?>"><span class="glyphicon glyphicon-ok form-control-feedback"></span>{ketqua}</a>
                        <span class="line_process"></span>
                    </li>
                    <li class="end">
                        <a class="btn-payment ic-cart"><span class="glyphicon glyphicon-ok form-control-feedback"></span>{thanhtoan}</a>
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
                                <li><a href="#"><span class="icon-font active">{timvexe}</span></a></li>
                            </ul>
                        </div>                        
                       <form class="frm-search-vx">
                            <div class=" item-search">
                              
                            <ul class="menu triptype clearfix">

                                <li class="oneway">
                                    <input data-ticket="type-1" id="ticket-1" type="radio" name="ticket-type" <?php echo ($type==1) ? "checked='checked'" : ""; ?> value="1">
                                    <label for="ticket-1">Vé 1 chiều</label>
                                </li>
                                <li class="return <?php echo ($type==2) ? "selected" : ""; ?>">
                                    <input type="radio" data-ticket="type-2" id="ticket-2" name="ticket-type" <?php echo ($type==2) ? "checked='checked'" : ""; ?> value="2">
                                    <label for="ticket-2">Vé khứ hồi</label>
                                </li>
                            </ul>
                            </div>
                            <div class=" item-search">
                                 <input type="hidden" name="vstart_search" id="vstart_search" value="<?php echo $vstart; ?>" />
                                <input type="hidden" name="vend_search" id="vend_search" value="<?php echo $vend; ?>" />
                                <label for="departPlace2">{diemkhoihanh}</label>
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
                                <label for="destination2">{noiden}</label>
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
                                <label for="start_date">{ngaydi}</label>
                                <input id="departDate" type="text" class="input-txt form-control" placeholder="Chọn ngày đi" accesskey="3" tabindex="3" value="<?php echo date('d-m-Y',$dstart); ?>">
        
                            </div>
                            
                            <div class=" item-search returnDate"  <?php echo $type==1 ? 'style="display:none"' : ''; ?> >
                                <label for="start_date">{ngayve}</label>
                                <input id="returnDate" type="text" class="input-txt form-control" placeholder="Chọn ngày về" accesskey="4" tabindex="4" value="<?php echo date('d-m-Y',$dend); ?>">        
                            </div>
                            
                            
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
                            <h2>{tienich}</h2>
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
                                    <?php echo $ser['service_name_'.$lang];?>
                                </label>                                
                            </div>                                                        
                         </div>
                         <?php } ?>
                        
                     </div>
                    </div>
                    <div class="filter hang-xe">
                        <div class="header">
                            <h2>{cachangxe}</h2>                            
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
                              <li class="active" ><a href="#vechieudi"  role="tab" data-toggle="tab"><span class="icon-font active">
                                <?php echo $lang=="vi" ? "Vé chiều đi" : "Onward"; ?></span></a></li>
                              <?php if($type==2){ ?>
                              <li class=""><a href="#vechieuve" role="tab" data-toggle="tab"><span class="icon-font active">
                                <?php echo $lang=="vi" ? "Vé chiều về" : "Return"; ?></span></a></li>
                              <?php } ?>
                            </ul>                            
                        </div>
                        <div class="infor-ticket-tn">
                            <div class="price-ticket right">
                                <label for="departPlace">{sapxep}:</label>
                                <select class="form-control input-sm left">
                                    <option selected="selected">rating ̣low to high</option>
                                    <option>rating ̣low to high</option>
                                </select>
                            </div>
                            <div class="left txt-vtn">
                                <p>{chieudai}:<span><?php echo $routeDetail['distance'];?>km</span></p>
                                <p>{thoigian}: <span><?php echo $routeDetail['duration'];?></span></p>
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
                                            <?php if(strlen($arrDetailNhaxe['image_url'])> 10) { ?>
                                            <div class="slide"><a href="<?php echo $arrDetailNhaxe['image_url']?>" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo $arrDetailNhaxe['image_url']?>" /></a></div>
                                            <?php } ?>
                                            <?php $arrRsImg = $modelImage->getListImageByNhaxe($ticket['nhaxe_id'],-1,-1);
                                            if(mysql_num_rows($arrRsImg) >0) {
                                                $count = 0;
                                            while($row = mysql_fetch_assoc($arrRsImg)){    
                                                $count ++;
                                                if($count<3){
                                            ?>
                                            <div class="slide"><a href="<?php echo $row['image_url']?>" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo $row['image_url']?>" /></a></div>

                                            <?php } }}else{ ?>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/Du-lich-bui-tren-dao-Binh-Ba_1a.jpg" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/img_166x104.png" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/mailinh vanluong.jpg" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images.jpg" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/images (1).jpg" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images413681_images337275_anh_tin_Dau_tu_12_ti_mua_them_xe_buyt.JPG" /></a></div>
                                            <?php } ?>
                                        </div>
                                        </div>
                                        <ul class="icon-tien-ich">
                                            <?php if(!empty($arrServiceTicket)) { 
                                                foreach ($arrServiceTicket as $ser) {         
                                                                                        
                                                if($ser==1) $classIcon = "icon-nuoc";
                                                elseif($ser==2) $classIcon = "icon-wifi";
                                                elseif($ser==3) $classIcon = "icon-khan";
                                                elseif($ser==4) $classIcon = "icon-chan";
                                                elseif($ser==5) $classIcon = "icon-wc";
                                            ?>
                                            <li><i  data-toggle="tooltip" title="<?php echo $modelService->getServiceNameByID($ser,$lang); ?>" class="<?php echo $classIcon; ?>"></i></li>
                                            <?php }}?>                                           
                                            
                                        </ul>
                                        <div class="right rating">
                                            <span>Good: 8.3</span>
                                            <span class="num-rating">(105 rating)</span>
                                        </div>
                                        <div class="rate sprite-rating_s rating_s">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="left a-right">
                                        <ul class="list-logo-xe">
                                            <li><a href="#"><img src="<?php echo $arrDetailNhaxe['image_url']; ?>" style="height:30px" alt="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>" title="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>"/></a>
                                                <span><?php echo $arrDetailNhaxe['nhaxe_name_'.$lang]; ?></span>
                                            </li>                                            
                                        </ul>
                                        <div class="clear"></div>
                                        <p><b><?php echo ($lang=="vi") ? "Điểm khởi hành" : "Depart"; ?>:</b><?php echo $modelPlace->getPlaceNameByID($ticket['place_id_start'],$lang); ?> (<?php echo $modelPlace->getAddressByID($ticket['place_id_start'],$lang); ?>)</p>
                                        <p><b><?php echo ($lang=="vi") ? "Điểm đến" : "Arrive"; ?>:</b><?php echo $modelPlace->getPlaceNameByID($ticket['place_id_end'],$lang); ?> (<?php echo $modelPlace->getAddressByID($ticket['place_id_end'],$lang); ?>)</p>
                                        <a href="javascript:;" class="right show_map" onclick="return loadmap('<?php echo $modelPlace->getAddressByID($ticket['place_id_start'],'vi'); ?>','<?php echo $modelPlace->getAddressByID($ticket['place_id_end'],'vi'); ?>');" data-target="#mymap" data-toggle="modal" >{xemlotrinh}</a>
                                        <div class="type-ticket" id="time_<?php echo $ticket['ticket_id']; ?>">
                                        <p><?php echo $lang=="vi" ? "Chọn giờ khởi hành" : "Select time"; ?>:</p>
                                        <ul>
                                            <?php if(!empty($arrTimeTicket)) { 
                                                foreach ($arrTimeTicket as $time) {                                                   
                                                
                                            ?>
                                            <li><a href="javascript:void(0)" data-value="<?php echo $time; ?>"><?php echo $modelTime->getTimeByID($time);?></a></li>
                                            <?php }}  ?>                                            
                                        </ul>
                                        <p class="error_time" id="error_time_<?php echo $ticket['ticket_id']; ?>"><?php echo ($lang=="vi") ? "Chọn thời gian khởi hành trước khi mua vé." : "Choose your departure time before booking tickets."; ?></p>
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
                                    <a href="#" class="btn-chitiet"  data-toggle="modal" data-target="#myModal" onclick="return loadDetail(<?php echo $ticket['ticket_id']; ?>)"><span class="glyphicon glyphicon-info-sign"></span>{chitiet}</a>
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
                                            <?php if(strlen($arrDetailNhaxe['image_url'])> 10) { ?>
                                            <div class="slide"><a href="<?php echo $arrDetailNhaxe['image_url']?>" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo $arrDetailNhaxe['image_url']?>" /></a></div>
                                            <?php } ?>
                                            <?php $arrRsImg = $modelImage->getListImageByNhaxe($ticket['nhaxe_id'],-1,-1);
                                            if(mysql_num_rows($arrRsImg) >0) {
                                                $count2=0;
                                            while($row = mysql_fetch_assoc($arrRsImg)){    
                                                $count++;
                                                if($count<3){
                                            ?>
                                            <div class="slide"><a href="<?php echo $row['image_url']?>" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo $row['image_url']?>" /></a></div>
                                            <?php } } }else{ ?>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/Du-lich-bui-tren-dao-Binh-Ba_1a.jpg" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/img_166x104.png" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/mailinh vanluong.jpg" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images.jpg" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/images (1).jpg" data-lightbox="example-set-<?php echo $ticket['ticket_id']; ?>" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images413681_images337275_anh_tin_Dau_tu_12_ti_mua_them_xe_buyt.JPG" /></a></div>
                                            <?php } ?>
                                        </div>
                                        </div>
                                        <ul class="icon-tien-ich">
                                            <?php if(!empty($arrServiceTicket)) { 
                                                foreach ($arrServiceTicket as $ser) {         
                                                                                        
                                                if($ser==1) $classIcon = "icon-nuoc";
                                                elseif($ser==2) $classIcon = "icon-wifi";
                                                elseif($ser==3) $classIcon = "icon-khan";
                                                elseif($ser==4) $classIcon = "icon-chan";
                                                elseif($ser==5) $classIcon = "icon-wc";
                                            ?>
                                            <li><i  data-toggle="tooltip" title="<?php echo $modelService->getServiceNameByID($ser,$lang); ?>" class="<?php echo $classIcon; ?>"></i></li>
                                            <?php }}?> 
                                        </ul>
                                        <div class="right rating">
                                            <span>Good: 8.3</span>
                                            <span class="num-rating">(105 rating)</span>
                                        </div>
                                        <div class="rate sprite-rating_s rating_s">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="left a-right">
                                        <ul class="list-logo-xe">
                                            <li><a href="#"><img src="<?php echo $arrDetailNhaxe['image_url']; ?>" style="height:30px" alt="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>" title="<?php echo $arrDetailNhaxe["nhaxe_name_".$lang]; ?>"/></a>
                                                <span><?php echo $arrDetailNhaxe['nhaxe_name_'.$lang]; ?></span>
                                            </li>                                            
                                        </ul>
                                        <div class="clear"></div>
                                        <p><b><?php echo ($lang=="vi") ? "Điểm khởi hành" : "Depart"; ?>:</b><?php echo $modelPlace->getPlaceNameByID($ticket['place_id_start'],$lang); ?> (<?php echo $modelPlace->getAddressByID($ticket['place_id_start'],$lang); ?>)</p>
                                        <p><b><?php echo ($lang=="vi") ? "Điểm đến" : "Arrive"; ?>:</b><?php echo $modelPlace->getPlaceNameByID($ticket['place_id_end'],$lang); ?> (<?php echo $modelPlace->getAddressByID($ticket['place_id_end'],$lang); ?>)</p>
                                        <a href="javascript:;" class="right show_map" onclick="return loadmap('<?php echo $modelPlace->getAddressByID($ticket['place_id_start'],'vi'); ?>','<?php echo $modelPlace->getAddressByID($ticket['place_id_end'],'vi'); ?>');" data-toggle="modal" data-target="#mymap">Xem lộ trình</a>
                                        <div class="type-ticket" id="time_<?php echo $ticket['ticket_id']; ?>">
                                        <p><?php echo $lang=="vi" ? "Chọn giờ khởi hành" : "Select time"; ?>:</p>
                                        <ul>    
                                            <?php if(!empty($arrTimeTicket)) { 
                                                foreach ($arrTimeTicket as $time) {                                                   
                                                
                                            ?>
                                            <li><a href="javascript:void(0)" data-value="<?php echo $time; ?>"><?php echo $modelTime->getTimeByID($time);?></a></li>
                                            <?php }}  ?>                                            
                                        </ul>
                                        <p class="error_time" id="error_time_<?php echo $ticket['ticket_id']; ?>">
                                            <?php echo ($lang=="vi") ? "Chọn thời gian khởi hành trước khi mua vé" : "Choose your departure time before booking tickets"; ?>.</p>
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
                                    <a href="#" class="btn-chitiet" onclick="return loadDetail(<?php echo $ticket['ticket_id']; ?>)" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span>Detail</a>
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
  
</div>



<div class="modal fade" id="mymap">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="popup_detail">
            <div class="wrap-popup" id="loadmap">               
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
                <p>Please choose the number of passengers from the drop down list below.</p>
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
                  <div class="btn-center">
                    <?php if($type==1) { ?>
                    <input type="button" value="Book now" class="button2" id="btnBookNow">
                    <?php }else{ 

                        if(count($_SESSION['bookticket'])==0){
                        ?>
                    <input type="button" id="booktoo" value="Chọn vé chiều còn lại" class="button2">
                    <?php }else{ ?>
                    <input type="button" id="btnBookNow" value="Book now" class="button2">
                    <?php }
                    } ?>
                  </div>
                  <input type="hidden" name="back_url" id="back_url" value="<?php echo $link; ?>"/>
                  <input type="hidden" name="time" id="time_book" value="" />
                  <input type="hidden" name="ticket_id" id="ticket_id_book" value="" />
                  <input type="hidden" name="price" id="price_book" value="" />
                  <input type="hidden" name="tab" value="1" id="tab"/>
                  <input type="hidden" name="ticket_type" value="<?php echo $type; ?>" id="ticket_type"/>

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
                clickOutsideSelector("#departPlaceSelector2");
                clickOutsideSelector("#destinationSelector2");
                $('#btnBookNow').click(function(){
                    var time_book = $('#time_book').val();
                    var ticket_id_book = $('#ticket_id_book').val();
                    var price_book = $('#price_book').val();
                    var tab = $('#tab').val();
                    var amount = $('#amount').val();
                    if($.trim(time_book)!= '' && ticket_id_book > 0 && price_book > 0){
                        $.ajax({
                            url: "ajax/book.php",
                            type: "POST",
                            async: false,                             
                            data: {"time_book":time_book,"ticket_id_book":ticket_id_book,'price_book': price_book,'tab' : tab,'amount':amount},
                            success: function(data){                    
                                location.href ="<?php echo $lang;?>/payment.html";
                            }
                        });
                    }
                    
                });

                $('.btn-muave').on('click',function(){
                    var ticket_id = $(this).attr('data-value');
                    var check_time = $('#time_' + ticket_id).find('a.active').length;
                    var tab = $('#tab').val();
                    var type = $('#type').val();
                    if(check_time==0){
                        $('#error_time_' + ticket_id).show();
                        return false;
                    }else{
                        $('#error_time_' + ticket_id).hide();
                        $('#time_book').val($('#time_' + ticket_id).find('a.active').attr('data-value'));
                        $('#ticket_id_book').val(ticket_id);   
                        $('#price_book').val($('#price_' + ticket_id).val());                        
                        <?php if($type==2 && count($_SESSION['bookticket'])==0) { ?>
                            var t = (tab==1) ? " chiều về " : " chiều đi";
                            $('#booktoo').val("Chọn vé" + t);
                        <?php } ?>
                        return true;
                    }

                });                
                $('#booktoo').click(function(){
                    var time_book = $('#time_book').val();
                    var ticket_id_book = $('#ticket_id_book').val();
                    var price_book = $('#price_book').val();
                    var tab = $('#tab').val();
                    var amount = $('#amount').val();
                    if($.trim(time_book)!= '' && ticket_id_book > 0 && price_book > 0){
                        $.ajax({
                            url: "ajax/book.php",
                            type: "POST",
                            async: false,                             
                            data: {"tab" : tab,"time_book":time_book,"ticket_id_book":ticket_id_book,'price_book': price_book,'tab' : tab,'amount':amount},
                            success: function(data){                                                                                    
                                window.location.reload();
                            }
                        });
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
                <?php if(isset($_SESSION['tab']) && $_SESSION['tab']==1){ ?>
                    $('a[href="#vechieuve"]').click();
                <?php } ?>
                <?php if(isset($_SESSION['tab']) && $_SESSION['tab']==2){ ?>
                    $('a[href="#vechieudi"]').click();
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
function clickOutsideSelector(a) {
    $(document).mouseup(function(b) {
        var c = $(a),
            e = c.prev();
        !c.is(":visible") || e.is(":focus") || c.is(b.target) || 0 !== c.has(b.target).length || c.hide()
    })
}
function loadDetail(id){
    $.ajax({
        url: "ajax/detail.php",
        type: "POST",
        async: false,                             
        data: {"ticket_id":id,'tab':$('#tab').val()},
        success: function(data){      
            var vl = $("#time_"+ id).find("a.active").attr('data-value');            
            $('#myModal').html(data);
            $('#time_popup_'+id).find('a[data-value="'+vl+'"]').addClass('active');
        }
    });
    return true;
}
$(function(){    
    $('#ticket-1').click(function(){        
        $('.returnDate').hide();
    });
    $('#ticket-2').click(function(){
        $('.returnDate').show();
    });
    $('#btnSearchTicket').click(function(){
      var noidi = $('#departPlace2').val();
      var noiden = $('#destination2').val();  
      var type = $('input[name="ticket-type"]:checked').val();      
      var vstart = $('#vstart_search').val();
      var vend = $('#vend_search').val();
      var dstart = $.trim($('#departDate').val());
      var dend = $.trim($('#returnDate').val());
      var lang = '<?php echo $lang; ?>';
      if(vstart >0 ){
          if(vend > 0){
              if(dstart !=''){
                   var url = "index.php?mod=search&type="+ type +"&vstart=" + vstart + "&vend=" + vend + "&dstart=" + dstart ;
                   var strSubmit = "ve-xe-khach-di-tu "+ noidi + " den " + noiden + " ngay " + dstart;
                   if(type==2){
                        if(dend != ''){
                            url+= "&dend=" + dend;
                            strSubmit+=' den '+ dend;
                        }else{
                            $('#returnDate').focus();return false;                            
                        }
                   }
                   strSubmit = tripunicode(strSubmit) + "-" +type+ "_" + vstart+"t"+vend;
                   var car = $("#car").val();
                   if(car > 0){
                        url+= "&car=" + car;
                        strSubmit +="l"+car;                   
                   }   
                   strSubmit+='.html';                   
                   showLoading();
                   location.href=lang + '/' + strSubmit;
                   

              }else{
                  $('#departDate').focus();return false;
              }
          }else{
              $('#destination').focus();return false;
          }
      }else{
          $('#departPlace').focus();return false;
      }
  });
});
function loadmap(start,end){
    $.ajax({
        url: "ajax/map.php",
        type: "POST",
        async: false,                             
        data: {'start':start,'end':end},
        success: function(data){ 
            setTimeout(function(){$('#loadmap').html(data)}, 1000);                                 
        }
    });
}
</script>   
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=vi"></script>     