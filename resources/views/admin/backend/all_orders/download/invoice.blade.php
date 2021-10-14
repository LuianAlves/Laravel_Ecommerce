<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice - {{ $order->invoice_no }}</title>

    <style type="text/css">

        /* NOVA PÁGINA - DOMPDF */
        .page_break { page-break-before: always; }
        /* -------------------- */

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

    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: green; font-size: 26px;"><strong>Luian Ecommerce</strong></h2>
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
                  <strong>Name:</strong> {{ $order->name }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>Email:</strong> {{ $order->email }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>Phone:</strong> {{ $order->phone }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>Address:</strong> {{ $order->district->district_name . '/' . $order->state->state_name }}
                </p>
                <p class="font" style="margin-left: 20px;">
                  <strong>Post Code:</strong> {{ $order->post_code }}
                </p>
            </td>
            <td>
                <p class="font">
                  <h3><span style="color: green;">Invoice:</span> #{{ $order->invoice_no }}</h3>
                </p>
                <p class="font">
                  Order Date: <b>{{ $order->order_date }}</b>
                </p>
                <p class="font">
                  Delivery Date: <b>{{ $order->delivered_date == null ? 'On the Way' : $order->delivered_date}}</b>
                </p>
                <p class="font">
                  Payment Type : <b>{{ $order->payment_method }}</b>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Products</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Image</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Unit Price </th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>
          @foreach($orderItem as $item)
              <tr class="font">
                  <td align="center">
                      <img src="{{ public_path($item->product->product_thumnail) }}" height="60px;" width="60px;" alt="">
                  </td>
                  <td align="center">{{ $item->product->product_name_en }}</td>
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

    <hr class="page_break" style="border: 3px solid green">
    
    <table  width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
              <h2><span style="color: green;">Subtotal:</span> <b>R$ </b> {{$order->amount}}</h2>
              <h2><span style="color: green;">Total:</span> <b>R$ </b> {{$order->amount}}</h2>
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>Thanks For Buying Products..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature:</h5>
    </div>
</body>

</html>
