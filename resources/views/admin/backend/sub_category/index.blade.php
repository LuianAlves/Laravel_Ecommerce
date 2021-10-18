@extends('admin.admin_template')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">

            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Sub Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('subcategory.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>{{ __('Category English') }}<span class="text-danger"> *</span></h5>
                                                <div class="controls">
                                                    <select class="form-control" name="category_id">
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        @foreach ($category as $cat)                                                         
                                                            <option value="{{ $cat->id }}">{{ $cat->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>{{ __('Sub Category English') }}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control">
                                            @error('subcategory_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>{{ __('Sub Category Portuguese') }}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_pt"  class="form-control">
                                            @error('subcategory_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit"
                                        class="font-weight-bold btn btn-primary btn-md float-right mt-5">{{ __('Add Category') }}</button>
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
                        <h3 class="box-title">Category List <span class="badge badge-success badge-pill"> {{ count($subcategory) }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category En</th>
                                        <th>Sub Category En</th>
                                        <th>Sub Category Pt</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategory as $subcat)
                                        <tr>
                                            <td>{{ $subcat['category']['category_name_en'] }}</td> <!-- Usando a relação no Model SubCategory ('belongTo') -->
                                            <td>{{ $subcat->subcategory_name_en }}</td>
                                            <td>{{ $subcat->subcategory_name_pt }}</td>
                                            <td class="text-center">
                                                <a title="Edit Category" href="{{ route('subcategory.edit', $subcat->id) }}" class="btn btn-success btn-md"><i class="fa fa-pencil"></i></a>
                                                <a title="Delete Category" href="{{ route('subcategory.destroy', $subcat->id) }}" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
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
@endsection