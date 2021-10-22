@extends('admin.admin_template')
@section('admin')

<div class="container-full">
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Return Orders <span class="badge badge-success badge-pill"> {{ count($orders) }}</h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><b>{{ $order->order_date }}</b></td>
                                            <td><b class="text-success">$</b> {{ $order->amount }}</td>
                                            <td>{{ $order->return_reason }}</td>
                                            <td>
                                                @if($order->return_order == 1)
                                                    <span class="badge badge-pill text-white" style="background: #DC7633; font-weight: bold;">Return Pending</span>
                                                @elseif($order->return_order == 2)
                                                    <span class="badge badge-pill text-white" style="background: #DC7633; font-weight: bold;">Return Sucessfully</span>
                                                @endif
                                            </td>
                                            {{-- Action --}}
                                            <td width="15%" class="text-center">
                                                <a href="{{ route('return.aprove', $order->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"> Aprove</i></a>
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