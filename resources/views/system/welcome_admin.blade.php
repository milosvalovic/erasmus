@extends('system.index')

@section('content')
    <div class="admin-welcome-page">

        @include('system.include.header')
        <div class="admin-welcome-title">
            <div class="admin-welcome-title-title">
                <h1>Administračný systém erazmus</h1>
            </div>

            <div class="admin-welcome-title-user-profile">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-welcome-content">
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Celkový počet používateľov</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">1185</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user-o fa-3x"></i>
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Počet mobilít a výziev</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">769</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-list-alt fa-3x" aria-hidden="true"></i>
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
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Počet partnerských univerzít</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">35</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-university fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row admin-projects-diagram">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Mobility, udalosti, </h6>
                    </div>
                    <div class="card-body">

                        <h4 class="small font-weight-bold">Tragické udalosti<span class="float-right">4%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 4%" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h4 class="small font-weight-bold">Prebieha termín prihlasovania<span class="float-right">17%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 17%" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h4 class="small font-weight-bold">Očakávané udalosti<span class="float-right">25%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h4 class="small font-weight-bold">Prebiehajúce udalosti<span class="float-right">24%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h4 class="small font-weight-bold">Ukončené udalosti<span class="float-right">30%</span></h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('system.include.footer')




    </div>
@endsection

