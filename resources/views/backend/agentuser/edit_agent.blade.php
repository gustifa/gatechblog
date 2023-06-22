@extends('admin.admin_dashboard')
@section('admin')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">
    <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Form Grid</h6>
									<form id="myForm" method="post" action="{{route('update.agent')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$userAgent->id}}">
										<div class="row">
											<div class="col-sm-12">
												<div class=" form-group mb-3">
													<label class="form-label">Name</label>
													<input type="text" name="name" value="{{$userAgent->name}}" class="form-control">
                                                    
												</div>
											</div><!-- Col -->

                                            <div class="col-sm-12">
												<div class=" form-group mb-3">
													<label class="form-label">Email</label>
													<input type="text" name="email" value="{{$userAgent->email}}" class="form-control">
												</div>
											</div><!-- Col -->

                                            <div class="col-sm-12">
												<div class=" form-group mb-3">
													<label class="form-label">Phone</label>
													<input type="text" name="phone" value="{{$userAgent->phone}}" class="form-control">
												</div>
											</div><!-- Col -->

                                            <div class="col-sm-12">
												<div class=" form-group mb-3">
													<label class="form-label">Address</label>
													<input type="text" name="address" value="{{$userAgent->address}}" class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-12">
												<div class="form-group mb-3">
													<label class="form-label">Status</label>
													<select name="status" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Select Status</option>
                                                        <option value="active" {{$userAgent->status == 'active' ? 'selected' : ''}}>Active</option>
                                                        <option value="inactive" {{$userAgent->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                                    </select>
                                                   
												</div>
											</div><!-- Col -->

                                        </div> <!---end row-->



										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
										<button type="submit" class="btn btn-primary submit">Update Agent</button>
									
									
										</div>
											    </div>
												</div>
									
									</form>
									
							</div>
						</div>
					</div>
          <!-- middle wrapper end -->
         
    </div>

</div>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                property_name: {
                    required : true,
                },
                property_status: {
                    required : true,
                },
				lowest_price: {
                    required : true,
                },  
				max_price: {
                    required : true,
                },  

                amenities_id: {
                    required : true,
                },  

                agen_id: {
                    required : true,
                },  

                ptype_id: {
                    required : true,
                },  

            },
            messages :{
                property_name: {
                    required : 'Please Enter property_name',
                },
                property_status: {
                    required : 'Please Enter property_status',
                }, 
				lowest_price: {
                    required : 'Please Enter lowest_price',
                },
				max_price: {
                    required : 'Please Enter max_price',
                }, 
                amenities_id: {
                    required : 'Please Enter menities_id',
                }, 
				agen_id: {
                    required : 'Please Enter agen_id',
                },
				ptype_id: {
                    required : 'Please Enter ptype_id',
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

<script type="text/javascript">
    function mainThumbUrl(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script> 
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>


<script type="text/javascript">
   $(document).ready(function(){
      var counter = 0;
      $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
      });
      $(document).on("click",".removeeventmore",function(event){
            $(this).closest("#whole_extra_item_delete").remove();
            counter -= 1
      });
   });
</script>
<!--========== End of add multiple class with ajax ==============-->


	
	
@endsection