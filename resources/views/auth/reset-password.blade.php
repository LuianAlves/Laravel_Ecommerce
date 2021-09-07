@extends('app.main_template')
@section('content')

    {{-- BREADCRUMB --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class='active'>{{ __('Reset Password') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4>{{ __('Reset Password') }}</h4>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('Email Address') }}
                                    <span>*</span></label>
                                <input name="email" type="email" id="email" :value="old('email', $request->email)"
                                    class="form-control unicase-form-control text-input" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">{{ __('Password') }}
                                    <span>*</span></label>
                                <input name="password" type="password" id="password"
                                    class="form-control unicase-form-control text-input" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title"
                                    for="password_confirmation">{{ __('Password Confirmation') }}
                                    <span>*</span></label>
                                <input name="password_confirmation" type="password" id="password_confirmation"
                                    class="form-control unicase-form-control text-input" required>
                            </div>
                            <button type="submit"
                                class="btn-upper btn btn-primary checkout-page-button">{{ __('Reset Password') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
