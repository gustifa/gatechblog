@extends('admin.admin_dashboard')
@section('admin')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">
    <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Add Roles In Permission</h6>
									<form id="myForm" method="post" action="{{route('roles.permission.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <div class="form-group col-md-12">
                                                        <label for="group_name">Select Roles</label>
                                                        <select name="role_id" id="group_name" class="form-control">
                                                            <option selected="" disabled="">Select Roles</option>
                                                            @foreach($roles as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
											<div class="col-sm-12">
                                                <div class="mb-3">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="name" value="" class="form-check-input" id="checkDefaultmain">
                                                        <label class="form-check-label" for="checkDefaultmain">
                                                        Permission.all
                                                        </label>
                                                    </div>
											    </div>
                                                <hr />
											</div><!-- Col -->
                                            
										</div><!-- Row -->
                                        <div class="row">
                                        @foreach($permission_groups as $item)
											<div class="col-sm-3">
                                            
                                                <div class="mb-3">
                                                    
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="name" value="" class="form-check-input" id="checkInline">
                                                        <label class="form-check-label" for="checkInline">
                                                        {{$item->group_name}}
                                                        </label>
                                                    </div>
                                                    
											    </div>
                                               
											</div><!-- Col -->
                                            <div class="col-sm-9">
                                                @php
                                                $permissions = App\Models\User::getpermissionByGroupName($item->group_name)
                                                @endphp
                                                    @foreach($permissions as $permission)
                                                <div class="mb-3">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="permission[]" class="form-check-input" id="checkDefault{{$permission->id}}" value="{{$permission->id}}">
                                                        <label class="form-check-label" for="checkDefault{{$permission->id}}">
                                                        {{$permission->name}}
                                                        </label>
                                                    </div>
                                                    
											    </div>
                                                @endforeach
                                                <br>
                                                <hr />
											</div><!-- Col -->
                                            @endforeach
										</div><!-- Row -->

										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
										<button type="submit" class="btn btn-primary submit">Save Roles</button>
									
									
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
    $('#checkDefaultmain').click(function(){
        if ($(this).is(':checked')){
            $('input[ type= checkbox]').prop('checked', true);
        }else{
            $('input[ type= checkbox]').prop('checked', false);
        }
    });

</script>

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