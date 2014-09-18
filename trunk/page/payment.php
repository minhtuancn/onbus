<?php
if(!isset($_SESSION)){
    session_start();
}
// cal total tien
if(!empty($_SESSION['bookticket'])){
    $arrTicket = array();
    foreach ($_SESSION['bookticket'] as $key => $value) {                        
        $arrAmount[$value['ticket_id']] = $value['amount'];
        $amount+=$value['amount'];
        $arrTime[$value['ticket_id']] = $value['time'];
        $ticket_id = $value['ticket_id'];
        $arrTicket[$ticket_id] = $model->getDetailTicket($ticket_id);
        $total+=$value['total'];
    }        
}
?>
<div id="payment">
        	<div class="process_bar nav">
                <ul>
                    <li class="finish_process active">
                        <a class="btn-search-bus ic-search " id="select-trip" href="http://onbus.vn"><span class="glyphicon glyphicon-ok form-control-feedback"></span>{timkiem}</a>
                        <span class="line_process"></span>
                    </li>
                    <li class="finish_process active">
                        <a class="btn-seat ic-seat" id="select-seat" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><span class="glyphicon glyphicon-ok form-control-feedback"></span>{ketqua}</a>
                        <span class="line_process"></span>
                    </li>
                    <li class="end active">
                        <a class="btn-payment ic-cart">
                            <span class="glyphicon glyphicon-ok form-control-feedback" href="<?php echo $lang; ?>/payment.html" >
                            </span>{thanhtoan}</a>
                    </li>
                </ul>
                <div class="dotted-line"></div>
            </div>
            <div id="scrollFixed" class="left w_300">
            	<div class="scrollbar_fixed">
            	<div class="box_sidebar">
                	<div class="title_payment">
                    	<h3>{vecuabans}</h3>
                    </div>
                    <div class="content_sidebar">
                    	<?php if(!empty($arrTicket)){ 
                            foreach ($arrTicket as $key => $value) {
                                
                            
                            ?>
                        <div class="left block_date">
                            <span class="thang"><?php echo date('M',$value['date_start']);?></span>
                            <span class="ngay"><?php echo date('d',$value['date_start']); ?></span>
                            <span class="thu"><?php echo date('D',$value['date_start']); ?></span>
                        </div>
                        <div class="left detail_tuyen">
                            <h2><?php echo $model->getTinhNameByID($value['tinh_id_start'],$lang); ?> - <?php echo $model->getTinhNameByID($value['tinh_id_end'],$lang); ?></h2>
                            <div class="nhaxe"><i class="icon_cart"></i> <?php echo $model->getNhaxeNameByID($value['nhaxe_id']); ?></div>
                            <div class="time_move">
                                <div class="left">{soluongve}: <?php echo $arrAmount[$value['ticket_id']]; ?></div>
                                <span>|</span>
                                <div class="right"><i class="icon_time"></i> <?php echo $value['duration']; ?></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_start" data-original-title="Khởi hành"></div>
                        <div class="left time_diadiem">
                            <h4><?php echo $model->getTimeByID($arrTime[$value['ticket_id']]);?></h4>
                            <p><span><?php echo $model->getPlaceNameByID($value['place_id_start'],$lang); ?> (<?php echo $model->getAddressByID($value['place_id_start'],$lang); ?>)</span>
                                <a href="javascript:;" class="right" onclick="return loadmap('<?php echo $model->getAddressByID($value['place_id_start'],'vi'); ?>','<?php echo $model->getAddressByID($value['place_id_start'],'vi'); ?>');" data-target="#mymap" data-toggle="modal">{xemthongtin}</a></p>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_end" data-original-title="Điểm đến"></div>
                        <div class="left time_diadiem">
                            <?php 

                            $duration = $value['duration']; 
                            $duration = str_replace("'", "", $duration);
                            $arrTmp = explode("h",$duration);
                            $arrTmp_start = explode(':',$model->getTimeByID($arrTime[$value['ticket_id']]));
                            $h_end = $arrTmp[0] + $arrTmp_start[0];
                            $h_end = ($h_end > 24) ? (30-24) : $h_end;
                            
                            $m_end = $arrTmp[1] + $arrTmp_start[1];
                            if($m_end > 60){
                                $m_end = $m_end - 60;
                                $h_end = $h_end + 1;
                            }
                            $m_end = str_pad($m_end, 2, "0", STR_PAD_LEFT); 
                            $h_end = str_pad($h_end, 2, "0", STR_PAD_LEFT);                             
                            ?>
                            <h4><?php echo $h_end?>:<?php echo $m_end; ?></h4>
                            <p><span><?php echo $model->getPlaceNameByID($value['place_id_end'],$lang); ?> (<?php echo $model->getAddressByID($value['place_id_end'],$lang); ?>)</span>
                            <a href="javascript:;" class="right" onclick="return loadmap('<?php echo $model->getAddressByID($value['place_id_end'],'vi'); ?>','<?php echo $model->getAddressByID($value['place_id_end'],'vi'); ?>');" data-toggle="modal" data-target="#mymap">{xemthongtin}</a>
                        </p>
                        </div>
                        <div class="line_center"></div>
                        <?php } // foreach
                    } // if 
                    ?>  
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="box_sidebar">
                	<div class="title_payment">
                    	<h3>{tongtien}</h3>
                    </div>
                    <div class="content_sidebar">
                    	<div class="total_price">
                        	<h2 class="left"><b>{tong}:</b></h2>
                            <span class="price"><?php echo ($_SESSION['onbustigia'] == 1) ? number_format($total) : $total; ?> <?php echo ($_SESSION['onbustigia'] == 1) ? "VNĐ" : "USD"; ?></span>
                         </div>
                        <h3>{tongsove}: <?php echo $amount; ?></h3>
                        <h3>{tienvetongcong}:</h3>
                        <ul>
                            <li>
                                <div class="left">{tienve}</div>
                                <div class="right"><?php echo ($_SESSION['onbustigia'] == 1) ? number_format($total) : $total; ?> <?php echo ($_SESSION['onbustigia'] == 1) ? "VNĐ" : "USD"; ?></div>
                            </li>                            
                            <li>
                            	<div class="left"><h3>{giamgia}</h3></div>
                                
                            </li>
                        </ul>
                        <div class="right cost_payment">
                        	<a target="_blank" href="<?php echo $lang; ?>/terms-and-conditions.html">{quydinhvexe}</a>
                            <a target="_blank" href="<?php echo $lang; ?>/pay-policy.html">{dieukhoanthanhtoan}</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                </div>
            </div>
        	<div class="right w_825 hBoxBig">
            	<form class="form-horizontal" role="form" id="paymentFrm" action="ajax/payment.php" method="post">
            	<div class="box_payment">
                	<div class="title_payment">
                    	<h3>{thongtinhanhkhach}</h3>
                    </div>
                    <div class="content_payment infor_person_book">
                    	<div class="right w_440">
	                            <span class="request_txt">*{batbuocnhap}</span>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">*{hoten}:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="fullname" name="fullname">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">*Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="email" name="email">
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label for="" class="col-sm-2 control-label">*{dienthoai}</label>
                                <div class="col-sm-10">
                                	<select class="form-control">
                                    	<option>Vietnam (+84)</option>
                                    </select>
                                    <input type="text" class="form-control" id="phone" name="phone" />
                                </div>
                              </div>
                        </div>
                        <div class="form-group promo_box">
                            <label for="" class="col-sm-4 control-label">{nhapmakhuyenmai}:</label>
                            <input type="text" class="form-control" id="">
                              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                      </div>
                        <div class="clear"></div>
                    </div>
                </div>                
                <div id="orther_payment_card" class="box_payment payment_money">
                	<div class="title_payment">
                    	<h3>{chonphuongthuc}</h3>
                    </div>
                    <div class="content_payment">                    	                        
                        <div class="left icon_nh">
                            {whenchoosingthis}
                            <div class="radio">
                              <label>
                                <input type="radio" id="way_2" value="2" name="payment_card">
                                {thequocte}
                              </label>
                            </div>
                            <ul class="visa_card">
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/visamaster.jpg" /></a></li>
                            </ul>
                            <div class="clear"></div>

                        	
                        	<div class="radio">
                              <label>
                                <input type="radio" id="way_3" value="3" name="payment_card">
                                {thenoidia}
                              </label>
                            </div>
                            <ul class="list_nhlogo">
                            	<li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/ACB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/CTG.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/DAB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/HDB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/EIB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/icon-amex.jpg"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/icon-citibank.jpg"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/icon-dbs.jpg"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/icon-mcard.jpg"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/icon-ocbc.jpg"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/STB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/TCB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/trustVN.jpg"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/VAB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/VCB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/VIB.png"></a></li>
                                <li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/VPB.png"></a></li>
                            </ul>
                            <div class="clear"></div>                           
                        </div>
                        <div class="right cod_nh">
                        	<div class="radio">
                              <label>
                                <input type="radio" name="payment_card" id="way_1" value="1">
								{thanhtoankhinhanve}
                              </label>
                            </div>
                            <p>{youpaycash}: </p>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">*{diachi}:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="address" name="address" />
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label for="" class="col-sm-2 control-label">*{dienthoai}</label>
                                <div class="col-sm-10">
                                	<select class="form-control">
                                    	<option>Vietnam (+84)</option>
                                    </select>
                                    <input type="text" class="form-control" id="phone_contact" name="phone_contact" />
                                </div>
                              </div>
                        </div>
                        <div class="clear"></div>
                        {whichevermethod}
                        
                    </div>
                </div>                
                <div class="checkbox bottom_frm">
                  <label>
                    <input type="checkbox" name="accept" id="accept"> {youmustclick}
                  </label>
                  <input type="button" class="right btn btn_submit_payment" id="btnProcess">
                </div>
                </form>
            </div>
            
            <div class="clear"></div>
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
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<script type="text/javascript">
$(function(){    
    $('#btnProcess').click(function(){
        var fullname = $.trim($('#fullname').val());
        var phone = $.trim($('#phone').val());
        var email = $.trim($('#email').val());
        if(fullname=='' || phone=='' || email==''){            
            $('#fullname').focus();
            return false;

        }
        var payment = $('input[name="payment_card"]:checked').length;
        if(payment==0){
            alert('Please choose payment method');return false;
        }else{
            if($('input[name="payment_card"]:checked').val()==1){
                var address = $.trim($('#address').val());
                var phone_contact = $.trim($('#phone_contact').val());
                if(address=='' || phone_contact == ''){
                    <?php if($lang=="en"){ ?>
                    alert('Please enter address and phone contact!');
                    <?php }else{ ?>
                        alert('Vui lòng nhập địa chỉ và số điện thoại liên hệ!');
                    <?php } ?>    
                    $('#address').focus();
                    return false;
                }
            }
        }

        if($('input[name="accept"]:checked').length==0){
            alert('You must accept the fare Rule and Purchase Conditions');
            return false;
        }

        $('#paymentFrm').submit();

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