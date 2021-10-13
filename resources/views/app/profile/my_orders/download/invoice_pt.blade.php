<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fatura - {{ $order->invoice_no }}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }

        #product_img {
            margin: 10px;
            width: 40px;
            height: 40px;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: green; font-size: 26px;"><strong>Loja Luian Alves</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
                  Luian Alves
                  Email: suporte@luianalves.com.br <br>
                  Grajaú, Zona Sul/SP<br>
                </pre>
            </td>
        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;""></table>

  <table width=" 100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                  <strong>Nome:</strong> {{ $order->name }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>Email:</strong> {{ $order->email }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>Telefone:</strong> {{ $order->phone }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>Endereço:</strong> {{ $order->district->district_name . '/' . $order->state->state_name }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>CEP:</strong> {{ $order->post_code }}
                </p>
            </td>
            <td>
                <p class="font">
                  <h3><span style="color: green;">Fatura:</span> #{{ $order->invoice_no }}</h3>
                </p>
                <p class="font">
                  Data do Pedido: <b>{{ $order->order_date }}</b>
                </p>
                <p class="font">
                  Data de Entrega: <b>{{ $order->delivered_date == null ? 'A Caminho' : $order->delivered_date}}</b>
                </p>
                <p class="font">
                  Tipo de Pagamento: <b>{{ $order->payment_type }}</b>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Products</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Imagem</th>
                <th>Nome do Produto</th>
                <th>Tamanho</th>
                <th>Cor</th>
                <th>Código do Produto</th>
                <th>Quantidade</th>
                <th>Preço Unidade</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItem as $item)
                <tr class="font">
                    <td align="center">
                        <img src="{{ public_path($item->product->product_thumnail) }}" id="product_img">
                    </td>
                    <td align="center">{{ $item->product->product_name_pt }}</td>
                    <td align="center">{{ $item->size == null ? '...' : $item->size }}</td>
                    <td align="center"><b>{{ strtoupper($item->color == null ? '...' : $item->color) }}</b></td>
                    <td align="center">{{ $item->product->product_code }}</td>
                    <td align="center">{{ $item->qty }}</td>
                    <td align="center"><b>R$</b> {{ $item->price }}</td>
                    <td align="center"><b>R$</b> {{ $item->price * $item->qty}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: green;">Subtotal:</span> <b>R$ </b> {{$order->amount}}</h2>
                <h2><span style="color: green;">Total:</span> <b>R$ </b> {{$order->amount}}</h2>
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>Obrigado por comprar Conosco !!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Assinatura Autorizada</h5>
    </div>
</body>

</html>
