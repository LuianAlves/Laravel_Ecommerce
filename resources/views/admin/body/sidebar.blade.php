@php // Active no sidebar
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ url('/admin/dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Ecommerce</b></h3>
                    </div>
                </a>
            </div>
        </div>

        
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- Brand --}}
            <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'brand.index' ? 'active' : '' }}"><a
                            href="{{ route('brand.index') }}"><i class="ti-more"></i>All Brands</a></li>
                </ul>
            </li>
            {{-- Categories --}}
            <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'category.index' ? 'active' : '' }}"><a
                            href="{{ route('category.index') }}"><i class="ti-more"></i>All Category</a></li>
                    <li class="{{ $route == 'subcategory.index' ? 'active' : '' }}"><a
                            href="{{ route('subcategory.index') }}"><i class="ti-more"></i>All SubCategory</a>
                    </li>
                    <li class="{{ $route == 'sub_subcategory.index' ? 'active' : '' }}"><a
                            href="{{ route('sub_subcategory.index') }}"><i class="ti-more"></i>All Sub
                            SubCategory</a></li>
                </ul>
            </li>
            {{-- Products --}}
            <li class="treeview {{ $prefix == '/products' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu {{ $prefix == '/products' ? 'active' : '' }}">
                    <li class="{{ $route == 'product.index' ? 'active' : '' }}"><a
                            href="{{ route('product.index') }}"><i class="ti-more"></i>Products</a></li>
                    <li class="{{ $route == 'product.create' ? 'active' : '' }}"><a
                            href="{{ route('product.create') }}"><i class="ti-more"></i>Add Product</a></li>
                </ul>
            </li>
            {{-- Sliders --}}
            <li class="treeview {{ $prefix == '/sliders' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Sliders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu {{ $prefix == '/sliders' ? 'active' : '' }}">
                    <li class="{{ $route == 'slider.index' ? 'active' : '' }}"><a
                            href="{{ route('slider.index') }}"><i class="ti-more"></i>Sliders</a></li>
                </ul>
            </li>
            {{-- Coupons --}}
            <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="book"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu {{ $prefix == '/sliders' ? 'active' : '' }}">
                    <li class="{{ $route == 'coupon.index' ? 'active' : '' }}">
                        <a href="{{ route('coupon.index') }}"><i class="ti-more"></i>Coupons</a>
                    </li>
                </ul>
            </li>
            {{-- Shipping Division --}}
            <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="box"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu {{ $prefix == '/shipping' ? 'active' : '' }}">
                    <li class="{{ $route == 'division.index' ? 'active' : '' }}">
                        <a href="{{ route('division.index') }}"><i class="ti-more"></i>Ship Division</a>
                    </li>
                    <li class="{{ $route == 'state.index' ? 'active' : '' }}">
                        <a href="{{ route('state.index') }}"><i class="ti-more"></i>Ship State</a>
                    </li>
                    <li class="{{ $route == 'district.index' ? 'active' : '' }}">
                        <a href="{{ route('district.index') }}"><i class="ti-more"></i>Ship District</a>
                    </li>
                </ul>
            </li>

            {{-- ---------------------- --}}
            <li class="header nav-small-cap">User Interface</li>

            {{-- Orders --}}
            <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="shopping-cart"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu {{ $prefix == '/orders' ? 'active' : '' }}">
                    <li class="{{ $route == 'pending.view' ? 'active' : '' }}">
                        <a href="{{ route('pending.view') }}"><i class="ti-more"></i>Pending Orders</a>
                    </li>
                    <li class="{{ $route == 'confirmed.view' ? 'active' : '' }}">
                        <a href="{{ route('confirmed.view') }}"><i class="ti-more"></i>Confirmed Orders</a>
                    </li> 
                    <li class="{{ $route == 'processing.view' ? 'active' : '' }}">
                        <a href="{{ route('processing.view') }}"><i class="ti-more"></i>Processing Orders</a>
                    </li> 
                    <li class="{{ $route == 'picked.view' ? 'active' : '' }}">
                        <a href="{{ route('picked.view') }}"><i class="ti-more"></i>Picked Orders</a>
                    </li>
                    <li class="{{ $route == 'shipped.view' ? 'active' : '' }}">
                        <a href="{{ route('shipped.view') }}"><i class="ti-more"></i>Shipped Orders</a>
                    </li>
                    <li class="{{ $route == 'delivered.view' ? 'active' : '' }}">
                        <a href="{{ route('delivered.view') }}"><i class="ti-more"></i>Delivered Orders</a>
                    </li>
                    <li class="{{ $route == 'cancel.view' ? 'active' : '' }}">
                        <a href="{{ route('cancel.view') }}"><i class="ti-more"></i>Cancel Orders</a> 
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'report.index' ? 'active' : '' }}"><a href="{{route('report.index')}}"><i class="ti-more"></i>All Reports</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/registered/user' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="user"></i>
                    <span>Register Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'users.index' ? 'active' : '' }}"><a href="{{route('users.index')}}"><i class="ti-more"></i>All Users</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/blog' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="aperture"></i>
                    <span>Manage Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'blog.category.index' ? 'active' : '' }}"><a href="{{route('blog.category.index')}}"><i class="ti-more"></i>Blog Category</a></li>
                
                    <li class="{{ $route == 'blog.post.create' ? 'active' : '' }}"><a href="{{route('blog.post.create')}}"><i class="ti-more"></i>Add Post</a></li>
                
                    <li class="{{ $route == 'blog.post.index' ? 'active' : '' }}"><a href="{{route('blog.post.index')}}"><i class="ti-more"></i>All Posts</a></li>
                </ul>
            </li>

            {{-- ----------------------- --}}
            <li class="header nav-small-cap">Admin Control</li>

            {{-- Stock Control --}}
            <li class="treeview {{ $prefix == '/stock' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="speaker"></i>
                    <span>Product Stock</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'product.stock' ? 'active' : '' }}"><a href="{{route('product.stock')}}"><i class="ti-more"></i>Product Stock</a></li>
                </ul>
            </li>

            {{-- Return Orders --}}
            <li class="treeview {{ $prefix == '/return' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="film"></i>
                    <span>Return Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'return.request' ? 'active' : '' }}"><a href="{{route('return.request')}}"><i class="ti-more"></i>Return Request</a></li>
                    <li class="{{ $route == 'all.request' ? 'active' : '' }}"><a href="{{route('all.request')}}"><i class="ti-more"></i>All Request</a></li>
                </ul>
            </li>

            {{-- Aprove Reviews --}}
            <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="trending-up"></i>
                    <span>Reviews Manage</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'review.pedding' ? 'active' : '' }}"><a href="{{route('review.pedding')}}"><i class="ti-more"></i>Pedding Reviews</a></li>
                    <li class="{{ $route == 'review.publish' ? 'active' : '' }}"><a href="{{route('review.publish')}}"><i class="ti-more"></i>Publish Review</a></li>
                </ul>
            </li>

            {{-- ----------------------- --}}
            <li class="header nav-small-cap">Settigns</li>

            {{-- Settings Site --}}
            <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="cpu"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'setting.site.index' ? 'active' : '' }}"><a href="{{route('setting.site.index')}}"><i class="ti-more"></i>Setting Footer</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.logout') }}">
                    <i data-feather="lock"></i>
                    <span class="text-danger">Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
