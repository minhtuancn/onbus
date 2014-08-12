<nav class="navbar navbar-static-top" role="navigation">

                <!-- Sidebar toggle button-->

                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </a>

                <div class="navbar-right">

                    <ul class="nav navbar-nav">                        
                        <!-- User Account: style can be found in dropdown.less -->

                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="glyphicon glyphicon-user"></i>

                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>

                            </a>

                            <ul class="dropdown-menu">

                                <!-- User image -->

                                <li class="user-header bg-light-blue">

                                    <img src="<?php echo STATIC_URL; ?>img/avatar3.png" class="img-circle" alt="User Image" />

                                    <p>

                                        <?php echo $_SESSION['fullname']; ?> - Editor

                                        <small>Member since Nov. 2014</small>
                                        
                                    </p>

                                </li>

                                <!-- Menu Body -->                                

                                <!-- Menu Footer-->

                                <li class="user-footer">                                   

                                    <div class="pull-right">

                                        <a href="logout.php" class="btn btn-default btn-flat" style="color:red">Sign out</a>

                                    </div>

                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>

            </nav>