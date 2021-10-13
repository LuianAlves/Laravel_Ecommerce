@extends('app.main_template')
@section('content')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Stripe' : 'Stripe Payment' }}
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li>
                    <a href="{{ url('/') }}">{{ session()->get('language') == 'portuguese' ? 'Início' : 'Home' }}</a>
                </li>
                <li>
                    <a href="{{ url('/my/cart/index') }}">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Cart' }}</a>
                </li>
                <li>
                    <a href="{{ url('/checkout/view') }}">{{ session()->get('language') == 'portuguese' ? 'Finalizar' : 'Checkout' }}</a>
                </li>
                <li>
                    <a href="#">{{ session()->get('language') == 'portuguese' ? 'Dinheiro na Entrega' : 'Cash On Delivery' }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">

                {{-- Product Data --}}
                <div class="col-md-8">
                    <div class="shopping-cart">
                        <div class="shopping-cart-table ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="heading-title">
                                                {{ session()->get('language') == 'portuguese' ? 'Produtos' : 'Products' }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="cart-description item">
                                                {{ session()->get('language') == 'portuguese' ? 'Imagem' : 'Image' }}
                                            </th>
                                            <th class="cart-product-name item">
                                                {{ session()->get('language') == 'portuguese' ? 'Produto' : 'Product Name' }}
                                            </th>
                                            <th class="cart-qty item">
                                                {{ session()->get('language') == 'portuguese' ? 'Quantitdade' : 'Quantity' }}
                                            </th>
                                            <th class="cart-total last-item" width="25%">
                                                {{ session()->get('language') == 'portuguese' ? 'Valor' : 'Price' }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="paymentPage"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Payments Method --}}
                <div class="col-md-4">                 			
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">{{ session()->get('language') == 'portuguese' ? 'Pagamento em Dinheiro' : 'Cash Payment'}}</h4>
                                </div>
                                <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">
                                        <img style="width: 220px; margin: 15px;" src="{{ asset('frontend/assets/images/payments/cash.png') }}" alt="">
                                        <label for="card-element">
                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                        </label>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-md btn-success"><b>Payment Step</b></button>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
                    
                {{-- Price --}}
                <div class="col-md-4">
                    <div class="shopping-cart">
                        <ul class="nav nav-checkout-progress list-unstyled">
                            {{-- COM CUPOM --}}
                            @if (Session::has('coupon'))
                                {{-- Subtotal --}}
                                <li>
                                    <h4>
                                        <strong>Subtotal:
                                            <span
                                                style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                {{ $cartTotal }}</span>
                                        </strong>
                                    </h4>
                                </li>
                                {{-- Coupon --}}
                                <li>
                                    <h4>
                                        <strong>{{ session()->get('language') == 'portuguese' ? 'Cupom:' : 'Coupon:' }}
                                            <span style="float: right; color: #298ff5;">
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ({{ session()->get('coupon')['coupon_discount'] }}%)
                                            </span>
                                        </strong>
                                    </h4>
                                </li>
                                <br>
                                {{-- Discount --}}
                                <li>
                                    <h4>
                                        <strong>{{ session()->get('language') == 'portuguese' ? 'Desconto:' : 'Discount:' }}
                                            <span class="text-danger" style="float: right;">
                                                {{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                {{ session()->get('coupon')['discount_amount'] }}
                                            </span>
                                        </strong>
                                    </h4>
                                </li>
                                {{-- Total --}}
                                <li>
                                    <h4>
                                        <strong>Total:
                                            <span
                                                style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                {{ session()->get('coupon')['total_amount'] }}</span>
                                        </strong>
                                    </h4>
                                </li>
                                {{-- SEM CUPOM --}}
                            @else
                                <li>
                                    <h4>
                                        <strong>Subtotal:
                                            <span
                                                style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                {{ $cartTotal }}</span>
                                        </strong>
                                    </h4>
                                </li>
                                <li>
                                    <h4>
                                        <strong>Total:
                                            <span
                                                style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }}
                                                {{ $cartTotal }}</span>
                                        </strong>
                                    </h4>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ====== AJAX PAYMENT PAGE ====== -->
@include('app.body.ajax.payment_page')

@endsection
