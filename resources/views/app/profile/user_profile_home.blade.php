@extends('app.profile.user_profile_template')
@section('profile_home')
    <div class="card">
        <h3 class="text-center">
            <strong class="text-muted"> {{ Auth::user()->name }} </strong>
            <br>
        </h3>
        <p class="text-center text-capitalize text-primary"> <b>{{ __('Welcome To Shop') }}</b> </p>
    </div>
@endsection
