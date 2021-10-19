@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Blog Category</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('blog.category.update', $blog_cat->id) }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <h5>{{ __('Blog Category English') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="blog_category_name_en" value="{{$blog_cat->blog_category_name_en}}" class="form-control">
                                                @error('blog_category_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Blog Category Portuguese') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="blog_category_name_pt" value="{{$blog_cat->blog_category_name_pt}}"  class="form-control">
                                                @error('blog_category_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <button type="submit"
                                            class="font-weight-bold btn btn-primary btn-md float-right mt-5">{{ __('Update') }}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
