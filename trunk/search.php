<?php 
include "defined.php"; 
require_once "backend/model/Ticket.php";
$modelTicket = new Ticket;

require_once "backend/model/Tinh.php";

$modelTinh = new Tinh;

require_once "backend/model/Nhaxe.php";

$modelNhaxe = new Nhaxe;
require_once "backend/model/Place.php";

$modelPlace = new Place;

require_once "backend/model/Car.php";

$modelCar = new Car;

require_once "backend/model/Services.php";

$modelService = new Services;

require_once "backend/model/Time.php";

$modelTime = new Time;

require_once "backend/model/Route.php";

$modelRoute = new Route;

$vstart = isset($_GET['vstart']) ? (int) $_GET['vstart'] : -1;
$vend = isset($_GET['vend']) ? (int) $_GET['vend'] : -1;
$car = isset($_GET['car']) ? (int) $_GET['car'] : -1;
$car = $car > 0 ? $car : -1;
$date = isset($_GET['date']) ? $modelTicket->processData($_GET['date']) : -1;
$date = strtotime($date);
$arrTicket = $modelTicket->getListTicket($car,$vstart,$vend,$date,-1,-1);

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


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/common.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap-theme.min.css">
<link href="<?php echo STATIC_URL; ?>/css/style.css" type="text/css" rel="stylesheet"  />
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
    <header>
        <div class="w-center header-wrap">
        	<div class="right">
				<div class="dropdown tiente">
					<div class="cell_header">CURRENCY</div>
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    VNĐ<span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">VNĐ - Vietnamese</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">USD - United States Dollars</a></li>
                  </ul>
            	</div>
                <div class="dropdown">
                <div class="cell_header">Language</div>
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    Tiếng Việt <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="flag-vn"></span>Tiếng Việt</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="flag-en"></span>English</a></li>
                  </ul>
            	</div>
                <div class="clear"></div>
            </div>
            <div class="left"><a href="#" class="logo-header"><img src="<?php echo STATIC_URL; ?>/images/momondo_logo_v6.png" /></a></div>
            <div class="menu-header">
            	<ul class="nav nav-pills">
                  <li class="active hv-1"><a href="#">Trang chủ<span></span></a></li>
                  <li class="hv-3"><a href="#">Tin tức<span></span></a></li>
                  <li class="hv-4"><a href="#">Moto bike taxi<span></span></a></li>
                  <!--<li class="cart-icon">
                  	<a href="#"><i>&nbsp;</i><b>0</b>Vé</a>
                  </li>-->
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </header>    
    <div id="wrapper-container" class="w-center">
		<!-- InstanceBeginEditable name="Container" -->
        <div class="w-950">
			<div class="process_bar">
                <ul class="clearfix">
                    <li class="first complete">
                        <span class="begin"></span>
                        <p class="text"><span><i><em>1</em></i>Tìm kiếm</span></p>
                        <span class="end"></span>
                    </li>
                    <li class="active">
                        <span class="begin"></span>
                        <p class="text"><i><em>2</em></i>Kết quả</p>
                        <span class="end"></span>
                    </li>
                    <li>
                        <span class="begin"></span>
                        <p class="text"><i><em>3</em></i>Thanh toán</p>
                        <span class="end"></span>
                    </li>
                    <li class="end">
                        <span class="begin"></span>
                        <p class="text"><i><em>4</em></i>Xác nhận</p>
                        <span class="end"></span>
                    </li>
                </ul>
            </div>
            <div id="MainTopContent_SearchForm_pnlSearchPage" class="block-home">
		<div id="MainTopContent_SearchForm_pnlSearchPageSearchForm">
			<div id="searchFormMini">
                <form method="GET" >
				<div id="MainTopContent_SearchForm_searchFormMiniSearchButton" class="simple">
					<div class="field search">
						<button class="medium pink buttonSearch btn-blue" type="submit" id="buttonSearchFlightsMini">Tìm vé</button>
					</div>
				</div>
				<div class="field back">
					<button class="medium purple4 back" type="button"><div class="arrow s_g s_g_buttonarrow_a7"></div></button>
				</div>
				<div id="MainTopContent_SearchForm_searchFormMiniFields" class="simple">
					<div class="field city orig">
                        <input type="hidden" name="vstart" id="vstart" value="" />
						<input id="departPlace" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Nơi đi" accesskey="1" tabindex="1" autocomplete="off"                         
                        value="<?php echo isset($_GET['vstart']) ? $arrListTinhKey[$_GET['vstart']]['tinh_name_vi'] : ""; ?>">
                        <div id="departPlaceSelector" class="place-selector rounded-5 clearfix" style="display: none;">
                            <div class="inner rel-pos">
                                <div class="region-col first left clearfix">
                                    <ul class="city-list left">
                                        <?php if(!empty($arrNoidi['data'])){ 
                                            foreach ($arrNoidi['data'] as $noidi) {
                                            ?>
                                            <li class="city"><a href="javascript:;" data-state="<?php echo $noidi['tinh_id']; ?>" ><?php echo $noidi['tinh_name_vi']; ?></a></li>                                        
                                                                              
                                            <?php
                                            }
                                            }
                                        ?>
                                    </ul>
                                </div>
							</div>
                        </div>
					</div>
					<div id="segmentToggler" class="toggle-horizontal"></div>
					<div class="field city dest">
                        <input type="hidden" name="vend" id="vend" value="" />
						<input id="destination" type="text" class="form-control input-txt place ui-autocomplete-input" placeholder="Nơi đến" accesskey="1" tabindex="1" autocomplete="off"
                        value="<?php echo isset($_GET['vend']) ? $arrListTinhKey[$_GET['vend']]['tinh_name_vi'] : ""; ?>">
                        >
                        <div id="destinationSelector" class="place-selector rounded-5 clearfix" style="display: none;">
                            <div class="inner rel-pos">
                                <div class="region-col first left clearfix">
                                    <ul class="city-list left">
                                        <?php if(!empty($arrNoidi['data'])){ 
                                            foreach ($arrNoidi['data'] as $noidi) {
                                            ?>
                                            <li class="city"><a href="javascript:;" data-state="<?php echo $noidi['tinh_id']; ?>" ><?php echo $noidi['tinh_name_vi']; ?></a></li>                                        
                                                                              
                                            <?php
                                            }
                                            }
                                        ?>
                                    </ul>
                                </div>
							</div>
                        </div>
					</div>
					<div class="field date outbound">
						<input id="departDate" name="date" type="text" class="input-txt date form-control" placeholder="Chọn ngày đi" accesskey="3" tabindex="3" 
                        value="<?php echo $modelTicket->processData($_GET['date']); ?>"
                        />
					</div>
					<div id="MainTopContent_SearchForm_pnlReturnRelated">						
						<div class="field date homebound">							
							<div id="clearReturnDateButton" class="cleardate" style="display: none;"></div>
						</div>
					</div>
				</div>
                </form>
			</div>
	</div>
    <div class="clear"></div>
</div>
			<div class="block-subpage-col">
            	<div class="detail-search w-240">
                	<div class="route">Hồ chí minh - Hà nội</div>
                	<div class="block-process-search">
                    	<div id="search_status" class="search-status">
                        	<div class="wrap-swf left"><span></span></div>
                            <div class="searchtxt">Tìm kiếm...</div>
                            <div class="result-search"><b><?php echo number_format($arrTicket['total']); ?></b> kết quả</div>
                        </div>
                        <!--<ul class="route-info">
                            <li class="trip-return"><i data-icon="" aria-hidden="true"></i><span class="label">Vé khứ hồi</span></li>
                            <li class="trip-date"><i data-icon="" aria-hidden="true"></i><span class="label">We, August 06, 2014<br>Mo, August 11, 2014</span></li>
                            <li class="trip-pap"><i data-icon="" aria-hidden="true"></i><span class="label">Người lớn: 1</span></li>
                        </ul>-->
                        <div class="clear"></div>
                    </div>
                	<div id="datepicker-filter"></div>
                	<!--<div class="route">Hồ chí minh - Hà nội</div>
                    <div class="block-process-search">
                    	<div id="search_status" class="search-status">
                        	<div class="wrap-swf left"><span></span></div>
                            <div class="searchtxt">Tìm kiếm...</div>
                            <div class="result-search"><b>8607</b> kết quả</div>
                        </div>
                        <ul class="route-info">
                            <li class="trip-return"><i data-icon="" aria-hidden="true"></i><span class="label">Vé khứ hồi</span></li>
                            <li class="trip-date"><i data-icon="" aria-hidden="true"></i><span class="label">We, August 06, 2014<br>Mo, August 11, 2014</span></li>
                            <li class="trip-pap"><i data-icon="" aria-hidden="true"></i><span class="label">Người lớn: 1</span></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="filter stops">
                        <div class="header">
                            <h2>Stops</h2>
                        </div>
                        <div class="radio">
                        <div class="line">
                            <div class="control">
                                <input type="radio" name="stops" value="0">
                            </div>
                            <div class="description">
                                <a href="#" onclick="return false;">Non-stop</a>
                            </div>
                            <div class="info">-</div>
                         </div>
                        <div class="line">
                            <div class="control">
                                <input type="radio" name="stops" value="1">
                            </div>
                            <div class="description">
                                <a href="#" onclick="return false;">Max. 1 stop</a>
                            </div>
                            <div class="info">-</div>
                        </div>
                        <div class="line on">
                            <div class="control">
                                <input type="radio" name="stops" value="2" checked="checked">
                            </div>
                            <div class="description">
                                <a href="#" onclick="return false;">Any stops</a>
                            </div>
                            <div class="info">-</div>
                        </div>
                     </div>
                    </div>-->
                    <div class="filter tien-ich">
                        <div class="header">
                            <h2>Tiện ích</h2>
                        </div>
                        <div class="radio">
                        <?php 
                            $rsSer = $modelService->getListServiceByStatus(1, -1, -1);
                            while($row = mysql_fetch_assoc($rsSer)){
                        ?>
                        <div class="line">
                            <div class="control">
                                <input type="checkbox" name="" value="0">
                            </div>
                            <div class="description">
                                <a href="#" onclick="return false;"><?php echo $row['service_name_vi']; ?></a>
                            </div>
                            <div class="info">-</div>
                         </div>
                         <?php } ?>                       
                     </div>
                    </div>
                    <div class="filter hang-xe">
                        <div class="header">
                            <h2>Các Hãng Xe</h2>
                        </div>
                        <div class="radio">
                        <?php if(!empty($arrNhaXe['data'])){ 
                            foreach ($arrNhaXe['data'] as $nhaxe) {
                                ?>                        
                        <div class="line">
                            <div class="control">
                                <input type="checkbox" name="" value="0">
                            </div>
                            <div class="description">
                                <a href="#" onclick="return false;"><?php echo $nhaxe['nhaxe_name_vi']; ?></a>
                            </div>
                            <div class="info">-</div>
                         </div>
                                <?php
                                }
                            }
                        ?>                       
                     </div>
                    </div>
                </div>
                <div class="ticket-options w-710">
                	<div class="left ticket-tn">
						<div class="tab-option"><span class="icon-font">Ticket</span></div>
                        <div class="infor-ticket-tn">
                        	<p><span>Vé tốt nhất: <span class="price-tn">150,000</span><span class="unit-money">vnđ</span></span></p>
                            <p>Độ dài hành trình: <span>150 Km</span></p>
                        </div>
                    </div>
                    <div class="left option-other">
                    	<div class="tab-option"><span>Tùy chọn khác:</span></div>
                        <div class="option-detail">
                        	<div class="price-ticket left">
                            	<label for="departPlace">Giá vé:</label>
                                <select class="form-control input-sm left">
                                    <option selected="selected">Tăng dần</option>
                                    <option>Giảm dần</option>
                                </select>
                            </div>
                            <div class="price-ticket left">
                            	<label for="departPlace">Đánh giá:</label>
                                <select class="form-control input-sm left">
                                    <option selected="selected">Tăng dần</option>
                                    <option>Giảm dần</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="list-ticket-search">
                        <?php 
                        if(!empty($arrTicket['data']) && is_array($arrTicket['data'])){
                            foreach ($arrTicket['data'] as $ticket) {
                                 $arrServiceTicket = $modelTicket->getServiceTicket($ticket['ticket_id']);                                 
                                 $arrTimeTicket = $modelTicket->getTimeTicket($ticket['ticket_id']);
                        ?>
                    	<div class="items">
                        	<div class=" infor-tuyen-search">
                            	<div class="b-infor">
                                	<div class="img-logo left">
                                    	<div class="slider_nx">
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/Du-lich-bui-tren-dao-Binh-Ba_1a.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/img_166x104.png" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/mailinh vanluong.jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images.jpg" /></a></div>
                                            <div class="slide"><a href="<?php echo STATIC_URL; ?>/images/images (1).jpg" data-lightbox="example-set" class="wrap-img"><img src="<?php echo STATIC_URL; ?>/images/images413681_images337275_anh_tin_Dau_tu_12_ti_mua_them_xe_buyt.JPG" /></a></div>
                                        </div>
                                    	<a href="#"><img src="<?php echo STATIC_URL; ?>/images/logo_xe.png" /></a>
                                    </div>
                                    <div class="left a-right">
                                    	<h1><?php echo $modelTinh->getTinhNameByID($ticket['tinh_id_start']); ?> - <?php echo $modelTinh->getTinhNameByID($ticket['tinh_id_end']); ?></h1>
                                        <div>
                                        	<p><b>Điểm khởi hành:</b><?php echo $modelPlace->getPlaceNameByID($ticket['place_id_start']); ?>
                                                ( <?php echo $modelPlace->getAddressByID($ticket['place_id_start']); ?> )
                                            </p>
                                            <a href="#" class="right">(Xem bản đồ)</a>
                                            <div class="clear"></div>
                                        </div>
                                        <div>
                                        	<p><b>Điểm đến:</b><?php echo $modelPlace->getPlaceNameByID($ticket['place_id_end']); ?>
                                                ( <?php echo $modelPlace->getAddressByID($ticket['place_id_end']); ?> )
                                            </p>
                                            <a href="#" class="right" rel="tooltip" data-toggle="tooltip" data-html="true" title="">(Xem bản đồ)</a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="type-ticket">
                                    	<p>Chọn thời gian khởi hành trước khi mua vé*</p>
                                    	<ul>
                                            <?php if(!empty($arrTimeTicket)) { 
                                                foreach ($arrTimeTicket as $time) {                                                   
                                                
                                            ?>
                                        	<li><a href="#"><?php echo $modelTime->getTimeByID($time);?></a></li>
                                            <?php } } ?>
                                           
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                            </div>
                            <div class=" x-right">
                            	<div class="top-option-xe">
                                	<h4 class="right"><?php echo $ticket['car_type']==1 ? "Giường nằm" : "Ghế ngồi"; ?></h4>
                                    <ul>
                                    	<li><i  data-toggle="tooltip" title="Wifi Free" class="icon-wifi""></i></li>
                                        <li><i  data-toggle="tooltip" title="Toilet" class="icon-ge""></i></li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="dd-point">
                                	<p><?php echo $ticket['duration']?></p>
                                	<div class="line-dd"></div>
                                    <span class="point point-1" data-toggle="tooltip" title="Trạm dừng 1"></span>
                                    <span class="point point-2" data-toggle="tooltip" title="Trạm dừng 2"></span>
                                    <p><?php echo $ticket['stop']; ?> trạm dừng</p>
                                </div>
                                <div class="book-btn">
                                	<span class="icon-person right"></span>
                                    <span class="left race">
                                    	<i class="icon-smile"></i>
                                    	<span>5.7</span>
                                    </span>
                                    <div class="d-price">
                                    	<span><?php echo number_format($ticket['price']);?><span>VNĐ</span></span>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="#" class="btn-muave">Mua vé</a>
                                    <a href="#" class="btn-chitiet"  data-toggle="modal" data-target="#myModal">Chi tiết</a>
                                </div>
                            </div>
                        	<div class="clear"></div>
                        </div>
                        
                        <?php 
                            }//foreach
                        } //if
                        else{   
                        ?>
                        <div class="items">
                            <p style="padding:20px;">Không tìm thấy dữ liệu!</p>
                        </div>
                        <?php } ?>

                        
                </div>
                <div class="clear"></div>
            </div>
	        <div class="clear"></div>
        </div>
		<!-- InstanceEndEditable -->
    	<div class="clear"></div>
</div>
<?php include "blocks/footer.php"; ?>
<!-- InstanceBeginEditable name="EditRegion3" -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<div class="modal fade" id="mymap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
		<div class="popup_detail">
	<div class="wrap-popup">
    	<a href="#" class="close-popup" data-dismiss="modal"></a>
        <img src="<?php echo STATIC_URL; ?>/images/map.jpg" />
		<div class="clear"></div>    
    </div>
</div>
      </div>
    </div>
  </div>
</div>
<!-- InstanceEndEditable --> 
<script src="<?php echo STATIC_URL; ?>/js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="<?php echo STATIC_URL; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InstanceBeginEditable name="JS" -->
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customDatePicker1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customAutoComplete1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/searchWidget1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/common.js"></script>    	
    <script type="text/javascript">
		 $(document).ready(function(){
			  $( "#datepicker-filter" ).datepicker();			 
			  $('.slider_nx').bxSlider({
					slideWidth: 560,
					minSlides: 1,
					maxSlides: 1,
					slideMargin: 0,
					pager: false,
					auto: false
			  });
			  $(function () {
				initSearchTicketWidget();
			 });
		});
	</script>
    <!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
