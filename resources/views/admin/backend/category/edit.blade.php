@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('category.update', $category->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                        
                                        <div class="form-group">
                                            <h5>{{ __('Category English') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}">
                                                @error('category_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Category Portuguese') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_pt"  class="form-control" value="{{ $category->category_name_pt }}">
                                                @error('category_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Category Icon') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}">
                                                @error('category_icon')
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
