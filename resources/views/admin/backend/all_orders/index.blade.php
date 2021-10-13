@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pending Orders</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Total</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td><b>{{ $order->order_date }}</b></td>
                                                <td><b>{{ $order->invoice_no }}</b></td>
                                                <td><b>$</b> {{ $order->amount }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>
                                                    <span class="badge badge-pill text-white" style="background: rgb(255, 153, 0); font-weight: bold;">{{ $order->status }}</span>
                                                </td>
                                                {{-- Action --}}
                                                <td class="text-center">
                                                    <a href="{{ route('details', $order->id) }}" class="btn btn-success btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                
                                                    {{-- <a href="{{ route('coupon.destroy', $order->id) }}" id="delete" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </a>                                                  --}}
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
