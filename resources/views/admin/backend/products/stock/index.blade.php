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
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name En</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th width="30%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="bg-white" style="border: 2px solid #000"><img src="{{ asset($product->product_thumnail) }}" style="width: 60px; height: 50px;"></td>

                                                <td>{{ $product->product_name_en }}</td>

                                                <td class="text-center">
                                                    @if($product->product_qty <= 0)
                                                        <span class="badge badge-lg text-white" style="background: red; font-weight: bold;">{{ $product->product_qty }}</span>
                                                    @else
                                                    <span class="badge badge-lg text-white" style="background: green; font-weight: bold;">{{ $product->product_qty }}</span>
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
                                                        <a title="Edit Product" href="{{ route('stock.edit', $product->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                                        @if ($product->status == 1)
                                                            <a title="Inactive Now" href="{{ route('product.inactive', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-arrow-down"></i></a>
                                                        @else
                                                            <a title="Active Now" href="{{ route('product.active', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></a>
                                                        @endif
                                                        <a title="Delete Product" href="{{ route('product.destroy', $product->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
