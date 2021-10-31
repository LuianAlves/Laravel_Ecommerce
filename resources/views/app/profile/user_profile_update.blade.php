@extends('app.profile.user_profile_template')
@section('profile_update')
    <div class="card">
        <h3 class="text-center">
            <strong class="text-muted"> {{ Auth::user()->name }} </strong>
            <br>
        </h3>
        <p class="text-center text-capitalize text-success"> <b>{{ session()->get('language') == 'portuguese' ? 'Atualize suas Informações' : 'Update your Profile' }}</b> </p>

        <div class="card-body">
            <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Name --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ session()->get('language') == 'portuguese' ? 'Nome' : 'User Name' }}
                        <span class="text-danger">*</span></label>
                    <input name="name" type="text" value="{{ $user->name }}"
                        class="form-control unicase-form-control text-input" required>
                </div>
                {{-- Email --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ session()->get('language') == 'portuguese' ? 'Email' : 'Email Address' }}
                        <span class="text-danger">*</span></label>
                    <input name="email" type="email" value="{{ $user->email }}"
                        class="form-control unicase-form-control text-input" required>
                </div>
                {{-- Phone --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ session()->get('language') == 'portuguese' ? 'Telefone' : 'Phone Number' }}
                        <span class="text-danger">*</span></label>
                    <input name="phone" type="number" value="{{ $user->phone }}"
                        class="form-control unicase-form-control text-input" required>
                </div>
                {{-- Photo --}}
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">{{ session()->get('language') == 'portuguese' ? 'Imagem' : 'User Image' }}
                        <span class="text-danger">*</span></label>
                    <input name="profile_photo_path" type="file" class="form-control unicase-form-control text-input" value="{{ $user->phone }}"
                        required>
                    @error('profile_photo_path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-danger">{{ session()->get('language') == 'portuguese' ? 'Atualizar' : 'Update' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
