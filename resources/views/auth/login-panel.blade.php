<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | {{config('app.name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap 5 cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/normalize.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/main.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/calendar/fullcalendar.print.min.css')}}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/form/all-type-forms.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dashboard/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('dashboard/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
   <div class="row">
        <div class="color-line"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="back-link back-backend">

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="text-center m-b-md custom-login">
                    </div>
                    <div class="hpanel">
                        <div class="panel-body">
                            <h3 class="text-center mb-5">Please Login as</h3>
                            <a href="{{route('student.login')}}" type="submit" class="mb-3 btn btn-info btn-block loginbtn text-white">Student</a>
                            <a href="{{route('teacher.login')}}" class="mb-3 btn btn-dark btn-block text-white" href="">Teacher</a>
                            <a href="{{route('admin.login')}}" class="mb-5 btn btn-primary btn-block text-white" href="">Admin</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <br>
                    <p>Copyright © 2023 All rights reserved.</p>
                </div>
            </div>
        </div>
   </div>

    <!-- jquery
		============================================ -->
    <script src="{{asset('dashboard/js/vendor/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('dashboard/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('dashboard/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('dashboard/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('dashboard/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('dashboard/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('dashboard/js/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('dashboard/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('dashboard/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('dashboard/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('dashboard/js/tab.js')}}"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{asset('dashboard/js/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('dashboard/js/icheck/icheck-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('dashboard/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('dashboard/js/main.js')}}"></script>
</body>

</html>
