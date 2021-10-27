@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Edit Product Stock</h4>
                            <a href="{{ route('product.index') }}" class="btn btn-success btn-md font-weight-bold float-right">Manage Products</a>
                        </div>

                        <div class="box-body">
                            <form method="post" action="{{ route('stock.update', $products->id) }}">
                                @csrf
                                
                                <div class="row " style="margin-top: 20px;">
                                    {{-- Product Name En --}}
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <h5>{{ __('Product Name Pt') }}</h5>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="product_name_pt" value="{{ $products->product_name_pt }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Product Quantity --}}
                                    <div class="col-md-4"> 
                                        <div class="form-group">
                                            <h5>{{ __('Product Quantity') }}<span class="text-danger"> *</span></h5>
                                            <div class="controls">
                                                <input class="form-control" required type="text" name="product_qty"
                                                    value="{{ $products->product_qty }}">
                                                @error('product_qty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                {{-- Button Submit --}}
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-md btn-info float-right">Update Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
