@extends('app.profile.user_profile_template')
@section('profile_change_pass')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Atualizar Senha' : 'Change Password' }}
@endsection

    <div class="card">
        <h3 class="text-center">
            <strong class="text-muted"> {{ Auth::user()->name }} </strong>
            <br>
        </h3>
        <p class="text-center text-capitalize text-danger"> <b>{{ __('Change your Password') }}</b> </p>

        <div class="card-body">
            <form action="{{ route('user.password.update') }}" method="post">
                @csrf
                {{-- Current Pass --}}
                <div class="form-group">
                    <h5>{{ __('Current Password') }}<span class="text-danger"> *</span></h5>
                    <div class="controls">
                        <input id="current_password" type="password" name="oldpassword"
                            class="form-control unicase-form-control text-input" required>
                    </div>
                </div>
                {{-- New Pass --}}
                <div class="form-group">
                    <h5>{{ __('New Password') }}<span class="text-danger"> *</span></h5>
                    <div class="controls">
                        <input id="password" type="password" name="password"
                            class="form-control unicase-form-control text-input" required>
                    </div>
                </div>
                <div class="form-group">
                    <h5>{{ __('Confirm Password') }}<span class="text-danger"> *</span></h5>
                    <div class="controls">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control unicase-form-control text-input" required>
                    </div>
                </div>

                <button type="submit" class="font-weight-bold btn btn-danger btn-md"
                    value="Update">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
@endsection
