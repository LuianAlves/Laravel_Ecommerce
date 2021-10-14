@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                {{-- Shipping Details --}}
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shipping Details</h3>
                        </div>

                        <div class="box-body" id="details">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>
                                                Shipping Name: <span>{{ $order->name }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Phone: <span>{{ $order->phone }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Email: <span>{{ $order->email }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Division: <span>{{ $order->division->division_name }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                State: <span>{{ $order->state->state_name }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                District: <span>{{ $order->district->district_name }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Post Code: <span>{{ $order->post_code }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Order Date: <span>{{ $order->order_date }}</span>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Order Details --}}
                <div class="col-6">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Order Details</h3>
                            <span class="badge badge-pill float-right"
                                style="font-weight: bold; background: #fff;">{{ $order->invoice_no }}</span>
                        </div>

                        <div class="box-body" id="details">
                            <div class="table-responsive">
                                <table class="table table-borded table-striped">
                                    <tbody>
                                        {{-- Transaction Id --}}
                                        @if ($order->transaction_id == null)
                                        @else
                                            <tr>
                                                <th>
                                                    Tranx ID: <span>{{ $order->transaction_id }}</span>
                                                </th>
                                            </tr>
                                        @endif
                                        {{-- Username --}}
                                        <tr>
                                            <th>
                                                Username: <span>{{ $order->user->name }}</span>
                                            </th>
                                        </tr>
                                        {{-- Phone --}}
                                        <tr>
                                            <th>
                                                Phone: <span>{{ $order->user->phone }}</span>
                                            </th>
                                        </tr>
                                        {{-- Payment Type --}}
                                        <tr>
                                            <th>
                                                Payment Type: <span>{{ $order->payment_method }}</span>
                                            </th>
                                        </tr>
                                        {{-- Invoice --}}
                                        <tr>
                                            <th>
                                                Invoice: <span class="text-danger font-weight-bold">{{ $order->invoice_no }}</span>
                                            </th>
                                        </tr>
                                        {{-- Total Price --}}
                                        <tr>
                                            <th>
                                                Total Paid: <span><b class="text-success">$</b> {{ $order->amount }}</span>
                                            </th>
                                        </tr>
                                        {{-- Order Number --}}
                                        @if ($order->order_number == null)
                                        @else
                                            <tr>
                                                <th>
                                                    Order Number: <span>{{ $order->order_number }}</span>
                                                </th>
                                            </tr>
                                        @endif
                                        {{-- Status --}}
                                        <tr>
                                            <th>
                                                Status: 
                                                    @if($order->status == "Pending" || $order->status == "pending")
                                                        <span class="badge badge-pill text-white" style="background: rgb(255, 153, 0); font-weight: bold;">{{ ucfirst($order->status) }} ..</span>
                                                    @elseif($order->status == "Delivered" || $order->status == "delivered")
                                                        <span class="badge badge-pill text-white" style="background: blue; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @elseif($order->status == "Cancel" || $order->status == "cancel")
                                                        <span class="badge badge-pill text-white" style="background: red; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @else
                                                        <span class="badge badge-pill text-white" style="background: green; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @endif
                                            </th>
                                        </tr>
                                        {{-- Button --}}
                                        <tr>
                                            <th>
                                                <button type="submit">Confirm Order</button>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Product --}}
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Products</h3>
                        </div>

                        <div class="box-body" id="product_details">
                            <div class="table-responsive">
                                <table class="table table-borded table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Code</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach($orderItem as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->product->product_thumnail) }}" style="width: 70px; height: 75px;"> </td>
                                                <td> {{ $item->product->product_name_en }} </td>
                                                <td> {{ $item->product->product_code }} </td>
                                                <td> <b>{{ $item->color == null ? '...' : strtoupper($item->color) }}</b> </td>
                                                <td> <b>{{ $item->size == null ? '...' : strtoupper($item->size) }}</b> </td>
                                                <td> {{ $item->qty }} </td>
                                                <td><b class="text-success">$</b> {{ $item->price * $item->qty }} </td>
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

<style>
    /* Ship Details */
    #details table tr {
        font-size: 14px;
    }

    #details table th {
        padding: 12px 15px;
    }

    #details table span {
        color: #fff;
        font-weight: normal;
        float: right;
    }

    /* Product Details */
    #product_details table tr {
        font-size: 14px;
    }

    #product_details table b{
        color: #fff;
        font-style: italic;
    }
</style>
