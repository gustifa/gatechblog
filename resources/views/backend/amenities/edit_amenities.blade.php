@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="row profile-body">
          <!-- middle wrapper start -->
          <div class="col-md-12 col-xl-12 right-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                  
                  <div class="card-body">

                    <h6 class="card-title">Add Type</h6>

                    <form method="post" action="{{route('update.amenities')}}" enctype="multipart/form-data">
										@csrf
                    <input type="hidden" name="id" value="{{$amenities->id}}">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Type Name</label>
                        <input type="text" name="amenities_name" value="{{$amenities->amenities_name}}" class="form-control  @error('amenities_name') is-invalid @enderror" id="amenities_name" autocomplete="off">
                        @error('amenities_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      <button type="submit" class="btn btn-primary me-2">Update</button>
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