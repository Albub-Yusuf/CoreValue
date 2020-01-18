/**
 * Created by Albub Yusuf on 1/17/2020.
 */
$(function () {
    console.log('document ready');
    $('.add-cart').click(function () {
        var url = $(this).attr('url');

        $.ajax({
            url : url,
            method : 'GET',
            success : function (data) {
                console.log('Success - ' + JSON.stringify(data));
                $('.headerCartDetails').html(data.headerCartDetailsView);
                $('.cart-count').html('<span class="totalCartItemHeaderChild">'+ data.cart.length +'</span>');
            },
            error : function (data) {
                console.log('errors - ' + JSON.stringify(data));
            }
        });

    });
});