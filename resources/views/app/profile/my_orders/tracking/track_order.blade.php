@extends('app.main_template')
@section('content')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Rastrear Pedido' : 'Order Tracking' }}
@endsection

<style type="text/css">
    body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    }

    .card {
        margin-top: 15px;
        padding: 20px;
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #2948f7
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #e9d51e;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #1665be;
        border-color: #1665be;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #064cb4;
        border-color: #064cb4;
        border-radius: 1px
    }

</style>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">{{ session()->get('language') == 'portuguese' ? 'Início' : 'Home' }}</a></li>
                <li>{{ session()->get('language') == 'portuguese' ? 'Rastrear Pedido' : 'Order Tracking' }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <article class="card">
        <div class="card-body">
            <h5>
                <b>
                    <span class="text-success"> {{ $track->invoice_no }}</span>
                </b> 
            </h5>

            <article class="card">
                <div class="card-body row">
                    <div class="col"> 
                        <h4>{{ session()->get('language') == 'portuguese' ? 'Data do Pedido' : 'Order Date' }}: </h4> 
                        <b> {{ $track->order_date }} </b>
                    </div>
                    <div class="col"> 
                        <h4>{{ session()->get('language') == 'portuguese' ? 'Enviado para' : 'Shipping BY' }}: </h4> 
                        <b> <i class="fa fa-user"></i> {{ $track->name }} | {{ $track->email }} | <i class="fa fa-phone"></i> {{ $track->phone }} </b>
                    </div>
                    <div class="col">
                        <h4>Status: </h4> 
                        <b class="text-success"> {{ $track->status }} </b>
                    </div>
                    <div class="col"> 
                        <h4>{{ session()->get('language') == 'portuguese' ? 'Rastreio' : 'Tracking' }}:</h4> 
                        <b class="text-warning"> {{ $track->invoice_no }} </b>
                    </div>
                </div>
            </article>

            <div class="track">
                <div class="step {{ $track->order_date ?  'active' : '' }} "> 
                    <span class="icon"> <i class="fa fa-check"></i> </span> 
                    <span class="text">{{ session()->get('language') == 'portuguese' ? 'Pendente' : 'Pending' }}</span> 
                </div>

                <div class="step {{ $track->confirmed_date ?  'active' : '' }} "> 
                    <span class="icon"> <i class="fa {{ $track->confirmed_date != null ? 'fa-check' : 'fa-magic' }}"></i> </span> 
                    <span class="text">{{ session()->get('language') == 'portuguese' ? 'Confirmado' : 'Confirmed' }}</span> 
                </div>

                <div class="step {{ $track->processing_date ?  'active' : '' }} "> 
                    <span class="icon"> <i class="fa {{ $track->processing_date != null ? 'fa-check' : 'fa-hourglass' }}"></i> </span> 
                    <span class="text">{{ session()->get('language') == 'portuguese' ? 'Processando' : 'Processing' }}</span> 
                </div>

                <div class="step {{ $track->picked_date ? 'active' : '' }} "> 
                    <span class="icon"> <i class="fa {{ $track->picked_date != null ? 'fa-check' : 'fa-cubes' }}"></i> </span> 
                    <span class="text">{{ session()->get('language') == 'portuguese' ? 'Escolhido' : 'Picked' }}</span> 
                </div>

                <div class="step {{ $track->shipped_date ? 'active' : '' }} "> 
                    <span class="icon"> <i class="fa {{ $track->shipped_date != null ? 'fa-check' : 'fa-paper-plane' }}"></i> </span> 
                    <span class="text">{{ session()->get('language') == 'portuguese' ? 'Encaminhado' : 'Shipped' }}</span> 
                </div>

                <div class="step {{ $track->delivered_date ? 'active' : '' }} "> 
                    <span class="icon"> <i class="fa {{ $track->delivered_date != null ? 'fa-check' : 'fa-home' }}"></i> </span> 
                    <span class="text">{{ session()->get('language') == 'portuguese' ? 'Entregue' : 'Delivered' }}</span> 
                </div>

                {{-- Returned --}}
                @if( $track->return_order != 0)
                    <div class="step {{ $track->return_order == 2 ? 'active' : '' }} "> 
                        <span class="icon"> <i class="fa {{ $track->return_order == 2 ? 'fa-check' : 'fa-road' }}"></i> </span> 
                        <span class="text">{{ session()->get('language') == 'portuguese' ? 'Devolvido' : 'Returned' }}</span> 
                    </div>
                @endif
            </div>

            <hr>

            <ul class="row">
                @foreach($products as $item)
                    <li class="col-md-4" style="border: 1px solid #f2f3f5;">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="{{ asset($item->product->product_thumnail) }}" class="img-sm border">
                            </div>
                            <figcaption class="info align-self-center">
                                <p class="title">{{ session()->get('language') == 'portuguese' ? $item->product->product_name_pt : $item->product->product_name_en }} </p>                         
                                <span class="text-muted"><b class="text-success">$</b> {{ $item->price }}</span>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
            
            {{-- <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to
                orders</a> --}}

        </div>
    </article>
</div>

@endsection
