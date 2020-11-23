$(document).ready(function(){
    filter_data();


    function customize(){

        var action = 'customization_ajax';
        var favourites = get_customization('favourites');
        var cart = get_customization('cart');

        $.ajax({
            url:"customization.php",
            method:"POST",
            data:{action:action, favourites:favourites, cart:cart},
            success:function(data){

                var result = $.parseJSON(data);

                var string ='<div class="grid units-add-gutters three-column">';
                    
                    // If no results, display message
                    if(result == ''){
                        string += "<p>Oops! It appears we don't have any matches!</p>";
                    }

                    // Display Products
                    $.each( result, function( key, value ) { 
                        
                        // Remove spaces in the product name
                        var stripped = value['name'].trim(); 
                        stripped = stripped.replace(/\s+/g, '');

                        string += '<div class="unit-container"><figure>';
                            // Product Image
                            string += "<a href='products/" + stripped + ".php'><img class='product-image' src='img/" + stripped + ".png'></a>";
                            
                            // Product Details
                            string += "<figcaption class='content-unit-text'> <span class='product-name'>" +value['name'] + "</span><br>" +value['gender'] + "<br> <span class='price'>$" +value['price']+ "</span></figcaption>";
                        
                        string += '</figure></div>';
                        
                    }); 

                string += '</div>';

                // Show the results on the page
                $("#getFilter").html(string);

            }
        })
    }


    function get_customization(class_name){
        var customization = [];
        $('.'+class_name+':checked').each(function(){
            customization.push($(this).val());
        });
        return preference;
    }

    $('.common_selector').click(function(){
        customize();
    });
});


