<!DOCTYPE html>
<html lang="en">

{{-- HEAD --}}
@include('admin.head.head')

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        <!-- BODY HEADER -->
        @include('admin.body.header')

        <!-- BODY SIDEBAR -->
        @include('admin.body.sidebar')
		
        <!-- INDEX -->
        <div class="content-wrapper">
			@yield('admin')
        </div>
		
        <!-- BODY FOOTER -->
		@include('admin.body.footer')
		
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>

    {{-- Input TAGS --}}
    <script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>

    {{-- TextArea Editor --}}
    <script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
	<script src="{{ asset('backend/js/pages/editor.js') }}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
    {{-- Aba de Pesquisa e Filtros --}}
    <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
	<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="{{ asset('backend/js/alert.js') }}"></script> <!-- End Sweet Alert -->

    {{-- Notification Toastr --}}
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
