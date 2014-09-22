<?php
require_once "model/Order.php";
$model = new Order;
$link = "index.php?mod=order&act=list";

if (isset($_GET['code']) && trim($_GET['code']) != '') {
    $code = $_GET['code'];      
    $link.="&code=$code";
} else {
    $code = '';
}
if (isset($_GET['order_code']) && trim($_GET['order_code']) != '') {
    $order_code = $_GET['order_code'];      
    $link.="&order_code=$order_code";
} else {
    $order_code = '';
}

if (isset($_GET['fullname']) && trim($_GET['fullname']) != '') {
    $fullname = $_GET['fullname'];      
    $link.="&fullname=$fullname";
} else {
    $fullname = '';
}
if (isset($_GET['phone']) && trim($_GET['phone']) != '') {
    $phone = $_GET['phone'];      
    $link.="&phone=$phone";
} else {
    $phone = '';
}

if (isset($_GET['email']) && trim($_GET['email']) != '') {
    $email = $_GET['email'];      
    $link.="&email=$email";
} else {
    $email = '';
}

if (isset($_GET['status']) && $_GET['status'] > 0) {
    $status = (int) $_GET['status'];      
    $link.="&status=$status";
} else {
    $status = -1;
}

if (isset($_GET['method_id']) && $_GET['method_id'] > 0) {
    $method_id = (int) $_GET['method_id'];      
    $link.="&method_id=$method_id";
} else {
    $method_id = -1;
}
if (isset($_GET['is_pay']) && $_GET['is_pay'] > 0) {
    $is_pay = (int) $_GET['is_pay'];      
    $link.="&is_pay=$is_pay";
} else {
    $is_pay = -1;
}

if (isset($_GET['filter_id']) && $_GET['filter_id'] > 0) {
    $filter_id = (int) $_GET['filter_id'];      
    $link.="&filter_id=$filter_id";
} else {
    $is_pay = -1;
}

if(isset($_GET['fromdate'])){
    $fromdate = $_GET['fromdate'];
}else{
    $fromdate = "01-".date('m')."-".date('Y');
}

if(isset($_GET['todate'])){
    $todate = $_GET['todate'];
}else{
    $todate = date('d-m-Y',time());
}

$intfromdate = null;
if ($fromdate)
{
    list($intDay, $intMonth, $intYear) = explode('-', $fromdate);
    $intfromdate = mktime(0, 0, 0, $intMonth, $intDay, $intYear);
    $intfromdate -= 60;
}
$inttodate = null;
if ($todate)
{
    list($intDay, $intMonth, $intYear) = explode('-', $todate);
    $inttodate = mktime(0, 0, 0, $intMonth, $intDay, $intYear);
    $inttodate += 60 * 60 * 24;
}

//$mave='',$order_code="",$fullname="",$phone="",
//$email="",$status=-1,$method_id=-1,$is_pay=-1,$fromdate=-1,$todate=-1,$offset = -1, $limit = -1
$arrTotal = $model->getListOrder($code,$order_code,$fullname,$phone,$email,$status,$method_id,$is_pay,$intfromdate,$inttodate, -1, -1);
$limit = 64;
$total_page = ceil($arrTotal['total'] / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = $limit * ($page - 1);

$arrList = $model->getListOrder($code,$order_code,$fullname,$phone,$email,$status,$method_id,$is_pay,$intfromdate,$inttodate,$offset, $limit);
?>
<style>
input.text_order {
    width: 130px;
    border: 1px solid #ccc;
    height: 25px;
}
select.select_search{
    width:130px;
}
#search_advance td{
    text-align: left;
}

</style>
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=order&act=form'">Tạo mới</button>        
         <div class="box-header">
                <h3 class="box-title">List order</h3>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="box_search">                                    
                   <table width="100%" id="search_advance">
                        <tr style="height:40px">
                            <td>Filter by</td>
                            <td>
                                <select name="filter_id" class="select_search" id="filter_id">
                                    <option value="1" <?php echo ($_GET['filter_id']==1) ? "selected" : ""; ?>>Order code</option>
                                    <option value="2" <?php echo ($_GET['filter_id']==2) ? "selected" : ""; ?> >Ticket code</option>                       
                                </select>
                            </td>
                            <td class="ticket_code" style="display:none"> Ticket code</td>
                            <td class="ticket_code" style="display:none">
                                <input type="text" class="text_order ticket_code" id="code" name="code" value="<?php echo (trim($code)!='') ? $code: ""; ?>" /> 
                            </td>
                            <td class="order_code">Order code</td>
                            <td class="order_code"><input type="text" class="text_order" id="order_code" name="order_code" value="<?php echo (trim($order_code)!='') ? $order_code: ""; ?>" /> </td>                            

                            <td>Fullname</td>
                            <td><input type="text" class="text_order" id="fullname" name="fullname" value="<?php echo (trim($fullname)!='') ? $fullname: ""; ?>" /> </td>
                            <td>Phone</td>
                            <td><input type="text" class="text_order" id="phone" name="phone" value="<?php echo (trim($phone)!='') ? $phone: ""; ?>" /> </td>
                            <td>Email</td>
                            <td><input type="text" class="text_order" id="email" name="email" value="<?php echo (trim($email)!='') ? $email: ""; ?>" /> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Method</td>
                            <td>
                                <select name="method_id" class="select_search" id="method_id">
                                    <option value="-1">Tất cả</option>
                                    <option value="1" <?php echo ($_GET['method_id']==1) ? "selected" : ""; ?>>Tien mat</option>                        
                                    <option value="3" <?php echo ($_GET['method_id']==3) ? "selected" : ""; ?>>Interner banking</option>                        
                                    <option value="2" <?php echo ($_GET['method_id']==2) ? "selected" : ""; ?>>Visa/Master</option>                        
                                </select>
                            </td>
                            <td>Status</td>
                            <td>
                                <select name="status" class="select_search" id="status">
                                    <option value="-1">Tất cả</option>
                                    <option value="1" <?php echo ($_GET['status']==1) ? "selected" : ""; ?>>Da duyet</option>                        
                                    <option value="2" <?php echo ($_GET['status']==2) ? "selected" : ""; ?>>Chua duyet</option>                        
                                    <option value="3" <?php echo ($_GET['status']==3) ? "selected" : ""; ?>>Khach hang y/c huy</option>
                                    <option value="4" <?php echo ($_GET['status']==4) ? "selected" : ""; ?>>Da huy</option>
                                </select>
                            </td>
                            <td>Pay</td>
                            <td>
                                <select name="is_pay" class="select_search" id="is_pay">
                                    <option value="-1">Tất cả</option>
                                    <option value="1" <?php echo ($_GET['is_pay']==1) ? "selected" : ""; ?>>Da thanh toan</option>                        
                                    <option value="0" <?php echo ($_GET['is_pay']==0) ? "selected" : ""; ?>>Chua thanh toan</option>
                                </select>
                            </td>

                            <td>From</td>
                            <td>
                                <input type="text" class="text_order" id="fromdate" name="fromdate" value="<?php echo (trim($fromdate)!='') ? $fromdate: ""; ?>" /> 
                            </td>

                            <td>To</td>
                            <td>
                                <input type="text" class="text_order" id="todate" name="todate" value="<?php echo (trim($todate)!='') ? $todate: ""; ?>" /> 
                            </td>
                            <td><button class="btn btn-primary btn-sm right" id="btnSearch" type="button">Search</button></td>
                        </tr>
                   </table>                                     
                
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 1%">No.</th>
                        <th width="90">Order code</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th align="right">Phone</th>                  
                        <th align="right">Total price</th>
                        <th align="right">Amount</th>
                        <th>Status</th>
                        <th>Pay</th>                  
                        <th>Date</th>                        
                        <th style="width: 40px">Action</th>
                    </tr>
                    <?php
                    if(!empty($arrList['data'])){
                    $i = ($page-1) * $limit;                    
                    foreach($arrList['data'] as $row){
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['order_code']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td align="right"><?php echo $row['phone']; ?></td>
                        <td align="right"><?php echo number_format($row['total_price']); ?></td>
                        <td align="right"><?php echo $row['total_amount']; ?></td>
                        <td><?php 
                        $status = $row['status'];
                        if($status == 1) echo "Da duyet";
                        if($status == 2) echo "Chua duyet";
                        if($status == 3) echo "KH y/c huy";
                        if($status == 4) echo "Da huy";
                        ?>
                        </td>
                        <td>
                            <?php echo $row['is_pay']==0 ? "Chua thanh toan" : "Da thanh toan" ; ?>
                        </td>

                        <td><?php echo date('d-m-Y',$row['creation_time']); ?></td>                        
                        <td style="white-space:nowrap">
                            <a href="index.php?mod=order&act=form&order_id=<?php echo $row['order_id']; ?>">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <a href="javascript:;" alias="<?php echo $row['order_name_vi']; ?>" id="<?php echo $row['order_id']; ?>" mod="order" class="link_delete" >    
                                <i class="fa fa-fw fa-trash-o"></i>
                            </a>    
                            
                        </td>
                    </tr>      
                    <?php }  }else{ ?>              
                    <tr>
                        <td colspan="11" class="error_data">Không tìm thấy dữ liệu!</td>
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