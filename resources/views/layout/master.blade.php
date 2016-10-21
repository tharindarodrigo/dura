<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dura</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!! asset('control-panel/bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet"
          href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('control-panel/dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('control-panel/dist/css/skins/_all-skins.min.css') !!}">

    @stack('styles')

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layout.header')


            <!-- Left side column. contains the sidebar -->
    @include('layout.sidebar')


    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('sub-title')</small>
            </h1>
            <ol class="breadcrumb">
                @yield('bread-crumbs')
            </ol>
        </section>

        <section class="content">

            @if(Session::has('global-success'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                            <i class="icon fa fa-check"></i>

                            {!! Session::pull('global-success') !!}
                        </div>
                    </div>
                </div>
            @elseif(Session::has('global-warning'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-check"></i>
                            {!! Session::pull('global-warning') !!}
                        </div>
                    </div>
                </div>
            @elseif(Session::has('global-danger'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-check"></i>
                            {!! Session::pull('global-danger') !!}
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')

        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    @include('layout.control-sidebar')
            <!-- /.control-sidebar -->

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{!! asset('control-panel/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('control-panel/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- SlimScroll -->
<script src="{!! asset('control-panel/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('control-panel/plugins/fastclick/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('control-panel/dist/js/app.min.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('control-panel/dist/js/demo.js') !!}"></script>

<script src="{!! asset('control-panel/dist/js/confirm.js') !!}"></script>

@stack('scripts')

</body>
</html>
