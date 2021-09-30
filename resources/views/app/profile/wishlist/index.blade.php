@extends('app.main_template')
@section('content')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Minha Lista' : 'My Wishlist' }}
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">{{ session()->get('language') == 'portuguese' ? 'Início' : 'Home' }}</a></li>
                <li><a href="#">{{ session()->get('language') == 'portuguese' ? 'Minha Lista' : 'My Wishlist' }}</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content">
    <div class="container">
        <div class="row single-product">

            {{-- Sidebar --}}
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n" style="margin-bottom: 30px;">
                        <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                    </div>
    
                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('app.commom.card-vertical.hot_deals')
    
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    @include('app.commom.card-vertical.newsletter')

                    <!-- ============================================== SPECIAL OFFER ============================================== -->
                    @include('app.commom.card-vertical.special_offer')
    
                    <!-- ============================================== PRODUCTS TAGS ============================================== -->
                    @include('app.commom.tags')
    
                    <!-- ============================================== Testimonials============================================== -->
                    @include('app.commom.card-vertical.testimonials')
                    
    
                </div>
            </div>
            
            {{-- Wishlist --}}
            <div class="col-md-9">
                <div class="my-wishlist-page">
                    <div class="row">
                        <div class="col-md-12 my-wishlist">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="heading-title">{{ session()->get('language') == 'portuguese' ? 'Minha Lista' : 'My Wishlist' }}</th>
                                        </tr>
                                    </thead>
        
                                    <tbody id="wishlist">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="clearfix"></div>
        </div>
        
    </div>
</div>
@endsection
