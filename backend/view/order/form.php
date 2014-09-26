<?php 
require_once "model/Order.php";
$modelOrder = new Order;
require_once "model/Home.php";
$model = new Home;

$order_id = (int) $_GET['order_id'];
$arrDetail = $modelOrder->getDetailOrder($order_id);

?>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="controller/Order.php">

        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=order&amp;act=list'">Quay lại</button>    
        <div style="clear:both;margin-bottom:10px"></div>
         <div class="box-header">

                <h3 class="box-title">Cập nhật đơn hàng</h3>

               <input type="hidden" value="<?php echo $order_id; ?>" name="order_id" />

            </div><!-- /.box-header -->
        <div class="nav-tabs-custom"> 


            <div class="button">
                <div class="form-group">

                        <label>Order code</label>
                        <input type="text" name="order_code" class="form-control" value="<?php echo $arrDetail['order_code']; ?>" readonly="true"/>                       

                </div>
                <div class="row">

                    <div class="col-md-6" >

                        <div class="form-group">

                            <label>Số vé</label>

                            <input type="text" name="total_amount" class="form-control" value="<?php echo $arrDetail['total_amount'];?>" readonly="true"/>

                        </div>

                    </div>

                    <div class="col-md-6">



                        <div class="form-group">

                            <label>Tổng tiền</label>
                            <input type="text" name="total_price" class="form-control" value="<?php echo number_format($arrDetail['total_price']); ?>" readonly="true" />



                        </div> 

                    </div>

                </div> 
                <div class="row">

                    <div class="col-md-6" >

                        <div class="form-group">

                            <label>Họ tên</label>

                            <input type="text" name="fullname" class="form-control" value="<?php echo $arrDetail['fullname'];?>" readonly="true" />

                        </div>

                    </div>

                    <div class="col-md-6">



                        <div class="form-group">

                            <label>Điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo ($arrDetail['phone']); ?>" readonly="true"/>



                        </div> 

                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6" >

                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="email" class="form-control" value="<?php echo $arrDetail['email'];?>" readonly="true" />

                        </div>

                    </div>

                    <div class="col-md-6">



                        <div class="form-group">

                            <label>Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="<?php echo ($arrDetail['address']); ?>" readonly="true"/>



                        </div> 

                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6" >

                        <div class="form-group">

                            <label>Mã giảm giá</label>

                            <input type="text" name="email" class="form-control" value="<?php echo ($arrDetail['code_id'] > 0) ? $model->getCodeByID($arrDetail['code_id']) : "";?>" readonly="true" />

                        </div>

                    </div>

                    <div class="col-md-6">



                        <div class="form-group">

                            <label>Tiền thanh toán</label>
                            <input type="text" name="total_pay" class="form-control" value="<?php echo ($arrDetail['total_pay']); ?>" readonly="true"/>



                        </div> 

                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6" >

                        <div class="form-group">

                            <label>Phương thức thanh toán</label>

                            <select name="method_id" class="form-control" id="method_id" disabled>
                                <option value="-1">Tất cả</option>
                                <option value="1" <?php echo ($arrDetail['method_id']==1) ? "selected" : ""; ?>>Tiền mặt</option>                        
                                <option value="3" <?php echo ($arrDetail['method_id']==3) ? "selected" : ""; ?>>Interner banking</option>                        
                                <option value="2" <?php echo ($arrDetail['method_id']==2) ? "selected" : ""; ?>>Visa/Master</option>                        
                            </select>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Số điện thoại giao vé</label>
                            <input type="text" name="phone_contact" class="form-control" value="<?php echo ($arrDetail['phone_contact']); ?>" readonly="true"/>

                        </div> 

                    </div>

                </div>                  
                <div class="form-group">

                        <label>Trạng thái đơn hàng</label>                      
                        
                        <select name="status" class="form-control" id="status">
                            <option value="-1">Tất cả</option>
                            <option value="1" <?php echo ($arrDetail['status']==1) ? "selected" : ""; ?>>Đã duyệt</option>                        
                            <option value="2" <?php echo ($arrDetail['status']==2) ? "selected" : ""; ?>>Chưa duyệt</option>                        
                            <option value="3" <?php echo ($arrDetail['status']==3) ? "selected" : ""; ?>>KH y/c hủy</option>
                            <option value="4" <?php echo ($arrDetail['status']==4) ? "selected" : ""; ?>>Đã hủy</option>
                        </select>

                </div>
                <div class="form-group">

                        <label>Trạng thái thanh toán</label>                      
                        
                        <select name="is_pay" class="form-control" id="is_pay">
                            <option value="-1">Tất cả</option>
                            <option value="1" <?php echo ($arrDetail['is_pay']==1) ? "selected" : ""; ?>>Đã thanh toán</option>                        
                            <option value="0" <?php echo ($arrDetail['is_pay']==0) ? "selected" : ""; ?>>Chưa thanh toán</option>
                        </select>

                </div> 
              

            </div>

            <div class="button">

                <button class="btn btn-primary btnSave" type="submit">Save</button>

                <button class="btn btn-primary" type="reset">Cancel</button>

            </div>

        </div><!-- nav-tabs-custom -->



    </form>



    </div><!-- /.col --> 



</div>