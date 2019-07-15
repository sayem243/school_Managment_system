<!DOCTYPE html>
<!--
Template Name: Terminalbd - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: Terminalbd
Website: http://www.terminalbd.com/
Contact: support@terminalbd.com
Follow: www.twitter.com/terminalbd
Dribbble: www.dribbble.com/terminalbd
Like: www.facebook.com/terminalbd
Purchase: http://themeforest.net/item/terminalbd-responsive-admin-dashboard-template/4021469?ref=terminalbd
Renew Support: http://themeforest.net/item/terminalbd-responsive-admin-dashboard-template/4021469?ref=terminalbd
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!-- start::Head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Billing Software</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 4.3 Base Css -->

    <link href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/bootstrap/css/ionicons.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/editor/summernote-bs4.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/fileUpload/upload.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('assets/plugins/DataTables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap & Jquery Base javascript -->

    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="{{ asset("assets/jquery/popper.min.js") }}" ></script>
    <script src="{{ asset("assets/bootstrap/js/bootstrap.min.js") }}" ></script>
    <script src="{{ asset("assets/bootstrap/js/bootstrap.bundle.min.js") }}" ></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<!-- end::Head -->
<body class="closedMenu" >
<div class="header">
    <div class="wrapper">
        <a href="/" class="logo">Honeycomb</a>
        <div class="topright">
            <!--			<a href="" class="notifications"><span class="count">9</span></a>-->
            <a href="" class="messages"><span class="count">3</span></a>
            <a href="" class="user"></a>
        </div><!-- end of topright -->
        <h1><strong>Sale</strong></h1>
    </div><!-- end of wrapper -->
</div><!-- end of header -->
<div class="main nobg gray"><!-- start of main -->
    <div class="navigation">
        <ul>
            <li id="home" class="home menu">
                <a href="javascript:" class="">Home</a>
                <ul>
                    <li class="selected"><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="form.php">Form</a></li>
                    <li><a href="table.php">Table</a></li>
                    <li><a href="">Items</a></li>
                    <li><a href="">Status</a></li>
                    <li><a href="">Settings</a></li>
                </ul>
            </li>
            <li id="products" class="products menu">
                <a  href="javascript:">Products</a>
                <ul>
                    <li><a href="../sales.php">Products</a></li>
                    <li class="">
                        <a href="">Product Stock</a>
                        <ul>
                            <li class="selected"><a href="">Level 3 Title</a></li>
                            <li><a href="">Level 3 Title</a></li>
                            <li><a href="">Level 3 Title</a></li>
                        </ul>
                    </li>
                    <li><a href="">Add Product</a></li>
                    <li><a href="">Edit Product</a></li>
                </ul>
            </li>
            <li class="sale">
                <a href="">Sale</a>
            </li>
            <li class="setup">
                <a href="">Setup</a>
            </li>
        </ul>
        <div class="hidemenu"><span class="hide">Hide Menu</span><span class="expand">Expand</span></div>
    </div>
    <div class="wrapper">
            @yield('main')
    </div><!-- end of wrapper -->
</div><!-- end of main -->
<div class="footer">
    <div class="wrapper">

    </div><!-- end of wrapper -->
</div><!-- end of footer -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.2.0 -->
<script src="{{ asset("assets/js/jquery-cookie.js") }}"></script>
<script src="{{ asset("assets/js/daterangepicker.js") }}"></script>

<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fileUpload/upload.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables/datatables.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>


<!-- Common scripts -->
@yield('js')
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script>
    $(document).ready(function () {
        if (typeof $.cookie('cookieId') === 'undefined'){
            $.cookie('cookieId','home');
            $("#home").addClass("selected");
        }else{
            $("#"+$.cookie('cookieId')).addClass("selected");
        }
        $(document).on('click', '.menu', function () {
            $cookieName = $(this).attr('id');
            $.removeCookie('cookieId');
            $.cookie('cookieId',$cookieName);
            $("body").removeClass("closedMenu");
            $(".menu").removeClass("selected");
            $("#"+$cookieName).addClass("selected");
        });
        $('#editor').summernote({
            placeholder: 'Hello bootstrap 4',
            tabsize: 2,
            height: 100
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var table= $('.table').DataTable( {
            "processing": true,
            "serverSide": true,
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

            "lengthMenu": [
                [10, 20, 50, 100, 150, -1],
                [10, 20, 50, 100, 150, "All"] // change per page values here
            ],
            "pageLength": 10, // default record count per page
            "ajax": {
                "type"   : "POST",
                data: {_token: CSRF_TOKEN},
                "url": "/shares/dataTable" // ajax source

            },
            "order": [
                [1, "asc"]
            ],// set first column as a default sort by asc

            "buttons": [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                },
                {
                    text: 'Reload',
                    className: 'btn default',
                    action: function ( e, dt, node, config ) {
                        dt.ajax.reload();
                        alert('Datatable reloaded!');
                    }
                }
            ]
        });

        $("#csvBtn").on("click", function() {
            table.button( '.buttons-csv' ).trigger();
        });

        $("#printBtn").on("click", function() {
            table.button( '.buttons-print' ).trigger();
        });

        $("#excelBtn").on("click", function() {
            table.button( '.buttons-excel' ).trigger();
        });

        $("#pdfBtn").on("click", function() {
            table.button( '.buttons-pdf' ).trigger();
        });

    });
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
        $('[data-toggle="tooltip"]').tooltip();
        $('button').tooltip({container: 'body'});
        $('select').each(function () {
            $(this).select2({
                theme: 'bootstrap4',
                width: 'style',
                placeholder: $(this).attr('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        });
        /*$("#editor").editor({
            uiLibrary: 'bootstrap4'
        });*/

    })();

</script>
</body>
</html>
