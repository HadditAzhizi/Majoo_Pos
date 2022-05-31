<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Majoo POS - @yield('title')</title>
    <!-- CSS -->

    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link href="/assets/bootstrap-sweetalert/sweetalert.min.css" rel="stylesheet" type="text/css" /> 
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="/assets/img/basic/logo.png" alt="">
        </div>
        <div class="relative">
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="/assets/img/dummy/u2.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">{{ session('username') }}</h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div> 
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li class="treeview {{ Request::is('dashboard*') ? 'active' : '' }}">
                <a href="/dashboard">
                    <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
                </a> 
            </li>
           <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Kontak<i
                class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="panel-page-users.html"><i class="icon icon-circle-o"></i>Pelanggan</a>
                    </li>
                    <li>
                        <a href="panel-page-users-create.html"><i class="icon icon-circle-o"></i>Supplier</a>
                    </li> 
                </ul>
            </li>
           <li class="treeview"><a href="#"><i class="icon icon-package light-blue-text s-18"></i>Product<i
                class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="panel-page-users.html"><i class="icon icon-circle-o"></i>Product</a>
                    </li>
                    <li>
                        <a href="panel-page-users-create.html"><i class="icon icon-circle-o"></i>Kategori Product</a>
                    </li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="icon icon-invoice-1 red-text s-18"></i>Penjualan</a>
            </li>  
            <li class="treeview">
                <a href="#"><i class="icon icon-truck light-blue-text s-18"></i>Pembelian</a>
            </li>  
           <li class="treeview"><a href="#"><i class="icon icon-newspaper purple-text s-18"></i>Laporan<i
                class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="panel-page-users.html"><i class="icon icon-circle-o"></i>Laporan Penjualan</a>
                    </li>
                    <li>
                        <a href="panel-page-users-create.html"><i class="icon icon-circle-o"></i>Laporan Pembelian</a>
                    </li> 
                    <li>
                        <a href="panel-page-users.html"><i class="icon icon-circle-o"></i>Laporan Penjualan Per Produk</a>
                    </li>
                    <li>
                        <a href="panel-page-users-create.html"><i class="icon icon-circle-o"></i>Laporan Pembelian Per Produk</a>
                    </li> 
                </ul>
            </li>
            <li class="treeview {{ Request::is('user*') ? 'active' : '' }}">
                <a href="/user"><i class="icon icon-users light-green-text s-18"></i>Users</a>
            </li>  
<!--             <li class="treeview {{ Request::is('chart*') ? 'active' : '' }}">
                <a href="/chart">
                    <i class="icon icon-bar-chart2 pink-text s-18"></i>
                    <span>Charts</span>
                </a> 
            </li> -->
        </ul>
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left"> 
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages-->
                    <li class="dropdown custom-dropdown messages-menu">   
                    <!-- User Account-->
                    <li class="dropdown custom-dropdown user user-menu ">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="/assets/img/dummy/u8.png" class="user-image" alt="User Image">
                            <i class="icon-more_vert "></i>
                        </a>
                        <div class="dropdown-menu p-4 dropdown-menu-right">
                            <div class="row box justify-content-between my-4">
                                <div class="col">
                                    <a href="/user/logut">
                                        <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                                        <div class="pt-1">Log-ut</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
 @yield('content')
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="/assets/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script> 
<script src="/assets/js/app.js"></script> 
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
 @yield('js')
</body>
</html>