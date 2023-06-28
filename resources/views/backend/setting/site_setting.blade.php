@extends('admin.admin_dashboard')
@section('admin')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">
    <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Site Setting</h6>
									<form id="myForm" method="post" action="{{route('setting.update')}}" enctype="multipart/form-data">
                                        @csrf
										<div class="row">
                                        <input type="hidden" name="old_img" class="form-control" value="{{$siteSetting->logo}}">
											<div class="col-sm-8">
												<div class=" form-group mb-3">
													<label class="form-label">Logo</label>
                                                    <input type="file" name="logo" onChange="logoUrl(this)" class="form-control">
                                                   
                                                    
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-4">
												<div class=" form-group mb-3">
                                                <img id="logo" src="{{(!empty($siteSetting->logo)) ? asset($siteSetting->logo) : url('upload/no_image.jpg')}}" style="width: 100px; height: 100px;">
                                                    
												</div>
											</div><!-- Col -->

										</div>
										
                                        <div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Support Phone</label>
													<input type="text" name="support_phone" value="{{$siteSetting->support_phone}}" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->

                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Email</label>
													<input type="text" name="email" value="{{$siteSetting->email}}" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->
										</div><!-- Row -->

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Facebook</label>
                                                        <input type="text" name="facebook" value="{{$siteSetting->facebook}}" class="form-control" >
                                                    
                                                    </div>
                                                </div><!-- Col -->

                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Twitter</label>
                                                        <input type="text" name="twitter" value="{{$siteSetting->twitter}}" class="form-control" >
                                                    
                                                    </div>
                                                </div><!-- Col -->
                                            </div><!-- Row -->

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Company Address</label>
                                                        <input type="text" name="company_address" value="{{$siteSetting->company_address}}" class="form-control" >
                                                    
                                                    </div>
                                                </div><!-- Col -->

                                                
                                            </div><!-- Row -->

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">CopyRight</label>
                                                        <input type="text" name="copyright" value="{{$siteSetting->copyright}}" class="form-control" >
                                                    
                                                    </div>
                                                </div><!-- Col -->

                                                
                                            </div><!-- Row -->


										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
										<button type="submit" class="btn btn-primary submit">Update Setting</button>
									
									
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
                // logo: {
                //     required : true,
                // },
                support_phone: {
                    required : true,
                },
				company_address: {
                    required : true,
                },  
				email: {
                    required : true,
                },  

                facebook: {
                    required : true,
                },  

               
                twitter: {
                    required : true,
                },  
                
                copyright: {
                    required : true,
                },  

            },
            messages :{
                // logo: {
                //     required : 'Please Enter property_name',
                // },
                support_phone: {
                    required : 'Please Enter property_status',
                }, 
				company_address: {
                    required : 'Please Enter lowest_price',
                },
				email: {
                    required : 'Please Enter max_price',
                }, 
                facebook: {
                    required : 'Please Enter menities_id',
                }, 
				
				twitter: {
                    required : 'Please Enter ptype_id',
                }, 
                copyright: {
                    required : 'Please Enter ptype_id',
                }, 
                // property_thambnail: {
                //     required : 'Please Upload property_thambnail',
                // }, 


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
    function logoUrl(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#logo').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


 


	
	
@endsection