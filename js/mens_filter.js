$(document).ready(function(){
    filter_data();


    function filter_data(){

        var action = 'filter_ajax';
        var brand = get_filter('brand');
        var colour = get_filter('colour');
        var size = get_filter('size');

        $.ajax({
            url:"mens_filter_ajax.php",
            method:"POST",
            data:{action:action, brand:brand, colour:colour, size:size},
            success:function(data){

                //parse the data
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

    //retrieve the values from the filter buttons
    function get_filter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
});


