@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List<span class="badge badge-success badge-pill ml-5"> {{ count($products) }}</h3>
                            <a href="{{ route('product.create') }}"
                                class="btn btn-success btn-md font-weight-bold float-right">Add Products</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name En</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="bg-white" style="border: 2px solid #000"><img
                                                        src="{{ asset($product->product_thumnail) }}"
                                                        style="width: 60px; height: 50px;"></td>

                                                <td>{{ $product->product_name_en }}</td>

                                                <td class="text-center"><strong class="text-white">$</strong>
                                                    {{ $product->selling_price }}</td>

                                                <td class="text-center">{{ $product->product_qty }}</td>

                                                <td class="text-center">
                                                    @if ($product->discount_price == null)
                                                        <span class="badge badge-pill badge-danger">No Discount</span>
                                                    @else
                                                        @php
                                                            $amount = $product->discount_price;
                                                            $discount = ($amount / $product->selling_price) * 100;
                                                        @endphp

                                                        <span
                                                            class="badge badge-pill badge-warning p-2 text-white font-weight-bold">{{ round($discount, 2) }}
                                                            %</span>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    @if ($product->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <div class="mb-2">
                                                        <a title="Edit Product"
                                                            href="{{ route('product.edit', $product->id) }}"
                                                            class="btn btn-success btn-sm"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a title="Edit Images"
                                                            href="{{ route('product.edit.images', $product->id) }}"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="fa fa-pencil"></i></a>
                                                    </div>

                                                    <div>
                                                        <a title="Delete Product"
                                                            href="{{ route('product.destroy', $product->id) }}"
                                                            id="delete" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></a>
                                                        @if ($product->status == 1)
                                                            <a title="Inactive Now"
                                                                href="{{ route('product.inactive', $product->id) }}"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="fa fa-arrow-down"></i></a>
                                                        @else
                                                            <a title="Active Now"
                                                                href="{{ route('product.active', $product->id) }}"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="fa fa-arrow-up"></i></a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
