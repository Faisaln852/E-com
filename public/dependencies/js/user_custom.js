$(document).ready(function() {
    loadcart(); // on every refresh it will be load first that's why it is on the top
    loadwishlist();
    //global ajax csrf toke start
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //end 
    //load cart and wishlist code start
    function loadcart() {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function(response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    function loadwishlist() {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-count",
            success: function(response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }
    // load cart and wishlist code end

    //increment code start
    $(document).on('click', '.increment-btn', function(e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }

    });
    //increment code end
    //decrement code start 
    $(document).on('click', '.decrement-btn', function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }

    });
    //decrement code end
    //Add to cart start
    $('.addToCartBtn').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        //using global ajax csrf token here 
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function(response) {
                swal(response.status);
                loadcart();
            }
        });
    });
    //add to cart end
    // add to wishlist start
    $('.addToWishlist').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        //using gloabal ajax csrf token here
        $.ajax({
            method: "POST",
            url: "/add-to-wish-list",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                swal(response.status);
                loadwishlist();
            }

        });
    });
    //add to wishlist end
    // delete wishlist start
    $(document).on('click', '.remove-wishlist-item', function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        //using global ajax csrf token here 
        $.ajax({
            method: "POST",
            url: "remove-wishlist-item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                $('.cartitems').load(location.href + " .cartitems");
                swal("", response.status, "success");
                loadwishlist();
            }
        });
    });
    //delete wishlist end
    //delete cart item start
    $(document).on('click', '.delete-cart-item', function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        //using global ajax csrf token here 
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                $('.cartitems').load(location.href + " .cartitems");
                swal("", response.status, "success");
            }
        });
    });
    //delete cart item end
    //changeQuantity code start
    $(document).on('click', '.changeQuantity', function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        //using global ajax csrf token here 
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: {
                'prod_id': prod_id,
                'prod_qty': qty,
            },
            success: function(response) {
                $('.cartitems').load(location.href + " .cartitems");

            }
        });
    });
    //changeQuantity code end

});