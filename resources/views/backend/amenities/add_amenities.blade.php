@extends('admin.admin_dashboard')
@section('admin')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">
    <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 col-xl-12 right-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                  
                  <div class="card-body">

                    <h6 class="card-title">Add Amenities Name</h6>

                    <form id="myForm" method="post" action="{{route('store.amenities')}}" enctype="multipart/form-data">
										@csrf
                    <div class="form-group mb-3">
										<label for="exampleInputText1" class="form-label">Text Input</label>
										<input type="text" name="amenities_name" class="form-control">
									</div>
                  
                      <button type="submit" class="btn btn-primary me-2">Save</button>
                    </form>

                  </div>

                  
                </div>
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
              amenities_name: {
                    required : true,
                },  
            },
            messages :{
              amenities_name: {
                    required : 'Please Enter amenities_name',
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
	
@endsection