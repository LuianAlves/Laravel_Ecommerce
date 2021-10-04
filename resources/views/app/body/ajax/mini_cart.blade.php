<script type="text/javascript">
    // ********************* READ - MINI CARD *********************
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/cart/mini/view',
            dataType: 'json',

            success: function(response) {
                $('span[id="cartSubTotal"]').text(response.cartTotal)
                $('span[id="cartQty"]').text(response.cartQty)

                var miniCart = ""
                
                $.each(response.carts, function(valor, product) {
                    miniCart +=  `
                        <div class="cart-item product-summary">
                            <div class="row" style="padding-right: 20px;">
                                <div class="col-xs-4">
                                    <div class="image"> 
                                        <a href="detail.html">
                                            <img src="/${product.options.image}" alt="">
                                        </a> 
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <h3 class="name">
                                        <a href="index.php?page-detail">
                                            ${product.name}
                                        </a>
                                    </h3>
                                    <div class="price">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${product.price} * ${product.qty} </div>
                                </div>
                                <div class="col-xs-1 action"> 
                                    <button class="btn btn-sm btn-danger" type="submit" id="${product.rowId}" onclick="deleteMiniCart(this.id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    ` 
                });

                $('#miniCart').html(miniCart);
            }
        });
    }

    miniCart();

    // ********************* DELETE - MINI CARD *********************
    function deleteMiniCart(rowId) {
        $.ajax({
            type: 'GET',
            url: 'cart/mini/product/delete/' + rowId,
            dataType: 'json',

            success: function(data) {
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
</script>
