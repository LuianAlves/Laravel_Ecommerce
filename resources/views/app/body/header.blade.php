<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @auth
                            <li><a href="{{ route('wishlist.index') }}"><i class="icon fa fa-heart"></i> @if (session()->get('language') == 'portuguese') Favoritos @else Wishlist @endif</a></li>
                        @endauth
                        <li><a href="{{ route('myCart.index') }}"><i class="icon fa fa-shopping-cart"></i> @if (session()->get('language') == 'portuguese') Carrinho @else My Cart @endif</a></li>
                        
                        @auth  
                        <li><a href="{{ route('checkout.index') }}"><i class="icon fa fa-check"></i>@if (session()->get('language') == 'portuguese') Finalizar @else Checkout @endif</a></li>
                        <li><a href="" type="button" data-toggle="modal" data-target="#orderTrack"><i class="icon fa fa-check"></i>{{ session()->get('language') == 'portuguese' ? 'Rastrear Pedido' : 'Order Tracking' }}</a></li>
        
                        <li>
                            <a href="{{ url('/user/profile') }}"><i class="icon fa fa-user"></i>{{ session()->get('language') == 'portuguese' ? 'Minha Conta' : 'My Account' }}</a>
                        </li>
                        <li>
                            <a href="{{ url('/user/logout') }}">{{ session()->get('language') == 'portuguese' ? 'Deslogar' : 'Logout' }}</a>
                        </li>
                        @else
                        <li><a href="{{ url('/login') }}"><i
                            class="icon fa fa-lock"></i>{{ session()->get('language') == 'portuguese' ? 'Entrar / Registrar' : 'Login / Register' }}</a>
                        </li>
                        @endauth

                    </ul>
                </div>

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                data-toggle="dropdown"><span
                                    class="value">{{ session()->get('language') == 'portuguese' ? 'Moeda' : 'Coin' }}
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">BRL</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                data-toggle="dropdown"><span class="value">
                                    @if (session()->get('language') == 'portuguese') Portugu??s @else English @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('language') == 'portuguese')
                                    <li><a href="{{ route('language.english') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('language.portuguese') }}">Portugu??s</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- ============================================== Barra de Pesquisa ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 logo-holder">

                    @php
                        $setting = App\Models\SiteSetting::first();
                    @endphp
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        @if(!empty($setting->logo))
                            <a href="{{ url('/') }}"> 
                                <img src="{{ asset($setting->logo) }}" alt="logo" style="width: 120px; height: 50px;">
                            </a> 
                        @else
                            <span style="font-size: 26px; color: #fff; font-weight: bold;">LOGO</span><br>
                            <span style="color: #fff;">Adicione uma logo atravez do dashboard em Settings->setting footer</span>
                        @endif
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-11 col-sm-11 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form action="{{ route('product.search') }}" method="post">
                            @csrf
                            <div class="control-group">
                                <input name="search" class="search-field" placeholder="{{ session()->get('language') == 'portuguese' ? 'Pesquisar aqui...' : 'Search here...' }}" />
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-4 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count"><strong><span class="count" id="cartQty"> </span></strong></div>
                                <div class="total-price-basket"> 
                                    <span class="lbl">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'cart' }} -</span> 
                                    <span class="total-price"> 
                                        <span class="sign">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} </span>
                                        <span class="value" id="cartSubTotal"> </span> 
                                    </span> 
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                {{-- Mini Cart com AJAX --}}
                                    <div id="miniCart"></div>
                                {{-- END: Mini Cart com AJAX --}}

                                <div class="clearfix cart-total">
                                    <div class="pull-right"> 
                                        <span class="text">Sub Total: </span>
                                        <span class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} </span>
                                        <span class='price' id="cartSubTotal"></span> 
                                    </div>
                                    <div class="clearfix"></div>
                                    @auth  
                                        <a href="{{ route('checkout.index') }}" class="btn btn-upper btn-primary btn-block m-t-20">{{ session()->get('language') == 'portuguese' ? 'Finalizar' : 'Checkout' }}</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-upper btn-primary btn-block m-t-20">Login</a>
                                    @endauth
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active"> 
                                    <a href="{{ url('/') }}">{{ session()->get('language') == 'portuguese' ? '??nicio' : 'Home'}}</a>
                                </li>

                                @php
                                    $category = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp

                                @foreach ($category as $cat)
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">{{ session()->get('language') == 'portuguese' ? $cat->category_name_pt : $cat->category_name_en }}</a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">

                                                        @php
                                                            $subcategory = App\Models\SubCategory::where('category_id', $cat->id)->orderBy('subcategory_name_en', 'ASC')->get();  
                                                        @endphp

                                                        @foreach($subcategory as $subcat)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                                @if(session()->get('language') == 'portuguese')
                                                                    <a href="{{ url('subcategory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_pt) }}">
                                                                @else
                                                                    <a href="{{ url('subcategory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en) }}">
                                                                @endif
                                                                        <h2 class="title">
                                                                            {{ session()->get('language') == 'portuguese' ? $subcat->subcategory_name_pt : $subcat->subcategory_name_en }}
                                                                        </h2>
                                                                    </a>

                                                                @php
                                                                    $sub_subcategory = App\Models\SubSubCategory::where('subcategory_id', $subcat->id)->orderBy('sub_subcategory_name_en', 'ASC')->get();
                                                                @endphp

                                                                @foreach ($sub_subcategory as $subsubcat)
                                                                    <ul class="links">
                                                                        <li>
                                                                            @if(session()->get('language') == 'portuguese')
                                                                                <a href="{{ url('subcategory/subsubcategory/product/'.$subsubcat->id.'/'.$subsubcat->sub_subcategory_slug_pt) }}">
                                                                            @else    
                                                                                <a href="{{ url('subcategory/subsubcategory/product/'.$subsubcat->id.'/'.$subsubcat->sub_subcategory_slug_en) }}">
                                                                            @endif
                                                                                    {{ session()->get('language') == 'portuguese' ? $subsubcat->sub_subcategory_name_pt : $subsubcat->sub_subcategory_name_en }}
                                                                                </a>
                                                                        </li>  
                                                                    </ul>
                                                                @endforeach
                                                            </div>
                                                        @endforeach   
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                                <li> <a href="{{ url('/shop/view') }}">{{ session()->get('language') == 'portuguese' ? 'Compras' : 'Shop'}}</a> </li>
                                <li class="dropdown  navbar-right special-menu"> <a href="#">{{ session()->get('language') == 'portuguese' ? 'Ofertas de Hoje' : 'Todays offer'}}</a> </li>
                                <li class="dropdown  navbar-right special-menu"> <a href="{{ route('blog.home') }}">Blog</a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>


    {{-- ============ MODAL ORDER TRACKING ============ --}}
    <div class="modal fade" id="orderTrack" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ session()->get('language') == 'portuguese' ? 'Rastreie seu Pedido' : 'Track Your Order' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="{{ route('order.tracking') }}" method="post">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ session()->get('language') == 'portuguese' ? 'C??digo do Pedido' : 'Invoice Code' }} <span class="text-danger"> *</span></label>
                            <input class="form-control" type="text" name="code" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-md btn-success" type="submit">{{ session()->get('language') == 'portuguese' ? 'Rastrear' : 'Track' }}</button>
                            </div>  
                        </div>                    
                    </div>
                </form>

            </div>
        </div>
    </div>

</header>
