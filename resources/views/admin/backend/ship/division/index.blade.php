@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Division</h3>
                        </div>
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('division.store') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <h5>{{ __('Division Name') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="division_name" class="form-control">
                                                @error('division_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="font-weight-bold btn btn-primary btn-md float-right mt-5" value="Update">{{ __('Add division') }}</button>
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
                            <h3 class="box-title">Division List</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Division Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($divisions as $division)
                                            <tr class="text-center">
                                                <td>{{ $division->division_name }}</td>
                                                <td class="text-center" width="20%">
                                                    <a title="Edit division" href="{{ route('division.edit', $division->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                
                                                    <a title="Delete Product" href="{{ route('division.destroy', $division->id) }}" id="delete" class="btn btn-danger btn-sm">
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
