<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo site_url('admin'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>N</b>TN</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Hệ thống</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="<?php echo site_url() ?>admin/profile" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo site_url('public/assets/adminlte/') ?>dist/img/avatar5.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Quản trị viên</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo site_url('public/assets/adminlte/') ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
                                    <p>
                                        Quản trị viên
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url() ?>/admin/profile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url() ?>/admin/login/signout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown ">
                            <a href="<?php echo site_url() ?>" target="_blank">
                                <i class="fa fa-home"></i>
                                <span class="hidden-xs">Trang chủ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>