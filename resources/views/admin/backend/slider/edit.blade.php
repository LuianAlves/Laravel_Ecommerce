@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Slider</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('slider.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $sliders->id }}">
                                        <input type="hidden" name="old_image" value="{{ $sliders->slider_image }}">

                                        {{-- Title --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Title English') }}<span class="text-danger"> *</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="title_en" class="form-control"
                                                            value="{{ $sliders->title_en }}">
                                                        @error('title_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Title Portuguese') }}<span class="text-danger"> *</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="title_pt" class="form-control"
                                                            value="{{ $sliders->title_pt }}">
                                                        @error('title_pt')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Description --}}
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Description English') }}<span class="text-danger">
                                                            *</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <textarea name="description_en" class="form-control"
                                                            rows="5">{{ $sliders->description_en }}</textarea>
                                                        @error('description_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Description Portuguese') }}<span class="text-danger">
                                                            *</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <textarea name="description_pt" class="form-control"
                                                            rows="5">{{ $sliders->description_pt }}</textarea>
                                                        @error('description_pt')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3"> {{-- Thumbnail --}}
                                            <div class="form-group">
                                                <h5>{{ __('Slider Image') }}<span class="text-danger"> *</span></h5>
                                                <div class="controls">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            name="slider_image">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            Image</label>
                                                    </div>
                                                    @error('slider_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit"
                                                class="font-weight-bold btn btn-primary btn-md float-right">{{ __('Add Slider') }}</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
