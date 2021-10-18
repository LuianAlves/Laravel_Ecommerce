@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Coupon</h3>
                        </div>
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('coupon.store') }}" method="post">
                                        @csrf

                                        {{-- Name --}}
                                        <div class="form-group">
                                            <h5>{{ __('Name') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_name" class="form-control">
                                                @error('coupon_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Discount --}}
                                        <div class="form-group">
                                            <h5>{{ __('Discount %') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_discount"  class="form-control">
                                                @error('coupon_discount')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Validity --}}
                                        <div class="form-group">
                                            <h5>{{ __('Validity') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="date" name="coupon_validity" class="form-control">
                                                @error('coupon_validity')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="font-weight-bold btn btn-primary btn-md float-right mt-5" value="Update">{{ __('Add Coupon') }}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Coupon List <span class="badge badge-success badge-pill"> {{ count($coupons) }}</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>Discount</th>
                                            <th>Expiration</th>
                                            <th>Validity</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($coupons as $coupon)
                                            <tr class="text-center">
                                                <td width="20%"><strong class="text-white">{{ $coupon->coupon_name }}</strong></td>
                                                <td>{{ $coupon->coupon_discount }} <strong class="text-white">%</strong></td>
                                                <td>{{ Carbon\Carbon::parse($coupon->coupon_validity)->diffForHumans() }}</td>

                                                <td>
                                                    @if($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                        <span class="badge badge-pill badge-success">Valid</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Invalid</span>
                                                    @endif
                                                </td> 

                                                <td>
                                                    @if($coupon->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>  

                                                {{-- Action --}}
                                                <td class="text-center">
                                                    <a title="Edit Coupon" href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                
                                                    <a title="Delete Product" href="{{ route('coupon.destroy', $coupon->id) }}" id="delete" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    @if ($coupon->status == 1)
                                                        <a title="Inactive Now" href="{{ route('coupon.inactive', $coupon->id) }}" class="btn btn-info btn-sm">
                                                            <i class="fa fa-arrow-down"></i>
                                                        </a>
                                                    @else
                                                        <a title="Active Now" href="{{ route('coupon.active', $coupon->id) }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-arrow-up"></i>
                                                        </a>
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
