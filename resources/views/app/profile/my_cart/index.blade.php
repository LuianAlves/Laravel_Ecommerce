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

                {{-- Cart User Infos --}}
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Estimate shipping and tax</span>
                                    <p>Enter your destination to get shipping and tax.</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="info-title control-label">Country <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker">
                                                <option>--Select options--</option>
                                                <option>India</option>
                                                <option>SriLanka</option>
                                                <option>united kingdom</option>
                                                <option>saudi arabia</option>
                                                <option>united arab emirates</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title control-label">State/Province <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker">
                                                <option>--Select options--</option>
                                                <option>TamilNadu</option>
                                                <option>Kerala</option>
                                                <option>Andhra Pradesh</option>
                                                <option>Karnataka</option>
                                                <option>Madhya Pradesh</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title control-label">Zip/Postal Code</label>
                                            <input type="text" class="form-control unicase-form-control text-input" placeholder="">
                                        </div>
                                        <div class="pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Cupom Desconto --}}
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                        </div>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div>

                {{-- Valor Total --}}
                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">$600.00</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Total<span class="inner-left-md">$600.00</span>
                                    </div>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                            <span class="">Checkout with multiples address!</span>
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