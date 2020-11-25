
$(function(){ 

    $("#remove_favourites").on('click', function(){ 
        // alert($(this).attr("value"));
        var productName = $(this).attr("value");
        // var productName = get_productName('remove');
        // window.alert(productName);
        $.ajax({ 

            url: "remove_favourites.php",
            method: "POST", 
            data:{productName:productName},

        }).done(function( data ) { 
            window.alert(data);
            var result= $.parseJSON(data); 


            /* from result create a string of data and append to the div */
        
            $.each( result, function( key, value ) { 
                // Remove spaces in the product name
                var stripped = value['name'].trim(); 
                stripped = stripped.replace(/\s+/g, '');
                
                var string='<div class="unit-container">';
                    string += "<figure>";
                        string += '<a href="products/'+ stripped +'.php"> <img class="product-image" src="img/'+ stripped +'.png"> </a>'; 
                        string += '<figcaption class="content-unit-text"><span class="product-name">'+ value['name'] + '</span> <br><span class="price">$'+ value['price'] +'</span> <br> \
                        <button id="remove_favourites" value="' + value[name] + '" class="remove">Remove from Favourites</button></figcaption>';
                    string += "</figure>"; 
                string += '</div>';    
            }); 
            $("#favourites_display").html(string); 
        }); 
    }); 
});

// function get_productName(class_name){
//     var productName;
//     // $('.'+class_name+':checked').each(function(){
//     //     customization.push($(this).val());
//     // });
//     productName = $(class_name).attr("value");
//     return customization;
// }







// $(document).ready(function(){
//     filter_data();


//     function filter_data(){

//         var action = 'filter_ajax';
//         var brand = get_filter('brand');
//         var colour = get_filter('colour');
//         var size = get_filter('size');

//         $.ajax({
//             url:"remove_favourites.php",
//             method:"POST",
//             data:{action:action, brand:brand, colour:colour, size:size},
//             success:function(data){

//                 var result = $.parseJSON(data);

//                 var string ='<div class="grid units-add-gutters three-column">';
                    
//                     // If no results, display message
//                     if(result == ''){
//                         string += "<p>Oops! It appears we don't have any matches!</p>";
//                     }

//                     // Display Products
//                     $.each( result, function( key, value ) { 
                        
//                         // Remove spaces in the product name
//                         var stripped = value['name'].trim(); 
//                         stripped = stripped.replace(/\s+/g, '');

//                         string += '<div class="unit-container"><figure>';
//                             // Product Image
//                             string += "<a href='products/" + stripped + ".php'><img class='product-image' src='img/" + stripped + ".png'></a>";
                            
//                             // Product Details
//                             string += "<figcaption class='content-unit-text'> <span class='product-name'>" +value['name'] + "</span><br>" +value['gender'] + "<br> <span class='price'>$" +value['price']+ "</span></figcaption>";
                        
//                         string += '</figure></div>';
                        
//                     }); 

//                 string += '</div>';

//                 // Show the results on the page
//                 $("#getFilter").html(string);

//             }
//         })
//     }


//     function get_filter(class_name){
//         var filter = [];
//         $('.'+class_name+':checked').each(function(){
//             filter.push($(this).val());
//         });
//         return filter;
//     }

//     $('.common_selector').click(function(){
//         filter_data();
//     });
// });