@extends('admin.admin_template')
@section('admin')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Add Products</h4>
                        <a href="{{ route('blog.post.index') }}" class="btn btn-success btn-md font-weight-bold float-right">Manage Products</a>
                    </div>

                    <div class="box-body">
                        <form method="post" action="{{ route('blog.post.update', $blog_post->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="old_image" value="{{ $blog_post->post_image }}">
                            {{-- Blog Category --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Blog Category Select') }}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <select required class="form-control" name="blog_category_id">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($blog_cat as $cat)
                                                    <option value="{{ $cat->id }}" {{ $cat->id == $blog_post->blog_category_id ? 'selected' : '' }}>{{ $cat->blog_category_name_en }}
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
                                        <h5>{{ __('Blog Title En') }}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input class="form-control" required type="text" name="post_title_en" value="{{ $blog_post->post_title_en }}">
                                            @error('post_title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> {{-- Title En --}}
                                    <div class="form-group">
                                        <h5>{{ __('Blog Title Pt') }}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input class="form-control" required type="text" name="post_title_pt" value="{{ $blog_post->post_title_pt }}">
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
                                                <input type="file" class="custom-file-input" name="post_image" onChange="postImageUrl(this)">
                                                <label class="custom-file-label" for="customFile">Choose Thumbnail</label>
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
                                            <textarea id="editor1" name="post_details_en" class="form-control"
                                                rows="10" cols="80">{{ $blog_post->post_details_en }}</textarea>
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
                                            <textarea id="editor2" name="post_details_pt" class="form-control"
                                                rows="10" cols="80">{{ $blog_post->post_details_pt }}</textarea>
                                            @error('post_details_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Button Submit --}}
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-md btn-info float-right mt-5">Update Post</button>
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