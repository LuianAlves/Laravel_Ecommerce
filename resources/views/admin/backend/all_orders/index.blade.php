@php
    $name = Request::route()->getName();

    $title = ucfirst(str_replace('.view', ' ', $name));
    $check = strtolower(str_replace('.view', '.update', $name));

@endphp

@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $title }} Orders <span class="badge badge-success badge-pill"> {{ count($orders) }}</h3>
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
                                                <td><b class="text-success">$</b> {{ $order->amount }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>
                                                    @if($order->status == "Pending" || $order->status == "pending")
                                                        <span class="badge badge-pill text-white" style="background: rgb(255, 153, 0); font-weight: bold;">{{ ucfirst($order->status) }} ..</span>
                                                    @elseif($order->status == "Delivered" || $order->status == "delivered")
                                                        <span class="badge badge-pill text-white" style="background: blue; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @elseif($order->status == "Cancel" || $order->status == "cancel")
                                                        <span class="badge badge-pill text-white" style="background: red; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @else
                                                        <span class="badge badge-pill text-white" style="background: green; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @endif
                                                </td>
                                                {{-- Action --}}
                                                <td class="text-center">
                                                    <a href="{{ route('details', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    @if($order->status != 'Delivered' && $order->status != 'Cancel')
                                                        <a href="{{ route($check, $order->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                    @endif
                                                    @if($order->status != 'Delivered' && $order->status != 'Cancel')
                                                        <a href="{{ route('cancel.update', $order->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>
                                                        @endif
                                                    <a target="_blank" href="{{ route('download', $order->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-download"></i></a>
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
