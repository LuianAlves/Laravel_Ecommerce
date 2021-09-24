@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Add Products</h4>
                            <a href="{{ route('product.index') }}" class="btn btn-success btn-md font-weight-bold float-right">Manage Products</a>
                        </div>

                        <div class="box-body">
                            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                {{-- Brand/Category/SCategory --}}
                                <div class="row"> {{-- 1st row --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>{{ __('Brand Select') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select class="form-control" name="brand_id">
                                                    <option selected disabled>Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}
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
                                                        <option value="{{ $cat->id }}">{{ $cat->category_name_en }}
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
                                                <select class="form-control" id="sub_subcategory_id"
                                                    name="sub_subcategory_id">
                                                    <option selected disabled>Select Sub SubCategory</option>
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
                                                <input class="form-control" required type="text" name="product_name_en">
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
                                                <input class="form-control" required type="text" name="product_name_pt">
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
                                                <input class="form-control" required type="text" name="product_code">
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
                                                <input class="form-control" required type="text" name="product_qty">
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
                                    <div class="col-md-5"> {{-- Product Name En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Tags En') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_tag_en"
                                                    value="Lorem, Smart, Stes" data-role="tagsinput">
                                                @error('product_tag_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 offset-2"> {{-- Product Tags Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Tags Pt') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_tag_pt"
                                                    value="Lorem, Smart, Stes" data-role="tagsinput">
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
                                    <div class="col-md-5"> {{-- Product Size En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Size En') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="product_size_en"
                                                    value="Small, Medium, Large" data-role="tagsinput">
                                                @error('product_size_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 offset-2"> {{-- Product Size Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Size Pt') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="product_size_pt"
                                                    value="Pequeno, Medio, Grande" data-role="tagsinput">
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
                                                <input class="form-control" type="text" name="product_color_en"
                                                    value="Blue, Red, Green, Black, White" data-role="tagsinput">
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
                                                <input class="form-control" type="text" name="product_color_pt"
                                                    value="Azul, Vermelho, Verde, Preto, Branco" data-role="tagsinput">
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
                                                <input class="form-control" required type="number" name="selling_price">
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
                                                <input class="form-control" type="number" name="discount_price">
                                                @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 7st row -->

                                {{-- ThumbNail / Multi Image --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 8st row -->
                                    <div class="col-md-6"> {{-- Thumbnail --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Thumbnail') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <div class="custom-file">
                                                    <input required type="file" class="custom-file-input" name="product_thumnail"
                                                        onChange="mainThumbUrl(this)">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        Thumbnail</label>
                                                </div>
                                                @error('product_thumnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <img src="" id="mainThumb" style="margin: 20px 5px; border-radius: 20px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Multi Images --}}
                                        <div class="form-group">
                                            <h5>{{ __('Product Images') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <div class="custom-file">
                                                    <input required type="file" multiple class="custom-file-input"
                                                        name="multi_images[]" id="multiImg">
                                                    <label class="custom-file-label" for="customFile">Choose Images</label>
                                                </div>
                                                @error('product_thumnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="row" id="preview_img"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 8st row -->

                                {{-- Description Short --}}
                                <div class="row " style="margin-top: 20px;">
                                    <!-- 9st row -->
                                    <div class="col-md-6"> {{-- Short Description En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Short Description En') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <textarea name="short_descp_en" id="short_descp_en" class="form-control"
                                                    rows="5" placeholder="Textarea Text"></textarea>
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
                                                    rows="5" placeholder="Digite Aqui"></textarea>
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
                                                    rows="10" cols="80"></textarea>
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
                                                    rows="10" cols="80"></textarea>
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
                                                    class="filled-in chk-col-danger"/>
                                                <label for="md_checkbox_21">Hot Deals</label>
                                                <input type="checkbox" id="md_checkbox_23" name="featured" value="1"
                                                    class="filled-in chk-col-warning"/>
                                                <label for="md_checkbox_23">Featured</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" id="md_checkbox_27" name="special_offer" value="1"
                                                    class="filled-in chk-col-success"/>
                                                <label for="md_checkbox_27">Special Offers</label>
                                                <input type="checkbox" id="md_checkbox_29" name="special_deals" value="1"
                                                    class="filled-in chk-col-primary"/>
                                                <label for="md_checkbox_29">Special Deals</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 10st row -->

                                {{-- Button Submit --}}
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-md btn-info float-right">Add Product</button>
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

    {{-- Mostrando Imagem quando Adiciona-lá ao input --}}

    <script>
        // Thumbnail
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader()

                reader.onload = function(e) {
                    $('#mainThumb').attr('src', e.target.result).width(80).height(80)
                }

                reader.readAsDataURL(input.files[0])
            }
        }
    </script>


    <script>
        // Multi Images
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
