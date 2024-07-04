<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontendAssets') }}/static_images/favicon.png" type="image/x-icon">

    <!-- Font Kohinoor  -->
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/font_style.css">


    <!-- Font Awesome  -->
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/all.min.css">
    <!-- Google Material Icon  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Box Icon  -->
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/boxicons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontendAssets') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('frontendAssets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- magnific-popup  -->
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/magnify-popup.min.css">

    {{-- dropify --}}
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/dropify/css/dropify.min.css">
    {{-- dropify --}}

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- select2 --}}

    <!-- Bootstrap Stylesheet -->
    <link href="{{ asset('frontendAssets') }}/css/bootstrap.css" rel="stylesheet">

    <!-- custom css  -->
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/default.css">
    <link rel="stylesheet" href="{{ asset('frontendAssets') }}/css/slick.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "317139198701337");
        chatbox.setAttribute("attribution", "biz_inbox");

    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true
                , version: 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
    @include('sweetalert::alert')
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div id="wifi-loader">
            <svg class="circle-outer" viewBox="0 0 86 86">
                <circle class="back" cx="43" cy="43" r="40"></circle>
                <circle class="front" cx="43" cy="43" r="40"></circle>
                <circle class="new" cx="43" cy="43" r="40"></circle>
            </svg>
            <svg class="circle-middle" viewBox="0 0 60 60">
                <circle class="back" cx="30" cy="30" r="27"></circle>
                <circle class="front" cx="30" cy="30" r="27"></circle>
            </svg>
            <svg class="circle-inner" viewBox="0 0 34 34">
                <circle class="back" cx="17" cy="17" r="14"></circle>
                <circle class="front" cx="17" cy="17" r="14"></circle>
            </svg>
            <div class="text" data-text="One Sky"></div>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- top_social_info start -->
    @include('frontend.include.social_info_top')
    <!-- top_social_info end -->
    <!-- header  start-->
    @include('frontend.include.header')
    <!-- header end -->

    <!-- content start  -->
    @yield('content')
    <!-- content end  -->

    <!-- footer  start-->
    @include('frontend.include.footer')
    <!-- footer end -->

    <!-- Back to Top -->
    <a id="back_to_top_button"><i class="fa-solid fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('frontendAssets') }}/js/jquery 3.4.1.js"></script>
    <script src="{{ asset('frontendAssets') }}/js/jquery.easypiechart.min.js"></script>
    <script src="{{ asset('frontendAssets') }}/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('frontendAssets') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontendAssets') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('frontendAssets') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontendAssets') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('frontendAssets') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('frontendAssets') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('frontendAssets') }}/lib/isotope/isotope.pkgd.min.js"></script>
    <!-- magnific popup  -->
    <script src="{{ asset('frontendAssets') }}/js/magnific-popup.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontendAssets') }}/js/main.js"></script>
    <script src="{{ asset('frontendAssets') }}/js/custom.js"></script>

    <!-- Select2 Js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- dropify --}}
    <script src="{{ asset('adminAssets') }}/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{ asset('adminAssets') }}/js/pages/forms/dropify.js"></script>
    {{-- dropify --}}
    <script>
        $(document).ready(function() {
            $('.counter').counterUp({
                delay: 10
                , time: 1200
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $('.branch_selection').select2({
              theme: "classic",
              allowClear: true,
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    @yield('script')
</body>

</html>
