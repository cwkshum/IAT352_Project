//execute product removal when the button has been clicked 
$(document).on('click', '.remove-favourites', function(){
 
    var productName = $(this).attr("value");

    $.ajax({ 
        url: "remove_favourites.php",
        method: "POST", 
        data:{productName:productName},

        success:function(data) {
        

            // parse the data sent from PHP script
            var result = $.parseJSON(data); 
            
            /* from result create a string of data and append to the div */
            var string = '<div class="grid two-column add-gutters" >';
            
            // If no results, display message
            if(result == ''){
                string += "<p>You currently have nothing in your favourites.</p>";
            }
            
            $.each( result, function( key, value ) { 
            
                // Remove spaces in the product name
                var stripped = value['product_name'].trim();
                stripped = stripped.replace(/\s+/g, '');
                
                // display all the current items in favourites
                string +='<div class="unit-container">';
                    string += "<figure>";
                        string += '<a href="products/'+ stripped +'.php"> <img class="product-image" src="img/'+ stripped +'.png"> </a>'; 
                        string += '<figcaption class="content-unit-text"><span class="product-name">'+ value['product_name'] + '</span> <br><span class="price">$'+ value['product_price'] +'</span> <br> \
                        <button value="' + value['product_name'] + '" class="remove-favourites">Remove from Favourites</button></figcaption>';
                    string += "</figure>"; 
                string += '</div>';  

            });  
            string += '</div>';

            // Display Favourites on Page
            $("#favourites_display").html(string); 
        },
    });
}); 
