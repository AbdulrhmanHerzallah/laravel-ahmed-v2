<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/admin-lte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page bg-dark">
<div class="login-box">
    <div class="login-logo">
        <a href="/">
            <div>
                <img src="/logo/white-logo.svg" class="img-fluid my-3" alt="">
            </div>
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
{{--            <p class="login-box-msg">Sign in to start your session</p>--}}

            <form action="{{route('login')}}" method="post">
                @csrf
{{--                @error('email')--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{$message}}--}}
{{--                </div>--}}
{{--                @enderror--}}
                <div class="input-group mb-3">
                    <input required name="email" type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="{{__('keywords.email')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
{{--                @error('password')--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{$message}}--}}
{{--                </div>--}}
{{--                @enderror--}}
                <div class="input-group mb-3">
                    <input required name="password" type="password" class="form-control @error('password') is-invalid  @enderror" placeholder="كلمة المرور">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                        <div class="icheck-primary">--}}
{{--                            <input type="checkbox" id="remember">--}}
{{--                            <label for="remember">--}}
{{--                                Remember Me--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /.col -->
{{--                    <div class="col-4">--}}
                        <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
{{--                    </div>--}}
                    <!-- /.col -->
{{--                </div>--}}
            </form>


{{--            <p class="mb-1">--}}
{{--                <a href="forgot-password.html">I forgot my password</a>--}}
{{--            </p>--}}
{{--            <p class="mb-0">--}}
{{--                <a href="register.html" class="text-center">Register a new membership</a>--}}
{{--            </p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/assets/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/admin-lte/dist/js/adminlte.min.js"></script>
</body>
</html>
