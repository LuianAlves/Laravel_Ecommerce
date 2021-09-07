@extends('app.main_template')
@section('content')

    {{-- BREADCRUMB --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
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
                        <h4>Sign in</h4>
                        <p>Hello, Welcome to your account.</p>
                                            
                        <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('Email Address') }}
                                    <span>*</span></label>
                                <input name="email" type="email" id="email"
                                    class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">{{ __('Password') }}
                                    <span>*</span></label>
                                <input name="password" type="password" id="password"
                                    class="form-control unicase-form-control text-input">
                            </div>
                            <div class="radio outer-xs">
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your
                                    Password?</a>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                            </div>
                            </form>
                    </div>

                    <!-- REGISTER -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Register Account</h4>
                        <p class="text title-tag-line">Create your new account.</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="name">{{ __('Name')}}<span>*</span></label>
                                <input id="name" name="name" type="text" :value="old('name')" class="form-control unicase-form-control text-input">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">{{ __('Email Address')}}<span>*</span></label>
                                <input id="email" name="email" type="email" :value="old('email')" class="form-control unicase-form-control text-input">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">{{ __('Phone Number')}}</label>
                                <input id="phone" name="phone" type="number" :value="old('phone')" class="form-control unicase-form-control text-input">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">{{ __('Password')}}<span>*</span></label>
                                <input id="password" name="password" type="password" class="form-control unicase-form-control text-input">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">{{ __('Confirm Password')}}<span>*</span></label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control unicase-form-control text-input">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Sign Up')}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
