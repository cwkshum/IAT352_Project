$(document).ready(function(){
    customize();
    
    function customize(){
        var action = 'customization_ajax';
        var favourites = get_customization('favourites');
        var cart = get_customization('cart');
        $.ajax({
            url:"customization.php",
            method:"POST",
            data:{action:action, favourites:favourites, cart:cart},
            // success:function(data){
            //     var result = $.parseJSON(data);å
            // }
        })
    }


    function get_customization(class_name){
        var customization = [];
        $('.'+class_name+':checked').each(function(){
            customization.push($(this).val());
        });
        return customization;
    }

    $('.common_selector').click(function(){
        customize();
    });
});


