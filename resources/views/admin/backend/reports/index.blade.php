@extends('admin.admin_template')
@section('admin')
    <div class="container-full">
        
        <section class="content">

            <div class="box-header with-border">
                <h3 class="box-title">Search Return</h3>
            </div>

            <div class="row">
                {{-- Date --}}
                <div class="col-4">
                    <div class="box">    
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('report.search.date') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <h5 class="font-weight-bold">Search by Date</h5>
                                            <div class="controls">
                                                <input type="date" name="date" class="form-control form-control-sm">
                                                @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="font-weight-bold btn btn-success btn-sm mt-5 float-right">Search Date</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Select Month/Year --}}
                <div class="col-4">
                    <div class="box">    
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('report.search.month') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <h5 class="font-weight-bold">Select Month</h5>
                                            <div class="controls">
                                                <select class="form-control form-control-sm" name="month">
                                                    <option label="Choose One" disabled></option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                                @error('month')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5 class="font-weight-bold">Select Month</h5>
                                            <div class="controls">
                                                <select class="form-control form-control-sm" name="year_name">
                                                    <option label="Choose One" disabled></option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                </select>
                                                @error('year_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="font-weight-bold btn btn-warning btn-sm mt-5 float-right">Search Date</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Select Year --}}
                <div class="col-4">
                    <div class="box">    
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('report.search.year') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <h5 class="font-weight-bold">Select Year</h5>
                                            <div class="controls">
                                                <select class="form-control form-control-sm" name="year">
                                                    <option label="Choose One" disabled></option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                </select>
                                                @error('year')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="font-weight-bold btn btn-danger btn-sm mt-5 float-right">Search Year</button>
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
                            <h3 class="box-title">Report List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($orders as $order)
                                           <tr class="text-center">
                                               <td><b style="color: #fff;">{{ $order->order_date }}</b></td>
                                               <td><b>{{ $order->invoice_no }}</b></td>
                                               <td><span class="text-success">$ </span><b>{{ $order->amount }}</b></td>
                                               <td><b>{{ $order->payment_method }}</b></td>
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
                                               <td>
                                                   <a href="{{ route('details', $order->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                   <a href="{{ route('download', $order->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-download"></i></a>
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

            </div>
        </section>

    </div>
@endsection
