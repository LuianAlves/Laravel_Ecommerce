@extends('admin.admin_template')
@section('admin')

    {{-- Thumbnail --}}
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box bt-5 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Thumbnail</h4>
                        <a href="{{ route('product.index') }}" class="btn btn-success btn-md font-weight-bold float-right">Manage Products</a>
                        <a href="{{ route('product.edit', $products->id) }}" class="btn btn-warning btn-md font-weight-bold float-right mr-2">Update Products</a>
                    </div>
                    <div class="box-body">
                        <form method="post" action="{{ route('product.update.thumnail') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <input type="hidden" name="old_img" value="{{ $products->product_thumnail }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <img src="{{ asset($products->product_thumnail) }}" class="card-img-top" style="height: 150px">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="custom-file">
                                                    <label for="customFile" class="custom-file-label">Choose Image</label>
                                                    <input type="file" class="custom-file-input" name="product_thumnail" onChange="mainThumbUrl(this)">
                                                </div>
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 offset-2">
                                    <div class="card">
                                        <p class="card-body bg-white">
                                            <img src="" class="card-img-top" id="mainThumb">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info btn-md float-right">Update Thumnail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Add Multi Images --}}
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box bt-5 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Add Multi Images</h4>           
                    </div>
                    <div class="box-body">
                        <form method="post" action="{{ route('product.store.images') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $products->id }}">

                            {{-- ThumbNail / Multi Image --}}
                            <div class="row " style="margin-top: 20px;">
                                <div class="col-md-6"> {{-- Multi Images --}}
                                    <div class="form-group">
                                        <h5>{{ __('Product Images') }}</h5>
                                        <div class="controls">
                                            <div class="custom-file">
                                                <input required type="file" multiple class="custom-file-input"
                                                    name="multi_images[]" id="multiImg">
                                                <label class="custom-file-label" for="customFile">Choose Images</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End 8st row -->

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info btn-md float-right">Add Images</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Multi Images --}}
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box bt-5 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Multiple Image</h4>
                    </div>
                    <div class="box-body">
                        <form method="post" action="{{ route('product.update.images') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach ($multi_images as $multi)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <img src="{{ asset($multi->photo_name) }}" class="card-img-top"
                                                style="width: 280px; height: 130px;">
                                            <div class="card-body">
                                                
                                                <p class="card-text">                                                       
                                                    <div class="custom-file">
                                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                                        <input type="file" class="custom-file-input" name="multi_images[{{$multi->id}}]">
                                                    </div>
                                                </p>

                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('product.destroy.images', $multi->id) }}" class="btn btn-sm btn-danger float-right" id="delete" title="Delete Image"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-layout-footer">
                                <button class="btn btn-md btn-info float-right">Update Images</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- Thumb --}}
<script>
    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()

            reader.onload = function(e) {
                $('#mainThumb').attr('src', e.target.result).height(150)
            }

            reader.readAsDataURL(input.files[0])
        }
    }
</script>

