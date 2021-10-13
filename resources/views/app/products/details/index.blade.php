@extends('app.main_template')
@section('content')

@section('title')
{{ session()->get('language') == 'portuguese' ? $products->product_name_pt.' - Detalhes do Produto' : $products->product_name_en.' - Product Details' }}
@endsection

    
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">{{ $products->category_name_en }}</a></li>
                    <li class='active'>{{ $products->sub_subcategory_id }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>

                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n" style="margin-bottom: 30px;">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                        </div>

                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('app.commom.card-vertical.hot_deals')

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        @include('app.commom.card-vertical.newsletter')

                        <!-- ============================================== PRODUCTS TAGS ============================================== -->
                        @include('app.commom.tags')

                        <!-- ============================================== Testimonials============================================== -->
                        @include('app.commom.card-vertical.testimonials')
                        

                    </div>
                </div>

                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        @foreach($images as $img)
                                            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->photo_name) }}">
                                                    <img class="img-responsive" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            @foreach($images as $img)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                        data-slide="1" href="#slide{{$img->id}}">
                                                        <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="pname">{{ session()->get('language') == 'portuguese' ? $products->product_name_pt : $products->product_name_en }}</h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Row Stock --}}
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">{{ session()->get('language') == 'portuguese' ? 'Disponível em Estoque' : 'Availability in Stock'}}: <strong class="text-danger">{{ $products->product_qty }}</strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Short Description --}}
                                    <div class="description-container m-t-20">
                                        {{ session()->get('language') == 'portuguese' ? $products->short_descp_pt : $products->short_descp_en }}
                                    </div>

                                    {{-- Row Prices --}}
                                    <div class="price-container info-container m-t-20">
                                        <div class="row">

                                            {{-- Prices --}}
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if($products->discount_price == null || $products->discount_price == 0)
                                                        <span class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} {{ $products->selling_price }}</span>
                                                    @else
                                                    @php
                                                        $amount = $products->discount_price;
                                                        $price = $products->selling_price - $amount;   
                                                    @endphp
                                                        <span class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} {{ $price }}</span>
                                                        <span class="price-strike">{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} {{ $products->selling_price }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            {{-- Buttons Favorite --}}
                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <button type="button" class="btn btn-primary" id="{{$products->id}}" onclick="addWishlist(this.id)"" data-toggle="tooltip" data-placement="right" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    {{-- Colors / Sizers --}}                                  
                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            @if($products->product_color_en || $products->product_color_pt != NULL)
                                                <div class="form-group">
                                                    <label class="info-title control-label">{{ session()->get('language') == 'portuguese' ? 'Cor' : 'Choose Color' }}<span class="text-danger"> *</span></label>
                                                    <select class="form-control unicase-form-control selectpicker" id="color" required>
                                                        @if(session()->get('language') == 'portuguese')
                                                            @foreach($product_color_pt as $color_pt)
                                                                <option value="{{$color_pt}}">{{ $color_pt }}</option>
                                                            @endforeach
                                                        @else    
                                                            @foreach($product_color_en as $color_en)
                                                                <option value="{{$color_en}}">{{ $color_en }}</option>
                                                            @endforeach
                                                        @endif    
                                                    </select>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            @if($products->product_size_en || $products->product_size_pt != NULL)
                                                <div class="form-group">
                                                    <label class="info-title control-label">{{ session()->get('language') == 'portuguese' ? 'Tamanho' : 'Choose Size' }}<span class="text-danger"> *</span></label>
                                                    <select class="form-control unicase-form-control selectpicker" id="size" required>
                                                        @if(session()->get('language') == 'portuguese')
                                                            @foreach($product_size_pt as $size_pt)
                                                                <option value="{{ $size_pt }}">{{ ucfirst($size_pt) }}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($product_size_en as $size_en)
                                                                <option value="{{ $size_en }}">{{ ucfirst($size_en) }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            @endif    
                                        </div>
                                    </div>
                                    
                                    {{-- Row Qty --}}
                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            {{-- Quantity --}}
                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <input type="number" id="qty" value="1" min="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" id="product_id" value="{{ $products->id }}" min="1">

                                            {{-- Add Cart --}}
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary" onclick="addToCart()">
                                                    <i class="fa fa-shopping-cart inner-right-vs"></i> 
                                                    {{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to Cart'}}
                                                </button>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">{{ session()->get('language') == 'portuguese' ? 'DESCRIÇÃO' : 'DESCRIPTION'}}</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#review">{{ session()->get('language') == 'portuguese' ? 'COMENTÁRIOS' : 'REVIEW'}}</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                {!! session()->get('language') == 'portuguese' ? $products->long_descp_pt : $products->long_descp_en !!}
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">{{ session()->get('language') == 'portuguese' ? 'Opinião dos Consumidores' : 'Customer Reviews'}}</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love
                                                                this product</span><span class="date"><i
                                                                    class="fa fa-calendar"></i><span>1 days
                                                                    ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing elit.Aliquam suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Quality</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Price</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Value</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review"
                                                                            id="exampleInputReview" rows="4"
                                                                            placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD
                                                        TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                        single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Produtos Relacionados' : 'upsell products' }}</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($related_prod as $prod)
                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    @if(session()->get('language') == 'portuguese')
                                                        <a href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_pt) }}">
                                                    @else
                                                        <a href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_en) }}">
                                                    @endif
                                                            <img src="{{ asset($prod->product_thumnail)}}" alt="">
                                                        </a>
                                                </div>

                                            </div>


                                            <div class="product-info text-left">

                                                <h3 class="name">
                                                    @if(session()->get('language') == 'portuguese')
                                                        <a href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_pt) }}">
                                                    @else
                                                        <a href="{{ url('product/details/'.$prod->id.'/'.$prod->product_slug_en) }}">
                                                    @endif
                                                            {{ session()->get('language') == 'portuguese' ? $prod->product_name_pt : $prod->product_name_en }}
                                                        </a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">
                                                    @php
                                                        $amount = $prod->selling_price;
                                                        $price = $amount - $prod->discount_price;    
                                                    @endphp

                                                    <span class="price">
                                                        {{$price}} 
                                                    </span>
                                                    <span class="price-before-discount">
                                                        {{$prod->selling_price}}
                                                    </span>
                                                </div>

                                            </div>

                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to
                                                                cart</button>

                                                        </li>

                                                        <li class="lnk wishlist">
                                                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>

                                                        <li class="lnk">
                                                            <a class="add-to-cart" href="detail.html" title="Compare">
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
