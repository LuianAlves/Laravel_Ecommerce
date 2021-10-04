<script type="text/javascript">
    // ********************* OPEN MODAL *********************
    function productView(id) {
        $.ajax({
            type: 'GET',
            url: '/modal/add_cart/product/' + id,
            dataType: 'json',

            success: function(data) {
                // ================= Image =======================
                $('#image').attr('src', '/' + data.product.product_thumnail)

                // // ================= List Group =======================
                
                // PRODUCT ID - INPUT HIDDEN - BUTTON SUBMIT
                $('#product_id').val(id)
                $('#qty').val(1)

                // Name
                $('#pname').text(data.product.product_name_en)
                
                // Condition Price
                $('#price').text(data.product.selling_price)
                    if(data.product.discount_price == null || data.product.discount_price == 0) {
                        $('#pprice').text(data.product.selling_price)
                    } else {
                        $('#pprice').text(data.product.selling_price - data.product.discount_price)
                        $('#oldprice').text(data.product.selling_price)
                    }

                // Product Code
                $('#code').text(data.product.product_code)
                
                // Category
                $('#category').text(data.product.category.category_name_en)
                $('#category_pt').text(data.product.category.category_name_pt)
                
                // Condition Brand
                $('#brand').text(data.product.brand_id)
                    if(data.product.brand_id == null || data.product.brand_id == 0) {
                        $('#pbrand').empty()
                        $('#null').empty()
                        $('#pmarca').empty()
                        $('#nulo').empty()

                        $('#null').text('No Brand')
                        $('#nulo').text('Sem Marca')
                    } else {
                        $('#pbrand').empty()
                        $('#null').empty()
                        $('#pmarca').empty()
                        $('#nulo').empty()

                        $('#pbrand').text(data.product.brand.brand_name_en)
                        $('#pmarca').text(data.product.brand.brand_name_pt)
                    }

                // Condition Quantity
                if(data.product.product_qty > 0) {
                    $('#avaliable').empty()
                    $('#stockOut').empty()
                    $('#disponivel').empty()
                    $('#esgotado').empty()

                    $('#avaliable').text('Avaliable')
                    $('#disponivel').text('Disponível')
                    
                } else {
                    $('#avaliable').empty()
                    $('#stockOut').empty()
                    $('#disponivel').empty()
                    $('#esgotado').empty()

                    $('#stockOut').text('Stock Out')
                    $('#esgotado').text('Esgotado')
                    
                }

                
                // Color
                $('select[name="color"]').empty();
                $.each(data.color, function(key, value) {
                    $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                        '</option>')

                    if (data.color == "") {
                        $('#colorArea').hide();
                    } else {
                        $('#colorArea').show();
                    }
                })
                
                // Size 
                $('select[name="size"]').empty();
                $.each(data.size, function(key, value) {
                    $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                        '</option>')

                    if (data.size == "") {
                        $('#sizeArea').hide();
                    } else {
                        $('#sizeArea').show();
                    }
                })
                
            }
        })
    }

    // ********************* BUTTON ADD CART *********************
    function addToCart() {
        var id = $('#product_id').val()
        var quantity = $('#qty').val()

        var product_name = $('#pname').text();
        var color = $('#color option:selected').text()
        var size = $('#size option:selected').text()

        $.ajax({
            headers: { 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') },
            type: "POST",
            dataType: 'json',
            data: {
                color: color, size: size, quantity: quantity, product_name: product_name
            },
            url: "/cart/store/"+id,

            success: function(data) {
                miniCart() // Adicionado aqui para recarregar os valores automaticamente no mini cart
                $('#closeModal').click()
                
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
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })

                }
            }
        })
    }
</script>