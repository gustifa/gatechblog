    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    
    // Add To Wishlist 
    function addToWishList(property_id){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-wishList/"+property_id,

            success:function(data){
            //    wishlist();
            //     // Start Message 

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