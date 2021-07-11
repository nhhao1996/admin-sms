<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="">
      <title>Admin</title>
      <!-- Bootstrap core CSS -->
      <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{ asset('assets/css/admin-style.css') }}" rel="stylesheet">
   </head>
   <body>
      <main class="container">
         <header class="header">
            <a href="javascript:;" class="logo"><img src="{{ asset('assets/image/logospan.png') }}"/></a>
            <div class="user">
               <ul class="justify-content-center">
                  <li>Chào <span class="blue font-weight-bold">Username </span></li>
                  <li class="blue font-weight-bold"> Credit: 0 </li>
                  <li class="red font-weight-bold"> <a class="red" href="#"> Thoát</a></li>
               </ul>
            </div>
         </header>
         <section class="menu">
            <ul class="nav justify-content-center">
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" href="#1" data-bs-toggle="dropdown">
                    Gửi tin nhắn
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item clo-menu font-weight-bold" href="{{ route('admin.config-single-sms') }}">Gửi một tin</a>
                    <a class="dropdown-item clo-menu font-weight-bold" href="#">Gửi nhiều tin</a>
                   
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Báo cáo
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <a class="dropdown-item clo-menu font-weight-bold" href="#">Theo số điện thoại</a>
                    <a class="dropdown-item clo-menu font-weight-bold" href="#">Theo chương trình</a>
                   
                  </div>
                </li>
                <li class="nav-item">
                  <a href="javascript:;" class="font-weight-bold nav-link" href="#">Quản lý</a>
                </li>
                <li class="nav-item">
                  <a href="javascript:;" class="font-weight-bold nav-link" href="#">Hướng dẫn</a>
                </li>
            </ul>
         </section>
         @yield('content')
         <footer class="footer">
         </footer>
      </main>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="{{ asset('assets/js/vendor/jquery-slim.min.js') }}"> <\/script>')</script>
      <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
      <script src="{{ asset('assets/libs/js/bootstrap.min.js') }}"></script>
   </body>
</html>