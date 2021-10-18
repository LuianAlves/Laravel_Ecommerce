@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <h5>{{ __('Brand Name English') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_en" class="form-control">
                                                @error('brand_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Brand Name Portuguese') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_pt"  class="form-control">
                                                @error('brand_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Brand Image') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="file" name="brand_image" class="form-control">
                                                @error('brand_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit"
                                            class="font-weight-bold btn btn-primary btn-md mt-5"
                                            value="Update">{{ __('Add Brand') }}</button>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    
                </div>
            </div>
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List <span class="badge badge-success badge-pill"> {{ count($brands) }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Brand En</th>
                                            <th>Brand Pt</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->brand_name_en }}</td>
                                                <td>{{ $brand->brand_name_pt }}</td>
                                                <td title="{{ $brand->brand_name_en }} Image" class="bg-white"><img src="{{ asset($brand->brand_image) }}"
                                                        style="width: 60px; height: 48px;"></td>
                                                <td class="text-center">
                                                    <a title="Edit Brand" href="{{ route('brand.edit', $brand->id) }}" class="btn btn-success btn-md"><i class="fa fa-pencil"></i></a>
                                                    <a title="Delete Brand" href="{{ route('brand.destroy', $brand->id) }}" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
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
