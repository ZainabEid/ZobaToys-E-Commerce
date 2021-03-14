
$(function () {
    //add to wishlist function
    $('.addToWishlist').on('click', function (e) {
        e.preventDefault();

        var _token = $('meta[name="csrf-token"]').attr('content');
        var url = $(this).data('url');
        var product_id = $(this).data('product-id');
        var wishlist_value = $(this).data('wishlist-value');

        if (!wishlist_value) {
            
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: _token,
                    product_id: product_id,
                },
                success: function (result) {
                    $('.addToWishlist').addClass('bg-info');
                    $('.WishlistModal').removeAttr('hidden');
                    $('.WishlistModal').show();
                    
                }
            });
        }
       


    });// end of add to wishlist function

    //add to wishlist function
    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
       

        var _token = $(this).siblings('input').attr('name','_token').val();
        var url = $(this).parent('form').attr('action');
        var product_id = $(this).data('product-id');
        var is_in_cart = $(this).data('is_in_cart');

        if (!is_in_cart) {
            
            // call pop up add to card form
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: _token,
                    product_id: product_id,
                },
                success: function (result) {
                    $('.add-to-cart').addClass('bg-info');
                    $('.blockcart-modal').removeAttr('hidden');
                    $('.blockcart-modal').show();
                }
            });
        }
       


    });// end of add to wishlist function

    //wishlist popup close botton 
    $('.close').on('click' , function (e) {
        e.preventDefault();
        $('.blockcart-modal').hide();
        $('.WishlistModal').hide();
      });// end of popup close botton

});// end of all shop functions


