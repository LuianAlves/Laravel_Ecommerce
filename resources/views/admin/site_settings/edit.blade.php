@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            
            <form action="{{ route('setting.site.update', $settings->id) }}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="old_img" value="{{ $settings->logo }}">

                <div class="row">
                    <div class="col-6">
                        {{-- Logo --}}
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Logo</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">                                   
                                        <div class="form-group">
                                            <h5>{{ __('Logo Image') }}</h5>
                                            <div class="controls">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="logo">
                                                    <label class="custom-file-label" for="customFile">Choose Logo</label>
                                                </div>
                                                @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Social Media --}}
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Social Media</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        {{-- Facebook/Twitter --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Facebook') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control">
                                                        @error('facebook')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Twitter') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="twitter" value="{{ $settings->twitter }}" class="form-control">
                                                        @error('twitter')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Linkedin/Youtube --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Linkedin') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="linkedin" value="{{ $settings->linkedin }}" class="form-control">
                                                        @error('linkedin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Youtube') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="youtube" value="{{ $settings->youtube }}" class="form-control">
                                                        @error('youtube')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer Settings --}}
                    <div class="col-6">
                        <div class="box" style="padding-bottom: 30px;">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Company Info</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        {{-- Phone One / Phone Two --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Phone') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_one" value="{{ $settings->phone_one }}" class="form-control">
                                                        @error('phone_one')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Phone Two') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_two" value="{{ $settings->phone_two }}" class="form-control">
                                                        @error('phone_two')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Email --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('E-mail') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" value="{{ $settings->email }}" class="form-control">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Company Name --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Company Name') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_name" class="form-control" value="{{ $settings->company_name }}">
                                                        @error('company_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Company Address --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>{{ __('Company Address') }}
                                                    </h5>
                                                    <div class="controls">
                                                        <textarea name="company_address" class="form-control" rows="3" placeholder="Textarea Text">{{ $settings->company_address }}</textarea>
                                                        @error('company_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Button --}}
                    <div class="col-12">
                        <div class="text-xs-right">
                            <button type="submit" class="font-weight-bold btn btn-primary btn-md float-right" style="margin: 25px auto;">{{ __('Update Infos') }}</button>
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
