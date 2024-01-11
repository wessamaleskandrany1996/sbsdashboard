$(document).ready(function(){
    $('.increment-btn').click(function(e){
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value ;
        if (value < 10 ) {
            value++;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    });
    $('.decrement-btn').click(function(e){
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value ;
        if (value > 1 ) {
            value--;
            $(this).closest('.product-data').find('.input-qty').val(value);
        }
    });
    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var prod_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data:{
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function(response){
                if(response == 201){
                    alertify.success('Product Added To Cart ');
                }else if (response == 401) {
                    alertify.success('Login To Contenue ');
                }else if (response == 500) {
                    alertify.success('Something Went Wrong');
                }else if (response === "existing") {
                    alertify.success('product already existing in cart');
                }
            }
        });
    });
    $(document).on('click', '.updateQty', function () {
        // alert("Hello! I am an alert box!!");
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var prod_id = $(this).closest('.product-data').find('.prodId').val();

        // alert(qty);
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data:{
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            success: function(response){}
        });
    });
    $(document).on('click', '.deleteItem', function () {
        var cart_id = $(this).val();
        // alert(cart_id);
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data:{
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function(response){
                if(response == 200){
                    alertify.success('Item Removed From Cart Succefully');
                    $('#mycart').load(location.href + " #mycart");
                }else{
                    alertify.success(response);
                }
            }
        });
    })
})