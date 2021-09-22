@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Edit Product</h4>
                            <a href="{{ route('product.index') }}" class="btn btn-success btn-md font-weight-bold float-right">Manage Products</a>
                            <a href="{{ route('product.edit.images', $products->id) }}" class="btn btn-warning btn-md font-weight-bold float-right mr-2">Update Images</a>
                        </div>

                        <div class="box-body">
                            <form method="post" action="{{ route('product.update') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $products->id }}">
                                {{-- Brand/Category/SCategory --}}
                                <div class="row"> {{-- 1st row --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>{{ __('Brand Select') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select class="form-control" name="brand_id" required>
                                                    <option selected disabled>Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ $brand->id == $products->brand_id ? 'selected' : '' }}>
                                                            {{ $brand->brand_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>{{ __('Category Select') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select required class="form-control" name="category_id">
                                                    <option selected disabled>Select Category</option>
                                                    @foreach ($category as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ $cat->id == $products->category_id ? 'selected' : '' }}>
                                                            {{ $cat->category_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>{{ __('SubCategory Select') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select required class="form-control" name="subcategory_id">
                                                    <option selected disabled>Select SubCategory</option>
                                                    @foreach ($subcategory as $subcat)
                                                        <option value="{{ $subcat->id }}"
                                                            {{ $subcat->id == $products->subcategory_id ? 'selected' : '' }}>
                                                            {{ $subcat->subcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 1st row -->

                                {{-- SubSCategory/Name --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 2st row -->
                                    <div class="col-md-4">
                                        <!-- Select Sub Subcategory-->
                                        <div class="form-group">
                                            <h5>{{ __('Sub SubCategory') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select required class="form-control" id="sub_subcategory_id"
                                                    name="sub_subcategory_id">
                                                    <option selected disabled>Select Sub SubCategory</option>
                                                    @foreach ($subsubcategory as $subsubcat)
                                                        <option value="{{ $subsubcat->id }}"
                                                            {{ $subsubcat->id == $products->sub_subcategory_id ? 'selected' : '' }}>
                                                            {{ $subsubcat->sub_subcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sub_subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"> {{-- Product Name En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Name En') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_name_en"
                                                    value="{{ $products->product_name_en }}">
                                                @error('product_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"> {{-- Product Name En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Name Pt') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_name_pt"
                                                    value="{{ $products->product_name_pt }}">
                                                @error('product_name_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 2st row -->

                                {{-- Code/Qty --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 3st row -->
                                    <div class="col-md-4"> {{-- Product Code --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Code') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_code"
                                                    value="{{ $products->product_code }}">
                                                @error('product_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"> {{-- Product Quantity --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Quantity') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_qty"
                                                    value="{{ $products->product_qty }}">
                                                @error('product_qty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 3st row -->

                                {{-- Tags --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 4st row -->
                                    <div class="col-md-6"> {{-- Product Name En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Tags En') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_tag_en"
                                                    value="{{ $products->product_tag_en }}" data-role="tagsinput">
                                                @error('product_tag_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Product Tags Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Tags Pt') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_tag_pt"
                                                    value="{{ $products->product_tag_pt }}" data-role="tagsinput">
                                                @error('product_tag_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 4st row -->

                                {{-- Size --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 5st row -->
                                    <div class="col-md-6"> {{-- Product Size En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Size En') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="product_size_en"
                                                    value="{{ $products->product_size_en }}" data-role="tagsinput">
                                                @error('product_size_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Product Size Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Size Pt') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="product_size_pt"
                                                    value="{{ $products->product_size_pt }}" data-role="tagsinput">
                                                @error('product_size_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 5st row -->

                                {{-- Color --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 6st row -->
                                    <div class="col-md-6"> {{-- Product Color En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Color En') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_color_en"
                                                    value="{{ $products->product_color_en }}" data-role="tagsinput">
                                                @error('product_color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Product Color Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Color Pt') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_color_pt"
                                                    value="{{ $products->product_color_pt }}" data-role="tagsinput">
                                                @error('product_color_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 6st row -->

                                {{-- Seling/Discount --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 7st row -->
                                    <div class="col-md-4"> {{-- Product Selling Price --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Selling Price') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <input class="form-control" required type="number" name="selling_price"
                                                    value="{{ $products->selling_price }}">
                                                @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"> {{-- Product Discount Price --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Discount Price') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <input class="form-control" type="number" name="discount_price"
                                                    value="{{ $products->discount_price }}">
                                                @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 7st row -->

                                {{-- Description Short --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 9st row -->
                                    <div class="col-md-6"> {{-- Short Description En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Short Description En') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <textarea name="short_descp_en" id="short_descp_en" class="form-control"
                                                    rows="5">{!! $products->short_descp_en !!}</textarea>
                                                @error('long_descp_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Short Description Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Short Description Pt') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <textarea name="short_descp_pt" id="short_descp_pt" class="form-control"
                                                    rows="5">{!! $products->short_descp_pt !!}</textarea>
                                                @error('long_descp_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 9st row -->

                                {{-- Description Long --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 10st row -->
                                    <div class="col-md-6"> {{-- Long Description En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Long Description En') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <textarea id="editor1" name="long_descp_en" class="form-control"
                                                    rows="10" cols="80">{!! $products->long_descp_en !!}</textarea>
                                                @error('long_descp_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Long Description Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Long Description Pt') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <textarea id="editor2" name="long_descp_pt" class="form-control"
                                                    rows="10" cols="80">{!! $products->long_descp_pt !!}</textarea>
                                                @error('long_descp_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 10st row -->

                                <hr>

                                {{-- Checkbox --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 10st row -->
                                    <div class="col-md-5 offset-2">
                                        <div class="form-group">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" id="md_checkbox_21" name="hot_deals" value="1"
                                                    {{ $products->hot_deals == 1 ? 'checked' : '' }}
                                                    class="filled-in chk-col-danger" />
                                                <label for="md_checkbox_21">Hot Deals</label>
                                                <input type="checkbox" id="md_checkbox_23" name="featured" value="1"
                                                    {{ $products->featured == 1 ? 'checked' : '' }}
                                                    class="filled-in chk-col-warning" />
                                                <label for="md_checkbox_23">Featured</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" id="md_checkbox_27" name="special_offer" value="1"
                                                    {{ $products->special_offer == 1 ? 'checked' : '' }}
                                                    class="filled-in chk-col-success" />
                                                <label for="md_checkbox_27">Special Offers</label>
                                                <input type="checkbox" id="md_checkbox_29" name="special_deals" value="1"
                                                    {{ $products->special_deals == 1 ? 'checked' : '' }}
                                                    class="filled-in chk-col-primary" />
                                                <label for="md_checkbox_29">Special Deals</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 10st row -->

                                {{-- Button Submit --}}
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-md btn-info float-right">Update Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {

            // Atualizando o valor de subcategory quando utilizar o select category
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val()

                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",

                        success: function(data) {

                            $('select[name="sub_subcategory_id"]').html('')
                            var d = $('select[name="subcategory_id"]').empty()

                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>')
                            })
                        },
                    })
                } else {
                    alert('Error!')
                }
            })

            // Atualizando o valor de sub subcategory quando utilizar o select subcategory

            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val()

                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/products/sub_subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",

                        success: function(data) {

                            var d = $('select[name="sub_subcategory_id"]').empty()

                            $.each(data, function(key, value) {
                                $('select[name="sub_subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sub_subcategory_name_en + '</option>')
                            })
                        },
                    })
                } else {
                    alert('Error!')
                }
            })
        })
    </script>

@endsection
