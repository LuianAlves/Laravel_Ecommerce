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
                                    <form action="{{ route('sub_subcategory.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Category English') }}<span class="text-danger"> *</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <select class="form-control" name="category_id">
                                                            <option value="" selected disabled>Select Category</option>
                                                            @foreach ($category as $cat)
                                                                <option value="{{ $cat->id }}">
                                                                    {{ $cat->category_name_en }}</option>
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
                                                <input type="text" name="sub_subcategory_name_en" class="form-control">
                                                @error('sub_subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Sub SubCategory Portuguese') }}<span class="text-danger">
                                                    *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="sub_subcategory_name_pt" class="form-control">
                                                @error('sub_subcategory_name_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit"
                                            class="font-weight-bold btn btn-primary btn-md float-right mt-5">{{ __('Add') }}</button>
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
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub SubCategory List <span class="badge badge-success badge-pill"> {{ count($subsubcategory) }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category En</th>
                                            <th>Sub Category En</th>
                                            <th>Sub SubCategory En</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategory as $subsubcat)
                                            <tr>
                                                <td>{{ $subsubcat['category']['category_name_en'] }}</td>
                                                <!-- Usando a relação no Model SubCategory ('belongTo') -->
                                                <td>{{ $subsubcat['subcategory']['subcategory_name_en'] }}</td>
                                                <td>{{ $subsubcat->sub_subcategory_name_en }}</td>
                                                <td class="text-center">
                                                    <a title="Edit Category"
                                                        href="{{ route('sub_subcategory.edit', $subsubcat->id) }}"
                                                        class="btn btn-success btn-md"><i class="fa fa-pencil"></i></a>
                                                    <a title="Delete Category"
                                                        href="{{ route('sub_subcategory.destroy', $subsubcat->id) }}"
                                                        class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>')
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
