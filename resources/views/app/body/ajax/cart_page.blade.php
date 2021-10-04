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
                        <td class="romove-item">
                            <button type="submit" title="cancel" class="icon" id="${value.rowId}" onclick="deleteCart(this.id)">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                        <td class="cart-image">
                            <a class="entry-thumbnail">
                                <img src="/${value.options.image}" alt="">
                            </a>
                        </td>
                        <td class="cart-product-name-info">
                            <h4 class='cart-product-description'>
                                <a href="detail.html"><strong>${value.name}</strong></a>
                            </h4>
                            
                            <div class="cart-product-info">
                                <span class="product-color">
                                    COLOR: ${value.options.color == null ? `<span> .. </span>` : `<strong>${value.options.color}</strong>` }
                                </span>
                            </div>
                            <div class="cart-product-info">
                                <span class="product-color">
                                    SIZE: ${value.options.size == null ? `<span> .. </span>` : `<strong>${value.options.size}</strong>` }
                                </span>
                            </div>
                        </td>
                        <td class="cart-product-quantity">
                            <div class="quant-input">
                                <div class="arrows">
                                    <div class="arrow plus gradient">
                                        <span class="ir"><i class="icon fa fa-sort-asc" id="${value.rowId}" onclick="increment(this.id)"></i></span>
                                    </div>
                                    <div class="arrow minus gradient">
                                        <span class="ir"><i class="icon fa fa-sort-desc" id="${value.rowId}" onclick="decrement(this.id)"></i></span>
                                    </div>
                                </div>
                                <input type="text" value="${value.qty}" min="1" max="100">
                            </div>
                        </td>
                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><strong>{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${value.price}</strong></span></td>
                        <td class="cart-product-grand-total"><span class="cart-grand-total-price"><strong>{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${value.subtotal}</strong></span></td>
				    </tr>
                        `
                })
                
                $('#cartPage').html(rows)
            }
        })

    }
    
    Cart()

    // Remove From Cart Page
    function deleteCart(id) {
        $.ajax({
            type: 'GET',
            url: '/my/cart/delete/' + id, 
            dataType: 'json',

            success: function(data) {
                Cart()
                miniCart()

                // Notification
                const Toast =  Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 3000
                    })

                if($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'error',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'warning',
                        title: data.error
                    })

                }
            }
        })
    }

    // Increment Product
    function increment(id) {
        $.ajax({
            type: 'GET',
            url: '/my/cart/increment/' + id,
            dataType: 'json',

            success: function(data) {
                Cart()
                miniCart()
            }
        })
    }

    // Decrement Product
    function decrement(id) {
        $.ajax({
            type: 'GET',
            url: '/my/cart/decrement/' + id,
            dataType: 'json',

            success: function(data) {
                Cart()
                miniCart()


            }
        })
    }
</script>