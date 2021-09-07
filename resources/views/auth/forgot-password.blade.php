@extends('app.main_template')
@section('content')

    {{-- BREADCRUMB --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Forget Password</li>
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
                        <h4>Forget Password</h4>
                        <p>Forgot your Password? No problem.</p>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('Email Address') }}
                                    <span>*</span></label>
                                <input name="email" type="email" id="email"
                                    class="form-control unicase-form-control text-input" required>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Email Password Reset Link') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
