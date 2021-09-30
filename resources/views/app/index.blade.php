@extends('app.main_template')
@section('content')

@section('title')
Home Shop  
@endsection

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('app.commom.sidenav')

                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('app.commom.card-vertical.hot_deals')

                    <!-- ============================================== SPECIAL OFFER ============================================== -->
                    @include('app.commom.card-vertical.special_offer')

                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    @include('app.commom.tags')

                    <!-- ============================================== SPECIAL DEALS ============================================== -->
                    @include('app.commom.card-vertical.special_deals')

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    @include('app.commom.card-vertical.newsletter')

                    <!-- ============================================== Testimonials============================================== -->
                    @include('app.commom.card-vertical.testimonials')

                    <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}"
                            alt="Image"> </div>
                </div>

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

                    <!-- ========================================== SECTION – SLIDER ========================================= -->
                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                            @foreach ($sliders as $slide)
                                <div class="item"
                                    style="background-image: url({{ asset($slide->slider_image) }});">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">

                                            <div class="big-text fadeInDown-1">
                                                {{ session()->get('language') == 'portuguese' ? $slide->title_pt : $slide->title_en }}
                                            </div>
                                            <div class="excerpt fadeInDown-2 hidden-xs">
                                                <span>{{ session()->get('language') == 'portuguese' ? $slide->description_pt : $slide->description_en }}</span>
                                            </div>
                                            <div class="button-holder fadeInDown-3"> <a
                                                    href="index.php?page=single-product"
                                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{ session()->get('language') == 'portuguese' ? 'Compre Agora' : 'Shop Now' }}</a>
                                            </div>
                                        </div>
                                        <!-- /.caption -->
                                    </div>
                                    <!-- /.container-fluid -->
                                </div>
                            @endforeach

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    
                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">
                                                    {{ session()->get('language') == 'portuguese' ? 'Dinheiro de Volta' : 'money back' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <h6 class="text">
                                            {{ session()->get('language') == 'portuguese' ? 'Devolução Garantida em 30 Dias' : '30 Days Money Back Guarantee' }}
                                        </h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">
                                                    {{ session()->get('language') == 'portuguese' ? 'Frete Grátis' : 'free shipping' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <h6 class="text">
                                            {{ session()->get('language') == 'portuguese' ? 'Frete Grátis Acima de R$ 99' : 'Shipping on orders over $99' }}
                                        </h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">
                                                    {{ session()->get('language') == 'portuguese' ? 'Venda Especial' : 'Special Sale' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <h6 class="text">
                                            {{ session()->get('language') == 'portuguese' ? 'R$ 5 de Desconto em Todos os Itens' : 'Extra $5 off on all items' }}
                                        </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>

                    <!-- ============================================== NEW PRODUCTS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <h3 class="new-product-title pull-left"
                            style="font-size: 16px; text-transform: uppercase; font-weight: bold; padding: 0 0 10px 15px;">
                            {{ session()->get('language') == 'portuguese' ? 'Novos Produtos' : 'New Products' }}</h3>
                        <div class="more-info-tab clearfix ">
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a data-transition-type="backSlide" href="#all"
                                        data-toggle="tab">All</a></li>

                                @php
                                    $last_category = App\Models\Category::orderBy('updated_at', 'DESC')
                                        ->limit(5)
                                        ->get();
                                @endphp
                                @foreach ($last_category as $cat)
                                    <li><a data-transition-type="backSlide" href="#category{{ $cat->id }}"
                                            data-toggle="tab">{{ session()->get('language') == 'portuguese' ? $cat->category_name_pt : $cat->category_name_en }}</a>
                                    </li>
                                @endforeach

                            </ul>
                            <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">

                            {{-- All Producs --}}
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                        @foreach ($products as $prod)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_en) }}"><img
                                                                        src="{{ asset($prod->product_thumnail) }}"></a>
                                                            </div>
                                                            <!-- /.image -->
                                                            @php
                                                                $amount = $prod->discount_price;
                                                                $discount = ($amount / $prod->selling_price) * 100;
                                                            @endphp

                                                            <div class="">
                                                                @if ($prod->discount_price == null || $prod->discount_price == 0)
                                                                    <div class="tag new">
                                                                        <span>new</span>
                                                                    </div>
                                                                @elseif($prod->discount_price <= 20)
                                                                    <div class="tag" style="background: #12cca7;">
                                                                        <span>{{ round($discount, 2) }} %</span>
                                                                    </div>
                                                                @else 
                                                                    <div class="tag" style="background: orange;">
                                                                        <span>{{ round($discount, 2) }} %</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $prod->product_name_pt : $prod->product_name_en }}</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>

                                                            @php
                                                                $price = $prod->selling_price - $prod->discount_price;
                                                                $price_sell = $price;
                                                            @endphp
                                                            @if ($prod->discount_price == null || $prod->discount_price == 0)
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
                                                                        {{ $prod->selling_price }}</span>
                                                                </div>
                                                            @endif
                                                            <!-- /.product-price -->
                                                        </div>
                                
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    {{-- Add to Cart --}}
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod->id}}" onclick="productView(this.id)"> 
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                                                    </li>
            
                                                                    {{-- Add to Wishlist --}}
                                                                    <li> 
                                                                        <button class="btn btn-primary icon" type="button" id="{{$prod->id}}" onclick="addWishlist(this.id)"> 
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
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>

                            {{-- Tabs Categories Products --}}
                            @foreach ($category as $cat)
                                <div class="tab-pane" id="category{{ $cat->id }}">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                            @php
                                                $products_tabs = App\Models\Product::where('category_id', $cat->id)
                                                    ->orderBy('id', 'DESC')
                                                    ->limit(6)
                                                    ->get();
                                            @endphp

                                            @forelse ($products_tabs as $prod)
                                                <div class="item item-carousel">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_en) }}"><img
                                                                            src="{{ asset($prod->product_thumnail) }}"></a>
                                                                </div>
                                                                <!-- /.image -->
                                                                @php
                                                                    $amount = $prod->discount_price;
                                                                    $discount = ($amount / $prod->selling_price) * 100;
                                                                @endphp

                                                                <div class="">
                                                                    @if ($prod->discount_price == null || $prod->discount_price == 0)
                                                                        <div class="tag new">
                                                                            <span>new</span>
                                                                        </div>
                                                                    @elseif($prod->discount_price <= 20)
                                                                        <div class="tag" style="background: #12cca7;">
                                                                            <span>{{ round($discount, 2) }} %</span>
                                                                        </div>
                                                                    @else 
                                                                        <div class="tag" style="background: orange;"><span>{{ round($discount, 2) }} %</span></div>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $prod->product_name_pt : $prod->product_name_en }}</a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>

                                                                @php
                                                                    $price = $prod->selling_price - $prod->discount_price;
                                                                    $price_sell = $price;
                                                                @endphp
                                                                @if ($prod->discount_price == null || $prod->discount_price == 0)
                                                                    <div class="product-price">
                                                                        <span class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                            {{ $price_sell }}
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price">
                                                                        <span class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                            {{ $price_sell }}</span>
                                                                        <span
                                                                            class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                                            {{ $prod->selling_price }}</span>
                                                                    </div>
                                                                @endif
                                                                <!-- /.product-price -->

                                                            </div>
                                                            
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod->id}}" onclick="productView(this.id)">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                        </li>
                                                                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                                                                                title="{{ session()->get('language') == 'portuguese' ? 'Favoritos' : 'Wishlist' }}">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a> </li>
                                                                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html"
                                                                                title="{{ session()->get('language') == 'portuguese' ? 'Comparar' : 'Compare' }}">
                                                                                <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>         
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <h5 class="text-danger">No Product Found</h5>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- ============================================== BANNERS WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Produtos em Destaque' : 'Featured products' }}</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            
                            @foreach($featured as $prod_featured)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a href="{{ url('product/details/'.$prod_featured->id.'/'.$prod_featured->product_slug_en) }}"><img
                                                            src="{{ asset($prod_featured->product_thumnail) }}" alt=""></a> </div>
                                                <!-- /.image -->

                                                <div class="tag hot"><span>hot</span></div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $prod_featured->product_name_pt : $prod_featured->product_name_en }}</a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price"> 
                                                    @php 
                                                        $amount = $prod_featured->selling_price - $prod_featured->discount_price;
                                                        $price = $amount;    
                                                    @endphp
                                                    @if($prod_featured->discount_price == null || $prod_featured->discount_price == 0)
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    @else
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    <span class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $prod_featured->selling_price }}
                                                    </span> 
                                                    @endif
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        {{-- Add to Cart --}}
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod_featured->id}}" onclick="productView(this.id)"> 
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                                        </li>

                                                        {{-- Add to Wishlist --}}
                                                        <li> 
                                                            <button class="btn btn-primary icon" type="button" id="{{$prod_featured->id}}" onclick="addWishlist(this.id)"> 
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
                        <!-- /.home-owl-carousel -->
                    </section>

                    <!-- ============================================== BANNERS WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="{{ asset('frontend/assets/images/banners/promo_banner.jpg') }}" alt="">
                                    </div>
                                    <div class="new-label">
                                        <div class="text">HOT</div>
                                    </div>
                                    <!-- /.new-label -->
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>

                    <!-- ============================================== 01 SKIP CATEGORY/PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? $skip_cat->category_name_pt : $skip_cat->category_name_en }}</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            
                            @foreach($skip_prod as $skip)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a href="{{ url('product/details/'.$skip->id.'/'.$skip->product_slug_en) }}"><img
                                                            src="{{ asset($skip->product_thumnail) }}" alt=""></a> </div>
                                                <!-- /.image -->

                                                @php
                                                    $amount = $skip->discount_price;
                                                    $discount = ($amount / $skip->selling_price) * 100;
                                                @endphp
                                                <div class="">
                                                    @if ($skip->discount_price == null || $skip->discount_price == 0)
                                                        <div class="tag new">
                                                            <span>new</span>
                                                        </div>
                                                    @elseif($skip->discount_price <= 20)
                                                        <div class="tag" style="background: #12cca7;">
                                                            <span>{{ round($discount, 2) }} %</span>
                                                        </div>
                                                    @else 
                                                        <div class="tag" style="background: orange;"><span>{{ round($discount, 2) }} %</span></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ url('product/details/'.$skip->id.'/'.$skip->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $skip->product_name_pt : $skip->product_name_en }}</a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price"> 
                                                    @php 
                                                        $amount = $skip->selling_price - $skip->discount_price;
                                                        $price = $amount;    
                                                    @endphp
                                                    @if($skip->discount_price == null || $skip->discount_price == 0)
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    @else
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    <span class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $skip->selling_price }}
                                                    </span> 
                                                    @endif
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        {{-- Add to Cart --}}
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$skip->id}}" onclick="productView(this.id)"> 
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                                        </li>

                                                        {{-- Add to Wishlist --}}
                                                        <li> 
                                                            <button class="btn btn-primary icon" type="button" id="{{$skip->id}}" onclick="addWishlist(this.id)"> 
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
                        <!-- /.home-owl-carousel -->
                    </section>

                    <!-- ============================================== 02 SKIP CATEGORY/PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? $skip_cat_two->category_name_pt : $skip_cat_two->category_name_en }}</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            
                            @foreach($skip_prod_two as $skip)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a href="{{ url('product/details/'.$skip->id.'/'.$skip->product_slug_en) }}"><img
                                                            src="{{ asset($skip->product_thumnail) }}" alt=""></a> </div>
                                                <!-- /.image -->

                                                @php
                                                    $amount = $skip->discount_price;
                                                    $discount = ($amount / $skip->selling_price) * 100;
                                                @endphp
                                                <div class="">
                                                    @if ($skip->discount_price == null || $skip->discount_price == 0)
                                                        <div class="tag new">
                                                            <span>new</span>
                                                        </div>
                                                    @elseif($skip->discount_price <= 20)
                                                        <div class="tag" style="background: #12cca7;">
                                                            <span>{{ round($discount, 2) }} %</span>
                                                        </div>
                                                    @else 
                                                        <div class="tag" style="background: orange;"><span>{{ round($discount, 2) }} %</span></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ url('product/details/'.$skip->id.'/'.$skip->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $skip->product_name_pt : $skip->product_name_en }}</a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price"> 
                                                    @php 
                                                        $amount = $skip->selling_price - $skip->discount_price;
                                                        $price = $amount;    
                                                    @endphp
                                                    @if($skip->discount_price == null || $skip->discount_price == 0)
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    @else
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    <span class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $skip->selling_price }}
                                                    </span> 
                                                    @endif
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        {{-- Add to Cart --}}
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$skip->id}}" onclick="productView(this.id)"> 
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                                        </li>

                                                        {{-- Add to Wishlist --}}
                                                        <li> 
                                                            <button class="btn btn-primary icon" type="button" id="{{$skip->id}}" onclick="addWishlist(this.id)"> 
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
                        <!-- /.home-owl-carousel -->
                    </section>

                    <!-- ============================================== BANNERS WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt="">
                                    </div>
                                    <div class="strip strip-text">
                                        <div class="strip-inner">
                                            <h2 class="text-right">New Mens Fashion<br>
                                                <span class="shopping-needs">Save up to 40% off</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="new-label">
                                        <div class="text">NEW</div>
                                    </div>
                                    <!-- /.new-label -->
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>

                    <!-- ============================================== 02 SKIP BRAND/PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? $skip_bd->brand_name_pt : $skip_bd->brand_name_en }}</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            
                            @foreach($skip_bd_prod as $skip)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a href="{{ url('product/details/'.$skip->id.'/'.$skip->product_slug_en) }}"><img
                                                            src="{{ asset($skip->product_thumnail) }}" alt=""></a> </div>
                                                <!-- /.image -->

                                                @php
                                                    $amount = $skip->discount_price;
                                                    $discount = ($amount / $skip->selling_price) * 100;
                                                @endphp
                                                <div class="">
                                                    @if ($skip->discount_price == null || $skip->discount_price == 0)
                                                        <div class="tag new">
                                                            <span>new</span>
                                                        </div>
                                                    @elseif($skip->discount_price <= 20)
                                                        <div class="tag" style="background: #12cca7;">
                                                            <span>{{ round($discount, 2) }} %</span>
                                                        </div>
                                                    @else 
                                                        <div class="tag" style="background: orange;"><span>{{ round($discount, 2) }} %</span></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ url('product/details/'.$skip->id.'/'.$skip->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $skip->product_name_pt : $skip->product_name_en }}</a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price"> 
                                                    @php 
                                                        $amount = $skip->selling_price - $skip->discount_price;
                                                        $price = $amount;    
                                                    @endphp
                                                    @if($skip->discount_price == null || $skip->discount_price == 0)
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    @else
                                                    <span class="price"> {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $price }}
                                                    </span> 
                                                    <span class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} 
                                                        {{ $skip->selling_price }}
                                                    </span> 
                                                    @endif
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        {{-- Add to Cart --}}
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$skip->id}}" onclick="productView(this.id)"> 
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                                        </li>

                                                        {{-- Add to Wishlist --}}
                                                        <li> 
                                                            <button class="btn btn-primary icon" type="button" id="{{$skip->id}}" onclick="addWishlist(this.id)"> 
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
                        <!-- /.home-owl-carousel -->
                    </section>

                    <!-- ============================================== BEST SELLER ============================================== -->
                    <div class="best-deal wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">Best seller</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p20.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p21.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p22.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p23.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p24.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p25.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p26.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="{{ asset('frontend/assets/images/products/p27.jpg') }}"
                                                                        alt="">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>

                    <!-- ============================================== BLOG SLIDER ============================================== -->
                    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                        <h3 class="section-title">latest form blog</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                                    laudantium</a></h3>
                                            <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt
                                                ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="{{ asset('frontend/assets/images/blog-post/post2.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas
                                                    nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt
                                                ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas
                                                    nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error
                                                sit voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="{{ asset('frontend/assets/images/blog-post/post2.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas
                                                    nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error
                                                sit voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas
                                                    nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error
                                                sit voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                        <!-- /.blog-slider-container -->
                    </section>

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section wow fadeInUp new-arriavls">
                        <h3 class="section-title">New Arrivals</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('frontend/assets/images/products/p19.jpg') }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99
                                                </span> <span class="price-before-discount">$ 800</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        {{-- <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod_featured->id}}" onclick="productView(this.id)"> <i --}}
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('frontend/assets/images/products/p28.jpg') }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99
                                                </span> <span class="price-before-discount">$ 800</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    {{-- <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod_featured->id}}" onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i> --}}
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('frontend/assets/images/products/p30.jpg') }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99
                                                </span> <span class="price-before-discount">$ 800</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    {{-- <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod_featured->id}}" onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i> --}}
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('frontend/assets/images/products/p1.jpg') }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99
                                                </span> <span class="price-before-discount">$ 800</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    {{-- <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod_featured->id}}" onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i> --}}
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('frontend/assets/images/products/p2.jpg') }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99
                                                </span> <span class="price-before-discount">$ 800</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    {{-- <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod_featured->id}}" onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i> --}}
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                            <!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('frontend/assets/images/products/p3.jpg') }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99
                                                </span> <span class="price-before-discount">$ 800</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    {{-- <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#addCart" id="{{$prod_featured->id}}" onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i> --}}
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                            <!-- /.item -->
                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>

                </div>
            </div>
        </div>
    </div>
    
@endsection
