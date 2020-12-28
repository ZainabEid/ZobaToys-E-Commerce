
$(document).ready(function () {
    $('.add-supply-btn').on('click', function (e) {
        e.preventDefault();

        $(this).removeClass('btn-success').addClass('border-success disabled');

        var name = $(this).data('name');
        var stock = $(this).data('stock');
        var id = $(this).data('id');
        var price = $.number( $(this).data('price') , 2);


        //add new supply row
        var html = `<tr>
                        <td>${name}</td>
                        <td><input type="number" data-price="${price}" name="supplies[${id}][quantity]" class="form-control supply-quantity" value="1" min="1" max="${stock}"></td>
                        <td class="supply-price">${price}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm remove-supply-btn"  data-id="${id}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
        $('.purchase-list').append(html);   
        // calculate total price after append new supply row
        calculate_total();

    });// end of ADD supply click


    //disabled btn
    $('body').on('click', '.disabled', function (e) {
        e.preventDefault();
    });//end of disabled

    // remove supply row
    $('body').on('click', '.remove-supply-btn', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        $(this).closest('tr').remove();
        $('#supply-' + id).removeClass('border-success disabled').addClass('btn-success ');

        // calculate total price after remove a prduct row
        calculate_total()

    });// end of remove supply clicked

    // on change supply quantity
    $('body').on('keyup change','.supply-quantity', function () {
        
        var supplyPrice = parseFloat( $(this).data('price').replace(/,/g,'')  );
        var quantity = Number($(this).val());
        var totalPrice = $.number(supplyPrice * quantity , 2);
        $(this).closest('tr').find('.supply-price').html(totalPrice);

        // calculate total price after changing supply quantity
        calculate_total();

    })//end of supply-quantity

    //list a ll purchase supplies
    $('.purchase-supplies').on('click', function(e){
        
        e.preventDefault();

        $('#loading').css('display','flex');

        var url = $(this).data('url');
        var method = $(this).data('method');        

        $.ajax({
            url: url,
            method: method,
            success: function(data){
                $('#loading').css('display', 'none');
                $('#purchase-supply-list').empty();
                $('#purchase-supply-list').append(data);
            }
        });
    });//end of purchase supply


    // print purchase
   $(document).on('click' ,'.print-btn' ,function(){

        $('#print-area').printThis();

   });//end click function for print

});// end of document ready



// calculate total price
function calculate_total() {
    var total = 0;
    
    $('.purchase-list .supply-price').each(function (index) {
        total += parseFloat($(this).html().replace(/,/g, ''));
    });
    $('.total-price').html($.number(total,2));

    //check if total > 0 remove disabled add new purchase
    if (total > 0) {
        $('#add-purchase-form-button').removeClass('disabled');
    } else {
        $('#add-purchase-form-button').addClass('disabled');
        
    }


}// end of calculate total price