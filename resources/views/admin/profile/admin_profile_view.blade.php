@extends('admin.admin_template')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black"">
                        <a href="{{ route('admin.change.password') }}" class="font-weight-bold btn btn-rounded btn-danger btn-md mb-5 float-right">
                        {{ __('Change Password') }}</a>
                        <a href="{{ route('admin.profile.edit') }}" class="font-weight-bold btn btn-rounded btn-success btn-md mb-5 float-right mr-2">
                        {{ __('Edit Profile') }}</a>
                        <h3 class="widget-user-username">{{ $admin->name }}</h3>
                        <h6 class="widget-user-desc">{{ $admin->email }}</h6>
                    </div>
                    <div class="widget-user-image">
                        <img style="width: 100px; height: 75px; border-radius: 50%;"
                            src="{{ !empty($admin->profile_photo_path) ? url('upload/admin_images/' . $admin->profile_photo_path) : url('upload/no_image.jpg') }}"
                            alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">12K</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 br-1 bl-1">
                                <div class="description-block">
                                    <h5 class="description-header">550</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">158</h5>
                                    <span class="description-text">TWEETS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
