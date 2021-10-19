@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Add Blog Post</h4>
                            <a href="{{ route('blog.post.index') }}"
                                class="btn btn-success btn-md font-weight-bold float-right">View Post List</a>
                        </div>

                        <div class="box-body">
                            <form method="post" action="{{ route('blog.post.store') }}" enctype="multipart/form-data">
                                @csrf
                                {{-- Blog Category --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>{{ __('Blog Category Select') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <select class="form-control" name="blog_category_id">
                                                    <option selected disabled>Select Category</option>
                                                    @foreach ($blog_cat as $cat)
                                                        <option value="{{ $cat->id }}">
                                                            {{ $cat->blog_category_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('blog_category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Title --}}
                                <div class="row " style="margin-top: 20px;">
                                    <div class="col-md-6"> {{-- Title En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Post Title En') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="post_title_en">
                                                @error('post_title_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Title En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Post Title Pt') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="post_title_pt">
                                                @error('post_title_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End 2st row -->

                                {{-- Image --}}
                                <div class="row " style="margin-top: 20px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>{{ __('Post Image') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="post_image"
                                                        onChange="postImageUrl(this)">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        Thumbnail</label>
                                                </div>
                                                @error('post_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <img src="" id="postImage" style="margin: 20px 5px; border-radius: 20px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Details --}}
                                <div class="row " style="margin-top: 20px;">
                                    <div class="col-md-6"> {{-- Details En --}}
                                        <div class="form-group">
                                            <h5>{{ __('Blog Details En') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <textarea name="post_details_en" class="form-control"
                                                    rows="10" cols="80"></textarea>
                                                @error('post_details_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> {{-- Details Pt --}}
                                        <div class="form-group">
                                            <h5>{{ __('Blog Details Pt') }}<span class="text-danger"> *</span>
                                            </h5>
                                            <div class="controls">
                                                <textarea name="post_details_pt" class="form-control"
                                                    rows="10" cols="80"></textarea>
                                                @error('post_details_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Button Submit --}}
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-md btn-info float-right mt-5">Add Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    function postImageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()

            reader.onload = function(e) {
                $('#postImage').attr('src', e.target.result).width(80).heigth(80)
            }

            reader.readAsDataURL(input.files[0])
        }
    }
</script>
