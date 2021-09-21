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
                                    <form action="{{ route('slider.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        {{-- Title --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>{{ __('Title English') }}<span class="text-danger"> *</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="title_en" class="form-control">
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
                                                        <input type="text" name="title_pt" class="form-control">
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
                                                        <textarea name="description_en" id="short_descp_en"
                                                            class="form-control" rows="5"
                                                            placeholder="Textarea Text"></textarea>
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
                                                        <textarea name="description_pt" id="short_descp_pt"
                                                            class="form-control" rows="5"
                                                            placeholder="Digite Aqui"></textarea>
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
                                                        <input required type="file" class="custom-file-input"
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
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sliders</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Slider</th>
                                            <th>Title En</th>
                                            <th>Description En</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($slider->slider_image) }}"
                                                        style="width: 60px; height: 48px;">
                                                </td>
                                                <td class="text-center">
                                                    @if ($slider->title_en == null)
                                                        <span class="badge badge-danger">{{ $slider->title_pt != null ? $slider->title_pt : 'No Title'}}</span>      
                                                    @else
                                                        {{ $slider->title_en }}
                                                    @endif
                                                </td>

                                                <td>{{ $slider->description_en }}</td>

                                                <td class="text-center">
                                                    @if ($slider->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <a title="Edit Category" href="{{ route('slider.edit', $slider->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a title="Delete Category" href="{{ route('slider.destroy', $slider->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    @if ($slider->status == 1)
                                                        <a title="Inactive Now" href="{{ route('slider.inactive', $slider->id) }}" class="btn btn-info btn-sm"><i class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a title="Active Now" href="{{ route('slider.active', $slider->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
