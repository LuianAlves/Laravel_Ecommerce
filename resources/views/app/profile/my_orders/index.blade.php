@extends('app.profile.user_profile_template')
@section('profile_orders')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Meus Pedidos' : 'My Orders' }}
@endsection

<div class="row">
    <div class="col-md-12" id="product_details">
        <div class="card">
            <div class="card-header text-center">
                {{ session()->get('language') == 'portuguese' ? 'Meus Pedidos Recentes' : 'My Recent Orders' }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="background: rgb(40, 68, 146); color: #fff;">
                                <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Data' : 'Date' }}</th>
                                <th>Total</th>
                                {{-- <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Pagamento' : 'Payment' }}</th> --}}
                                {{-- <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Fatura' : 'Invoice' }}</th> --}}
                                <th class="text-center">Status</th>
                                <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Opções' : 'Action' }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            @foreach ($orders as $order)
                                <tr style="background: #fff; border-bottom: 1px solid #ccc">
                                    <td><b>{{ $order->order_date }}</b></td>
                                    <td><b>{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}</b> </span> {{ $order->amount }}</td>
                                    {{-- <td>{{ $order->payment_method }}</td> --}}
                                    {{-- <td>{{ $order->invoice_no }}</td> --}}
    
                                    <td width="5%">
                                        @if($order->status == "Pending" || $order->status == "pending")
                                            <span class="badge badge-pill text-white" style="background: #DC7633; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Pendente' : ucfirst($order->status) }} ..</span>
                                        @elseif($order->status == "Confirmed" || $order->status == "confirmed")
                                            <span class="badge badge-pill text-white" style="background: #5D6D7E; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Confirmado' : ucfirst($order->status) }}</span>
                                        @elseif($order->status == "Processing" || $order->status == "processing")
                                            <span class="badge badge-pill text-white" style="background: #9B59B6; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Processando' : ucfirst($order->status) }}</span>
                                        @elseif($order->status == "Picked" || $order->status == "picked")
                                            <span class="badge badge-pill text-white" style="background: #73C6B6; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Escolhido' : ucfirst($order->status) }}</span>
                                        @elseif($order->status == "Shipped" || $order->status == "shipped")
                                            <span class="badge badge-pill text-white" style="background: #F1C40F; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Enviado' : ucfirst($order->status) }}</span>
                                        @elseif($order->status == "Delivered" || $order->status == "delivered")
                                            <span class="badge badge-pill text-white" style="background:#2874A6; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Entregue' : ucfirst($order->status) }}</span>
                                        @elseif($order->status == 'Returned')
                                            <span class="badge badge-pill text-white" style="background: #008000; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Devolvido' : 'Return Success' }}</span>
                                        @else
                                            <span class="badge badge-pill text-white" style="background: red; font-weight: bold;">{{ session()->get('language') == 'portuguese' ? 'Cancelado' : ucfirst($order->status) }}</span>
                                        @endif
                                    </td>
    
                                    <td>
                                        <a href="{{ url('my/orders/details/'.$order->id) }}" class="btn btn-sm btn-info">{{ session()->get('language') == 'portuguese' ? 'Visualizar' : 'View' }}<i class="fa fa-eye"></i></a>
                                        <a target="_blank" href="{{ url('my/orders/download/'.$order->id) }}" class="btn btn-sm btn-danger">{{ session()->get('language') == 'portuguese' ? 'Fatura' : 'Invoice' }}<i class="fa fa-download"></i></a>
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

@endsection

<style>
    /* Product Detail */
    #product_details {
        background: #fff;
        margin: 10px;
        border-radius: 15px;
        border: 1px solid rgb(22, 90, 168);
    }

    #product_details .card-header {
        font-family: "Poppins", sans-serif;
        font-size: 22px;
        margin: 15px;
    }

    #product_details table tr {
        font-size: 14px;
    }

    #product_details table th {
        background: #3065c9;
        color: #fff;
        padding: 12px 15px;
    }

    #product_details table span {
        font-style: italic;
        font-weight: normal;
        float: right;
    }

    #product_details .btn-info {
        background: #1eaa80;
    }

    #product_details .btn-info:hover {
        background: #1c775c;
    }
    #product_details .btn {
        margin: 10px auto;
        width: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
        border: none;
    }
</style>

