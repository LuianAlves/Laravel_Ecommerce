@extends('app.profile.user_profile_template')
@section('profile_orders')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Detalhes do Pedido' : 'Order Details' }}
@endsection

<div class="row">
    {{-- Shipping Details --}}
    <div class="col-md-6" id="ship_details">
        <div class="card">
            <div class="card-header text-center">
                {{ session()->get('language') == 'portuguese' ? 'Envio' : 'Shipping Details' }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Nome de Envio' : 'Shipping Name'}}: <span>{{ $order->name }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Telefone' : 'Phone'}}: <span>{{ $order->phone }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Email: <span>{{ $order->email }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Região' : 'Division'}}: <span>{{ $order->division->division_name }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Estado' : 'State'}}: <span>{{ $order->state->state_name }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Município' : 'District'}}: <span>{{ $order->district->district_name }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'CEP' : 'Post Code'}}: <span>{{ $order->post_code }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Data do Pedido' : 'Order Date'}}: <span>{{ $order->order_date }}</span>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Order Details --}}
    <div class="col-md-5" id="ship_details">
        <div class="card">
            <div class="card-header text-center">
                {{ session()->get('language') == 'portuguese' ? 'Pedido' : 'Order Details' }}
                <span class="badge badge-pill"
                    style="float: right; background: #3065c9">{{ $order->invoice_no }}</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            {{-- Transaction Id --}}
                            @if($order->transaction_id == null)
                            @else
                                <tr>
                                    <th>
                                        Tranx ID: <span>{{ $order->transaction_id }}</span>
                                    </th>
                                </tr>
                            @endif

                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Usuário' : 'Username' }}: <span>{{ $order->user->name }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Telefone' : 'Phone' }}: <span>{{ $order->user->phone }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Tipo de Pagamento' : 'Payment Type' }}: <span>{{ $order->payment_method }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Fatura' : 'Invoice' }}: <span class="text-danger">{{ $order->invoice_no }}</span>
                                </th>
                            </tr>

                            {{-- Order Number --}}
                            @if($order->order_number == null)
                            @else
                                <tr>
                                    <th>
                                        {{ session()->get('language') == 'portuguese' ? 'Número do Pedido' : 'Order Number' }}: <span class="text-danger">{{ $order->order_number }}</span>
                                    </th>
                                </tr>
                            @endif

                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Preço Total' : 'Price Total' }}: <span>$ {{ $order->amount }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    {{ session()->get('language') == 'portuguese' ? 'Pedido' : 'Order' }}: 
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Product Details --}}
    <div class="row">
        <div class="col-md-12" id="product_details">
            <div class="card">
                <div class="card-header text-center">
                    {{ session()->get('language') == 'portuguese' ? 'Produtos' : 'Products' }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Imagem' : 'Image' }}</th>
                                    <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Produto' : 'Product' }}</th>
                                    <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Código' : 'Code' }}</th>
                                    <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Cor' : 'Color' }}</th>
                                    <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Tamanho' : 'Size' }}</th>
                                    <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Qtd' : 'Qty' }}</th>
                                    <th class="text-center">{{ session()->get('language') == 'portuguese' ? 'Preço' : 'Price' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td><img src="{{ asset($item->product->product_thumnail) }}" style="width: 50px; height: 75px;"></td>
                                        <td>{{ session()->get('language') == 'portuguese' ? $item->product->product_name_pt : $item->product->product_name_en }}</td>
                                        <td>{{ $item->product->product_code }}</td>
    
                                        <td>
                                            @if($item->color  != null || $item->color  != '')
                                                {{ strtoupper($item->color) }}
                                            @else
                                                ...
                                            @endif
                                        </td>
    
                                        <td>
                                            @if($item->size  != null || $item->size  != '')
                                                {{ $item->size }}
                                            @else
                                                ...
                                            @endif
                                        </td>
    
                                        <td>{{ $item->qty }}</td>
                                        <td class="col-md-2"><b>$</b> {{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Order Return Reason --}}
    @if($order->status != 'Delivered')
    @elseif($order->status == 'Delivered' && $order->return_reason == null)
        <form action="{{ route('my.order.return', $order->id) }}" method="post">
            @csrf

            <div class="col-md-12" id="returnReason">
                <div class="form-group">
                    <label for="label">{{ session()->get('language') == 'portuguese' ? 'Motivo de Devolução' : 'Order Return Reason' }}</label>
                    <textarea class="form-control" name="return_reason" cols="50" rows="10"></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group" id="buttonReason">
                    <button type="submit" class="btn btn-md">{{ session()->get('language') == 'portuguese' ? 'Devolver' : 'Return'}}</button>
                </div>
            </div>
        </form>
    @else
        <span class="badge" style="margin-top: 15px; background:rgb(255, 153, 0); font-size: 16px;">You Have Send Return Request for this Product!!</span>        
    @endif
</div>

<hr>



@endsection

<style>
    /* Ship Details */
    #ship_details {
        background: #fff;
        margin: 10px;
        border-radius: 15px;
    }

    #ship_details .card-header {
        font-family: "Poppins", sans-serif;
        font-size: 22px;
        margin: 15px;
    }

    #ship_details table tr {
        font-size: 14px;
        border: 1px solid rgb(22, 90, 168);
    }

    #ship_details table th {
        padding: 12px 15px;
    }

    #ship_details table span {
        font-style: italic;
        font-weight: normal;
        float: right;
    }

    /* Product Detail */
    #product_details {
        font-family: "Poppins", sans-serif;
        background: #fff;
        margin-top: 15px;
        padding: 2px;
        border-radius: 10px;
        border: 1px solid rgb(22, 90, 168);
    }

    #product_details .card-header {
        font-family: "Poppins", sans-serif;
        font-size: 22px;
        margin: 15px;
    }

    #product_details table th {
        background: #3065c9;
        color: #fff;
        padding: 12px 15px;
    }

    #product_details table tr {
        font-size: 14px;
    }

    #product_details table span {
        font-style: italic;
        font-weight: normal;
        float: right;
    }

    /* Return Reason */
    #returnReason {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }

    #returnReason label {
        font-size: 16px;
        font-family: "Poppins", sans-serif;
    }

    #returnReason textarea {
        border: 2px solid #3065c9;
    }

    #buttonReason {
        display: flex;
        justify-content: flex-end;
    }

    #buttonReason button {
        color: #fff;
        font-weight: bold;
        background: #c72f2a;
        border: none;
    }

</style>
