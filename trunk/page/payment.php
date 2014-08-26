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
                        <a class="btn-payment ic-cart"><span class="glyphicon glyphicon-ok form-control-feedback" href="index.php?mod=payment" ></span>{thanhtoan}</a>
                    </li>
                </ul>
                <div class="dotted-line"></div>
            </div>
            <div class="left w_825 hBoxBig">
                <form role="form" class="form-horizontal" id="paymentFrm" action="ajax/payment.php" method="post">
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
                                  <input type="text" id="fullname" name="fullname" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="">*Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" id="email" name="email" class="form-control">
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label class="col-sm-2 control-label" for="">*Phone</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                        <option>Vietnam (+84)</option>
                                    </select>
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>
                              </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="box_payment promo_box">
                    <div class="title_payment">
                        <h3>Promotion code</h3>
                    </div>
                    <div class="content_payment">
                        <div class="form-group">
                        <label class="col-sm-4 control-label" for="">Please enter promotion code:</label>
                        <div class="col-sm-5">
                          <input type="text" id="" class="form-control">
                          <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>
                      </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="box_payment">
                    <div class="title_payment">
                        <h3><input name="pickup" value="1" type="checkbox" data-id="bus_pickup" class="show_box_height" id="checked_show"><label for="checked_show">Onbus pickup</label></h3>
                    </div>
                    <div class="content_payment block_show_checked hide_check" id="bus_pickup">
                        <div class="left w_385">
                            <div class="left"><img src="<?php echo STATIC_URL; ?>/images/img_241x181.jpg"></div>
                            <div class="right">
                                With $5, you can use Onbus pick up - a special service to assist Onbus's client. We will pick up you from your address to bus station for your safety and in time.
                            </div>
                        </div>
                        <div class="right w_440">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Your address</label>
                                <input type="email" placeholder="Your address" id="address_pickup" name="address_pickup" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Your phone</label>
                                <input type="email" placeholder="Your phone" id="phone_pickup" name="phone_pickup" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Note</label>
                                <textarea placeholder="Ex: Vui lòng gọi trước khi đến" rows="3" class="form-control" name="note" id="note"></textarea>
                              </div>
                              
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="box_payment">
                    <div class="title_payment">
                        <h3>Select payment and Billing information</h3>
                    </div>
                    <div class="content_payment">
                      <div class="left w_385">
                          <div class="radio">
                              <label class="checkbox-inline">
                                <input type="radio" id="way_1" value="1" data-id="orther_payment_card" class="show_box_height" name="payment_card">
                                  PAY LATER - DOOR TO DOOR
                              </label>
                            </div>
                            <div class="radio">
                              <label class="checkbox-inline"  style="margin-bottom:0px">
                                <input type="radio" id="way_2" value="2" data-id="orther_payment_card" class="show_box_height" name="payment_card">
                                INTERNATIONAL PAYMENT CARD &nbsp;&nbsp;
                                <img src="<?php echo STATIC_URL; ?>/images/visamaster.jpg" align="right"/>
                              </label>
                            </div>
                            <div class="radio">
                              <label class="checkbox-inline">
                                <input type="radio" id="way_3" value="3" data-id="orther_payment_card" class="show_box_height" name="payment_card">
                                DOMESTIC ATM
                              </label>
                              <div style="float:right"><img src="<?php echo STATIC_URL; ?>/images/bg_payment.png"></div>
                            </div>
                            <div class="sucu_payment">
                                
                            </div>
                        </div>
                        <div id="pay_later" class="right w_440 ">
                              <span class="txt_gray">Thanh toán tại nhà với chi phí đính kèm 1$</span>
                                <fieldset class="field_payment_card">
                              <div class="form-group">
                                <label class="col-sm-2 control-label">*Address</label>
                                <div class="col-sm-10">
                                  <input type="text" id="address" name="address" class="form-control">
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label class="col-sm-2 control-label" for="">*Contact Phone</label>
                                <div class="col-sm-10">
                                  <select class="form-control">
                                      <option>Vietnam (+84)</option>
                                    </select>
                                    <input type="text" id="phone_contact" name="phone_contact" class="form-control">
                                </div>
                              </div>
                              </fieldset>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>                
                <div class="box_term">
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
                </div>
                <div class="checkbox bottom_frm">
                  <label>
                    <input type="checkbox" name="accept" id="accept"> You must click here to indicate that you have read and accepted the fare Rule and Purchase Conditions
                  </label>
                  <input type="btn" class="right btn btn_submit_payment" id="btnProcess" />
                </div>
                </form>
            </div>
            <div class="right w_300">
                <div class="scrollbar_fixed" style="position: absolute; top: 508.85px;">
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
                            <p><span><?php echo $modelPlace->getAddressByID($value['place_id_start'],$lang); ?></span><a href="#" class="right">{xemthongtin}</a></p>
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
                            <p><span><?php echo $modelPlace->getAddressByID($value['place_id_end'],$lang); ?></span><a href="#" class="right">{xemthongtin}</a></p>
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