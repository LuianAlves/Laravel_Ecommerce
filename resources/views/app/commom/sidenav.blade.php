@php
    $category = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach ($category as $cat)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon {{ $cat->category_icon }}" aria-hidden="true"></i>
                        {{ session()->get('language') == 'portuguese' ? $cat->category_name_pt : $cat->category_name_en }}
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategory = App\Models\SubCategory::where('category_id', $cat->id)
                                        ->orderBy('subcategory_name_en', 'ASC')
                                        ->get();
                                @endphp

                                @foreach ($subcategory as $subcat)
                                    <div class="col-sm-12 col-md-3">
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
                                            $subsubcategory = App\Models\SubSubCategory::where('subcategory_id', $subcat->id)
                                                ->orderBy('sub_subcategory_name_en', 'ASC')
                                                ->get();
                                        @endphp

                                        @foreach ($subsubcategory as $subsubcat)
                                            <ul class="links list-unstyled">
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
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                </li>
            @endforeach

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>