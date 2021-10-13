@extends('app.profile.user_profile_template')
@section('profile_home')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Minha Conta' : 'My Account' }}
@endsection

    <div class="card">
        <h3 class="text-center">
            <strong class="text-muted"> {{ Auth::user()->name }} </strong>
            <br>
        </h3>
        <p class="text-center text-capitalize text-primary"> <b>{{ session()->get('language') == 'portuguese' ? 'Bem Vindo' : 'Welcome To Shop' }}</b> </p>
    </div>

@endsection
