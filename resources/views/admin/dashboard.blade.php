@extends('admin.template')
@section('titulo-corpo','Dashboard')

@section('conteudo')

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Account Overview</h4>

                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right">
                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#0acf97" value="37" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".1"/>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Daily Sales</p>
                                <h3 class="">$35,715</h3>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right">
                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#f9bc0b" value="92" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".1"/>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Sales Analytics</p>
                                <h3 class="">$97,511</h3>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right">
                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#f1556c" value="14" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".1"/>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Statistics</p>
                                <h3 class="">$954</h3>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="card-box mb-0 widget-chart-two">
                            <div class="float-right">
                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                       data-fgColor="#2d7bf4" value="60" data-skin="tron" data-angleOffset="180"
                                       data-readOnly=true data-thickness=".1"/>
                            </div>
                            <div class="widget-chart-two-content">
                                <p class="text-muted mb-0 mt-2">Total Revenue</p>
                                <h3 class="">$32,540</h3>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title">Order Overview</h4>

                <div id="website-stats" style="height: 350px;" class="flot-chart mt-5"></div>

            </div>
        </div>

        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title">Sales Overview</h4>

                <div id="combine-chart">
                    <div id="combine-chart-container" class="flot-chart mt-5" style="height: 350px;">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('footer')

    <!-- Flot chart -->
    <script src="{{ asset("gestor/js/flot-chart/jquery.flot.min.js") }}"></script>
    <script src="{{ asset("gestor/js/flot-chart/jquery.flot.time.js") }}"></script>
    <script src="{{ asset("gestor/js/flot-chart/jquery.flot.tooltip.min.js") }}"></script>
    <script src="{{ asset("gestor/js/flot-chart/jquery.flot.resize.js") }}"></script>
    <script src="{{ asset("gestor/js/flot-chart/jquery.flot.pie.js") }}"></script>
    <script src="{{ asset("gestor/js/flot-chart/jquery.flot.crosshair.js") }}"></script>
    <script src="{{ asset("gestor/js/flot-chart/curvedLines.js") }}"></script>
    <script src="{{ asset("gestor/js/flot-chart/jquery.flot.axislabels.js") }}"></script>

    <!-- Dashboard Init -->
    <script src="{{ asset("gestor/js/dashboard.init.js")}}"></script>

@endsection
