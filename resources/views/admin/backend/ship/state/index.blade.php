@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add State</h3>
                        </div>
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('state.store') }}" method="post">
                                        @csrf

                                        {{-- Division --}}
                                        <div class="form-group">
                                            <h5>{{ __('Division') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <select name="division_id" id="" class="form-control">
                                                    <option selected disabled>Select Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
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
                                                <input type="text" name="state_name" class="form-control">
                                                @error('state_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="font-weight-bold btn btn-primary btn-md float-right mt-5" value="Update">{{ __('Add State') }}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">State List <span class="badge badge-success badge-pill"> {{ count($states) }}</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division</th>
                                            <th>State</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($states as $state)
                                            <tr>
                                                <td>{{ $state->division->division_name }}</td>
                                                <td>{{ $state->state_name }}</td>
                                                <td class="text-center" width="20%">
                                                    <a title="Edit division" href="{{ route('state.edit', $state->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                
                                                    <a title="Delete Product" href="{{ route('state.destroy', $state->id) }}" id="delete" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
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
