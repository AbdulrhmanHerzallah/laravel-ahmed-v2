<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @if(request()->is('super-dashboard'))
    <link href="/assets/admin-lte/css/adminlte.min.css" rel="stylesheet">
    @endif
    @include('super-dashboard.components.head.index')
    @yield('head')
    <style>
        @media screen and (max-width: 991px) {
            .container {
                margin-top: 20px !important;
            }
        }
    </style>
</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
@include('super-dashboard.components.header.index-mobile')
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        @include('super-dashboard.components.aside.index')
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <div class="container" style="margin-top: -25px">
                @include('super-dashboard.components.breadcrumb.index')
                <div class="mt-4">
                    @yield('content')



                    @if(request()->is('super-dashboard'))
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>150</h3>

                                            <p>New Orders</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                                            <p>Bounce Rate</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>44</h3>

                                            <p>User Registrations</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>65</h3>

                                            <p>Unique Visitors</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>

                        </div><!-- /.container-fluid -->
                    </section>
                @endif





                </div>
            </div>
            @include('super-dashboard.components.header.index')
        </div>
    </div>
</div>
{{--@include('super-dashboard.components.stickers.index')--}}
@include('super-dashboard.components.scripts.index')
<script src="/js/app.js"></script>
@include('sweetalert::alert')
@yield('script')
</body>
</html>
