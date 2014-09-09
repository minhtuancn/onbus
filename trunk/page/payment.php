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
        $arrTicket[$ticket_id] = $modelTicket->getDetailTicket($ticket_id);
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
                    	<h3>Your Ticket(s)</h3>
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
                            <h2>Ho Chi Minh - Vung Tau</h2>
                            <div class="nhaxe"><i class="icon_cart"></i> <?php echo $modelNhaxe->getNhaxeNameByID($value['nhaxe_id']); ?></div>
                            <div class="time_move">
                                <div class="left">{soluongve}: <?php echo $arrAmount[$value['ticket_id']]; ?></div>
                                <span>|</span>
                                <div class="right"><i class="icon_time"></i> <?php echo $value['duration']; ?></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_start" data-original-title="Khởi hành"></div>
                        <div class="left time_diadiem">
                            <h4><?php echo $modelTime->getTimeByID($arrTime[$value['ticket_id']]);?></h4>
                            <p><span><?php echo $modelPlace->getPlaceNameByID($value['place_id_start'],$lang); ?> (<?php echo $modelPlace->getAddressByID($value['place_id_start'],$lang); ?>)</span><a href="#" class="right">{xemthongtin}</a></p>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_end" data-original-title="Điểm đến"></div>
                        <div class="left time_diadiem">
                            <?php 

                            $duration = $value['duration']; 
                            $duration = str_replace("'", "", $duration);
                            $arrTmp = explode("h",$duration);
                            $arrTmp_start = explode(':',$modelTime->getTimeByID($arrTime[$value['ticket_id']]));
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
                            <p><span><?php echo $modelPlace->getPlaceNameByID($value['place_id_end'],$lang); ?> (<?php echo $modelPlace->getAddressByID($value['place_id_end'],$lang); ?>)</span><a href="#" class="right">{xemthongtin}</a></p>
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
                    	<h3>Total price</h3>
                    </div>
                    <div class="content_sidebar">
                    	<div class="total_price">
                        	<h2 class="left"><b>TOTAL:</b></h2>
                            <span class="price"><?php echo number_format($total); ?> VND</span>
                         </div>
                        <h3>No. of ticket: <?php echo $amount; ?></h3>
                        <h3>Price Summary:</h3>
                        <ul>
                            <li>
                                <div class="left">Fare <a href="#">View</a></div>
                                <div class="right"><?php echo number_format($total); ?> VND</div>
                            </li>
                            <li>
                            	<div class="left">Taxes and Fees <a href="#">View</a></div>
                                <div class="right">0 VND</div>
                            </li>
                            <li>
                            	<div class="left"><h3>Discount</h3></div>
                                
                            </li>
                        </ul>
                        <div class="right cost_payment">
                        	<a href="#">View fare Rules</a>
                            <a href="#">Purchase Conditions</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                </div>
            </div>
        	<div class="right w_825 hBoxBig">
            	<form class="form-horizontal" role="form">
            	<div class="box_payment">
                	<div class="title_payment">
                    	<h3>Contact information and passenger detail</h3>
                    </div>
                    <div class="content_payment infor_person_book">
                    	<div class="right w_440">
	                            <span class="request_txt">*Required Fieds</span>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">*Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label">*Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="">
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label for="" class="col-sm-2 control-label">*Phone</label>
                                <div class="col-sm-10">
                                	<select class="form-control">
                                    	<option>Vietnam (+84)</option>
                                    </select>
                                    <input type="text" class="form-control">
                                </div>
                              </div>
                        </div>
                        <div class="form-group promo_box">
                            <label for="" class="col-sm-4 control-label">Please enter promotion code:</label>
                            <input type="text" class="form-control" id="">
                              <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                      </div>
                        <div class="clear"></div>
                    </div>
                </div>                
                <div id="orther_payment_card" class="box_payment payment_money">
                	<div class="title_payment">
                    	<h3>Select payment and Billing information</h3>
                    </div>
                    <div class="content_payment">                    	
                        <div class="left icon_nh">
                        	<p><b>Thanh toán trực tuyến Senpay</b></p>
                        	<div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                Online bằng thẻ ATM ngân hàng
                              </label>
                            </div>
                            <ul>
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
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								Visa/Master Card
                              </label>
                            </div>
                            <ul>
                            	<li><a href="#"><img src="<?php echo STATIC_URL; ?>/images/visamaster.jpg"></a></li>
                            </ul>
                        </div>
                        <div class="right cod_nh">
                        	<div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								Thanh toán khi nhận hàng COD
                              </label>
                            </div>
                            <p>Giao hàng và thu tiền tận nơi trên toàn quốc, áp dụng cho đơn hàng có giá trị dưới 10.000.000 đồng</p>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">*Address:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="">
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label for="" class="col-sm-2 control-label">*Phone</label>
                                <div class="col-sm-10">
                                	<select class="form-control">
                                    	<option>Vietnam (+84)</option>
                                    </select>
                                    <input type="text" class="form-control">
                                </div>
                              </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 130px;"><div class="box_term" style="overflow: hidden; width: auto; height: 130px;">
                	<h1>Terms &amp; Conditions</h1>
                    <p>Please review our full terms and conditions available through the link <a href="#">Terms of User</a></p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p><p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                    <p>You must acknowledge that you have reviewed and accepted these terms and conditions before acknowledge that you have..</p>
                </div><div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 0px; opacity: 0.7; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; height: 30px; display: block; background: rgb(159, 2, 52);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                <div class="checkbox bottom_frm">
                  <label>
                    <input type="checkbox"> You must click here to indicate that you have read and accepted the fare Rule and Purchase Conditions
                  </label>
                  <input type="submit" class="right btn btn_submit_payment">
                </div>
                </form>
            </div>
            
            <div class="clear"></div>
        </div>
<script type="text/javascript">
$(function(){
    $('#pay_later').hide();
    $('#way_1').click(function(){
        $('#pay_later').show();
    });
    $('#way_2,#way_3').click(function(){
        $('#pay_later').hide();
    });
    $('#btnProcess').click(function(){
        var fullname = $.trim($('#fullname').val());
        var phone = $.trim($('#phone').val());
        var email = $.trim($('#email').val());
        if(fullname=='' || phone=='' || email==''){
            alert('Please enter name, email and phone !');
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
                    alert('Please enter address and phone contact!');
                    $('#address').focus();
                    return false;
                }
            }
        }

        if($('input[name="accept"]:checked').length==0){
            alert('You must accept the fare Rule and Purchase Conditions');return false;
        }

        $('#paymentFrm').submit();

    });
});
</script>         