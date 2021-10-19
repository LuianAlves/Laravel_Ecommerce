@php
    $recent_post = App\Models\Blog\BlogPost::orderBy('id', 'DESC')->limit(2)->get();
    $popular_post = App\Models\Blog\BlogPost::inRandomOrder()->limit(2)->get();
@endphp


<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">tab widget</h3>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
        <li><a href="#recent" data-toggle="tab">recent post</a></li>
    </ul>
    <div class="tab-content" style="padding-left:0">
        {{-- Popular --}}
        <div class="tab-pane active m-t-20" id="popular">
            @foreach($popular_post as $post)
                <div class="blog-post inner-bottom-30 ">
                    <img class="img-responsive" src="{{ asset($post->post_image) }}"
                        alt="">
                    <h4><a href="{{ route('blog.details', $post->id) }}">{{ session()->get('language') == 'portuguese' ? $post->post_title_pt : $post->post_title_en }}</a></h4>
                    <span class="review">6 Comments</span>
                    <span class="date-time">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                    <p>{!! session()->get('language') == 'portuguese' ? Str::limit($post->post_details_pt, 35) : Str::limit($post->post_details_en, 35) !!}</p>

                </div>
            @endforeach
        </div>

        {{-- Recent --}}
        <div class="tab-pane m-t-20" id="recent">
            @foreach($recent_post as $post)
                <div class="blog-post inner-bottom-30">
                    <img class="img-responsive" src="{{ asset($post->post_image) }}"
                        alt="">
                    <h4><a href="blog-details.html">{{ session()->get('language') == 'portuguese' ? $post->post_title_pt : $post->post_title_en }}</a></h4>
                    <span class="review">6 Comments</span>
                    <span class="date-time">{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }} </span>
                    <p>{!! session()->get('language') == 'portuguese' ? Str::limit($post->post_details_pt, 35) : Str::limit($post->post_details_en, 35) !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>