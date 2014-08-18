<?php 
include "defined.php"; 
$lang = "vi";
require_once "backend/model/Nhaxe.php";
$modelNhaxe = new Nhaxe();
require_once "backend/model/Tinh.php";
$modelTinh = new Tinh();
require_once "backend/model/Route.php";
$modelRoute = new Route();
$arrNhaXeUyTin = $modelNhaxe->getListNhaxe('',1,0,8);

$arrNhaXe = $modelNhaxe->getListNhaxe('',-1,-1,-1);

$arrNoidi = $modelTinh->getListTinh(-1,'',-1,-1, -1);
$arrDiemDenHot = $modelTinh->getListTinh(-1,'',1,0, 9);

$arrRoute = $modelRoute->getListRoute('',-1,-1,1, 0, 8);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/common.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Onbus.vn</title>
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo STATIC_URL; ?>/css/bootstrap-theme.min.css">
<link href="<?php echo STATIC_URL; ?>/css/style.css" type="text/css" rel="stylesheet"  />
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
    <?php include URL_LAYOUT."/header.php"; ?>    
    
    <div id="wrapper-container" class="w-center">
        <!-- InstanceBeginEditable name="Container" -->

        <div class="ticket-book box-css3 block-home">           
            
            <?php include URL_LAYOUT."/search.php"; ?>
            <?php include URL_LAYOUT."/slide.php"; ?>
            <div class="clear"></div>
        </div>        
        <div class="block-page block-home">
            <div class="container-block">
            <?php include URL_LAYOUT."/left.php"; ?>
            <?php include URL_LAYOUT."/topplace.php"; ?>
            <div class="clear"></div>
            </div>
        </div>
        <?php include URL_LAYOUT."/newsletter.php"; ?>
        <!-- InstanceEndEditable -->
        <div class="clear"></div>
</div>
<?php include URL_LAYOUT."/footer.php"; ?>
<!-- InstanceBeginEditable name="EditRegion3" -->
<div id="scr"></div>
<!-- InstanceEndEditable --> 
<script src="<?php echo STATIC_URL; ?>/js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InstanceBeginEditable name="JS" -->
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customDatePicker1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/customAutoComplete1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/searchWidget1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/helper1.0.min.js"></script>    
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL; ?>/js/common.js"></script>    
    <script type="text/javascript">
        var statecity = [
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
        $(document).ready(function(){
          $('.ticket-2').hide();  
          $('.bxslider').bxSlider({
            slideWidth: 560,
            minSlides: 1,
            maxSlides: 1,
            slideMargin: 0,
            pager: false,
            auto: true
          });
          $(function () {
           
            initSearchTicketWidget();           
         });
        });
    </script>
    <!-- InstanceEndEditable -->
    <div class="vxr-loading-overlay">
    <img src="themes/images/ajax_loader.gif" style="width: 75px; height: 75px;" />
</div>
<style type="text/css">
.vxr-loading-overlay{background:none repeat scroll 0 0 #FFFFFF;height:100%;opacity:0.5;position:fixed;text-align:center;width:100%;z-index:9999;top:0;left:0;display:none}.vxr-loading-overlay img{margin-top:40%}
</style>
</body>
<!-- InstanceEnd --></html>

