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
        </div>

        @include('system.include.footer')




    </div>
@endsection

