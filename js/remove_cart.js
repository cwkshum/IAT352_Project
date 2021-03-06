//execute product removal when the button has been clicked 
$(document).on('click', '.remove-cart', function() {
    // Retrieve product name and product size= 
    var productName = $(this).attr("value");
    var productSize = $(this).attr("name");

    // call function to remove item from cart
    removeCart(productName, productSize); 
}); 
 

function removeCart(productName, productSize) {

    $.ajax({ 
        url: "remove_cart.php",
        method: "POST", 
        data:{productName:productName, productSize:productSize},

        success:function(data) {
            // parse the data sent from PHP script
            var result = $.parseJSON(data); 
            
            var string = '';

            // If no results, display message
            if(result == ''){
                string += '<div class="item-container">';
                    string += "<p>You currently have nothing in your cart.</p>";
                string += "</div>";
            }
            $.each( result, function( key, value ) { 
            
                // Remove spaces in the product name
                var stripped = value['product_name'].trim();
                stripped = stripped.replace(/\s+/g, '');

                // display all the current items in favourites
                string +='<div class="item-container">';
                    // product image
                    string += '<div class="product-image-container">';
                        string += '<a href="products/' + stripped + '.php"> <img class="product-image" src="img/' + stripped  + '.png"> </a>';
                    string += '</div>';
                    // product info
                    string += '<div class="info-container">';
                        string += '<span class="product-name">'+ value["product_name"] + '</span> <br><span class="price">$' + value["product_price"] + '</span> <br> <span class="size">Size: ' + value["product_size"] + '</span>';
                    string +='</div>'; 
                    // product cart links
                    string +='<div class="cart-options">';
                        string += '<button class="cart-options-links">Move to Favourites</button> <p class="line-spacing">|</p> <button value="'+ value["product_name"] +'" name ="' + value["product_size"] + '"class="cart-options-links remove-cart">Remove</button>';
                    string +='</div>'; 
                string +='</div>'; 
            });  

            // Display Cart items on page
            $("#carts_display").html(string);

            // Call function to update checkout information
            updateCheckout();
        },
    });
}; 

function updateCheckout() {

    $.ajax({ 
        url: "update_checkout.php",
        method: "POST", 

        success:function(data) {
            
            // parse the data sent from PHP script
            var result = $.parseJSON(data); 
            
            var string = '<div class="checkout-info">';

            $.each( result, function( key, value ) { 
                // display total number of items in cart
                string +='<h3>Items: ' + value['quantity'] + '</h3>';
              
                if(value['total'] == null){
                    // display if cart is emty
                    string += '<h3>Total: $0.00</h3>';
                } else{
                    // display total value of cart items
                    string += '<h3>Total: $' + value['total']+ '</h3>';
                }
                
                // Favourites Link
                string += '<a href="my_account.php">View Favourites</a>';
                
                // Checkout Button
                string += '<div class="checkout">';
                    string += '<a href="" class="checkout-button">Check&nbsp;Out</a>';
                string +='</div>'; 
            });  
            string +='</div>';

            // Display Checkout Information on Page
            $("#checkout_display").html(string); 
        },
    });
}; 
