<script type="text/javascript">
    // ********************* ADD WISHLIST *********************
    function addWishlist(product_id) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            dataType: 'json',
            url: '/wishlist/store/'+product_id,

            success: function(data) {

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
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }
            }
        })
    }

    // ********************* READ WISHLIST PAGE *********************
    function wishlist() {
        $.ajax({
            type: 'GET',
            url: '/wishlist/get-wishlist-products',
            dataType: 'json',

            success:function(response) {

                var rows = ""

                $.each(response, function(key, value) {
                    rows += `
                            <tr>
                                <td class="col-md-2">
                                    <img src="/${value.product.product_thumnail}" alt="imga">
                                </td>
                                <td class="col-md-7">
                                    <div class="product-name">
                                        <a href="#">${value.product.product_name_en}</a>
                                    </div>
                                    <div class="price">
                                        ${
                                            value.product.discount_price == null 
                                            ? 
                                                `{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} ${value.product.selling_price}` 
                                            : 
                                                `{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} ${value.product.selling_price - value.product.discount_price} 
                                                <span>{{ session()->get('language') == 'portuguese' ? 'R$' : '$'}} ${value.product.selling_price}</span>`
                                        }
                                    </div>
                                </td>
                                <td class="col-md-2">
                                    <button class="btn-upper btn btn-primary" type="button" data-toggle="modal" data-target="#addCart" id="${value.product_id}" onclick="productView(this.id)">Add to cart</button>
                                </td>
                                <td class="col-md-1 close-btn">
                                    <button type="button" class="btn btn-sm btn-danger" id="${value.id}" onclick="deleteWishlist(this.id)">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        `
                })

                $('#wishlist').html(rows)
            }
        })
    }

    wishlist();

    // ********************* DELETE - WISHLIST *********************
    function deleteWishlist(id) {
        $.ajax({
            type: 'GET',
            url: '/wishlist/my/products/delete/' + id,
            dataType: 'json',

            success: function(data) {
                wishlist()

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