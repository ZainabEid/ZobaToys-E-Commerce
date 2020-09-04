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
                        <td><input type="number" data-price="${price}" name="quantities[]" class="form-control product-quentity" value="1" min="1" max="${stock}"></td>
                        <td class="product-price">${price}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm remove-product-btn"  data-id="${id}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('.order-list').append(html);
        // calculate total price after append new produc row
        calculate_total()

    });// end of ADD product clicked


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
        calculate_total()

    });// end of remove product clicked

    // on change product quantity
    $('body').on('keyup change','.product-quentity', function () {
        
        var productPrice = $(this).data('price');
        var quantity = Number($(this).val());
        var totalPrice = $.number(productPrice * quantity , 2);
        $(this).closest('tr').find('.product-price').html(totalPrice);

        // calculate total price after changing product quentity
        calculate_total()

    })//end of product-quentity

});// end of document ready

// calculate total price
function calculate_total() {
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