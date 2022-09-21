$(document).ready(function() {
    //global ajax csrf toke start
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //

    $(document).on('click', '.delete-product-item', function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        //using global ajax csrf token here //
        $.ajax({
            method: "POST",
            url: "delete-product-item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                $('.product-parent').load(location.href + " .product-parent");
                swal("", response.status, "success");
            }
        });
    });

    $(document).on('click', '.delete-category-item', function(e) {
        e.preventDefault();
        var cat_id = $(this).closest('.category-data').find('.category-id').val();
        //using global ajax csrf token here //
        $.ajax({
            method: "POST",
            url: "delete-category-item",
            data: {
                'cat_id': cat_id,
            },
            success: function(response) {
                $('.category-parent').load(location.href + " .category-parent");
                swal("", response.status, "success");
            }
        });
    });

});