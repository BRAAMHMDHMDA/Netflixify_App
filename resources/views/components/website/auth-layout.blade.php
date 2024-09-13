<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Netflixify | {{$title}}</title>

    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('website_assets/css/font-awesome5.11.2min.css')}}">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('website_assets/css/bootstrap.min.css')}}">

    <!--vendor css-->
    <link rel="stylesheet" href="{{asset('website_assets/css/vendor.min.css')}}">

    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">

    <!--main styles -->
    <link rel="stylesheet" href="{{asset('website_assets/css/main.min.css')}}">
</head>
<body>

<div class="login">

    <div class="login__bg"></div>

    <div class="container">

        <div class="row">

            <div class="col-10 mx-auto col-md-6 bg-white mx-auto p-3">
                <h2 class="text-center">Netflix<span class="text-primary">ify</span></h2>
                {{$slot}}
            </div><!-- end of col -->

        </div><!-- end of row -->

    </div><!-- end of container -->
</div><!-- end of login -->

<!--jquery-->
<script src="{{asset('website_assets/js/jquery-3.4.0.min.js')}}"></script>

<!--bootstrap-->
<script src="{{asset('website_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website_assets/js/popper.min.js')}}"></script>

<!--vendor js-->
<script src="{{asset('website_assets/js/vendor.min.js')}}"></script>

<!--main scripts-->
<script src="{{asset('website_assets/js/main.min.js')}}"></script>
</body>
</html>
