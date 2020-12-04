//if the user adds an item to the cart, carry out the function
$(document).on('click', '.cart-button', function() {
    var productName = $(this).attr("name");
    addToCart(productName);
}); 

//if the user adds an item to their favourites, carry out the function
$(document).on('click', '.favourites-button', function() {
    var productName = $(this).attr("name");
    addToFavourites(productName);
}); 
 

function addToCart(productName) {
    var size = get_size();
    $.ajax({ 
        url: "addToCart.php",
        method: "POST", 
        data:{productName:productName, size:size},

        success:function(data) {
            // parse the data sent from PHP script
            var result = $.parseJSON(data); 

            //success message
            if (result == "The item has been added to your cart!") {
                document.getElementById('button-message').style.color = '#788F7B';
                document.getElementById('button-message').innerHTML = 'The item has been added to your cart!';

            //error message
            } else if (result == "Unable to add item to cart.") {
                document.getElementById('button-message').style.color = '#9c4b49';
                document.getElementById('button-message').innerHTML = 'Unable to add item to cart.';

            //select a size
            } else if (result == "Please select a size.") {
                document.getElementById('button-message').style.color = '#9c4b49';
                document.getElementById('button-message').innerHTML = 'Please select a size.';

            //redirect if not logged in
            } else if (result == "not logged in") {
                window.location.replace("../login.php");

            } else {
                document.getElementById('button-message').style.color = 'white';
                document.getElementById('button-message').innerHTML = '';
            }
        },
    });
}; 

function addToFavourites(productName) {
    $.ajax({ 
        url: "addToFavourites.php",
        method: "POST", 
        data:{productName:productName},

        success:function(data) {
            // parse the data sent from PHP script
            var result = $.parseJSON(data); 

            //success message
            if (result == "The item has been added to your favourites!") {
                document.getElementById('button-message').style.color = '#788F7B';
                document.getElementById('button-message').innerHTML = 'The item has been added to your favourites!';

            //error message
            } else if (result == "Item is already in your favourites.") {
                document.getElementById('button-message').style.color = '#9c4b49';
                document.getElementById('button-message').innerHTML = 'Item is already in your favourites.';
            
            //redirect if not logged in
            } else if (result == "not logged in") {
                window.location.replace("../login.php");

            } else {
                document.getElementById('button-message').style.color = 'white';
                document.getElementById('button-message').innerHTML = '';
            } 
           
        },
    });
}; 

//retrieve the size of the shoe they added  to their cart
function get_size(){
    var size = $("input[name='shoeSize']:checked").val();
    return size;
}