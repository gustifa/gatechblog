@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

<div class="row profile-body">
          <!-- left wrapper start -->
          <div class="col-md-5 col-xl-5 right-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                @php
                    $id = Auth::user()->id;
        			      $profileData = App\Models\User::find($id);

					      @endphp
                  <div class="card-body">
                  <div class="text-center">
                
                    <img class="wd-150 ht-150 rounded-circle" src="{{(!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                                      
                                        
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

                    <h6 class="card-title">Update Password Profile</h6>

                    <form method="post" action="{{route('admin.update.password')}}" enctype="multipart/form-data">
										@csrf
                      <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control  @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" >
                        @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" >
                      </div>

                      
                      
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>

                  </div>

                  
                </div>
              </div>
              
            </div>
          </div>
          <!-- middle wrapper end -->
         
        </div>

</div>

@endsection