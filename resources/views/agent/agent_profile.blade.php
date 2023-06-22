@extends('agent.agent_dashboard')
@section('agent')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">

<div class="row profile-body">
          <!-- left wrapper start -->
          <div class="col-md-5 col-xl-5 right-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                  
                  <div class="card-body">
                  <div class="text-center">
                
                    <img class="wd-150 ht-150 rounded-circle" src="{{(!empty($profileData->photo)) ? url('upload/agent_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                                      
                                        
                  </div>
                  <div class="text-center mt-3">
                                            <p class="tx-16 fw-bolder">{{$profileData->name}}</p>
                                      </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                  <p class="text-muted">{{$profileData->username}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{$profileData->email}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                  <p class="text-muted">{{$profileData->phone}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                  <p class="text-muted">{{$profileData->address}}</p>
                </div>
                <div class="mt-3 d-flex social-links">
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                  </a>
                </div>
              </div>
                  
                </div>
              </div>
             
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-7 col-xl-7 right-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                  
                  <div class="card-body">

                    <h6 class="card-title">Update Admin Profile</h6>

                    <form method="post" action="{{route('agent.profile.store')}}" enctype="multipart/form-data">
										@csrf
                      <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->name}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$profileData->email}}" >
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" value="{{$profileData->phone}}" >
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{$profileData->address}}" >
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" id="image" value="{{$profileData->address}}" >
                      </div>
                      <div class="mb-3">
                      <img id="showImage" class="wd-80 ht-80 rounded-circle" src="{{(!empty($profileData->photo)) ? url('upload/agent_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                      </div>
                      
                      <button type="submit" class="btn btn-primary me-2">Update Profile</button>
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
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    })
  });
</script>
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		})

	});

</script> -->

@endsection