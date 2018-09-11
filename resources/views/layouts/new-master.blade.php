<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>@yield('page-title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro"/>
    <!--  Social tags      -->
    <meta name="keywords"
          content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, light bootstrap 4 dashboard, frontend, responsive bootstrap dashboard">
    <meta name="description"
          content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta itemprop="description"
          content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <meta itemprop="image"
          content="https://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta name="twitter:description"
          content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
          content="https://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
    <meta name="twitter:data1" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="$39">
    <meta name="twitter:label2" content="Price">
    <!-- Open Graph data -->
    <meta property="og:title" content="Light Bootstrap Dashboard PRO by Creative Tim"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="light-bootstrap-dashboard-pro/examples/dashboard.html"/>
    <meta property="og:image"
          content="https://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg"/>
    <meta property="og:description"
          content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful."/>
    <meta property="og:site_name" content="Creative Tim"/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('font/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- CSS Files -->
    <link href="{{asset('css/master-layout-3-css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/master-layout-3-css/light-bootstrap-dashboard.css'.'?v=2.0.1')}}" rel="stylesheet"/>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/admin" class="simple-text logo-mini">
                    FF
                </a>
                <a href="/admin" class="simple-text logo-normal">
                    FarFetch
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item @yield('active-dashboard')">
                    <a class="nav-link" href="/admin">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                        <i class="nc-icon nc-app"></i>
                        <p>
                            Quản lý tài khoản admin
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="componentsExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-user')">
                                <a class="nav-link" href="/admin/account">
                                    <span class="sidebar-mini">AD</span>
                                    <span class="sidebar-normal">Danh sách tài khoản</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                        <i class="nc-icon nc-notes"></i>
                        <p>
                            Quản lý sản phẩm
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="formsExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-product')">
                                <a class="nav-link" href="/admin/product">
                                    <span class="sidebar-mini">PD</span>
                                    <span class="sidebar-normal">Danh sách sản phẩm</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/admin/product/create">
                                    <span class="sidebar-mini">NPD</span>
                                    <span class="sidebar-normal">Thêm sản phẩm mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>
                            Quản lý danh mục
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="tablesExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-category')">
                                <a class="nav-link" href="/admin/category">
                                    <span class="sidebar-mini">CT</span>
                                    <span class="sidebar-normal">Danh sách danh mục</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/admin/category/create">
                                    <span class="sidebar-mini">NCT</span>
                                    <span class="sidebar-normal">Thêm danh mục mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @yield('active-brand')">
                    <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                        <i class="nc-icon nc-pin-3"></i>
                        <p>
                            Quản lý nhãn hiệu
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="mapsExamples">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="/admin/brand">
                                    <span class="sidebar-mini">BR</span>
                                    <span class="sidebar-normal">Danh sách nhãn hiệu</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/admin/brand/create">
                                    <span class="sidebar-mini">NBR</span>
                                    <span class="sidebar-normal">Thêm nhãn hiệu mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @yield('active-order')">
                    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                        <i class="nc-icon nc-puzzle-10"></i>
                        <p>
                            Quản lý đơn hàng
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="pagesExamples">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="/admin/order">
                                    <span class="sidebar-mini">OD</span>
                                    <span class="sidebar-normal">Danh sách đơn hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @yield('active-subcribers')">
                    <a class="nav-link" data-toggle="collapse" href="#subscriberExamples">
                        <i class="nc-icon nc-puzzle-10"></i>
                        <p>
                            Quản lý subscriber
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="subscriberExamples">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="/admin/subscriber">
                                    <span class="sidebar-mini">SB</span>
                                    <span class="sidebar-normal">Danh sách subscriber</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar"
                                class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                            <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                            <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo"> Trang chủ </a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://example.com" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bullet-list-67"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="/admin/logout" class="dropdown-item text-danger">
                                    <i class="nc-icon nc-button-power"></i> Log out
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @section('content')
                @show
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </nav>
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('js/master-layout-3-js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/master-layout-3-js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/master-layout-3-js/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: https://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('js/master-layout-3-js/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('js/master-layout-3-js/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('js/master-layout-3-js/bootstrap-notify.js')}}"></script>
<!--  Share Plugin -->
<script src="{{asset('js/master-layout-3-js/jquery.sharrre.js')}}"></script>
<!--  jVector Map  -->
<script src="{{asset('js/master-layout-3-js/jquery-jvectormap.js')}}" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('js/master-layout-3-js/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{asset('js/master-layout-3-js/bootstrap-datetimepicker.js')}}"></script>
<!--  Sweet Alert  -->
<script src="{{asset('js/master-layout-3-js/sweetalert2.min.js')}}" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{asset('js/master-layout-3-js/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{asset('js/master-layout-3-js/nouislider.js')}}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{asset('js/master-layout-3-js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{asset('js/master-layout-3-js/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('js/master-layout-3-js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{asset('js/master-layout-3-js/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="{{asset('js/master-layout-3-js/jquery.dataTables.min.js')}}"></script>
<!--  Full Calendar   -->
<script src="{{asset('js/master-layout-3-js/fullcalendar.min.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/master-layout-3-js/light-bootstrap-dashboard.js'.'?v=2.0.1')}}"
        type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script type="text/javascript">
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

        demo.initVectorMap();

    });
</script>
<!-- Facebook Pixel Code Don't Delete -->
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

    try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

    } catch (err) {
        console.log('Facebook Track Error:', err);
    }
</script>
<noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

</html>
