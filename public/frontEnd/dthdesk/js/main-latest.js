$(document).ready(function() {
    $('.hamburger').on('click', function() {
        $(this).toggleClass('active');
        $('.responsive-nav').slideToggle();
    })
})

// window.onscroll = function() { myFunction() };

// var header = document.getElementById("menu-container");
// var banner = document.getElementById('target-container');
// var sticky = banner.offsetTop;

// function myFunction() {
//     if (window.pageYOffset >= sticky) {
//         header.classList.add("sticky");
//     } else {
//         header.classList.remove("sticky");
//     }
// }



/*-------------------------- Toggling Product details ------------------------*/
function product() {
    document.querySelector('.desc-title').addEventListener('click', function() {
        document.querySelector('#desc-content').style.display = 'block';
        document.querySelector('#addition-info-content').style.display = 'none';
        document.querySelector('.desc-title').style.borderBottom = '3px solid #ee2424';
        document.querySelector('.additional-info').style.borderBottom = 'none';
        document.querySelector('.description-title').style.borderRadius = '2px';
    })

    document.querySelector('.additional-info').addEventListener('click', function() {
        document.querySelector('#addition-info-content').style.display = 'block';
        document.querySelector('#desc-content').style.display = 'none';
        document.querySelector('.desc-title').style.borderBottom = 'none';
        document.querySelector('.additional-info').style.borderBottom = '3px solid #ee2424';
        document.querySelector('.description-title').style.borderRadius = '2px';
    })


    if (document.querySelector('.description-title').classList.contains('show')) {
        document.querySelector('.description-title').style.borderBottom = '4px solid #ee2424';
        document.querySelector('.description-title').style.borderRadius = '2px';
    }



}


/*------------------------ Cart Update --------------------------*/
function cart() {
    document.querySelector('.update-cart').addEventListener('click', function() {
        var amt = document.querySelector('.myPrice').innerHTML;
        var convertedAmt = parseInt(amt);
        var qty = document.querySelector('.quantity-select').innerHTML;
        convertedQty = parseInt(qty);
        var totAmtDisplay = document.querySelector('.total-amt');

        totAmtDisplay.innerHTML = (convertedAmt * convertedQty);
    });


    /*------------------------- Remove Product ---------------------------*/

    document.querySelector('.remove-product').addEventListener('click', function() {
        this.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
        var totAmtDisplay = document.querySelector('.total-amt');
        totAmtDisplay.innerHTML = 0;

        document.querySelector('.empty-cart-msg').innerHTML = 'Your cart is empty!';

        document.querySelector('.checkout-proceed').style.display = 'none';
    })

    incr();
}

/* jquery  Add to cart */
$(document).ready(function() {
    var url="//homemitra.in/demo/dthdesk/";
    try{
              url="//homemitra.in/demo/dthdesk/";
            }catch (e) {
             
               try{
                  url="//www.homemitra.in/demo/dthdesk/";
					
               }catch (e) {
				
                  try{
                     url="//www.homemitra.in/demo/dthdesk/";
                  }catch (e) {
                   
                    url="//www.homemitra.in/demo/dthdesk/";
                  }
					
               }
            }
    // alert(url);
    
   
// all time header bar load channel packages start
            $.ajax({
              url: url+"userChannels",
              type: "POST",
              cache: false,
              data: {
                  _token: $("#csrf").val(),                
              },
              
              success: function(dataResult){
                // alert(dataResult);
                  var dataResult = JSON.parse(dataResult);
                //   console.log(dataResult);
                  var resultData = dataResult;  
                  var bodyData='' ;
                    $.each(resultData,function(index,row){
                        
                          var urls= url+"channelList/"+row.sub_id;                      
                          bodyData+="<a href='"+urls+"'><li>"+row.sub_pack_name+"</li></a>";
                       
                        
                    })
                    $(".channel_list_types").append(bodyData);

               
                  
              }
          });
     

     
   // all time header bar load channel packages end  
    
    
    
    
    $(".addtocart").click(function() {
        var action = "add";
        var product_id = $(this).attr("id");
        var product_name = $(".product_name").val();
        var product_price = $(".product_price").val();
        var product_image = $(".product_image").val();
        var product_quantity = $("#quantity").val();
        var product_total_price = $(".total-price").val();
        // alert(product_image);

        $.ajax({
            url: url+"/cartstore/" + product_id,
            type: "post",
            data: {
                _token: $("#csrf").val(),
                action: action,
                product_id: product_id,
                product_name: product_name,
                product_price: product_price,
                product_image: product_image,
                product_quantity: product_quantity,
                product_total_price: product_total_price
            },
            success: function(data) {
                window.location.href = url+'cart';
            }
        })


    });

    $(".remove-cart").click(function() {

        var product_id = $(this).attr("id");
        if (confirm("Are you sure you want to delete?")) {
            // alert(product_id);
            $.ajax({
                url: url+"/deletecart/{{product_id}}",
                type: "get",
                data: {
                    _token: $("#csrf").val(),
                    product_id: product_id
                },
                cache: false,
                success: function(data) {
                    if (data == "200") {
                        // $(".add-success").hide();
                        // $(".return-message").text("Successfully Delete Cart!").addClass("alert alert-info text-center");
                        location.reload(30000);

                    }
                }
            })
        }

    });

    /* card update */
    $(".update-qty").click(function() {
        var product_quantity = $(this).val();
        var product_id = $(".product-id").val();
        var product_price = $(".p-price").val();
        var product_name = $(".product-name").val();
        var product_image = $(".product-image").val();
        // alert(product_name + product_image + product_id);

        $.ajax({
            url: url+"/update/{{product_id}}",
            type: "post",
            data: {
                _token: $("#csrf").val(),
                product_id: product_id,
                product_price: product_price,
                product_name: product_name,
                product_image: product_image,
                product_quantity: product_quantity
            },
            success: function(data) {
                // alert(data);
                // window.location.href = '/cart';
            }
        })



    });

    $('#butsave').click(function() {
        
        if($("#name").val()=="")
        {
            alert("please enter your name");
        }
        
        var cus_name = $("#name").val();
        var cus_email = $("#email").val();
        var cus_phone = $("#phone").val();
        var cus_pincode = $("#pincode").val();
        var cus_message = $("#comment").val();
        // alert(cus_name + cus_phone + cus_pincode + cus_message + cus_email);
        if (cus_name != "" && cus_email != "" && cus_phone != "" && cus_message != "") {
            $.ajax({
                debug: false,
                url: url+"/enquireform",
                type: "post",
                data: {
                    _token: $("#csrf").val(),
                    cus_name: cus_name,
                    cus_email: cus_email,
                    cus_phone: cus_phone,
                    cus_pincode: cus_pincode,
                    cus_message: cus_message
                },
                cache: false,
                success: function(data) {
                    if (data == '200') {
                        mess = "Email Sent Successfully"
                        $('.ajaxmessage').css({ "display": "block", "color": "green", "padding-bottom": "10px" });
                        $('.ajaxmessage').html(mess);
                        $('#contactfrm')[0].reset();
                        $(".ajaxmessage").fadeOut(5000);

                    } else if (data == '201') {
                        mess = "Email Could not Send!"
                        $('.ajaxmessage').css({ "display": "block", "color": "red", "padding-bottom": "10px" });
                        $('.ajaxmessage').html(mess);
                        alert("Error occured !");
                        $(".ajaxmessage").fadeOut(5000);
                    }
                }
            })
        } else {
            alert('Please fill all the field !');
        }
    });

    /* subscribe */

    $('#subbtn').click(function() {
        var sub_email = $("#sub-email").val();
        if (sub_email != "") {
            $.ajax({
                url: url+"/subscribeform",
                type: "post",
                data: {
                    _token: $("#csrf").val(),
                    sub_email: sub_email
                },
                success: function(success) {

                    if (success == '200') {
                        mess = "Thank You for subscribe with us!"
                        $('.subscribmessage').css({ "display": "block", "color": "green", "padding-bottom": "10px" });
                        $('.subscribmessage').html(mess);
                        $('#sub-email').val('');
                        $(".subscribmessage").fadeOut(5000);

                    } else {
                        mess = "Your already Subscribed!"
                        $('.subscribmessage').css({ "display": "block", "color": "red", "padding-bottom": "10px" });
                        $('.subscribmessage').html(mess);
                        $('#sub-email').val('');
                        $(".subscribmessage").fadeOut(5000);
                        // alert("Error occured !");
                    }
                }
            })
        } else {
            alert('Please fill all the field !');
        }
    });

    /* add packages */
    $(".addpackage").click(function() {
        // alert("djfkjdl");
        var package_id = $(this).attr("id");

        var package_name = $(this).attr("package_name");
        var package_image = $(this).attr("package_image");
        var package_price = $(this).attr("package_price");
        var package_month = $(this).attr("package_month");
        var package_desc = $(this).attr("package_desc");
        // alert(package_image);
        // alert(package_id);
        // alert(package_image);
        // alert(package_price);
        // alert(package_month);
        // alert(package_desc);

        $.ajax({
            url: url+"/buypackage/{{package_id}}",
            type: "post",
            data: {
                _token: $("#csrf").val(),
                package_id: package_id,
                package_name: package_name,
                package_image: package_image,
                package_price: package_price,
                package_month: package_month,
                package_desc: package_desc
            },
            success: function(data) {
                // alert(data);
                window.location.href = url+'cart';
            }
        })


    });

    $(".remove-package").click(function() {

        var package_id = $(this).attr("id");
        // alert(package_id);
        if (confirm("Are you sure you want to delete?")) {
            // alert(product_id);
            $.ajax({
                url: url+"/deletepackage/{{package_id}}",
                type: "post",
                data: {
                    _token: $("#csrf").val(),
                    package_id: package_id
                },
                cache: false,
                success: function(data) {
                    if (data == "200") {
                        // $(".add-success").hide();
                        // $(".return-message").text("Successfully Delete Cart!").addClass("alert alert-info text-center");
                        location.reload(30000);

                    }
                }
            })
        }

    });

});