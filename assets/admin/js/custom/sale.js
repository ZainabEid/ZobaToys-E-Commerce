$(document).ready(function(){
    $('.show-change-sale').on('click', function(e){
        e.preventDefault();
        $(this).closest('div').css('display','flex');

        // $(this).addClass('disabled');
        // var id=$(this).data('id');
        // var sale=$(this).data('sale');
        // alert(id);

        // var html = `
        //     <div>
        //         <input type="number" data-sale="${sale}" name="sale" class="form-controly" value="${sale}" min="10" max="90">
        //         <a href="#" class=""  data-id="${id}">
        //             <i class="fa fa-right"></i> change sale
        //         </a>
        //     </div>
        // `;

        // $(this).closest('div').find('.change-sale').css('display','flex');
        // $(this).closest('div').find('.change-sale').empty();
        // $(this).closest('div').find('.change-sale').append(html);   

    });
    
}); // end of document ready