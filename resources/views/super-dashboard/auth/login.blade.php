<!DOCTYPE html>
<html lang="ar" >
<!--begin::Head-->
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Sign In</title>
    <meta name="description" content="Singin page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
    <link href="/assets/super-dashboard/assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/super-dashboard/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/super-dashboard/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/super-dashboard/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/super-dashboard/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/super-dashboard/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/super-dashboard/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/super-dashboard/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css"/>        <!--end::Layout Themes-->

    <link rel="shortcut icon" href="/assets/super-dashboard/assets/media/logos/favicon.ico"/>

</head>

<body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

<div class="d-flex flex-column flex-root">
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                <a href="#" class="login-logo pb-xl-20 pb-15">
                    <img src="/assets/super-dashboard/assets/media/logos/logo-4.png" class="max-h-70px" alt=""/>
                </a>
                <div class="login-form">
                    <form class="form" id="kt_login_singin_form" action="{{route('login')}}" method="post">
                        @csrf
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="email" class="font-size-h6 font-weight-bolder text-dark">Email</label>
                            <input id="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="email" name="email" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            @error('password')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="d-flex justify-content-between mt-n5">
                                <label for="password" class="font-size-h6 font-weight-bolder text-dark pt-5">password</label>
                            </div>
                            <input id="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" autocomplete="off"/>
                        </div>
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
