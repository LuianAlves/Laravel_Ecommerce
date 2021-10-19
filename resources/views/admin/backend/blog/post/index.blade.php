@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Blog Post List<span class="badge badge-success badge-pill ml-5">
                                    {{ count($blog_post) }}</h3>
                            <a href="{{ route('blog.post.create') }}"
                                class="btn btn-success btn-md font-weight-bold float-right">New Post</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Category En</th>
                                            <th>Title En</th>
                                            <th>Title Pt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blog_post as $post)
                                            <tr>
                                                <td class="bg-white" style="border: 2px solid #000"><img
                                                        src="{{ asset($post->post_image) }}"
                                                        style="width: 60px; height: 50px;"></td>
                                                <td>{{ $post->blogCategory->blog_category_name_en }}</td>
                                                <td>{{ $post->post_title_en }}</td>
                                                <td>{{ $post->post_title_pt }}</td>
                                                <td>
                                                    <a title="Edit Product"
                                                        href="{{ route('blog.post.edit', $post->id) }}"
                                                        class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a title="Delete Product"
                                                        href="{{ route('blog.post.destroy', $post->id) }}" id="delete"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
