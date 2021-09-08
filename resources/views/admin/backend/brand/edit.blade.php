@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $brand->id }}">
                                        <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                        
                                        <div class="form-group">
                                            <h5>{{ __('Brand Name English') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}">
                                                @error('brand_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Brand Name Portuguese') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_pt"  class="form-control" value="{{ $brand->brand_name_pt }}">
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
                                            class="font-weight-bold btn btn-primary btn-md float-right mt-5"
                                            value="Update">{{ __('Update') }}</button>
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
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
