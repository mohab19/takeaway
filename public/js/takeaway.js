$(function() {
    $('#make_order').submit(function(e) {
        e.preventDefault();
        var user = $(this).find('#user_selection').children('option:selected').val();
        var resturant = $(this).find('#resturant_selection').children('option:selected').val();
        var items = [];
        $.each($("input[name='items[]']:checked"), function(){            
            items.push($(this).val());
        });

        if(user == 0 || !user) {
            alert('Please Choose a User to Make an Order!');
        }
        if(resturant == 0 || !resturant) {
            alert('Please Choose a Resturant in order to choose from the Menu!');
        }
        if(items.length == 0 || items == undefined) {
            alert('You can not make an Order without choosing Items!');
        }
    
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