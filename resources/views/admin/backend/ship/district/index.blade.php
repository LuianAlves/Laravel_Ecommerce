@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add District</h3>
                        </div>
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('district.store') }}" method="post">
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
                                                <select name="state_id" id="" class="form-control">
                                                    <option selected disabled>Select Division</option>
                                                    {{-- @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                    @endforeach --}}
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
                                                <input type="text" name="district_name" class="form-control">
                                                @error('district_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="font-weight-bold btn btn-primary btn-md float-right mt-5" value="Update">{{ __('Add District') }}</button>
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
                            <h3 class="box-title">District List</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division</th>
                                            <th>State</th>
                                            <th>District</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($districts as $district)
                                            <tr>
                                                <td>{{ $district->division->division_name }}</td>
                                                <td>{{ $district->state->state_name }}</td>
                                                <td>{{ $district->district_name }}</td>
                                                <td class="text-center" width="20%">
                                                    <a title="Edit division" href="{{ route('district.edit', $district->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                
                                                    <a title="Delete Product" href="{{ route('district.destroy', $district->id) }}" id="delete" class="btn btn-danger btn-sm">
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

    {{-- Atualizando o valor de district quando utilizar o select division --}}
    <script>
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val()

                if (division_id) {
                    $.ajax({
                        url: "{{ url('/shipping/district/state/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",

                        success: function(data) {

                            var d = $('select[name="state_id"]').empty()

                            $.each(data, function(key, value) {
                                $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>')
                            })
                        },
                    })
                } else {
                    alert('Error!')
                }
            })
        })
    </script>

@endsection