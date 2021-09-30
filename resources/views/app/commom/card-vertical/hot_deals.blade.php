@php
    $hot_deals = App\Models\Product::where('hot_deals', 1)->where('status', 1)->where('discount_price', '>', 0)->inRandomOrder()->limit(5)->get();
@endphp

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
                                    <button class="btn btn-primary cart-btn" type="button" data-toggle="modal" data-target="#addCart" id="{{$hd->id}}" onclick="productView(this.id)">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Add to cart'}}</button>

                                </div>
                            </div><!-- /.action -->
                        </div><!-- /.cart -->
                    </div>
                </div>
            @endforeach 
    </div>
    <!-- /.sidebar-widget -->
</div>

