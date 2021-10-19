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
                                    <form action="{{ route('blog.category.store') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <h5>{{ __('Blog Category English') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="blog_category_name_en" class="form-control">
                                                @error('blog_category_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>{{ __('Blog Category Portuguese') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="blog_category_name_pt"  class="form-control">
                                                @error('blog_category_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <button type="submit"
                                            class="font-weight-bold btn btn-primary btn-md float-right mt-5">{{ __('Add Blog Category') }}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Blog Category List <span class="badge badge-success badge-pill"> {{ count($blog_cat) }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category En</th>
                                            <th>Category Pt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blog_cat as $cat)
                                            <tr>
                                                <td>{{ $cat->blog_category_name_en }}</td>
                                                <td>{{ $cat->blog_category_name_pt }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('blog.category.edit', $cat->id) }}" class="btn btn-success btn-md"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('blog.category.destroy', $cat->id) }}" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
