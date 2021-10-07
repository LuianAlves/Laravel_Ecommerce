@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">EditDivision</h3>
                        </div>
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('district.update', $districts->id) }}" method="post">
                                        @csrf

                                        {{-- Division --}}
                                        <div class="form-group">
                                            <h5>{{ __('Division') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select name="division_id" id="" class="form-control">
                                                    @foreach($divisions as $division)
                                                        <option value="{{ $division->id }}" {{ $division->id == $districts->division_id ? 'selected' : ''}}>{{ $division->division_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('division_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- State --}}
                                        <div class="form-group">
                                            <h5>{{ __('State') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select name="state_id" id="" class="form-control">
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" {{ $state->id == $districts->state_id ? 'selected' : ''}}>{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('state_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- District --}}
                                        <div class="form-group">
                                            <h5>{{ __('District') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="district_name" class="form-control" value="{{ $districts->district_name }}">
                                                @error('district_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="font-weight-bold btn btn-primary btn-md float-right mt-5" value="Update">{{ __('Update District') }}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
