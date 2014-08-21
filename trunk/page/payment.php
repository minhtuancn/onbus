<?php
if(!isset($_SESSION)){
    session_start();
}
//var_dump("<pre>",$_SESSION['bookticket']);
// cal total tien

?>

<div id="payment">
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
                    <li class="end active">
                        <a class="btn-payment ic-cart"><span class="glyphicon glyphicon-ok form-control-feedback"></span>Thanh toán</a>
                    </li>
                </ul>
                <div class="dotted-line"></div>
            </div>
            <div class="left w_825 hBoxBig">
                <form role="form" class="form-horizontal">
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
                                  <input type="text" id="" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="">*Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" id="" class="form-control">
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label class="col-sm-2 control-label" for="">*Phone</label>
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
                        <h3><input type="checkbox" data-id="bus_pickup" class="show_box_height" id="checked_show"><label for="checked_show">Onbus pickup</label></h3>
                    </div>
                    <div class="content_payment block_show_checked hide_check" id="bus_pickup">
                        <div class="left w_385">
                            <div class="left"><img src="images/img_241x181.jpg"></div>
                            <div class="right">
                                With $5, you can use Onbus pick up - a special service to assist Onbus's client. We will pick up you from your address to bus station for your safety and in time.
                            </div>
                        </div>
                        <div class="right w_440">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Your address</label>
                                <input type="email" placeholder="Your address" id="exampleInputEmail1" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Your phone</label>
                                <input type="email" placeholder="Your phone" id="exampleInputEmail1" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Note</label>
                                <textarea placeholder="Ex: Vui lòng gọi trước khi đến" rows="3" class="form-control"></textarea>
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
                                <input type="radio" id="way_1" value="option1" data-id="orther_payment_card" class="show_box_height" name="payment_card">
                                  PAY LATER - DOOR TO DOOR
                              </label>
                            </div>
                            <div class="radio">
                              <label class="checkbox-inline">
                                <input type="radio" id="way_2" value="option1" data-id="orther_payment_card" class="show_box_height" name="payment_card">
                                INTERNATIONAL PAYMENT CARD
                              </label>
                            </div>
                            <div class="radio">
                              <label class="checkbox-inline">
                                <input type="radio" id="way_3" value="option1" data-id="orther_payment_card" class="show_box_height" name="payment_card">
                                DOMESTIC ATM
                              </label>
                            </div>
                            <div class="sucu_payment">
                                <img src="<?php echo STATIC_URL; ?>/images/bg_payment.png">
                            </div>
                        </div>
                        <div id="pay_later" class="right w_440 ">
                              <span class="txt_gray">Thanh toán tại nhà với chi phí đính kèm 1$</span>
                                <fieldset class="field_payment_card">
                              <div class="form-group">
                                <label class="col-sm-2 control-label">*Address</label>
                                <div class="col-sm-10">
                                  <input type="text" id="" class="form-control">
                                </div>
                              </div>
                              <div class="form-group frm_inline_box">
                                <label class="col-sm-2 control-label" for="">*Contact Phone</label>
                                <div class="col-sm-10">
                                  <select class="form-control">
                                      <option>Vietnam (+84)</option>
                                    </select>
                                    <input type="text" class="form-control">
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
                    <input type="checkbox"> You must click here to indicate that you have read and accepted the fare Rule and Purchase Conditions
                  </label>
                  <input type="submit" class="right btn btn_submit_payment">
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
                        <div class="left block_date">
                            <span class="thang">sept</span>
                            <span class="ngay">26</span>
                            <span class="thu">fri</span>
                        </div>
                        <div class="left detail_tuyen">
                            <h2>Ho Chi Minh - Vung Tau</h2>
                            <div class="nhaxe"><i class="icon_cart"></i> Phương Trang</div>
                            <div class="time_move">
                                <div class="left">Số lượng vé: 2</div>
                                <span>|</span>
                                <div class="right"><i class="icon_time"></i> 2h15</div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_start" data-original-title="Khởi hành"></div>
                        <div class="left time_diadiem">
                            <h4>12:55</h4>
                            <p><span>Bến xe Miền Tay</span><a href="#" class="right">xem thông tin</a></p>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_end" data-original-title="Điểm đến"></div>
                        <div class="left time_diadiem">
                            <h4>12:55</h4>
                            <p><span>Bến xe Miền Tay</span><a href="#" class="right">xem thông tin</a></p>
                        </div>
                        <div class="line_center"></div>
                        <div class="left block_date">
                            <span class="thang">sept</span>
                            <span class="ngay">26</span>
                            <span class="thu">fri</span>
                        </div>
                        <div class="left detail_tuyen">
                            <h2>Vung Tau - Ho Chi Minh</h2>
                            <div class="nhaxe"><i class="icon_cart"></i> Phương Trang</div>
                            <div class="time_move">
                                <div class="left">Số lượng vé: 2</div>
                                <span>|</span>
                                <div class="right"><i class="icon_time"></i> 2h15</div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_start" data-original-title="Khởi hành"></div>
                        <div class="left time_diadiem">
                            <h4>12:55</h4>
                            <p><span>Bến xe Miền Tay</span><a href="#" class="right">xem thông tin</a></p>
                        </div>
                        <div class="clear"></div>
                        <div title="" data-toggle="tooltip" class="left icon_end" data-original-title="Điểm đến"></div>
                        <div class="left time_diadiem">
                            <h4>12:55</h4>
                            <p><span>Bến xe Miền Tay</span><a href="#" class="right">xem thông tin</a></p>
                        </div>
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
                            <span class="price">165,000 VND</span>
                         </div>
                        <h3>Passenger: 01</h3>
                        <h3>Price Summary:</h3>
                        <ul>
                            <li>
                                <div class="left">Fare <a href="#">View</a></div>
                                <div class="right">150,000 VND</div>
                            </li>
                            <li>
                                <div class="left">Taxes and Fees <a href="#">View</a></div>
                                <div class="right">150,000 VND</div>
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
});
</script>        