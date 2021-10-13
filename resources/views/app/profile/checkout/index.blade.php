@extends('app.main_template')
@section('content')

@section('title')
    {{ session()->get('language') == 'portuguese' ? 'Finalizar Compra' : 'Checkout' }}
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">{{ session()->get('language') == 'portuguese' ? 'Início' : 'Home' }}</a></li>
                <li><a href="{{ url('/my/cart/index') }}">{{ session()->get('language') == 'portuguese' ? 'Carrinho' : 'Cart' }}</a></li>
                <li><a href="#">{{ session()->get('language') == 'portuguese' ? 'Finalizar Compra' : 'Checkout' }}</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">

                <form method="post" action="{{ route('checkout.store') }}">
                    @csrf

                    {{-- Shipping Address --}}
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">					
                            <div class="panel panel-default checkout-step-01">
                                <div id="collapseOne" class="panel-collapse collapse in">                               
                                    <div class="panel-body">
                                        <div class="row">		
            
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>{{ session()->get('language') == 'portuguese' ? 'Dados do Usuário' : 'Shipping Address'}}</b></h4>

                                                    {{-- Name --}}
                                                    <div class="form-group">
                                                        <label class="info-title" for="shipping_name">{{ session()->get('language') == 'portuguese' ? 'Nome' : 'Shipping Name'}} <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" name="shipping_name" id="shipping_name" value="{{ Auth::user()->name }}">
                                                    </div>
                                                    {{-- E-mail --}}
                                                    <div class="form-group">
                                                        <label class="info-title" for="shipping_email">E-mail <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" name="shipping_email" id="shipping_email" value="{{ Auth::user()->email }}">
                                                    </div>
                                                    {{-- Phone --}}
                                                    <div class="form-group">
                                                        <label class="info-title" for="shipping_phone">{{ session()->get('language') == 'portuguese' ? 'Telefone' : 'Phone'}} <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" name="shipping_phone" id="shipping_phone" value="{{ Auth::user()->phone }}">
                                                    </div>                              
                                                    {{-- Post Code --}}
                                                    <div class="form-group">
                                                        <label class="info-title" for="post_code">{{ session()->get('language') == 'portuguese' ? 'CEP' : 'Post Code'}} <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" name="post_code" id="post_code">
                                                    </div>                              
                                                    @error('post_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>	

                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>{{ session()->get('language') == 'portuguese' ? 'Endereço de Envio' : 'Shipping Address'}}</b></h4>

                                                
                                                    {{-- Division --}}
                                                    <div class="form-group">
                                                        <h5>{{ session()->get('language') == 'portuguese' ? 'Região' : 'Division'}}<span class="text-danger"> *</span></h5>
                                                        <div class="controls">
                                                            <select name="division_id" id="" class="form-control">
                                                                <option selected disabled>{{ session()->get('language') == 'portuguese' ? 'Selecione a Região' : 'Select Division'}}</option>
                                                                @foreach($divisions as $division)
                                                                    <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- State --}}
                                                    <div class="form-group">
                                                        <h5>{{ session()->get('language') == 'portuguese' ? 'Estado' : 'State'}}<span class="text-danger"> *</span></h5>
                                                        <select name="state_id" id="" class="form-control">
                                                            <option selected disabled>{{ session()->get('language') == 'portuguese' ? 'Selecione o Estado' : 'Select State'}}</option>
                                                        </select>
                                                        @error('state_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    {{-- District --}}
                                                    <div class="form-group">
                                                        <h5>{{ session()->get('language') == 'portuguese' ? 'Município' : 'District'}}<span class="text-danger"> *</span></h5>
                                                        <select name="district_id" id="" class="form-control">
                                                            <option selected disabled>{{ session()->get('language') == 'portuguese' ? 'Selecione o Município' : 'Select District'}}</option>
                                                        </select>
                                                        @error('district_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    {{-- Notes --}}
                                                    <div class="form-group">
                                                        <h5>{{ session()->get('language') == 'portuguese' ? 'Mensagem (Opcional)' : 'Notes (Optional)'}}<span class="text-danger"> *</span></h5>
                                                        <textarea class="form-control" name="notes" cols="30" rows="5"></textarea>
                                                    </div> 
                                                    
                                                
                                            </div>	
                                        
                                        </div>			
                                    </div>
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
                                        <h4 class="unicase-checkout-title">{{ session()->get('language') == 'portuguese' ? 'Selecione o Método de Pagamento' : 'Select Payment Method'}}</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{ asset('frontend/assets/images/payments/2.png') }}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">{{ session()->get('language') == 'portuguese' ? 'Cartão' : 'Card'}}</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">{{ session()->get('language') == 'portuguese' ? 'Dinheiro' : 'Cash'}}</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">
                                        </div>
                                        @error('payment_method')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-md btn-success"><b>Payment Step</b></button>
                                </div>
                            </div>
                        </div> 
                    </div>

                    {{-- Product Data --}}
                    <div class="col-md-4">				
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">{{ session()->get('language') == 'portuguese' ? 'Progresso na Compra' : 'Your Checkout Progress'}}</h4>
                                    </div>
                                    {{-- Price --}}
                                    <div class="nav nav-checkout-progress list-unstyled">
                                        {{-- COM CUPOM --}}
                                        @if(Session::has('coupon'))
                                            {{-- Subtotal --}}
                                            <li>
                                                <h4>
                                                    <strong>Subtotal: 
                                                        <span style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} {{ $cartTotal }}</span>
                                                    </strong>
                                                </h4>                                           
                                            </li>
                                            {{-- Coupon --}}
                                            <li>
                                                <h4>
                                                    <strong>{{ session()->get('language') == 'portuguese' ? 'Cupom:' : 'Coupon:'}}
                                                        <span style="float: right; color: #298ff5;">
                                                            {{ session()->get('coupon')['coupon_name'] }} 
                                                            ({{ session()->get('coupon')['coupon_discount'] }}%)
                                                        </span>
                                                    </strong>
                                                </h4>                                           
                                            </li>
                                            <hr>   
                                            {{-- Discount --}}
                                            <li>
                                                <h4>
                                                    <strong>{{ session()->get('language') == 'portuguese' ? 'Desconto:' : 'Discount:'}} 
                                                        <span class="text-danger" style="float: right;">
                                                            {{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} 
                                                            {{ session()->get('coupon')['discount_amount'] }}
                                                        </span>
                                                    </strong>
                                                </h4>                                           
                                            </li>
                                            {{-- Total --}}
                                            <li>
                                                <h4>
                                                    <strong>Total: 
                                                        <span style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} {{ session()->get('coupon')['total_amount'] }}</span>
                                                    </strong>
                                                </h4>                                           
                                            </li> 
                                        {{-- SEM CUPOM --}}
                                        @else
                                            <li>
                                                <h4>
                                                    <strong>Subtotal: 
                                                        <span style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} {{ $cartTotal }}</span>
                                                    </strong>
                                                </h4>                                           
                                            </li>
                                            <li>
                                                <h4>
                                                    <strong>Total: 
                                                        <span style="float: right; color: #84b943;">{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} {{ $cartTotal }}</span>
                                                    </strong>
                                                </h4>                                           
                                            </li>
                                        @endif
                                        <hr>
                                    </div>
                                    {{-- Products --}}
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                                {{-- Image --}}
                                                <li>
                                                    <img src="{{ asset($item->options->image) }}" style="width: 100px; height: 100px;">
                                                </li>

                                                <div class="row">
                                                    {{-- Quantity --}}
                                                    <div class="col-md-4">
                                                        <li style="margin-top: 25px;">
                                                            <h4><strong>{{ session()->get('language') == 'portuguese' ? 'Quantidade: ' : 'Quantity: '}}</strong></h4>
                                                            <p>{{ $item->qty }} Units</p>
                                                        </li>
                                                    </div>

                                                    {{-- Color --}}
                                                    <div class="col-md-4">
                                                        @if( $item->options->color == null)
                                                        @else  
                                                            <li style="margin-top: 25px;">
                                                                <h4><strong>{{ session()->get('language') == 'portuguese' ? 'Cor: ' : 'Color: '}}</strong></h4>
                                                                <p>{{ $item->options->color }}</p>
                                                            </li>
                                                        @endif
                                                    </div>

                                                    {{-- Size --}}
                                                    <div class="col-md-4">
                                                        @if($item->options->size == null)
                                                        @else                                            
                                                            <li style="margin-top: 25px;">
                                                                <h4><strong>{{ session()->get('language') == 'portuguese' ? 'Tamanho: ' : 'Size: '}}</strong></h4>
                                                                <p>{{ $item->options->size }}</p>
                                                            </li>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                <hr>
                                            @endforeach                                                                        
                                        </ul>        
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </form>
			</div>
		</div>	
    </div>
</div>

{{-- DIVISION -> STATE --}}
<script>
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val()

            if (division_id) {
                $.ajax({
                    url: "{{ url('/checkout/state/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",

                    success: function(data) {

                        $('select[name="district_id"]').empty()
                        var d = $('select[name="state_id"]').empty()

                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>')
                        })
                    },
                })
            } else {
                alert('Error!')
            }
        })
    })
</script>

{{-- STATE -> DISTRICT --}}
<script>
    $(document).ready(function() {
        $('select[name="state_id"]').on('change', function() {
            var state_id = $(this).val()

            if (state_id) {
                $.ajax({
                    url: "{{ url('/checkout/district/ajax') }}/" + state_id,
                    type: "GET",
                    dataType: "json",

                    success: function(data) {

                        var d = $('select[name="district_id"]').empty()

                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>')
                        })
                    },
                })
            } else {
                alert('Error!')
            }
        })
    })
</script>

@endsection