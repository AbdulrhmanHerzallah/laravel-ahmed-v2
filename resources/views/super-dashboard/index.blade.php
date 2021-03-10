<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @include('super-dashboard.components.head.index')
    @yield('head')
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
