@extends('app.main_template')
@section('content')

@section('title')
{{ session()->get('language') == 'portuguese' ? 'Página de Compras' : 'Shop Page' }}
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">{{ session()->get('language') == 'portuguese' ? 'Início' : 'Home' }}</a></li>
                <li><a href="#">{{ session()->get('language') == 'portuguese' ? 'Página de Compras' : 'Shop Page' }}</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content outer-top-xs">
    <div class='container'>

        <form action="{{ route('shop.filter') }}" method="post">
        @csrf

            <div class='row'>
                <div class='col-md-3 sidebar'>

                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('app.commom.sidenav')

                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Compras Relacionadas' : 'shop by' }}</h3>
                                
                                {{-- CATEGORY --}}
                                <div class="widget-header">
                                    <h2 class="widget-title">{{ session()->get('language') == 'portuguese' ? 'Categorias' : 'Category' }}</h2>
                                </div>
                                <br>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">

                                        @if (!empty($_GET['category']))
                                            @php
                                                $filter = explode(',', $_GET['category']);
                                            @endphp
                                        @endif

                                        @foreach($category as $cat)
                                            <div class="accordion-group">
                                                <div class="accordion-heading"> 

                                                    <label class="form-check-label">

                                                        <input type="checkbox" class="form-check-input" name="category[]" value="{{ $cat->category_slug_en }}" @if(!empty($filter) && in_array($cat->category_slug_en, $filter)) checked @endif onchange="this.form.submit()">
                                                        {{ session()->get('language') == 'portuguese' ? $cat->category_name_pt : $cat->category_name_en }}

                                                    </label>

                                                </div>
                                            </div>
                                        @endforeach    
                                        
                                    </div>
                                </div>

                                <hr>
                                {{-- BRAND --}}
                                <div class="widget-header">
                                    <h2 class="widget-title">{{ session()->get('language') == 'portuguese' ? 'Marcas' : 'Brand' }}</h2>
                                </div>
                                <br>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">

                                        @if (!empty($_GET['brand']))
                                            @php
                                                $filter = explode(',', $_GET['brand']);
                                            @endphp
                                        @endif

                                        @foreach($brands as $brand)
                                            <div class="accordion-group">
                                                <div class="accordion-heading"> 

                                                    <label class="form-check-label">

                                                        <input type="checkbox" class="form-check-input" name="brand[]" value="{{ $brand->brand_slug_en }}" @if(!empty($filter) && in_array($brand->brand_slug_en, $filter)) checked @endif onchange="this.form.submit()">
                                                        {{ session()->get('language') == 'portuguese' ? $brand->brand_name_pt : $brand->brand_name_en }}

                                                    </label>

                                                </div>
                                            </div>
                                        @endforeach    
                                        
                                    </div>
                                </div>

                            </div>

                            <!-- ============================================== PRICE SILDER============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Price Slider</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder"> <span class="min-max"> <span
                                                class="pull-left">$200.00</span> <span
                                                class="pull-right">$800.00</span> </span>
                                        <input type="text" id="amount"
                                            style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                        <input type="text" class="price-slider" value="">
                                    </div>
                                    <!-- /.price-range-holder -->
                                    <a href="#" class="lnk btn btn-primary">Show Now</a>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>

                            <!-- ============================================== MANUFACTURES============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Manufactures</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Forever 18</a></li>
                                        <li><a href="#">Nike</a></li>
                                        <li><a href="#">Dolce & Gabbana</a></li>
                                        <li><a href="#">Alluare</a></li>
                                        <li><a href="#">Chanel</a></li>
                                        <li><a href="#">Other Brand</a></li>
                                    </ul>
                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>

                            <!-- ============================================== COLOR============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Colors</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Yellow</a></li>
                                        <li><a href="#">Pink</a></li>
                                        <li><a href="#">Brown</a></li>
                                        <li><a href="#">Teal</a></li>
                                    </ul>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>

                            <!-- ============================================== COMPARE============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-top-vs">
                                <h3 class="section-title">Compare products</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report">
                                        <p>You have no <span>item(s)</span> to compare</p>
                                    </div>
                                </div>
                            </div>

                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            @include('app.commom.tags')
                            
                            <!-- ============================================== Testimonials ============================================== -->
                            @include('app.commom.card-vertical.testimonials')

                            <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
                        </div>
                    </div>

                </div>

                <!-- ========================================== SECTION – HERO ========================================= -->
                <div class='col-md-9'>

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image"> <img
                                    src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt=""
                                    class="img-responsive"> </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text"> Big Sale </div>
                                    <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                    <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                                    Position <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1
                                                    <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- PAginate --}}
                            <div class="col col-sm-6 col-md-4 text-right">
                                {{ $products->appends($_GET)->links('app.custom_paginate.custom') }} 
                            </div>
                        </div>
                    </div>

                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">

                            {{-- Product Grid --}}
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach($products as $grid_prod)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> 
                                                                <a href="{{ url('product/details/'.$grid_prod->id.'/'.$grid_prod->product_slug_en) }}">
                                                                    <img style="height: 250px;" src="{{ asset($grid_prod->product_thumnail) }}" alt="">
                                                                </a> 
                                                            </div>

                                                            @php
                                                                $amount = $grid_prod->discount_price;
                                                                $discount = ($amount / $grid_prod->selling_price) * 100;
                                                            @endphp

                                                            <div class="">
                                                                @if ($grid_prod->discount_price == null || $grid_prod->discount_price == 0)
                                                                    <div class="tag new">
                                                                        <span>new</span>
                                                                    </div>
                                                                @elseif($grid_prod->discount_price <= 20)
                                                                    <div class="tag" style="background: #12cca7;">
                                                                        <span>{{ round($discount) }} %</span>
                                                                    </div>
                                                                @else 
                                                                    <div class="tag" style="background: orange;">
                                                                        <span>{{ round($discount) }} %</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{ url('product/details/'.$grid_prod->id.'/'.$grid_prod->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $grid_prod->product_name_pt : $grid_prod->product_name_en }}</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>

                                                            @php
                                                                $price = $grid_prod->selling_price - $grid_prod->discount_price;
                                                                $price_sell = $price;
                                                            @endphp
                                                            @if ($grid_prod->discount_price == null || $grid_prod->discount_price == 0)
                                                                <div class="product-price">
                                                                    <span
                                                                        class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                        {{ $price_sell }}
                                                                    </span>
                                                                </div>
                                                            @else
                                                                <div class="product-price">
                                                                    <span
                                                                        class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                        {{ $price_sell }}</span>
                                                                    <span
                                                                        class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                        {{ $grid_prod->selling_price }}</span>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    {{-- Add to Cart --}}
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$grid_prod->id}}" onclick="productView(this.id)"> 
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                                                    </li>
            
                                                                    {{-- Add to Wishlist --}}
                                                                    <li> 
                                                                        <button class="btn btn-primary icon" type="button" id="{{$grid_prod->id}}" onclick="addWishlist(this.id)"> 
                                                                            <i class="icon fa fa-heart"></i> 
                                                                        </button> 
                                                                    </li>
            
                                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" > <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>  
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Product List --}}
                            <div class="tab-pane " id="list-container">
                                <div class="category-product">
                                    @foreach($products as $list_prod)
                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">

                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                <div class="image"> 
                                                                    <a href="{{ url('product/details/'.$list_prod->id.'/'.$list_prod->product_slug_en) }}">
                                                                        <img style="height: 250px;" src="{{ asset($list_prod->product_thumnail) }}" alt=""> 
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    <a href="{{ url('product/details/'.$list_prod->id.'/'.$list_prod->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $list_prod->product_name_pt : $list_prod->product_name_en }}</a>
                                                                </h3>

                                                                <div class="rating rateit-small"></div>

                                                                @php
                                                                    $price = $grid_prod->selling_price - $grid_prod->discount_price;
                                                                    $price_sell = $price;
                                                                @endphp
                                                                @if ($grid_prod->discount_price == null || $grid_prod->discount_price == 0)
                                                                    <div class="product-price">
                                                                        <span
                                                                            class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                            {{ $price_sell }}
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price">
                                                                        <span
                                                                            class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                            {{ $price_sell }}</span>
                                                                        <span
                                                                            class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                            {{ $grid_prod->selling_price }}</span>
                                                                    </div>
                                                                @endif

                                                                <div class="description m-t-10">
                                                                    {{ session()->get('language') == 'portuguese' ? $list_prod->short_descp_pt : $list_prod->short_descp_en }}
                                                                </div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            {{-- Add to Cart --}}
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$list_prod->id}}" onclick="productView(this.id)"> 
                                                                                    <i class="fa fa-shopping-cart"></i>
                                                                                </button>
                                                                                <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                                                            </li>
                    
                                                                            {{-- Add to Wishlist --}}
                                                                            <li> 
                                                                                <button class="btn btn-primary icon" type="button" id="{{$list_prod->id}}" onclick="addWishlist(this.id)"> 
                                                                                    <i class="icon fa fa-heart"></i> 
                                                                                </button> 
                                                                            </li>
                    
                                                                            <li class="lnk"> <a class="add-to-cart" href="detail.html" > <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @php
                                                        $amount = $grid_prod->discount_price;
                                                        $discount = ($amount / $grid_prod->selling_price) * 100;
                                                    @endphp

                                                    <div class="">
                                                        @if ($grid_prod->discount_price == null || $grid_prod->discount_price == 0)
                                                            <div class="tag new">
                                                                <span>new</span>
                                                            </div>
                                                        @elseif($grid_prod->discount_price <= 20)
                                                            <div class="tag" style="background: #12cca7;">
                                                                <span>{{ round($discount) }} %</span>
                                                            </div>
                                                        @else 
                                                            <div class="tag" style="background: orange;">
                                                                <span>{{ round($discount) }} %</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach    
                                </div>
                            </div>
                            


                        </div>

                        
                        {{-- Paginate --}}
                        {{ $products->appends($_GET)->links('app.custom_paginate.custom') }}

                    </div>

                </div>
            </div>
        
            
        </form>

    </div>
</div>


@endsection
