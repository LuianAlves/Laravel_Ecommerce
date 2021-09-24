@php
    $tags_en = App\Models\Product::groupBy('product_tag_en')->select('product_tag_en')->get();   
    $tags_pt = App\Models\Product::groupBy('product_tag_pt')->select('product_tag_pt')->get();   
@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Produto Tags' : 'Product tags'}}</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list"> 
            @if( session()->get('language') == 'portuguese')
                @foreach($tags_pt as $tag)
                    <a class="item" href="{{ url('product/tags/'.$tag->product_tag_pt) }}">{{ str_replace(',', ' ', $tag->product_tag_pt) }}</a> 
                @endforeach 
            @else
                @foreach($tags_en as $tag)
                    <a class="item" href="{{ url('product/tags/'.$tag->product_tag_en) }}">{{ str_replace(',', ' ', $tag->product_tag_en) }}</a> 
                @endforeach
            @endif
        </div>
    </div>
</div>