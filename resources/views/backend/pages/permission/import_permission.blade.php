@extends('admin.admin_dashboard')
@section('admin')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">
            
                    
			
    <div class="row profile-body">
          <!-- middle wrapper start -->
                    
          <div class="col-md-12 stretch-card">
            
						<div class="card">
							<div class="card-body">
                            <h6 class="card-title">Add Permission</h6>
                            <ol class="breadcrumb">
                            
                    <a href="{{route('export')}}" class="btn btn-inverse-danger mb-1 mb-md-0">Download Template</a>
					</ol>
                    
									<form id="myForm" method="post" action="{{route('import')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Xlsx File Import</label>
													<input type="file" name="import_file" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->

                                            
										</div><!-- Row -->

										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
										<button type="submit" class="btn btn-primary submit">Upload</button>
									
									
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