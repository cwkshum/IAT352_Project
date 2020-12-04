$(document).ready(function(){
    customize();
    
    function customize(){
        var action = 'customization_ajax';

        //return the values upon the user actions on the toggle customization buttons 
        var favourites = get_customization('favourites');
        var cart = get_customization('cart');
        $.ajax({
            url:"customization.php",
            method:"POST",
            data:{action:action, favourites:favourites, cart:cart},
        })
    }


    function get_customization(class_name){
        var customization = [];

        //retrieve the checkbox values
        $('.'+class_name+':checked').each(function(){
            customization.push($(this).val());
        });
        return customization;
    }

    $('.common_selector').click(function(){
        customize();
    });
});


