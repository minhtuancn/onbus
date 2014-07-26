<?php
include "defined.php"; 
$mod='';
if(isset($_GET['mod']))
{
    $mod = $_GET['mod'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Onbus.n</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo STATIC_URL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <!-- font Awesome -->
        <link href="<?php echo STATIC_URL; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo STATIC_URL; ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo STATIC_URL; ?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo STATIC_URL; ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo STATIC_URL; ?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo STATIC_URL; ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo STATIC_URL; ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo STATIC_URL; ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
          <!-- jQuery 2.0.2 -->
       <script src="<?php echo STATIC_URL; ?>js/jquery-1.10.2.js"></script>
        <!-- jQuery UI 1.10.3 -->
        
        <script src="<?php echo STATIC_URL; ?>js/jquery-ui.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Onbus.vn
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php include URL_LAYOUT."top.php"; ?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <?php include URL_LAYOUT."sidebar.php"; ?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Main content -->
                <section class="content">                                   
                    <?php                           
                     $act = $_GET['act'];         
                    
                    if ($mod=="") include "view/nhaxe/list.php";
                    else include "view/".$mod.'/'.$act.'.php';                         

                    ?>  
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


      
        <script src="<?php echo STATIC_URL; ?>js/form.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo STATIC_URL; ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo STATIC_URL; ?>js/raphael-min.js"></script>
        
        <!-- Sparkline -->
        <script src="<?php echo STATIC_URL; ?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo STATIC_URL; ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo STATIC_URL; ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php echo STATIC_URL; ?>js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo STATIC_URL; ?>js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo STATIC_URL; ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo STATIC_URL; ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo STATIC_URL; ?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo STATIC_URL; ?>js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo STATIC_URL; ?>js/AdminLTE/dashboard.js" type="text/javascript"></script>        
<div id="div_upload" style="display:none">
    <form id="upload_images" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="Controller/Upload.php">
        <div style="margin: auto;">       
            <div style="text-align:center"><img src="static/img/add.jpg" id="add_images" width="32" title="Thêm hình ảnh" alt="Thêm hình ảnh" /></div>
            <div id="wrapper_input_files">
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
            </div>            
            <div class="clear"></div>
            <button class="btn btn-danger btn-sm"  type="submit" id="btn_upload_images">Upload</button>       
               
        </div>
        
    </form>
</div>
    </body>
</html>