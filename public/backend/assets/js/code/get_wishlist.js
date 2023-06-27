    function wishlist(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/get-wishlist-property/",

            success:function(response){

                $('#wishQty').text(response.wishQty);

                var rows = ""
                $.each(response.wishlist, function(key,value){

                    rows += `<div class="deals-block-one">
        <div class="inner-box">
            <div class="image-box">
                <figure class="image"><img src="/${value.property.property_thambnail}" alt=""></figure>
                <div class="batch"><i class="icon-11"></i></div>
                <span class="category">Featured</span>
                <div class="buy-btn"><a href="#">For ${value.property.property_status}</a></div>
            </div>
            <div class="lower-content">
                <div class="title-text"><h4><a href="">${value.property.property_name}</a></h4></div>
                <div class="price-box clearfix">
                    <div class="price-info pull-left">
                        <h6>Start From</h6>
                        <h4>$${value.property.lowest_price}</h4>
                    </div>
                     
                </div>
               
                <ul class="more-details clearfix">
                    <li><i class="icon-14"></i>${value.property.bedrooms} Beds</li>
                    <li><i class="icon-15"></i>${value.property.    bathrooms} Baths</li>
                    <li><i class="icon-16"></i>${value.property.    property_size} Sq Ft</li>
                </ul>
                <div class="other-info-box clearfix">
                    
                    <ul class="other-option pull-right clearfix">
                       
       <li><a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa fa-trash"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> `
                });
                $('#wishlist').html(rows); 
            }
        })
    }

    wishlist();

    // Wishlist Remove Start 

    function wishlistRemove(id){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/wishlist-remove/"+id,

            success:function(data){
                wishlist();

                 // Start Message 

            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    icon: 'success', 
                    title: data.success, 
                    })

            }else{
               
           Toast.fire({
                    type: 'error',
                    icon: 'error', 
                    title: data.error, 
                    })
                }

              // End Message  


            }
        })

    }