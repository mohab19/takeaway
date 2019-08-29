$(function() {
    $('#make_order').submit(function(e) {
        e.preventDefault();
        var user = $(this).find('#user_selection').children('option:selected').val();
        var resturant = $(this).find('#resturant_selection').children('option:selected').val();
        var items = [];
        $.each($("input[name='items[]']:checked"), function(){            
            items.push($(this).val());
        });

        if(resturant == 0 || !resturant) {
            alert('Please Choose a Resturant in order to choose from the Menu!');
        } else if(items.length == 0 || items == undefined) {
            alert('You can not make an Order without choosing Items!');
        } else {
            $.ajax({
                type: 'POST',
                url: '/order',
                data: {
                    _token:  $("meta[name='csrf-token']").attr("content"),
                    user_id: user,
                    resturant_id: resturant,
                    item_ids: items
                },
                success: function(response) {
                    $('.alert').removeClass('alert-danger').addClass('alert-success');
                    $('.alert').html('<li>Order Placed Successfuly</li>');
                    $('.alert').show(300).delay(2000).hide(300);
                    $(window).scrollTop(0);
                },
                error: function(response) {                    
                    $('.alert').removeClass('alert-success').addClass('alert-danger');
                    $('.alert').html('<li>'+response.responseJSON.message+'</li>');
                    $('.alert').show(300).delay(3000).hide(300);
                    $(window).scrollTop(0);
                }
            });
        }
    
    });

    $('.nav-link').on('click', function() {
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });
});

function getResturantItems(that) {
    $.ajax({
       type: 'GET',
       url: '/items/' + that,
       success: function(response) {
            var html = '';
            $.each(response, function(key, value){
                html += '<tr><td>'+(key+1)+'</td><td>'+value["name"]+'</td><td>'+value["type"]+'</td><td>'+value["price"]+' L.E</td><td><div class="form-group form-check"><input type="checkbox" class="form-check-input" name="items[]" value="'+value["id"]+'"></div></td></tr>';    
            });
            $('#menu table tbody').html(html);
            $('#menu').show(300);
       },
       error: function(response) {

       }
    });
}