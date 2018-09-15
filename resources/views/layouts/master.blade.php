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
    <!-- CSS JS OLD MASTER LAYOUT -->
    <link href="{{asset('/css/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('/font/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    <link href="{{asset('/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{URL::asset('css/form.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo">
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
                            <img src="{{URL::asset("/img/icon-user-160x160.png")}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('img/icon-header-01.png')}}" class="img-circle" alt="User Image">

                                <p>
                                    Admin - Web Administration
                                    <small>Là thành viên từ Aug. 2018</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Hồ sơ</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/admin/logout" class="btn btn-default btn-flat">Đăng xuất</a>
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
                    <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Trang quản lý</li>
                <li class="@yield('active-dashboard')">
                    <a href="/admin">
                        <i class="fa fa-columns"></i> <span>Trang chủ</span>
                    </a>
                </li>
                <li class="treeview @yield('active-user')">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Quản lý tài khoản</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/account"><i class="fa fa-circle-o"></i>Danh sách tài khoản</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-product')">
                    <a href="#">
                        <i class="fa fa-product-hunt"></i>
                        <span>Quản lý sản phẩm</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/product"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
                        <li><a href="/admin/product/create"><i class="fa fa-circle-o"></i>Thêm sản phẩm</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-category')">
                    <a href="#">
                        <i class="fa fa-align-justify"></i>
                        <span>Quản lý danh mục</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/category"><i class="fa fa-circle-o"></i>Danh sách danh mục</a></li>
                        <li><a href="/admin/category/create"><i class="fa fa-circle-o"></i>Thêm danh mục</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-brand')">
                    <a href="#">
                        <i class="fa fa-tag"></i> <span>Quản lý nhãn hiệu</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/brand"><i class="fa fa-circle-o"></i>Danh sách các nhãn hiệu</a></li>
                        <li><a href="/admin/brand/create"><i class="fa fa-circle-o"></i>Thêm nhãn hiệu</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-order')">
                    <a href="#">
                        <i class="fa fa-list-ul"></i> <span>Quản lý đơn hàng</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/order"><i class="fa fa-circle-o"></i>Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                <li class="treeview @yield('active-subcribers')">
                    <a href="#">
                        <i class="fa fa-list-ul"></i> <span>Quản lý subcriber</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/subcriber"><i class="fa fa-circle-o"></i>Danh sách subcriber</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
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
<script src="{{asset('/css/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/css/datatables/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('/css/datatables-responsive/dataTables.responsive.js')}}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>
</html>
