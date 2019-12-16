@extends('system.index')

@section('content')
    <div class="admin-welcome-page">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administračný systém</h1>
            </div>
            <div class="admin-title-user">
                <p>
                    <a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a>
                    <span> {{ Auth::user()->roles->name }} </span></p>
                <a href="{{ route('logout')}}" class="logout-admin-button">
                    <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
                </a>
            </div>
        </div>

        <div class="admin-welcome-content">
            <div class="container-fluid ">

                <section class="dashboard-summary-1">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Najpopularnejšie kategórie</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class="">

                                                </div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class="">

                                                </div>
                                            </div>
                                        </div>
                                        <canvas id="topCategories" style="display: block; width: 486px; height: 245px;"
                                                width="486" height="245" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-8 summary-1-cards">
                            <div class="summary-1-sections">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body card-body-item">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Počet používateľov
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$userCount}}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa fa-user-o fa-3x"></i>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body card-body-item">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                            Počet prihlášok
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user_seasonCount}}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa fa-list-alt fa-3x" aria-hidden="true"></i>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card border-left-warning shadow h-100 py-2">
                                            <div class="card-body card-body-item">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                            Partnerských univerzít
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$university_count}}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa fa-university fa-3x" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-left-info shadow h-100 py-2">
                                            <div class="card-body card-body-item">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                            Počet hodnotení
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$reviews_count}}</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa fa-star-o fa-3x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="dashboard-summary-2">
                    <div class="row card-graph">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Najpopulárnejšie univerzity</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="topUniversities" style="display: block; width: 1037px; height: 320px;"
                                            width="1037" height="420" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="dashboard-summary-3">
                    <div class="row card-graph">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Najväčší zaujem o krajny</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="topCountries" style="display: block; width: 1037px; height: 320px;"
                                            width="1037" height="320" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

