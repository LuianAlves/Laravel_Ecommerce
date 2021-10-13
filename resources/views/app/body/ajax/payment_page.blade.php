<script type="text/javascript">
    function Cart() {
        $.ajax({
            type: 'GET',
            url: '/my/cart/get-cart-products',
            dataType: 'json',

            success: function(response) {

                var rows = ""

                $.each(response.carts, function(key, value) {
                    rows += `
                    <tr>
                        <td class="cart-image">
                            <a class="entry-thumbnail">
                                <img src="/${value.options.image}" alt="" style="width: 75px; height: 75px;">
                            </a>
                        </td>
                        <td class="cart-product-name-info text-center">
                            <h4 class='cart-product-description'>
                                <strong>${value.name}</strong>
                            </h4>
                            
                            ${
                                value.options.color == null 
                                    ? 
                                `<span></span>` 
                                    : 
                                `<div class="cart-product-info">
                                    <span class="product-color">
                                        COLOR: <strong>${value.options.color}</strong>
                                    </span>
                                </div>`
                            }

                            ${
                                value.options.size == null 
                                    ? 
                                `<span></span>` 
                                    : 
                                `<div class="cart-product-info">
                                    <span class="product-color">
                                        SIZE: <strong>${value.options.size}</strong>
                                    </span>
                                </div>`
                            }


                        </td>
                        <td class="cart-product-quantity">
                            <div class="quant-input">
                                <input type="text" value="${value.qty}" disabled>
                            </div>
                        </td>
                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><strong>{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${value.subtotal}</strong></span></td>
				    </tr>
                        `
                })
                
                $('#paymentPage').html(rows)
            }
        })

    }
    
    Cart()

</script>