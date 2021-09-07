@extends('app.profile.user_profile_template')
@section('profile_update')
    <div class="card">
        <h3 class="text-center">
            <strong class="text-muted"> {{ Auth::user()->name }} </strong>
            <br>
        </h3>
        <p class="text-center text-capitalize text-success"> <b>{{ __('Update your Profile') }}</b> </p>

        <div class="card-body">
            <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Name --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ __('User Name') }}
                        <span class="text-danger">*</span></label>
                    <input name="name" type="text" value="{{ $user->name }}"
                        class="form-control unicase-form-control text-input" required>
                </div>
                {{-- Email --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ __('Email Address') }}
                        <span class="text-danger">*</span></label>
                    <input name="email" type="email" value="{{ $user->email }}"
                        class="form-control unicase-form-control text-input" required>
                </div>
                {{-- Phone --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ __('Phone Number') }}
                        <span class="text-danger">*</span></label>
                    <input name="phone" type="number" value="{{ $user->phone }}"
                        class="form-control unicase-form-control text-input" required>
                </div>
                {{-- Photo --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ __('User Image') }}
                        <span class="text-danger">*</span></label>
                    <input name="profile_photo_path" type="file" class="form-control unicase-form-control text-input" value="{{ $user->phone }}"
                        required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-danger">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
