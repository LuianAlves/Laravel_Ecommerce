@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('category.store') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <h5>{{ __('Category English') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_en" class="form-control">
                                                @error('category_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Category Portuguese') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_pt"  class="form-control">
                                                @error('category_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Category Icon') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_icon" class="form-control">
                                                @error('category_icon')
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
                            <h3 class="box-title">Category List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Category En</th>
                                            <th>Category Pt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $cat)
                                            <tr>
                                                <td class="text-warning text-center"><span><i class="{{ $cat->category_icon }} fa-2x"></i></span></td>
                                                <td>{{ $cat->category_name_en }}</td>
                                                <td>{{ $cat->category_name_pt }}</td>
                                                <td class="text-center">
                                                    <a title="Edit Category" href="{{ route('category.edit', $cat->id) }}" class="btn btn-success btn-md"><i class="fa fa-pencil"></i></a>
                                                    <a title="Delete Category" href="{{ route('category.destroy', $cat->id) }}" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
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
