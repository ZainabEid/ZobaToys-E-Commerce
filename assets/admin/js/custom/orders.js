
$(document).ready(function () {
    $('.add-product-btn').on('click', function (e) {
        e.preventDefault();

        $(this).removeClass('btn-success').addClass('border-success disabled');

        var name = $(this).data('name');
        var stock = $(this).data('stock');
        var id = $(this).data('id');
        var price = $.number( $(this).data('price') , 2);

        //add new product row
        var html = `<tr>
                        <td>${name}</td>
                        <td><input type="number" data-price="${price}" name="products[${id}][quantity]" class="form-control product-quentity" value="1" min="1" max="${stock}"></td>
                        <td class="product-price">${price}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm remove-product-btn"  data-id="${id}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('.order-list').append(html);
        // calculate total price after append new produc row
        
        calculating_total();
    });// end of ADD product click


     //disabled btn
     $('body').on('click', '.disabled', function (e) {
        e.preventDefault();
    });//end of disabled

    // remove product row
    $('body').on('click', '.remove-product-btn', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('border-success disabled').addClass('btn-success ');

        // calculate total price after remove a prduct row
        calculating_total()

    });// end of remove product clicked

    // on change product quantity
    $('body').on('keyup change','.product-quentity', function () {
        
        var productPrice = parseFloat( $(this).data('price').replace(/,/g,'')  );
        var quantity = Number($(this).val());
        var totalPrice = $.number(productPrice * quantity , 2);
        $(this).closest('tr').find('.product-price').html(totalPrice);

        // calculate total price after changing product quentity
        calculating_total();

    })//end of product-quentity

    //list a ll order products
    $('.order-products').on('click', function(e){
        e.preventDefault();
        
        $('#loading').css('display','flex');
        
        var url = $(this).data('url');
        var method = $(this).data('method');        
        var total = $(this).data('total');        

        $.ajax({
            url: url,
            method: method,
            success: function(data){
                $('#loading').css('display', 'none')
                $('#order-product-list').empty();
                $('#order-product-list').append(data);
                $('.products-total').html(total);
            }
        });
    });//end of order product


    // print order
   $(document).on('click' ,'.print-btn' ,function(){

        $('#print-area').printThis();

   });//end click function for print
   

   
});// end of document ready



// calculate total price
function calculating_total() {

    var total = 0;
    
    $('.order-list .product-price').each(function (index) {
        total += parseFloat($(this).html().replace(/,/g, ''));
    });
    $('.total-price').html($.number(total,2));

    //check if total > 0 remove disabled add new order
    if (total > 0) {
        $('#add-order-form-button').removeClass('disabled');
    } else {
        $('#add-order-form-button').addClass('disabled');
    }


}// end of calculate total price