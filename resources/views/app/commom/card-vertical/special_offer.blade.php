@php
    $special_offer = App\Models\Product::where('special_offer', 1)->where('status', 1)->inRandomOrder()->limit(4)->get(); 
@endphp

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