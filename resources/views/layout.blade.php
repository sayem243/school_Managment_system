<!DOCTYPE html>
<!--
Template Name: Billing Software
Author: Terminalbd
Website: http://www.terminalbd.com/
Contact: support@terminalbd.com
Follow: www.twitter.com/terminalbd
Dribbble: www.dribbble.com/terminalbd
Like: www.facebook.com/terminalbd

-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!-- start::Head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Managment Software</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 4.3 Base Css -->
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/images.jpeg') }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/editor/summernote-bs4.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/DataTables/datatables.css') }}" rel="stylesheet">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" >
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css" >
    <!-- Bootstrap & Jquery Base javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" ></script>
    <script src="{{ asset("assets/jquery/popper.min.js") }}" ></script>
    <script src="{{ asset("assets/bootstrap/js/bootstrap.min.js") }}" ></script>
    <script src="{{ asset("assets/bootstrap/js/bootstrap.bundle.min.js") }}" ></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!-- end::Head -->
<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar navbar-collapsed">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('dashboard') }}" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">School </span>
            </a>
            <a class="mobile-menu on" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">

                <li data-username="" class="nav-item active">
                    <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Billing</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('transaction.index') }}" class="" >Billing</a></li>
                        <li class=""><a href="{{ route('transaction.create') }}" class="" >New Bill</a></li>
                    </ul>
                </li>
                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Customers</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('customer.index') }}" class="" >Customer</a></li>
                        <li class=""><a href="{{ route('customer.create') }}" class="" >New  Customer</a></li>
                        <li class=""><a href="{{ route('customer.import') }}" class="" >Customer Import</a></li>
                        <li class=""><a href="{{ route('customer.importForm') }}" class="" >New Import</a></li>
                    </ul>
                </li>
                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-tv"></i></span><span class="pcoded-mtext">Internet Package</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('internet.index') }}" class="" >Package</a></li>
                        <li class=""><a href="{{ route('internet.create') }}" class="" >New  Package</a></li>
                    </ul>
                </li>
                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map-pin"></i></span><span class="pcoded-mtext">Location</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('location.index') }}" class="" >Location</a></li>
                        <li class=""><a href="{{ route('location.create') }}" class="" >New  Location</a></li>
                    </ul>
                </li>
                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Manage Users</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('user.index') }}" class="" >Users</a></li>
                        <li class=""><a href="{{ route('user.create') }}" class="" >New  User</a></li>
                    </ul>
                </li>
                {{--<li data-username="" class="nav-item pcoded-hasmenu">--}}
                    {{--<a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Reports</span></a>--}}
                    {{--<ul class="pcoded-submenu">--}}
                        {{--<li class=""><a href="{{ route('user.index') }}" class="" >Users</a></li>--}}
                        {{--<li class=""><a href="{{ route('user.create') }}" class="" >New  User</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Teachers Profile</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('teacher_create') }}" class="" >New Teacher</a></li>
                    </ul>
                </li>


                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Admin</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('student_create') }}" class="" >New Student</a></li>
                    </ul>
                </li>

                <li data-username="" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-check"></i></span><span class="pcoded-mtext">Class & Section</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('class_create') }}" class="" >New Class</a></li>
                        <li class=""><a href="{{ route('section_create') }}" class="" >New Section</a></li>
                        <li class=""><a href="{{ route('student_index1') }}" class="" >Class-1</a></li>
                        <li class=""><a href="{{ route('student_index2') }}" class="" >Class-2</a></li>
                        <li class=""><a href="{{ route('student_index3') }}" class="" >Class-3</a></li>


                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-purple">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="/dashboard" class="b-brand">
            <div class="b-bg">
                <i class="feather icon-trending-up"></i>
            </div>
            <span class="b-title"></span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            @if (Route::has('login'))
                            <img src="{{ asset("assets/images/user/avatar-2.jpg") }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ Auth::user()->name }}</span>
                            <a href="{{ route('logout') }}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            @yield('main')
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
</body>

<!-- jQuery 3.2.0 -->

<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset("assets/plugins/cookies/jquery-cookie.js") }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables/datatables.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<!-- Common scripts -->
@yield('js')
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script>
    $('body').on('click', '#mobile-collapse', function(el) {
        var val = $(this).attr('id');
        Cookies.set('productList', "navbar-collapsed");
        $('.pcoded-navbar').addClass(Cookies.set('productList', val));
        setTimeout(location.reload(), 1000);
    });
</script>
</html>
