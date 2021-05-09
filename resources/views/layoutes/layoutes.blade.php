<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Shefaa">
    <!-- description -->
    <meta name="description" content="Shefaa is website to provide medicines">
    <!-- keywords -->
    <meta name="keywords" content="donate,volunteer,patient,medicine">
    <!-- description -->
   
    
    <!-- favicon -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- CSS ============================================ -->

    <!-- <link rel="shortcut icon" href="website/images/logo1.png')}}"> -->
    <link rel="icon" type="image/png" sizes="16x16" href="website/images/logo1.png">

    <!-- Core Style Sheets -->
    <link rel="stylesheet" href="{{asset('website/assets/css/master.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/style_updates.css')}}">
    <!-- Responsive Style Sheets -->
    <link rel="stylesheet" href="{{asset('website/assets/css/responsive.css')}}">
    <!-- Revolution Style Sheets -->
    <link rel="stylesheet" type="text/css" href="{{asset('website/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/revolution/css/navigation.css')}}">


    @yield('customizedStyle')





</head>







<body>
<div id="app">
    <main>
        <div id="loader-overlay">
            <div class="loader">
                <img src="website/images/so.gif">
            </div>
        </div>
        <div class="wrapper">
            <!--== Loader End ==-->
            @include('layoutes.header')
            @yield('content')
            @include('layoutes.footer')
         
        </div>
    </main>
</div>







<!--== Javascript Plugins ==-->
<!-- jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!-- Bootstrap -->
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>


<!-- Datepicker -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>--}}
<!-- Script -->
{{--<script type="text/javascript">
$(document).ready(function() {
    $("#datetimepicker1").datepicker({
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"
    });
    $("#datetimepicker2").datepicker({
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"
    });
})


</script>--}}
<script src="{{asset('website/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('website/assets/js/smoothscroll.js')}}"></script>
<script src="{{asset('website/assets/js/plugins.js')}}"></script>
<script src="{{asset('website/assets/js/master.js')}}"></script>

<!-- Revolution js Files -->
<script type="text/javascript" src="{{asset('website/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/revolution/js/revolution.extension.video.min.js')}}"></script>


@yield('customizedScript')


</body>
</html>
