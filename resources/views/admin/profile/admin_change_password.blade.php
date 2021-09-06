@extends('admin.admin_template')

@section('admin')
    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Change Password</h4>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('update.change.password') }}" method="post">
                            @csrf
                            <div class="row">
                                {{-- Current Pass --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Current Password') }}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="password" name="oldpassword" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                {{-- New Pass --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('New Password')}}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input id="password" type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Confirm Password')}}<span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="font-weight-bold btn btn-danger btn-md float-right mt-5"
                                value="Update">{{ __('Edit Password') }}</button>
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
@endsection
