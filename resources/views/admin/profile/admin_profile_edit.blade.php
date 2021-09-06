@extends('admin.admin_template')

@section('admin')
    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Profile</h4>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin User Name<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $edit->name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Email<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" value="{{ $edit->email }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Photo --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control" id="image" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Old Photo --}}
                            <div class="row mt-4">
                                <div class="col-md-4 offset-md-2 offset-lg-1">
                                    <img class="w-200 h-150" src="{{ !empty($edit->profile_photo_path) ? url('upload/admin_images/' . $edit->profile_photo_path) : url('upload/no_image.jpg') }}" style="border-radius: 15px" id="showImage">
                                </div>
                            </div>
                            <button type="submit" class="font-weight-bold btn btn-success btn-md float-right mt-5"
                                value="Update">{{ __('Edit Profile') }}</button>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>

    <script>
        // Carregar a Imagem Nova
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader()

                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result)
                }

                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
@endsection
