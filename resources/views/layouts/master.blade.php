<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('css/master-layout-2-css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('/font/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/master-layout-2-css/ionicons.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('css/master-layout-2-css/jquery-jvectormap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/master-layout-2-css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/master-layout-2-css/_all-skins.min.css')}}">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>F</b>FF</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Far</b>Fetch</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('img/icon-user-160x160.png')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Admin - Web Administration
                                    <small>Member since Aug. 2018</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('img/icon-user-160x160.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN MANAGEMENT</li>
                <li class="@yield('active-user') treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>User Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/account"><i class="fa fa-circle-o"></i>List of Users</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-product')">
                    <a href="#">
                        <i class="fa fa-product-hunt"></i>
                        <span>Product Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/product"><i class="fa fa-circle-o"></i>List of Products</a></li>
                        <li><a href="/admin/product/create"><i class="fa fa-circle-o"></i>Create a new product</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-category')">
                    <a href="#">
                        <i class="fa fa-align-justify"></i>
                        <span>Category Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/category"><i class="fa fa-circle-o"></i>List of Categories</a></li>
                        <li><a href="/admin/category/create"><i class="fa fa-circle-o"></i>Create a new category</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-brand')">
                    <a href="#">
                        <i class="fa fa-tag"></i> <span>Brand Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/brand"><i class="fa fa-circle-o"></i>List of Brands</a></li>
                        <li><a href="/admin/brand/create"><i class="fa fa-circle-o"></i>Create a new brand</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-collection')">
                    <a href="#">
                        <i class="fa fa-archive"></i> <span>Collection Managment</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/collection"><i class="fa fa-circle-o"></i>List of Collections</a></li>
                        <li><a href="/admin/collection/create"><i class="fa fa-circle-o"></i>Create a new collection</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid" style="max-width: 70%;">
            @section('content')
            @show
        </div>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('js/master-layout-2-js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/master-layout-2-js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/master-layout-2-js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/master-layout-2-js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('js/master-layout-2-js/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('js/master-layout-2-js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/master-layout-2-js/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('js/master-layout-2-js/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('js/master-layout-2-js/Chart.js')}}"></script>
</body>
</html>
