<!-- sidebar: style can be found in sidebar.less -->

<section class="sidebar">

    <!-- Sidebar user panel -->

    <div class="user-panel">

        <div class="pull-left image">

            <img src="<?php echo STATIC_URL; ?>img/avatar3.png" class="img-circle" alt="User Image" />

        </div>

        <div class="pull-left info">

            <p>Hello, <?php echo $_SESSION['fullname']; ?></p>            

        </div>

    </div>

    <!-- search form -->

    <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

            <input type="text" name="q" class="form-control" placeholder="Search..."/>

            <span class="input-group-btn">

                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>

            </span>

        </div>

    </form>

    <!-- /.search form -->

    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu">

        <li class="active">

            <a href="index.php">

                <i class="fa fa-dashboard"></i> <span>Dashboard</span>

            </a>

        </li>

        <li>

            <a href="<?php echo BASE_URL; ?>ticket&act=list">

                <i class="fa fa-th"></i> <span>Vé xe</span> <!--<small class="badge pull-right bg-green">new</small>-->

            </a>

        </li>

        <li>

            <a href="<?php echo BASE_URL; ?>nhaxe&act=list">

                <i class="fa fa-th"></i> <span>Nhà xe</span> <!--<small class="badge pull-right bg-green">new</small>-->

            </a>

        </li>

        <li>

            <a href="<?php echo BASE_URL; ?>route&act=list">

                <i class="fa fa-th"></i> <span>Tuyến đường</span> <!--<small class="badge pull-right bg-green">new</small>-->

            </a>

        </li>

        <li>

            <a href="<?php echo BASE_URL; ?>articles&act=list">

                <i class="fa fa-th"></i> <span>Tin tức</span> <!--<small class="badge pull-right bg-green">new</small>-->

            </a>

        </li>
        <li>

            <a href="<?php echo BASE_URL; ?>promotion&act=list">

                <i class="fa fa-th"></i> <span>Khuyến mãi</span> <!--<small class="badge pull-right bg-green">new</small>-->

            </a>

        </li>
        <?php if($_SESSION['user_id']==1) { ?>
        <li>

            <a href="<?php echo BASE_URL; ?>user&act=list">

                <i class="fa fa-th"></i> <span>User</span> <!--<small class="badge pull-right bg-green">new</small>-->

            </a>

        </li>
        <?php } ?>

        <li class="treeview <?php if(in_array($mod,array('place','tinh','coupon','hot_place','services','time_start'))) echo "active"; ?>" >

            <a href="#">

                <i class="fa fa-edit"></i> <span>Quản lý chung</span>

                <i class="fa fa-angle-left pull-right"></i>

            </a>

            <ul class="treeview-menu">

                <li><a href="<?php echo BASE_URL; ?>tinh&act=list"><i class="fa fa-angle-double-right"></i> Nơi đi/nơi đến</a></li>                

                <li><a href="<?php echo BASE_URL; ?>place&act=list"><i class="fa fa-angle-double-right"></i> Điểm xuất phát/điểm đến</a></li>                              

                <li><a href="<?php echo BASE_URL; ?>services&act=list"><i class="fa fa-angle-double-right"></i> Tiện ích</a></li>

                <li><a href="<?php echo BASE_URL; ?>time_start&act=list"><i class="fa fa-angle-double-right"></i> Giờ khởi hành</a></li>

            </ul>

        </li>        

    </ul>

</section>

<!-- /.sidebar -->