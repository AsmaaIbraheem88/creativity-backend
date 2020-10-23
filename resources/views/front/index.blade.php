<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title>CREATIVITY-AND- @yield('title')</title>


<meta name="description" content="{!! setting()->description !!}">
<meta name="keywords" content="{!! setting()->keywords !!}">

{{--    --}}
<meta name="author" content="">
<meta name="robots" content="follow, index, , max-snippet:-1, max-video-preview:-1, max-image-preview:large">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:url" content="">
<meta property="og:site_name" content="">
<meta property="og:updated_time" content="">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">

{{--    --}}
    


<!-- Site Icons -->
<link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ it()->url(setting()->icon) }}">

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">

@if(LaravelLocalization::getCurrentLocale() =='ar')

 <link rel="stylesheet" href="{{asset('front/bootstrap_rtl.min.css')}}" >
@endif



<!-- Site CSS -->
<link rel="stylesheet" href="{{asset('front/style.css')}}">

<link rel="stylesheet" href="{{url('/')}}/front/main_{{LaravelLocalization::getCurrentLocale()}}.css">

<!-- Responsive CSS -->
<link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('front/css/custom.css')}}">

<!-- Modernizer for Portfolio -->
<script src="{{asset('front/js/modernizer.js')}}"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "{{social()->whatsapp}}", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "left", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /GetButton.io widget -->


</head>
<body>

<!-- LOADER -->
<!--
    <div id="preloader">
        <div class="loader">
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__ball"></div>
		</div>
    </div>
-->
<!-- end loader -->
<!-- END LOADER -->

@include('front.layouts.header')

@yield('content')

@include('front.layouts.footer')

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
<!-- ALL JS FILES -->
<script src="{{asset('front/js/all.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset('front/js/custom.js')}}"></script>
<script src="{{asset('front/js/portfolio.js')}}"></script>
<script src="{{asset('front/js/hoverdir.js')}}"></script>




</body>
</html>