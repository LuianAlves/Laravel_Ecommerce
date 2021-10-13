@extends('app.main_template')
@section('content')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Carrinho de Compras' : 'My Cart' }}
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">{{ session()->get('language') == 'portuguese' ? 'Início' : 'Home' }}</a></li>
                <li><a href="#">{{ session()->get('language') == 'portuguese' ? 'Carrinho de Compras' : 'My Cart' }}</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">

                {{-- My Cart --}}
				<div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">{{ session()->get('language') == 'portuguese' ? 'Meu Carrinho' : 'My Cart' }}</th>
                                </tr>
                                <tr>
                                    <th class="cart-romove item">{{ session()->get('language') == 'portuguese' ? 'Remover' : 'Remove' }}</th>
                                    <th class="cart-description item">{{ session()->get('language') == 'portuguese' ? 'Imagem' : 'Image' }}</th>
                                    <th class="cart-product-name item">{{ session()->get('language') == 'portuguese' ? 'Produto' : 'Product Name' }}</th>
                                    <th class="cart-qty item">{{ session()->get('language') == 'portuguese' ? 'Quantitdade' : 'Quantity' }}</th>
                                    <th class="cart-sub-total item" width="15%">SubTotal</th>
                                    <th class="cart-total last-item" width="15%">{{ session()->get('language') == 'portuguese' ? 'Total' : 'Grandtotal' }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="{{ url('/') }}" class="btn btn-upper btn-primary pull-right outer-right-xs">{{ session()->get('language') == 'portuguese' ? 'Continuar comprando' : 'Continue Shopping' }}</a>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody id="cartPage"></tbody>
                        </table>
                    </div>
                </div>

                {{-- Cupom Desconto --}}
                <div class="col-md-4 estimate-ship-tax">
                    @if(Session::has('coupon'))
                        
                    @else                        
                        <table class="table" id="couponField">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">{{ session()->get('language') == 'portuguese' ? 'Cupom de Desconto' : 'Discount Code' }}</span>
                                        <p>{{ session()->get('language') == 'portuguese' ? 'Coloque seu cupom de desconto caso tenha..' : 'Enter your coupon code if you have one..' }}</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input" id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">{{ session()->get('language') == 'portuguese' ? 'Aplicar Cupom' : 'APPLY COUPON' }}</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="col-md-4"></div>

                {{-- Valor Total --}}
                <div class="col-md-4 cart-shopping-total">
                    <table class="table">
                        <thead id="couponDiscount"></thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{ route('checkout.index') }}" type="submit" class="btn btn-success" style="font-weight: bold; color: white;">{{ session()->get('language') == 'portuguese' ? 'Prossiga com a Compra' : 'PROCCED TO CHEKOUT' }}</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div>	

            </div>
        </div> 
    </div>
</div>

@endsection