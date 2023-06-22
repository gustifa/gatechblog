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

                    <form method="post" action="{{route('update.type')}}" enctype="multipart/form-data">
										@csrf
                    <input type="hidden" name="id" value="{{$types->id}}">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Type Name</label>
                        <input type="text" name="type_name" value="{{$types->type_name}}" class="form-control  @error('type_name') is-invalid @enderror" id="type_name" autocomplete="off">
                        @error('type_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Icon Name</label>
                        <input type="text" name="icon_name" value="{{$types->icon_name}}" class="form-control  @error('icon_name') is-invalid @enderror" id="icon_name" autocomplete="off">
                        @error('icon_name')
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