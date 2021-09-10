@extends('admin.admin_template')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">

            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('subcategory.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>{{ __('Category English') }}<span class="text-danger"> *</span></h5>
                                                <div class="controls">
                                                    <select class="form-control" name="category_id">
                                                        @foreach ($category as $cat)                                                         
                                                            <option value="{{ $cat->id }}" {{ $cat->id == $subcategory->category_id ? 'selected' : ''}}>{{ $cat->category_name_en }}</option>
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
                                            <input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}">
                                            @error('subcategory_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>{{ __('Sub Category Portuguese') }}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_pt"  class="form-control" value="{{ $subcategory->subcategory_name_pt }}">
                                            @error('subcategory_name_pt')
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
@endsection