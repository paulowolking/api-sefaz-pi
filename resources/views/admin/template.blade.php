<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Base @yield('titulo-pagina')</title>
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

        <!-- Top Bar Start -->
        <div class="topbar">

            <nav class="navbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    {{--<li class="dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none"--}}
                                                              {{--data-toggle="dropdown" href="#" role="button"--}}
                                                              {{--aria-haspopup="false" aria-expanded="false"><i--}}
                                {{--class="fi-bell noti-icon"></i> <span--}}
                                {{--class="badge badge-danger badge-pill noti-icon-badge">4</span></a>--}}
                        {{--<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg"><!-- item-->--}}
                            {{--<div class="dropdown-item noti-title">--}}
                                {{--<h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification--}}
                                {{--</h5>--}}
                            {{--</div>--}}
                            {{--<div class="slimScrollDiv"--}}
                                 {{--style="position: relative; overflow: hidden; width: auto; height: 414px;">--}}
                                {{--<div class="slimscroll"--}}
                                     {{--style="max-height: 230px; overflow: hidden; width: auto; height: 414px;">--}}
                                    {{--<!-- item--> <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                                        {{--<div class="notify-icon bg-success"><i--}}
                                                {{--class="mdi mdi-comment-account-outline"></i></div>--}}
                                        {{--<p class="notify-details">Caleb Flakelar commented on Admin--}}
                                            {{--<small class="text-muted">1 min ago</small>--}}
                                        {{--</p>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="slimScrollBar"--}}
                                     {{--style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 149.435px;"></div>--}}
                                {{--<div class="slimScrollRail"--}}
                                     {{--style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>--}}
                            {{--</div><!-- All--> <a href="javascript:void(0);"--}}
                                                 {{--class="dropdown-item text-center text-primary notify-item notify-all">Ver--}}
                                {{--todos <i class="fi-arrow-right"></i></a></div>--}}
                    {{--</li>--}}

                    {{--<li class="dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none"--}}
                                                              {{--data-toggle="dropdown" href="#" role="button"--}}
                                                              {{--aria-haspopup="false" aria-expanded="false"><i--}}
                                {{--class="fi-speech-bubble noti-icon"></i> <span--}}
                                {{--class="badge badge-custom badge-pill noti-icon-badge">6</span></a>--}}
                        {{--<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg"><!-- item-->--}}
                            {{--<div class="dropdown-item noti-title">--}}
                                {{--<h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat--}}
                                {{--</h5>--}}
                            {{--</div>--}}
                            {{--<div class="slimScrollDiv"--}}
                                 {{--style="position: relative; overflow: hidden; width: auto; height: 414px;">--}}
                                {{--<div class="slimscroll"--}}
                                     {{--style="max-height: 230px; overflow: hidden; width: auto; height: 414px;">--}}
                                    {{--<!-- item--> <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                                        {{--<div class="notify-icon"><img src="assets/images/users/avatar-2.jpg"--}}
                                                                      {{--class="img-fluid rounded-circle" alt=""></div>--}}
                                        {{--<p class="notify-details">Cristina Pride</p>--}}
                                        {{--<p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next--}}
                                            {{--meeting</p></a>--}}
                                {{--</div>--}}
                                {{--<div class="slimScrollBar"--}}
                                     {{--style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 151.143px;"></div>--}}
                                {{--<div class="slimScrollRail"--}}
                                     {{--style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>--}}
                            {{--</div><!-- All--> <a href="javascript:void(0);"--}}
                                                 {{--class="dropdown-item text-center text-primary notify-item notify-all">View--}}
                                {{--all <i class="fi-arrow-right"></i></a></div>--}}
                    {{--</li>--}}

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset("gestor/images/logo.png") }}" alt="user" class="rounded-circle">
                            <span class="ml-1">{{ \Auth::user()->nome }} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <a href="{{ route('deslogar') }}" class="dropdown-item notify-item">
                                <i class="fi-power"></i> <span>Sair</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                    <li>
                        <div class="page-title-box">
                            <h4 class="page-title">@yield('titulo-corpo')</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">@yield('subtitulo-corpo')</li>
                            </ol>
                        </div>
                    </li>

                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->


        <!-- Start Page content -->
        <div class="content">

            <div class="container-fluid">
                @include('admin.mensagem_alerta')
                @yield('conteudo')
            </div>
        </div> <!-- content -->

        <footer class="footer">
            2019 © DimenutoLabs.
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

<!-- Dashboard Init -->
<script src="{{ asset("gestor/js/jquery.dashboard.init.js")}}"></script>

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
