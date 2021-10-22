@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            
            <form action="{{ route('setting.site.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-6">
                        {{-- Logo --}}
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Logo</h3>
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
                                <h3 class="box-title">Social Media</h3>
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
                                                        <input type="text" name="facebook" class="form-control">
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
                                                        <input type="text" name="twitter" class="form-control">
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
                                                        <input type="text" name="linkedin" class="form-control">
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
                                                        <input type="text" name="youtube" class="form-control">
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
                                <h3 class="box-title">Company Info</h3>
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
                                                        <input type="text" name="phone_one" class="form-control">
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
                                                        <input type="text" name="phone_two" class="form-control">
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
                                                        <input type="email" name="email" class="form-control">
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
                                                        <input type="text" name="company_name" class="form-control">
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
                                                        <textarea name="company_address" class="form-control" rows="3" placeholder="Textarea Text"></textarea>
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
                            <button type="submit" class="font-weight-bold btn btn-primary btn-md" style="margin: 25px auto;">{{ __('Add Settings') }}</button>
                        </div>
                    </div>
                </div>
            </form>

            <hr>
            {{-- Company Info List --}}
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Company Info List</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        @foreach($settings as $set)
                                        <tr>
                                            <th>Logo</th>
                                            <td>
                                                <img src="{{ asset($set->logo) }}" style="width: 60px; height: 48px;">
                                            </td>
                                        <tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <td>{{ $set->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Address</th>
                                            <td>{{ $set->company_address }}</td>
                                        </tr>    
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $set->phone_one }}</td>
                                        </tr>    
                                        <tr>
                                            <th>Phone Two</th>
                                            <td>{{ $set->phone_two }}</td>
                                        </tr>    
                                        <tr>
                                            <th>E-mail</th>
                                            <td>{{ $set->email }}</td>
                                        </tr>   
                                        <tr>
                                            <th>Facebook</th>
                                            <td>{{ $set->facebook }}</td>
                                        </tr>   
                                        <tr>
                                            <th>Twitter</th>
                                            <td>{{ $set->twitter }}</td>
                                        </tr>   
                                        <tr>
                                            <th>Linkedin</th>
                                            <td>{{ $set->linkedin }}</td>
                                        </tr>   
                                        <tr>
                                            <th>Youtube</th>
                                            <td>{{ $set->youtube }}</td>
                                        </tr> 
                                        <tr>
                                            <th>Action</th>
                                            <td>
                                                <a title="Edit Category" href="{{ route('setting.site.edit', $set->id) }}" class="btn btn-success btn-md"><i class="fa fa-pencil"></i></a>
                                                <a title="Delete Category" id="delete" href="{{ route('setting.site.destroy', $set->id) }}" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
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
