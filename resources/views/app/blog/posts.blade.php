@extends('app.main_template')
@section('content')

@section('title')
    Blog 
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
					@foreach($blog_post as $post)
						<div class="blog-post wow fadeInUp" style="margin-bottom: 20px;">
							<a href="blog-details.html"><img class="img-responsive" src="{{ asset($post->post_image) }}" alt=""></a>
							<h1><a href="{{ route('blog.details', $post->id) }}">{{ session()->get('language') == 'portuguese' ? $post->post_title_pt : $post->post_title_en }}</a></h1>
							<span class="author">John Doe</span>
							<span class="review">6 Comments</span>
							<span class="date-time">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
							<p>{!! session()->get('language') == 'portuguese' ? Str::limit($post->post_details_pt, 250) : Str::limit($post->post_details_en, 250) !!}</p>
							
                            <a href="{{ route('blog.details', $post->id) }}" class="btn btn-upper btn-primary read-more">read more</a>

						</div>
					@endforeach
					
                    <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                        style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        
                        {{-- Search --}}
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>
                                </div>
                            </form>
                        </div>

                        {{-- Banner --}}
                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div>

                        <!-- ==============================================CATEGORY============================================== -->                       
                        @include('app.blog.commom.blog_category')

                        <!-- ==============================================TAB WIDGET============================================== -->
                        @include('app.blog.commom.tab_widget')

                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                        @include('app.commom.tags')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection