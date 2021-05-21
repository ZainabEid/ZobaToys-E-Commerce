$(function () {
    //add to wishlist function
    $('.addToWishlist').on('click', function (e) {
        e.preventDefault();

        var _token = $('meta[name="csrf-token"]').attr('content');
        var url = $(this).data('url');
        var wishlist_value = $(this).data('wishlist-value');
        var product_id = $(this).data('product-id');

        if (!wishlist_value) {
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: _token,
                },
                success: function (result) {
                    $('#addToWishlist' + product_id).addClass('bg-info');
                    $('.WishlistModal').removeAttr('hidden');
                    $('.WishlistModal').show();

                }
            });
        }



    });// end of add to wishlist function

    //add to cart function
    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();

        alert('hi, add to cart button is clicked , i am in shop.js');
        var _token = $(this).siblings('input').attr('name', '_token').val();
        var url = $(this).parent('form').attr('action');



        // call pop up add to card form
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: _token,
            },
            success: function (result) {
                // check result if aredy added show popup with message
                // if new added show the block cart model
                // future work : add quentity in the block cart model , change size and color
                $('.add-to-cart').addClass('bg-info');
                $('.blockcart-modal').removeAttr('hidden');
                $('.blockcart-modal').show();
            }
        });

    });// end of add to wishlist function


    // stare rating function
    $('.star').on('click', function (e) {
        e.preventDefault();

        console.log('star clicked')
        var _token = $('meta[name="csrf-token"]').attr('content');
        var url = $(this).data('url');
        var rate = $(this).data('rate');
        var id = $(this).data('product-id');
        var product_or_vendor = $(this).data('product-or-vendor');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: _token,
                rate = rate,
                id = id,
                product_or_vendor= product_or_vendor,
            },
            success: function (result) {
                for (let i = 1; i < rate; i++) {
                    $('#star-'+product_or_vendor+'-'+product_id+'-'+i).addClass('star_on');
                }
            }
        });
    });// end of star rating function

    //wishlist popup close botton 
    $('.close').on('click', function (e) {
        e.preventDefault();
        $('.blockcart-modal').hide();
        $('.WishlistModal').hide();
    });// end of popup close botton

});// end of all shop functions


