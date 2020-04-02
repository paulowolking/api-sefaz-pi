<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name', 'Laravel') }} @yield('titulo-pagina')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("gestor/images/favicon.ico") }}" type="image/x-icon">
    <link rel="icon" href="{{ asset("gestor/images/favicon.ico") }}" type="image/x-icon">

    <!-- App css -->
    <link href="{{ asset("gestor/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("gestor/css/icons.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("gestor/css/metismenu.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("gestor/css/style.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("gestor/css/select2.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("gestor/css/bootstrap-select.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("gestor/css/custombox.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("gestor/css/dimenuto.css") }}" rel="stylesheet" type="text/css"/>

    <script src="{{ asset("gestor/js/modernizr.min.js") }}"></script>

    @yield('header')
</head>

<body>

<div id="preloader">
    <div id="preloader-image-container">
        <img src="{{ asset('gestor/images/logo.png') }}" width="120px">
    </div>
</div>

<!-- Begin page -->
<div id="wrapper">

    @include('admin.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        @include('admin.topbar')

        <!-- Start Page content -->
        <div class="content">

            <div class="container-fluid">

                @include('admin.mensagem_alerta')

                @yield('conteudo')

            </div>

        </div> <!-- content -->

        <footer class="footer">
            2020 © DimenutoLabs.
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

@yield('modais')


<!-- jQuery  -->
<script src="{{ asset("gestor/js/jquery.min.js") }}"></script>
<script src="{{ asset("gestor/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("gestor/js/metisMenu.min.js")}}"></script>
<script src="{{ asset("gestor/js/waves.js")}}"></script>
<script src="{{ asset("gestor/js/jquery.slimscroll.js")}}"></script>
<script src="{{ asset("gestor/js/jquery.mask.js") }}"></script>
<script src="{{ asset("gestor/js/jquery-maskMoney.js") }}"></script>

<!-- Flot chart -->
<script src="{{ asset("gestor/js/chartjs/chart.min.js")}}"></script>
<script src="{{ asset("gestor/js/chartjs/utils.js")}}"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="{{ asset('gestor/js/jquery-knob/excanvas.js') }}"></script>
<![endif]-->
<script src="{{ asset("gestor/js/jquery-knob/jquery.knob.js")}}"></script>

<!-- App js -->
<script src="{{ asset("gestor/js/jquery.core.js")}}"></script>
<script src="{{ asset("gestor/js/jquery.app.js")}}"></script>
<script src="{{ asset("gestor/js/select2.js")}}"></script>
<script src="{{ asset("gestor/js/bootstrap-select.js")}}"></script>
<script src="{{ asset("gestor/js/custombox.min.js")}}"></script>
<script src="{{ asset("gestor/js/legacy.min.js")}}"></script>
<script src="{{ asset("gestor/js/scel-image-upload.js")}}"></script>
<script src="{{ asset("gestor/js/tinymce/tinymce.min.js")}}"></script>
<script src="{{ asset("gestor/js/dimenuto.js") }}"></script>


@yield('footer')

</body>
</html>
