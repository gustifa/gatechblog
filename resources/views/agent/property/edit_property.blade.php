@extends('agent.agent_dashboard')
@section('agent')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">
    <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Form Grid</h6>
									<form id="myForm" method="post" action="{{route('agent.update.property')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$property->id}}">
										<div class="row">
											<div class="col-sm-6">
												<div class=" form-group mb-3">
													<label class="form-label">Property Name</label>
													<input type="text" name="property_name" class="form-control" value="{{$property->property_name}}">
                                                    
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group mb-3">
													<label class="form-label">Property Status</label>
													<select name="property_status" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Select Status</option>
                                                        <option value="rent" {{$property->property_status == 'rent' ? 'selected' : ''}}>For Rent</option>
                                                        <option value="buy" {{$property->property_status == 'buy' ? 'selected' : ''}}>For Buy</option>
														
                                                    </select>
                                                   
												</div>
											</div><!-- Col -->

                                            <div class="col-sm-6">
												<div class="form-group mb-3">
													<label class="form-label">Lowest Price</label>
													<input type="text" name="lowest_price" class="form-control" value="{{$property->lowest_price}}">
                                                   
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="form-group mb-3">
													<label class="form-label">Max Price</label>
													<input type="text" name="max_price" class="form-control" value="{{$property->max_price}}">
                                                   
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Main Thumbnail</label>
													<input type="file" name="property_thambnail" onChange="mainThumbUrl(this)" class="form-control">
                                                    <!-- <img src="" id="mainThumb" alt=""> -->
                                                    <img id="mainThumb" class="wd-80 ht-80 rounded-circle" src="{{(!empty($property->property_thambnail)) ? url('upload/property/thambnail/'.$property->property_thambnail) : url('upload/no_image.jpg')}}" alt="profile">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Multi Image</label>
													<input type="file" name="multi_img[]" class="form-control" id="multiImg" multiple="">
                                                    <div class="row" id="preview_img"></div>
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
										
                                        <div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">BedRooms</label>
													<input type="text" name="bedrooms" class="form-control" value="{{$property->bedrooms}}" >
                                                   
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">BathRooms</label>
													<input type="text" name="bathrooms" class="form-control" value="{{$property->bathrooms}}">
                                                   
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Garage</label>
													<input type="text" name="garage" class="form-control" value="{{$property->garage}}">
                                                  
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Garage Size</label>
													<input type="text" name="garage_size" class="form-control" value="{{$property->garage_size}}">
                                                    
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
                                        <div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Address</label>
													<input type="text" name="address" class="form-control" value="{{$property->address}}">
                                                   
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">City</label>
													<input type="text" name="city" class="form-control" value="{{$property->city}}">
                                                    
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">State</label>
													<input type="text" name="state" class="form-control" value="{{$property->state}}">
                                                   
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Portal Code</label>
													<input type="text" name="portal_code" class="form-control" value="{{$property->portal_code}}">
                                                   
												</div>
											</div><!-- Col -->
										</div><!-- Row -->

                                        <div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Property Size</label>
													<input type="text" name="property_size" class="form-control" value="{{$property->property_size}}">
                                                   
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Property Video</label>
													<input type="text" name="property_video" class="form-control" value="{{$property->property_video}}">
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Nieghborhoot</label>
													<input type="text" name="neighborhood" class="form-control" value="{{$property->neighborhood}}">
												</div>
											</div><!-- Col -->
                                        </div><!-- Row -->

                                        <div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">latitude</label>
													<input type="text" name="latitude" class="form-control" value="{{$property->latitude}}">
                                                    <a href="" target="_blank">Go here to go latitude from Address  </a>
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">logitude</label>
													<input type="text" name="logitude" class="form-control" value="{{$property->logitude}}">
                                                    <a href="" target="_blank">Go here to go logitude from Address  </a>
												</div>
											</div><!-- Col -->

                                            
										</div><!-- Row -->
                                        

                                        <div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Property Type</label>
													<select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Select Type</option>
														@foreach($propertyType as $type)
                                                        <option value="{{$type->id}}" {{$type->id == $type->id ? 'selected' : ''}}>{{$type->type_name}}</option>
                                                       	@endforeach
                                                       
                                                    </select>
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Property amenities</label>
													<select name="amenities_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                    @foreach($amenities as $item)
                                                        <option value="{{$item->id}}"{{(in_array($item->id,$property_amenites)) ? 'selected' : ''}}>{{$item->amenities_name}}</option>
													@endforeach
														
                                                    </select>
												</div>
											</div><!-- Col -->
                                            
                                        </div>

                                        <div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Short Descp</label>
													<textarea name="short_descp" class="form-control" id="tinymceExample" maxlength="50" rows="3">
                                                    {{$property->short_descp}}
                                                    </textarea>
												</div>
											</div><!-- Col -->
										</div><!-- Row -->

                                        <div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Long Descp</label>
													<textarea class="form-control" name="long_descp" id="tinymceExample" rows="10">
                                                        {{$property->long_descp}}
                                                    </textarea>
												</div>
											</div><!-- Col -->
										</div><!-- Row -->

                                        <div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="featured" value="1" class="form-check-input" id="checkInline" {{$property->featured == '1' ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="checkInline">
                                                            featured Property
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox"  name="hot" value="1" class="form-check-input" id="checkInline"  {{$property->hot == '1' ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="checkInline">
                                                            Hot Property
                                                            </label>
                                                    </div>
											    </div>
											</div><!-- Col -->
										</div><!-- Row -->

										<div class="row add_item">
                        <div class="col-md-4">
                              <div class="mb-3">
                                    <label for="facility_name" class="form-label">Facilities </label>
                                    <select name="facility_name[]" id="facility_name" class="form-control">
                                          <option value="">Select Facility</option>
                                          <option value="Hospital">Hospital</option>
                                          <option value="SuperMarket">Super Market</option>
                                          <option value="School">School</option>
                                          <option value="Entertainment">Entertainment</option>
                                          <option value="Pharmacy">Pharmacy</option>
                                          <option value="Airport">Airport</option>
                                          <option value="Railways">Railways</option>
                                          <option value="Bus Stop">Bus Stop</option>
                                          <option value="Beach">Beach</option>
                                          <option value="Mall">Mall</option>
                                          <option value="Bank">Bank</option>
                                    </select>
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="mb-3">
                                    <label for="distance" class="form-label"> Distance </label>
                                    <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
                              </div>
                        </div>
                        <div class="form-group col-md-4" style="padding-top: 30px;">
                              <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add More..</a>
                        </div>
                 </div> <!---end row-->



										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
										<button type="submit" class="btn btn-primary submit">Update Property</button>
									
									
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

            },
            messages :{
                property_name: {
                    required : 'Please Enter property_name',
                },
                property_status: {
                    required : 'Please Enter property_status',
                }, 
				lowest_price: {
                    required : 'Please Enter property_status',
                },
				max_price: {
                    required : 'Please Enter property_status',
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

  <!--========== Start of add multiple class with ajax ==============-->
<div style="visibility: hidden">
   <div class="whole_extra_item_add" id="whole_extra_item_add">
      <div class="whole_extra_item_delete" id="whole_extra_item_delete">
         <div class="container mt-2">
            <div class="row">
              
               <div class="form-group col-md-4">
                  <label for="facility_name">Facilities</label>
                  <select name="facility_name[]" id="facility_name" class="form-control">
                        <option value="">Select Facility</option>
                        <option value="Hospital">Hospital</option>
                        <option value="SuperMarket">Super Market</option>
                        <option value="School">School</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Airport">Airport</option>
                        <option value="Railways">Railways</option>
                        <option value="Bus Stop">Bus Stop</option>
                        <option value="Beach">Beach</option>
                        <option value="Mall">Mall</option>
                        <option value="Bank">Bank</option>
                  </select>
               </div>
               <div class="form-group col-md-4">
                  <label for="distance">Distance</label>
                  <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
               </div>
               <div class="form-group col-md-4" style="padding-top: 20px">
                  <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                  <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>      



            <!----For Section-------->
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