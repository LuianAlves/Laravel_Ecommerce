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

        <!-- sidebar menu-->
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
                    <li class="{{ $route == 'pending.order' ? 'active' : '' }}">
                        <a href="{{ route('pending.view') }}"><i class="ti-more"></i>Pending Orders</a>
                    </li>
                    <li class="{{ $route == 'confirmed.order' ? 'active' : '' }}">
                        <a href="{{ route('confirmed.view') }}"><i class="ti-more"></i>Confirmed Orders</a>
                    </li> 
                    <li class="{{ $route == 'processing.order' ? 'active' : '' }}">
                        <a href="{{ route('processing.view') }}"><i class="ti-more"></i>Processing Orders</a>
                    </li> 
                    {{-- <li class="{{ $route == 'picked.order' ? 'active' : '' }}">
                        <a href="{{ route('picked.view') }}"><i class="ti-more"></i>Picked Orders</a>
                    </li>
                    <li class="{{ $route == 'shipped.order' ? 'active' : '' }}">
                        <a href="{{ route('shipped.view') }}"><i class="ti-more"></i>Shipped Orders</a>
                    </li>
                    <li class="{{ $route == 'delivered.order' ? 'active' : '' }}">
                        <a href="{{ route('delivered.view') }}"><i class="ti-more"></i>Delivered Orders</a>
                    </li>
                    <li class="{{ $route == 'cancel.order' ? 'active' : '' }}">
                        <a href="{{ route('cancel.view') }}"><i class="ti-more"></i>Cancel Orders</a> 
                    </li> --}}
                </ul>
            </li>

            {{-- ---------------------- --}}
            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather=""></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">

                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>


            {{-- ----------------------- --}}
            <li class="header nav-small-cap">EXTRA</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="layers"></i>
                    <span>Multilevel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Level One</a></li>
                    <li class="treeview">
                        <a href="#">Level One
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Level Two</a></li>
                            <li class="treeview">
                                <a href="#">Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Level Three</a></li>
                                    <li><a href="#">Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Level One</a></li>
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
