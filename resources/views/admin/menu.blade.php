<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="#" class="logo">
                            <span>
                                <img src="{{ asset('gestor/images/logo_light.png') }}" alt="" height="60">
                            </span>
                <i>
                    <img src="{{ asset('gestor/images/logo_horizontal.png') }}" alt="" height="28">
                </i>
            </a>
        </div>

        <div id="sidebar-menu" style="margin-top: 80px;">


            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu Principal</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-chart-areaspline "></i><span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('usuarios.index') }}">
                        <i class="fa fa-users"></i> <span> Usuários </span>
                    </a>
                </li>

                {{--<li>--}}
                {{--<a href="{{ route('gestor.estabelecimentos.index') }}">--}}
                {{--<i class="mdi mdi-store "></i><span> Estabelecimentos </span>--}}
                {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                {{--<a href="{{ route('gestor.ofertas.index') }}">--}}
                {{--<i class="mdi mdi-map-marker"></i><span> Ofertas </span>--}}
                {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                {{--<a href="{{ route('gestor.cupons.index') }}">--}}
                {{--<i class="mdi mdi-shopping "></i><span> Cupons </span>--}}
                {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                {{--<a href="javascript: void(0);"><i class="fa fa-dollar"></i><span> Financeiro </span> <span--}}
                {{--class="menu-arrow"></span></a>--}}
                {{--<ul class="nav-second-level" aria-expanded="false">--}}
                {{--<li><a href="{{ route('gestor.financeiro-ofertas.index') }}"><i class="mdi mdi-map-marker"></i>--}}
                {{--Ofertas</a></li>--}}
                {{--<li><a href="{{ route('gestor.financeiro-depositos.index') }}"><i class="fa fa-fw fa-money"></i>--}}
                {{--Depósitos</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}

                <li class="menu-title">Minhas Opções</li>

                <li>
                    <a href="{{ route('perfil.editar') }}">
                        <i class="fi-head"></i> <span> Minha Conta </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('deslogar') }}">
                        <i class="mdi mdi-logout"></i> <span> Sair </span>
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
