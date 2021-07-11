<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CES</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/css/style.css')}}">
    @yield("_css")
</head>

<body>
    <div class="wrapper-login">
        <form action="{{ route('user.auth.postLogin') }}" method="POST" class="form-login">
            @csrf
            <div class="logo-heading__form">
                <a href="#" class="link__logo">
                    <img src="/assets/image/logo.png" class="img-fluid logo-img" alt="">
                </a>
            </div>
            <div class="content__form">
                <div class="field-content__form">
                    <label for="username">Tài khoản</label>
                    <input type="text" name="user_name" class="form-control form-border-none" autocomplete="off">
                </div>
                <div class="field-content__form">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" class="form-control form-border-none" autocomplete="off">
                </div>
                @if (session('status'))                  
                    <label class="text-danger">{{ session('status') }}</label>
                @endif
                <div class="field-content__form text-center">
                    <button type="submit" class="btn btn--primary">Đăng nhập</button>
                </div>
            </div>
        </form>
    </div>
    <!-- include libs -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('_js')
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>


</html>