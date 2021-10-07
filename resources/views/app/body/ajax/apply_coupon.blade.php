<script type="text/javascript">

    // Add Coupon
    function applyCoupon() {

        var coupon_name = $('#coupon_name').val()

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {coupon_name: coupon_name},
            url: "{{ url('/apply-coupon') }}", 

            success: function(data) {
                couponCalc()
                $('#couponField').hide()
                $('#coupon_name').val('')

                // Notification
                const Toast =  Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
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
                    $('#couponField').show()

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }
            }  
        })
    }

    // Coupon Calculation
    function couponCalc() {
        $.ajax({
            type: 'GET',
            datatype: 'json',
            url: "{{ url('/calc-coupon') }}",

            success: function(data) {

                if(data.total) {
                    $('#couponDiscount').html(
                        `
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${data.total}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Total<span class="inner-left-md">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${data.total}</span>
                                    </div>
                                </th>
                            </tr>
                        `
                    )
                } else {
                    $('#couponDiscount').html(
                        `<tr>
                                <th>
                                    <div class="cart-sub-total">
                                        {{ session()->get('language') == 'portuguese' ? 'Cupom' : 'Coupon' }}:
                                        <span class="inner-left-md"> ${data.coupon_name}</span>
                                        <button type="submit" onclick="removeCoupon()"><i class="fa fa-times"></i></button>
                                    </div>
                                    <hr>
                                    <div class="cart-sub-total">
                                        SubTotal:<span class="inner-left-md">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${data.subtotal}</span>
                                    </div>
                                    <hr>
                                    <div class="cart-sub-total">
                                        {{ session()->get('language') == 'portuguese' ? 'Desconto' : 'Discount' }}:
                                        <span class="inner-left-md">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${data.discount_amount}</span>
                                    </div>
                                    <hr>
                                    <div class="cart-grand-total">
                                        Total:<span class="inner-left-md">{{ session()->get('language') == 'portuguese' ? 'R$' : '$' }} ${data.total_amount}</span>
                                    </div>
                                </th>
                            </tr>`
                    )
                }

            }
        })
    }

    couponCalc()

    // Remove Coupon
    function removeCoupon() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{ url('/remove-coupon') }}",

            success: function(data) {
                couponCalc()
                $('#couponField').show()
                $('#coupon_name').val('')

                // Notification
                const Toast =  Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
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
</script>