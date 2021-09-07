<!DOCTYPE html>
<html lang="en">

<!-- HEAD  -->
@include('app.head.head')

<body class="cnt-home">
    <!-- HEADER -->
    @include('app.body.header')

    <!-- INDEX -->
    @yield('content')

    {{-- BRANDS --}}
    @include('app.body.brands')

    <!-- FOOTER  -->
    @include('app.body.footer')


    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"

            switch(type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                break;
            }
        @endif
    </script>
</body>

</html>
