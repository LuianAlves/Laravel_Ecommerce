@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('sub_subcategory.update') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="id" value={{ $subsubcategory->id }}>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Category English') }}<span class="text-danger"> *</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <select class="form-control" name="category_id">
                                                            <option value="" selected disabled>Select Category</option>
                                                            @foreach ($category as $cat)
                                                                <option value="{{ $cat->id }}"
                                                                    {{ $cat->id == $subsubcategory->category_id ? 'selected' : '' }}>
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Sub Category English') }}<span class="text-danger">
                                                            *</span></h5>
                                                    <select class="form-control" name="subcategory_id">
                                                        <option selected disabled>Select Sub Category</option>
                                                        @foreach ($subcategory as $subcat)
                                                            <option value="{{ $subcat->id }}"
                                                                {{ $subcat->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>
                                                                {{ $subcat->subcategory_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Sub SubCategory English') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <input type="text" name="sub_subcategory_name_en" class="form-control"
                                                    value="{{ $subsubcategory->sub_subcategory_name_en }}">
                                                @error('sub_subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Sub SubCategory Portuguese') }}<span class="text-danger">
                                                    *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="sub_subcategory_name_pt" class="form-control"
                                                    value="{{ $subsubcategory->sub_subcategory_name_pt }}">
                                                @error('sub_subcategory_name_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit"
                                            class="font-weight-bold btn btn-primary btn-md float-right mt-5">{{ __('Update') }}</button>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->

    </div>

    {{-- Atualizando o valor de subcategory quando utilizar o select category --}}
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val()

                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",

                        success: function(data) {

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
        })
    </script>
@endsection
