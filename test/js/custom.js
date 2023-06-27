$(document).ready(function (){

    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var qty = $('.input-qty').val();
        
        
        var value = parseInt(qty, 10);

        value = isNaN(value) ? 0 : value;
        if(value<10)
        {
            value++;
            $('.input-qty').val(value);
        }

    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var qty = $('.input-qty').val();
        
        
        var value = parseInt(qty, 10);

        value = isNaN(value) ? 0 : value;
        if(value>1)
        {
            value--;
            $('.input-qty').val(value);
        }

    });

    $('.addToCartBtn').click(function(e) {

        e.preventDefault();

        var qty = $('.input-qty').val();
        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "http://localhost/ratedpleasure/test/functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
        },
        datatype: "datatype",
        success: function(response){

            if(response==201){

                //alertify later
                alert('Item added to cart successfully');
            }else if(response=="existing"){
                alert('Item already in the cart');
            }else if(response==500){
                alert('Something went wrong');
            }else if(response==300){
                alert('Something went wrong ip address');
            }else if(response==300){
                alert('Something went wrong no isset');
            }else{
                alert('nothing good');
            }
        }

    });


    });


});