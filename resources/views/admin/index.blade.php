@extends('admin.admin_template')

@section('admin')

    @php
    $date = date('d-m-y');
    $today_sell = App\Models\Order::where('order_date', $date)->sum('amount');

    $month = date('F');
    $month_sell = App\Models\Order::where('order_month', $month)->sum('amount');

    $year = date('F');
    $year_sell = App\Models\Order::where('order_year', $year)->sum('amount');

    $pending = App\Models\Order::where('status', 'Pending')->get();
    $delivered = App\Models\Order::where('status', 'Delivered')->get();
    $reviews = App\Models\ProductReview::where('status', 0)->get();

    $orders = App\Models\Order::orderBy('id', 'DESC')
        ->limit(5)
        ->get();

    $products = App\Models\Product::where('product_qty', '<=', 0)
        ->orderBy('product_name_en', 'ASC')
        ->simplePaginate(5);

    $count_reviews = App\Models\ProductReview::where('status', 0)->get();
    $reviews = App\Models\ProductReview::where('status', 0)->latest()->simplePaginate(5);
    @endphp


    <div class="container-full">
        <section class="content">
            <div class="row">
                {{-- Today/Monthly/Year Sale --}}
                <div class="col-xl-3 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
                                <h3 class="text-white mb-0 font-weight-500">$ {{ $today_sell }}<small
                                        class="text-success"> USD</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale</p>
                                <h3 class="text-white mb-0 font-weight-500">{{ $month_sell }}<small
                                        class="text-success"> USD</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16"> Year Sale</p>
                                <h3 class="text-white mb-0 font-weight-500">$ {{ $year_sell }}<small
                                        class="text-success"> USD</small></h3>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pending/Delivered/Review --}}
                <div class="col-xl-3 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 fa fa-shopping-cart"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                                <h3 class="text-white mb-0 font-weight-500">{{ count($pending) }} <a
                                        href="{{ route('pending.view') }}" class="text-warning font-size-16"> Order(s)</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-success-light rounded w-60 h-60">
                                <i class="text-success mr-0 font-size-24 fa fa-check"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Delivered Orders</p>
                                <h3 class="text-white mb-0 font-weight-500">{{ count($delivered) }} <a
                                        href="{{ route('delivered.view') }}" class="text-success font-size-16">
                                        Order(s)</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 fa fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Pending Reviews</p>
                                <h3 class="text-white mb-0 font-weight-500">{{ count($count_reviews) }} <a
                                        href="{{ route('review.pedding') }}" class="text-warning font-size-16">
                                        Review(s)</a></h3>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Recent Orders --}}
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                Recent All Orders
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                        <tr class="text-uppercase text-center bg-lightest">
                                            <th><span class="text-white">Date</span></th>
                                            <th style="min-width: 150px;"><span class="text-fade">Amount</span></th>
                                            <th><span class="text-fade">Invoice</span></th>
                                            <th><span class="text-fade">Payment</span></th>
                                            <th style="min-width: 120px;"><span class="text-fade">status</span></th>
                                            <th style="min-width: 150px;"><span class="text-fade">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-16">
                                                        {{ $order->order_date }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        <span class="text-success">$</span>
                                                        {{ $order->amount }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $order->invoice_no }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $order->payment_method }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($order->status == 'Pending' || $order->status == 'pending')
                                                        <span class="badge badge-lg text-white"
                                                            style="background: #DC7633; font-weight: bold;">{{ ucfirst($order->status) }}
                                                            ..</span>
                                                    @elseif($order->status == "Confirmed" || $order->status ==
                                                        "confirmed")
                                                        <span class="badge badge-lg text-white"
                                                            style="background: #5D6D7E; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @elseif($order->status == "Processing" || $order->status ==
                                                        "processing")
                                                        <span class="badge badge-lg text-white"
                                                            style="background: #9B59B6; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @elseif($order->status == "Picked" || $order->status == "picked")
                                                        <span class="badge badge-lg text-white"
                                                            style="background: #73C6B6; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @elseif($order->status == "Shipped" || $order->status == "shipped")
                                                        <span class="badge badge-lg text-white"
                                                            style="background: #F1C40F; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @elseif($order->status == "Delivered" || $order->status ==
                                                        "delivered")
                                                        <span class="badge badge-lg text-white"
                                                            style="background:#2874A6; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @elseif($order->status == "Returned" || $order->status ==
                                                        "returned")
                                                        <span class="badge badge-lg text-white"
                                                            style="background:#008000; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @else
                                                        <span class="badge badge-lg text-white"
                                                            style="background: red; font-weight: bold;">{{ ucfirst($order->status) }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('details', $order->id) }}"
                                                        class="waves-effect waves-light btn-sm btn-info mx-1"><i
                                                            class="fa fa-eye"></i></a>

                                                    @if ($order->status != 'Delivered' && $order->status != 'Cancel')
                                                        <a href="{{ route('cancel.update', $order->id) }}"
                                                            class="waves-effect waves-light btn-sm btn-danger mx-1"><i
                                                                class="fa fa-close"></i></a>
                                                    @endif

                                                    <a target="_blank" href="{{ route('download', $order->id) }}"
                                                        class="waves-effect waves-light btn-sm btn-warning mx-1"><i
                                                            class="fa fa-download"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Products Stock Out --}}
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                Product Stock Out <span class="badge badge-success badge-pill"> {{ count($products) }}
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                        <tr class="text-uppercase text-center bg-lightest">
                                            <th><span class="text-white">Image</span></th>
                                            <th><span class="text-white">Product</span></th>
                                            <th style="min-width: 150px;"><span class="text-fade">Selling Price</span>
                                            </th>
                                            <th style="min-width: 120px;"><span class="text-fade">status</span></th>
                                            <th style="min-width: 150px;"><span class="text-fade">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="text-center">
                                                <td class="bg-white" style="border: 2px solid #000">
                                                    <img src="{{ asset($product->product_thumnail) }}"
                                                        style="width: 75px; height: 50px;">
                                                </td>
                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-16">
                                                        {{ $product->product_name_en }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        <span class="text-success">$</span>
                                                        {{ $product->selling_price }}
                                                    </span>
                                                </td>
                                                <td><span class="badge badge-lg text-white"
                                                        style="background: red; font-weight: bold;">Stock Out</span></td>
                                                <td>
                                                    <a href="{{ route('stock.edit', $product->id) }}"
                                                        class="btn btn-warning mx-1"><i class="fa fa-magic"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>

                {{-- Last Reviews --}}
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                Recent Pending Reviews
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                        <tr class="text-uppercase text-center bg-lightest">
                                            <th style="min-width: 150px;"><span class="text-fade">Username</span>
                                            <th style="min-width: 150px;"><span class="text-white">Product</span></th>
                                            <th style="min-width: 120px;"><span class="text-fade">Summary</span></th>
                                            <th style="min-width: 150px;"><span class="text-fade">Comment</span></th>
                                            <th style="min-width: 150px;"><span class="text-fade">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reviews as $review)
                                            <tr class="text-center">
                                                <td>
                                                    <img src="{{ !empty($review->user->profile_photo_path) ? url('upload/user_images/'.$review->user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                    style="border-radius: 50%; width: 30px; height: 30px; margin: 10px;">
                                                    <span class="text-fade font-weight-600 d-block font-size-14">
                                                        {{ $review->user->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-16">
                                                        {{ $review->product->product_name_en }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $review->summary }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-14">
                                                        {{ $review->comment }}
                                                    </span>
                                                </td>
                                                {{-- Action --}}
                                                <td class="text-center">
                                                    @if($review->status == 0)
                                                        <a href="{{ route('review.aprove', $review->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                    @else
                                                        <span class="badge badge-info">Aproved</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer">
                            {{ $reviews->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
