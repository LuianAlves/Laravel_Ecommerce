@extends('app.main_template')
@section('content')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Atualizar Informações' : 'Profile Update' }}
@endsection

@php // PERMITE RECUPERAR A IMAGEM DO BANCO DE DADOS
    use App\Models\User;

    $user = User::where('id', Auth::user()->id)->first();   
@endphp

    <div class="breadcrumb" style="margin-top: 15px;">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class='active'>{{ __('User Profile') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img class="card-img-top" style="border-radius: 100%; width: 100%; height: 120px; margin-bottom: 15px;"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('profile.home') }}" class="btn btn-primary btn-md btn-block">{{ __('Home') }}</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-md btn-block">{{ __('Profile Update') }}</a>
                        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-md btn-block">{{ __('Change Password') }}</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-md btn-block">{{ __('Logout') }}</a>
                    </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    @yield('profile_home')
                    @yield('profile_update')
                    @yield('profile_change_pass')
                </div>
            </div>
        </div>
    </div>
@endsection
