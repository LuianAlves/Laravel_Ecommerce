@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-center">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Coupon</h3>
                        </div>
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('coupon.update', $coupons->id) }}" method="post">
                                        @csrf

                                        {{-- Name --}}
                                        <div class="form-group">
                                            <h5>{{ __('Name') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_name" value="{{ $coupons->coupon_name }}" class="form-control">
                                                @error('coupon_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Discount --}}
                                        <div class="form-group">
                                            <h5>{{ __('Discount %') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="text" name="coupon_discount" value="{{ $coupons->coupon_discount }}"  class="form-control">
                                                @error('coupon_discount')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Validity --}}
                                        <div class="form-group">
                                            <h5>{{ __('Validity') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input type="date" name="coupon_validity" value="{{ $coupons->coupon_validity }}" class="form-control">
                                                @error('coupon_validity')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="font-weight-bold btn btn-primary btn-md float-right mt-5" value="Update">{{ __('Update Coupon') }}</button>
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
