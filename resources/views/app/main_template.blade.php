<!DOCTYPE html>
<html lang="en">

<!-- HEAD  -->

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Ajax para os modals -->

    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    {{-- Toast Notification --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    {{-- Sweet Notification --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
    <!-- HEADER -->
    @include('app.body.header')

    <!-- INDEX -->
    @yield('content')

    {{-- BRANDS --}}
    @include('app.body.brands')

    <!-- FOOTER  -->
    @include('app.body.footer')


    
    {{-- Modal Add to Cart --}}
    <div class="modal fade" id="addCart" tabindex="-1" aria-labelledby="addCartLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCartLabel"><strong><span id="pname"></span></strong>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-bottom: 50px;">
                    {{-- Image/List Group --}}
                    <div class="row">
                        {{-- Card Image --}}
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="" class="card-img-top"
                                    style="height: 180px; width: 180px; margin-bottom: 15px;" id="image">
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        {{-- List Group --}}
                        <div class="col-md-7">
                            <ul class="list-group">
                                {{-- Price --}}
                                <li class="list-group-item">{{ session()->get('language') == 'portuguese' ? 'Preço do Produto' : 'Product Price' }}: 
                                    <del style="float: right; font-size: 11px;" id="oldprice"></del>
                                    <strong style="float: right; margin-right: 5px;" class="text-danger">{{ session()->get('language') == 'portuguese' ? 'R$ ' : '$ ' }}<span id="pprice"></span></strong>
                                </li>

                                {{-- Code --}}
                                <li class="list-group-item">{{ session()->get('language') == 'portuguese' ? 'Código do Produto' : 'Product Code' }}: <strong style="float: right;" id="code"></strong>
                                </li>

                                {{-- Category --}}
                                <li class="list-group-item">{{ session()->get('language') == 'portuguese' ? 'Categoria' : 'Category' }}:
                                    <strong style="float: right;" id="{{ session()->get('language') == 'portuguese' ? 'category_pt' : 'category' }}"></strong>
                                </li>

                                {{-- Brand --}}
                                <li class="list-group-item">{{ session()->get('language') == 'portuguese' ? 'Marca' : 'Brand' }}:
                                    <span class="badge badge-primary" style="background: blue; text-color: white;" id="{{ session()->get('language') == 'portuguese' ? 'pmarca' : 'pbrand' }}"></span>
                                    <span class="badge badge-danger" style="background: red; text-color: white;" id="{{ session()->get('language') == 'portuguese' ? 'nulo' : 'null' }}"></span>
                                </li>

                                {{-- Stock --}}
                                <li class="list-group-item">{{ session()->get('language') == 'portuguese' ? 'Em Estoque' : 'In Stock' }}:
                                    <span class="badge badge-success" id="{{ session()->get('language') == 'portuguese' ? 'disponivel' : 'avaliable' }}" style="background: green; text-color: white;"></span>
                                    <span class="badge badge-danger" id="{{ session()->get('language') == 'portuguese' ? 'esgotado' : 'stockOut' }}" style="background: red; text-color: white;"></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Selects --}}
                    <div class="row">
                        <div class="col-md-4">
                            {{-- Color --}}
                            <div class="form-group" id="colorArea">
                                <label
                                    for="{{ session()->get('language') == 'portuguese' ? 'color_pt' : 'color'}}">{{ session()->get('language') == 'portuguese' ? 'Cor' : 'Choose Color' }}<span
                                        class="text-danger"> *</span></label></label>
                                <select class="form-control" id="{{ session()->get('language') == 'portuguese' ? 'color_pt' : 'color'}}"
                                    name="{{ session()->get('language') == 'portuguese' ? 'color_pt' : 'color' }}"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Size --}}
                            <div class="form-group" id="sizeArea">
                                <label
                                    for="{{ session()->get('language') == 'portuguese' ? 'size_pt' : 'size'}}">{{ session()->get('language') == 'portuguese' ? 'Tamanho' : 'Choose Size' }}<span
                                        class="text-danger"> *</span></label></label>
                                <select class="form-control" id="{{ session()->get('language') == 'portuguese' ? 'size_pt' : 'size'}}"
                                    name="{{ session()->get('language') == 'portuguese' ? 'size_pt' : 'size' }}"></select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            {{-- Quantity --}}
                            <div class="form-group">
                                <label for="qty">{{ session()->get('language') == 'portuguese' ? 'Quantidade' : 'Quantity' }}<span class="text-danger"> *</span></label></label>
                                <input type="number" class="form-control" id="qty" value="1" min="1">
                            </div>
                        </div>
                    </div>

                    {{-- BUTTON --}}
                    <input type="hidden" id="product_id">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()" style="float: right; margin: 15px 5px;">Add to Cart</button>
                    </div>            
                </div>
            </div>
        </div>
    </div>

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
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
        
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

    <!-- =========================== AJAX ADD CART =============================== --> 
        <script type="text/javascript">
            // ********************* OPEN MODAL *********************
            function productView(id) {
                $.ajax({
                    type: 'GET',
                    url: '/modal/add_cart/product/' + id,
                    dataType: 'json',

                    success: function(data) {
                        // ================= Image =======================
                        $('#image').attr('src', '/' + data.product.product_thumnail)

                        // // ================= List Group =======================
                        
                        // PRODUCT ID - INPUT HIDDEN - BUTTON SUBMIT
                        $('#product_id').val(id)
                        $('#qty').val(1)

                        // Name
                        $('#pname').text(data.product.product_name_en)
                        
                        // Condition Price
                        $('#price').text(data.product.selling_price)
                            if(data.product.discount_price == null || data.product.discount_price == 0) {
                                $('#pprice').text(data.product.selling_price)
                            } else {
                                $('#pprice').text(data.product.selling_price - data.product.discount_price)
                                $('#oldprice').text(data.product.selling_price)
                            }

                        // Product Code
                        $('#code').text(data.product.product_code)
                        
                        // Category
                        $('#category').text(data.product.category.category_name_en)
                        $('#category_pt').text(data.product.category.category_name_pt)
                        
                        // Condition Brand
                        $('#brand').text(data.product.brand_id)
                            if(data.product.brand_id == null || data.product.brand_id == 0) {
                                $('#pbrand').empty()
                                $('#null').empty()
                                $('#pmarca').empty()
                                $('#nulo').empty()

                                $('#null').text('No Brand')
                                $('#nulo').text('Sem Marca')
                            } else {
                                $('#pbrand').empty()
                                $('#null').empty()
                                $('#pmarca').empty()
                                $('#nulo').empty()

                                $('#pbrand').text(data.product.brand.brand_name_en)
                                $('#pmarca').text(data.product.brand.brand_name_pt)
                            }

                        // Condition Quantity
                        if(data.product.product_qty > 0) {
                            $('#avaliable').empty()
                            $('#stockOut').empty()
                            $('#disponivel').empty()
                            $('#esgotado').empty()

                            $('#avaliable').text('Avaliable')
                            $('#disponivel').text('Disponível')
                            
                        } else {
                            $('#avaliable').empty()
                            $('#stockOut').empty()
                            $('#disponivel').empty()
                            $('#esgotado').empty()

                            $('#stockOut').text('Stock Out')
                            $('#esgotado').text('Esgotado')
                            
                        }

                        // ================= Colors =======================
                        // Color En
                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                                '</option>')

                            if (data.color == "") {
                                $('#colorArea').hide();
                            } else {
                                $('#colorArea').show();
                            }
                        })
                        // Color Pt
                        $('select[name="color_pt"]').empty();
                        $.each(data.color_pt, function(key, value) {
                            $('select[name="color_pt"]').append('<option value=" ' + value + ' ">' + value +
                                '</option>')

                            if (data.color_pt == "") {
                                $('#colorArea').hide();
                            } else {
                                $('#colorArea').show();
                            }
                        })

                        // ================= Sizes =======================
                        // Size En
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                                '</option>')

                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        })
                        // Size Pt
                        $('select[name="size_pt"]').empty();
                        $.each(data.size_pt, function(key, value) {
                            $('select[name="size_pt"]').append('<option value=" ' + value + ' ">' + value +
                                '</option>')

                            if (data.size_pt == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        })
                    }
                })
            }

            // ********************* BUTTON ADD CART *********************
            function addToCart() {
                var id = $('#product_id').val()
                var quantity = $('#qty').val()

                var product_name = $('#pname').text();
                var color = $('#color option:selected').text()
                var size = $('#size option:selected').text()

                $.ajax({
                    headers: { 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') },
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color, size: size, quantity: quantity, product_name: product_name
                    },
                    url: "/cart/store/"+id,

                    success: function(data) {
                        miniCart() // Adicionado aqui para recarregar os valores automaticamente no mini cart
                        $('#closeModal').click()
                        
                        // Notification
                        const Toast =  Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 3000
                            })

                        if($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })

                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })

                        }
                    }
                })
            }
        </script>
        
        <!-- =========================== AJAX MINI CART =============================== --> 
        <script type="text/javascript">
            // ********************* READ - MINI CARD *********************
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/cart/mini/view',
                    dataType: 'json',

                    success: function(response) {
                        $('span[id="cartSubTotal"]').text(response.cartTotal)
                        $('span[id="cartQty"]').text(response.cartQty)

                        var miniCart = ""
                        
                        $.each(response.carts, function(valor, product) {
                            miniCart +=  `
                                <div class="cart-item product-summary">
                                    <div class="row" style="padding-right: 20px;">
                                        <div class="col-xs-4">
                                            <div class="image"> 
                                                <a href="detail.html">
                                                    <img src="/${product.options.image}" alt="">
                                                </a> 
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name">
                                                <a href="index.php?page-detail">
                                                    ${product.name}
                                                </a>
                                            </h3>
                                            <div class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${product.price} * ${product.qty} </div>
                                        </div>
                                        <div class="col-xs-1 action"> 
                                            <button class="btn btn-sm btn-danger" type="submit" id="${product.rowId}" onclick="deleteMiniCart(this.id)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            ` 
                        });

                        $('#miniCart').html(miniCart);
                    }
                });
            }
        
            miniCart();

            // ********************* DELETE - MINI CARD *********************
            function deleteMiniCart(rowId) {
                $.ajax({
                    type: 'GET',
                    url: 'cart/mini/product/delete/' + rowId,
                    dataType: 'json',

                    success: function(data) {
                        miniCart()

                        // Notification
                        const Toast =  Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 3000
                            })

                        if($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'error',
                                title: data.success
                            })

                        } else {
                            Toast.fire({
                                type: 'warning',
                                title: data.error
                            })

                        }
                    }
                })
            }
        </script>

    <!-- =========================== AJAX ADD WISHLIST =============================== --> 
        <script type="text/javascript">
            // ********************* ADD WISHLIST *********************
            function addWishlist(product_id) {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    dataType: 'json',
                    url: '/wishlist/store/'+product_id,

                    success: function(data) {

                        // Notification
                        const Toast =  Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 3000
                            })

                        if($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })

                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })

                        }
                    }
                })
            }

            // ********************* READ WISHLIST PAGE *********************
            function wishlist() {
                $.ajax({
                    type: 'GET',
                    url: '/get-wishlist-products',
                    dataType: 'json',

                    success:function(response) {

                        var rows = ""

                        $.each(response, function(key, value) {
                            rows += `
                                    <tr>
                                        <td class="col-md-2">
                                            <img src="/${value.product.product_thumnail}" alt="imga">
                                        </td>
                                        <td class="col-md-7">
                                            <div class="product-name">
                                                <a href="#">${value.product.product_name_en}</a>
                                            </div>
                                            <div class="price">
                                                ${
                                                    value.product.discount_price == null 
                                                    ? 
                                                        `{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} ${value.product.selling_price}` 
                                                    : 
                                                        `{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} ${value.product.selling_price - value.product.discount_price} 
                                                        <span>{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} ${value.product.selling_price}</span>`
                                                }
                                            </div>
                                        </td>
                                        <td class="col-md-2">
                                            <button class="btn-upper btn btn-primary" type="button" data-toggle="modal" data-target="#addCart" id="${value.product_id}" onclick="productView(this.id)">Add to cart</button>
                                        </td>
                                        <td class="col-md-1 close-btn">
                                            <button type="button" class="btn btn-sm btn-danger" id="${value.id}" onclick="deleteWishlist(this.id)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `
                        })

                        $('#wishlist').html(rows)
                    }
                })
            }

            wishlist();

            // ********************* DELETE - WISHLIST *********************
            function deleteWishlist(id) {
                $.ajax({
                    type: 'GET',
                    url: '/wishlist/my/products/delete/' + id,
                    dataType: 'json',

                    success: function(data) {
                        wishlist()

                        // Notification
                        const Toast =  Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 3000
                            })

                        if($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'error',
                                title: data.success
                            })

                        } else {
                            Toast.fire({
                                type: 'warning',
                                title: data.error
                            })

                        }
                    }
                })
            }
        </script>

</body>

</html>
