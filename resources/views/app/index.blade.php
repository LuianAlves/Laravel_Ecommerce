@extends('app.main_template')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                        <nav class="yamm megamenu-horizontal">
                            <ul class="nav">

                                @foreach ($category as $cat)
                                    <li class="dropdown menu-item">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                class="icon {{ $cat->category_icon }}" aria-hidden="true"></i>
                                            {{ session()->get('language') == 'portuguese' ? $cat->category_name_pt : $cat->category_name_en }}
                                        </a>
                                        <ul class="dropdown-menu mega-menu">
                                            <li class="yamm-content">
                                                <div class="row">
                                                    @php
                                                        $subcategory = App\Models\SubCategory::where('category_id', $cat->id)
                                                            ->orderBy('subcategory_name_en', 'ASC')
                                                            ->get();
                                                    @endphp

                                                    @foreach ($subcategory as $subcat)
                                                        <div class="col-sm-12 col-md-3">
                                                            <h2 class="title">
                                                                {{ session()->get('language') == 'portuguese' ? $subcat->subcategory_name_pt : $subcat->subcategory_name_en }}
                                                            </h2>

                                                            @php
                                                                $subsubcategory = App\Models\SubSubCategory::where('subcategory_id', $subcat->id)
                                                                    ->orderBy('sub_subcategory_name_en', 'ASC')
                                                                    ->get();
                                                            @endphp

                                                            @foreach ($subsubcategory as $subsubcat)
                                                                <ul class="links list-unstyled">
                                                                    <li><a
                                                                            href="#">{{ session()->get('language') == 'portuguese' ? $subsubcat->sub_subcategory_name_pt : $subsubcat->sub_subcategory_name_en }}</a>
                                                                    </li>
                                                                </ul>
                                                            @endforeach

                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- /.row -->
                                            </li>
                                            <!-- /.yamm-content -->
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                            <!-- /.nav -->
                        </nav>
                        <!-- /.megamenu-horizontal -->
                    </div>
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <!-- ============================================== HOT DEALS ============================================== -->
                    <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Quentes' : 'hot deals'}}</h3>
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                                @foreach($hot_deals as $hd)
                                    <div class="item">
                                        <div class="products">
                                            <div class="hot-deal-wrapper">
                                                <div class="image">
                                                    <img src="{{ asset($hd->product_thumnail)}}" alt="">
                                                </div>
                                                <div class="sale-offer-tag">
                                                    @php
                                                        $amount = $hd->discount_price;
                                                        $discount = ( $amount / $hd->selling_price ) * 100;
                                                    @endphp
                                                    <span>
                                                        {{ round($discount, 1) }} %
                                                        <br>
                                                        off
                                                    </span>
                                                </div> 
                                            </div><!-- /.hot-deal-wrapper -->

                                            <div class="product-info text-left m-t-20">
                                                <h3 class="name"><a href="{{ url('product/details/'.$hd->id.'/'.$hd->product_slug_en) }}">{{ session()->get('language') == 'portuguese' ? $hd->product_name_pt : $hd->product_name_en }}</a></h3>
                                                <div class="rating rateit-small"></div>

                                                <div class="product-price">
                                                    @php
                                                        $amount = $hd->discount_price;
                                                        $price = $hd->selling_price - $amount;
                                                    @endphp
                                                    <span class="price">
                                                        {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} {{ $price }}
                                                    </span>
                                                    <span class="price-before-discount">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} {{ $hd->selling_price }}</span>
                                                </div><!-- /.product-price -->
                                            </div><!-- /.product-info -->

                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <div class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart'}}</button>

                                                    </div>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div>
                                    </div>
                                @endforeach 

                        </div>
                        <!-- /.sidebar-widget -->
                    </div>
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== SPECIAL OFFER ============================================== -->
                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Especiais' : 'Special Offer'}}</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                
                                <div class="item">
                                    <div class="products special-product">                                    
                                        @foreach($special_offer as $spo)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="{{ url('product/details/'.$spo->id.'/'.$spo->product_slug_en) }}"> <img style="height: 80px;" src="{{ asset($spo->product_thumnail) }}" alt="">
                                                                    </a> 
                                                                </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    <a href="{{ url('product/details/'.$spo->id.'/'.$spo->product_slug_en) }}">
                                                                        {{ session()->get('language') == 'portuguese' ? $spo->product_name_pt : $spo->product_name_en }}
                                                                    </a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> 
                                                                    <span class="price">
                                                                        {{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} 
                                                                        @php
                                                                            $amount = $spo->selling_price - $spo->discount_price;
                                                                            $price = $amount;   
                                                                        @endphp
                                                                        {{ $price }}
                                                                    </span> 
                                                                </div>
                                                                <!-- /.product-price -->
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->

                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    <div class="sidebar-widget product-tag wow fadeInUp">
                        <h3 class="section-title">Product tags</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="tag-list"> <a class="item" title="Phone"
                                    href="category.html">Phone</a> <a class="item active" title="Vest"
                                    href="category.html">Vest</a> <a class="item" title="Smartphone"
                                    href="category.html">Smartphone</a> <a class="item" title="Furniture"
                                    href="category.html">Furniture</a> <a class="item" title="T-shirt"
                                    href="category.html">T-shirt</a> <a class="item" title="Sweatpants"
                                    href="category.html">Sweatpants</a> <a class="item" title="Sneaker"
                                    href="category.html">Sneaker</a> <a class="item" title="Toys"
                                    href="category.html">Toys</a> <a class="item" title="Rose"
                                    href="category.html">Rose</a> </div>
                            <!-- /.tag-list -->
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->

                    <!-- ============================================== SPECIAL DEALS ============================================== -->
                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Ofertas' : 'Special Deals' }}</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @foreach($special_deals as $spd)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a href="{{ url('product/details/'.$spd->id.'/'.$spd->product_slug_en)}}"> <img style="height: 80px;" src="{{ asset($spd->product_thumnail) }}" alt="">
                                                                    </a> 
                                                                </div>
                                                                <!-- /.image -->
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    <a href="{{ url('product/details/'.$spd->id.'/'.$spd->product_slug_en)}}">
                                                                        {{ session()->get('language') == 'portuguese' ? $spd->product_name_pt : $spd->product_name_en }}
                                                                    </a>
                                                                 </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> 
                                                                    <span class="price">
                                                                        {{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} 
                                                                        @php
                                                                            $amount = $spo->selling_price - $spo->discount_price;
                                                                            $price = $amount;   
                                                                        @endphp
                                                                        {{ $price }}
                                                                    </span> 
                                                                </div>
                                                                <!-- /.product-price -->
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Fique Atento' : 'Newsletters' }}</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>{{ session()->get('language') == 'portuguese' ? 'Receba Nossas Ofertas' : 'Sign Up for Our Newsletter!' }}</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="{{ session()->get('language') == 'portuguese' ? 'Inscreva-se Agora Mesmo' : 'Subscribe to our newsletter' }}">
                                </div>
                                <button class="btn btn-primary">{{ session()->get('language') == 'portuguese' ? 'Inscrever-se' : 'Subscribe' }}</button>
                            </form>
                        </div><!-- /.sidebar-widget-body -->
                    </div>
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img
                                        src="{{ asset('frontend/assets/images/testimonials/member1.png') }}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img
                                        src="{{ asset('frontend/assets/images/testimonials/member3.png') }}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img
                                        src="{{ asset('frontend/assets/images/testimonials/member2.png') }}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->

                    <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}"
                            alt="Image"> </div>
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

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

                    <!-- ========================================= SECTION – SLIDER : END ========================================= -->

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
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
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
                                                                    <div class="
                                                                tag new"><span>new</span></div>
                                                        @else
                                                            <div class="tag hot"><span>{{ round($discount, 2) }}
                                                                    %</span></div>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.product-image -->

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
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                                    title="{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}">
                                                    <i class="fa fa-shopping-cart"></i> </button>
                                            </li>
                                            <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart"
                                                    href="detail.html"
                                                    title="{{ session()->get('language') == 'portuguese' ? 'Favoritos' : 'Wishlist' }}">
                                                    <i class="icon fa fa-heart"></i>
                                                </a> </li>
                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                    href="detail.html"
                                                    title="{{ session()->get('language') == 'portuguese' ? 'Comparar' : 'Compare' }}">
                                                    <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                    @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>

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
                                                    <div class="
                                                tag new"><span>new</span></div>
                                        @else
                                            <div class="tag hot"><span>{{ round($discount, 2) }}
                                                    %</span></div>
                        @endif
                    </div>

                </div>
                <!-- /.product-image -->

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
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                    title="{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}">
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
                <!-- /.cart -->
            </div>
            <!-- /.product -->

    </div>
    <!-- /.products -->
    </div>
    <!-- /.item -->
    @empty
        <h5 class="text-danger">No Product Found</h5>
        @endforelse
        </div>
        <!-- /.home-owl-carousel -->
        </div>
        <!-- /.product-slider -->
        </div>
        @endforeach

        </div>
        <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
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
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

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
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                        class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart' }}</button>
                                            </li>
                                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"> 
                                                <i class="icon fa fa-heart"></i> </a> </li>
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
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

        <!-- ============================================== WIDE PRODUCTS ============================================== -->
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
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

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
        <!-- ============================================== BEST SELLER : END ============================================== -->

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
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

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
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
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
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
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
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
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
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
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
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
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
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
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
            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

        </div>
        <!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        </div>
        </div>
    @endsection
