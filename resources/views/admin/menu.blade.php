<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="#" class="logo">
                <span>
                    <img src="{{ asset('gestor/images/logo_light.png') }}" alt="" height="50">
                </span>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="mm-active" style="margin-top: 100px">


            <ul class="metismenu mm-show" id="side-menu">

                {{--<li class="menu-title">Menu Principal</li>--}}

                <li class="mm-active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fi-air-play"></i> <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('usuarios.index') }}">
                        <i class="fi-head"></i> <span> Usuários </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
