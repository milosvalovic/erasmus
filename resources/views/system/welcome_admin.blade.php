@extends('system.index')

@section('content')
    <div class="admin-welcome-page">

        @include('system.include.header')
        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administračný systém</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-welcome-content">

{{--            <div class="admin-welcome-content-section-1">--}}

{{--                <div class="section-wrapper">--}}
{{--                    <div class="rows admin-welcome-content-statistics--1">--}}

{{--                        <div class="statistics--1-row">--}}
{{--                            <div class="card-statistics--1">--}}
{{--                                <div class="card border-left-primary shadow py-2">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="row no-gutters align-items-center">--}}
{{--                                            <div class="col mr-2">--}}
{{--                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Celkový počet používateľov</div>--}}
{{--                                                <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-auto">--}}
{{--                                                <i class="fa fa-user-o fa-3x"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="card-statistics--1">--}}
{{--                                <div class="card border-left-success shadow py-2">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="row no-gutters align-items-center">--}}
{{--                                            <div class="col mr-2">--}}
{{--                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Počet mobilít a výziev</div>--}}
{{--                                                <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-auto">--}}
{{--                                                <i class="fa fa-list-alt fa-3x" aria-hidden="true"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="statistics--1-row-2">--}}
{{--                            <div class="card-statistics--1">--}}
{{--                                <div class="card border-left-info shadow py-2">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="row no-gutters align-items-center">--}}
{{--                                            <div class="col mr-2">--}}
{{--                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Počet partnerských univerzít</div>--}}
{{--                                                <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-auto">--}}
{{--                                                <i class="fa fa-university fa-3x" aria-hidden="true"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="card shadow">--}}
{{--                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
{{--                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>--}}
{{--                        <div class="dropdown no-arrow">--}}
{{--                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">--}}
{{--                                <div class="dropdown-header">Dropdown Header:</div>--}}
{{--                                <a class="dropdown-item" href="#">Action</a>--}}
{{--                                <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>--}}
{{--                            <canvas id="myPieChart" style="display: block; width: 486px; height: 245px;" width="486" height="245" class="chartjs-render-monitor"></canvas>--}}
{{--                        </div>--}}
{{--                        <div class="mt-4 text-center small">--}}
{{--                    <span class="mr-2">--}}
{{--                      <i class="fas fa-circle text-primary"></i> Direct--}}
{{--                    </span>--}}
{{--                            <span class="mr-2">--}}
{{--                      <i class="fas fa-circle text-success"></i> Social--}}
{{--                    </span>--}}
{{--                            <span class="mr-2">--}}
{{--                      <i class="fas fa-circle text-info"></i> Referral--}}
{{--                    </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--                <div class="admin-projects-diagram">--}}
{{--                    <div class="card shadow ">--}}
{{--                        <div class="card-header py-3">--}}
{{--                            <h6 class="m-0 font-weight-bold text-primary">Mobility, udalosti, </h6>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}

{{--                            <h4 class="small font-weight-bold">Tragické udalosti<span class="float-right">4%</span></h4>--}}
{{--                            <div class="progress mb-4">--}}
{{--                                <div class="progress-bar bg-danger" role="progressbar" style="width: 4%" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                            </div>--}}

{{--                            <h4 class="small font-weight-bold">Prebieha termín prihlasovania<span class="float-right">17%</span></h4>--}}
{{--                            <div class="progress mb-4">--}}
{{--                                <div class="progress-bar bg-warning" role="progressbar" style="width: 17%" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                            </div>--}}

{{--                            <h4 class="small font-weight-bold">Očakávané udalosti<span class="float-right">25%</span></h4>--}}
{{--                            <div class="progress mb-4">--}}
{{--                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                            </div>--}}

{{--                            <h4 class="small font-weight-bold">Prebiehajúce udalosti<span class="float-right">24%</span></h4>--}}
{{--                            <div class="progress mb-4">--}}
{{--                                <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                            </div>--}}

{{--                            <h4 class="small font-weight-bold">Ukončené udalosti<span class="float-right">30%</span></h4>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="container-fluid">

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="myAreaChart" style="display: block; width: 1037px; height: 320px;" width="1037" height="320" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="myPieChart" style="display: block; width: 486px; height: 245px;" width="486" height="245" class="chartjs-render-monitor"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('system.include.footer')




    </div>
@endsection

