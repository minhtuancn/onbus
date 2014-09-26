<?php
require_once "model/Order.php";
$modelOrder = new Order;
require_once "model/Home.php";
$model = new Home;
$link = "index.php?mod=order&act=detail";
$order_id = (int) $_GET['order_id'];
$sql = "SELECT * FROM order_detail WHERE order_id = $order_id ";

$rs = mysql_query($sql);

$arrDetail = $modelOrder->getDetailOrder($order_id);

?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=order&amp;act=list'">Quay lại</button>    
         <div class="box-header">
                <h3 class="box-title">Chi tiết đơn hàng : <?php echo $arrDetail['order_code']; ?></h3>
            </div><!-- /.box-header -->
        <div class="box">            
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 1%">No.</th>
                        <th width="200">Mã vé</th>
                        <th>Nơi đi</th>
                        <th>Nơi đến</th>
                        <th align="center" style="width:150px;text-align:center">Giờ khởi hành</th>                  
                        <th style="text-align:right">Tổng tiền</th>
                        <th style="text-align:right">Số vé</th>  
                        <th style="text-align:right">Date</th>                        
                        <th style="width: 40px">Action</th>
                    </tr>
                    <?php                    
                    $i = ($page-1) * $limit;                    
                   while($row = mysql_fetch_assoc($rs)){
                        $detail = $model->getDetailTicket($row['ticket_id']);
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['code']; ?></td>                    
                        <td><?php echo $model->getTinhNameByID($detail['tinh_id_start']); ?></td>
                        <td><?php echo $model->getTinhNameByID($detail['tinh_id_end']); ?></td>
                        <td align="center"><?php echo $model->getTimeByID($row['time_id']); ?></td>
                        <td align="right"><?php echo number_format($row['price']); ?></td>
                        <td align="right"><?php echo $row['amount']; ?></td>                   
                        <td style="text-align:right"><?php echo date('d-m-Y',$row['creation_time']); ?></td>                        
                        <td style="white-space:nowrap">                            
                            <a href="javascript:;" alias="<?php echo $row['code']; ?>" id="<?php echo $row['id']; ?>" mod="order_detail" class="link_delete" >    
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
<link href="<?php echo STATIC_URL; ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $(function(){
        $('#fromdate,#todate').datepicker({            
            dateFormat: "dd-mm-yy" ,
            changeMonth: true,
            changeYear: true               
        });
        <?php 
        if($filter_id > 0){
            if($filter_id==1){?>
                $('.ticket_code').hide();
                $('.order_code').show();
                <?php
            }else{?>
                $('.ticket_code').show();   
                $('.order_code').hide();
            <?php
        } }
        ?>
        $('#filter_id').change(function(){
            var id = $(this).val();
            if(id==1){
                $('.ticket_code').hide();
                $('.order_code').show();
            }else{
                $('.ticket_code').show();   
                $('.order_code').hide();
            }
        });
        $('#method_id,#status,#is_pay').change(function(){
            search();
        });
        $('#btnSearch').click(function(){
            search();
        });
        $('#email,#fullname,#code,#order_code,#phone').keypress(function (e) {
          if (e.which == 13) {
            search();
          }
        });
    });   
    function search(){
        var str_link = "index.php?mod=order&act=list";
        var tmp = $('#filter_id').val();
        if(tmp > 0){
            str_link += "&filter_id=" + tmp ;
        }
        tmp = $('#method_id').val();
        if(tmp > 0){
            str_link += "&method_id=" + tmp ;
        }
        tmp = $('#status').val();
        if(tmp > 0){
            str_link += "&status=" + tmp ;
        }
        tmp = $('#is_pay').val();
        if(tmp >= -1){
            str_link += "&is_pay=" + tmp ;
        }

        tmp = $.trim($('#order').val());
        if(tmp != ''){
            str_link += "&order=" + tmp ;   
        }
        tmp = $.trim($('#order_code').val());
        if(tmp != ''){
            str_link += "&order_code=" + tmp ;   
        }
        tmp = $.trim($('#code').val());
        if(tmp != ''){
            str_link += "&code=" + tmp ;   
        }
        tmp = $.trim($('#fullname').val());
        if(tmp != ''){
            str_link += "&fullname=" + tmp ;   
        }
        tmp = $.trim($('#phone').val());
        if(tmp != ''){
            str_link += "&phone=" + tmp ;   
        }
        tmp = $.trim($('#email').val());
        if(tmp != ''){
            str_link += "&email=" + tmp ;   
        }  
        tmp = $.trim($('#fromdate').val());
        if(tmp != ''){
            str_link += "&fromdate=" + tmp ;   
        }
        tmp = $.trim($('#todate').val());
        if(tmp != ''){
            str_link += "&todate=" + tmp ;   
        }         
        location.href= str_link;
    }   
</script>