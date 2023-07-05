@extends('admin.admin_dashboard')
@section('admin')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
        <div class="page-content">
			<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <!-- <a href="{{route('add.permission')}}" class="btn btn-inverse-primary mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">Add Admin</a> -->
                    <button class="btn btn-inverse-primary mb-1 mb-md-0" onClick="create()">Add Admin</button>
                    &nbsp; &nbsp;
                    <a href="{{route('import.admin')}}" class="btn btn-inverse-info mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</a>
                    &nbsp; &nbsp;
                    <a href="{{route('export.admin')}}" class="btn btn-inverse-danger mb-1 mb-md-0">Export</a>
					</ol>
			</nav>
                
				<div class="row">
                
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Permission All</h6>
                        <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Roles</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{(!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/no_image.jpg')}}" alt="" style="width:70px; height:40px;"></td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @foreach($item->roles as $role)
                                    <span class="badge bg-danger">{{$role->name}}</span>

                                    @endforeach
                                </td>
                                <td>
                                    @if($item->status == 'active')
                                    <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('details.permission', $item->id)}}" class="btn btn-inverse-info" title="detail"><i data-feather="eye"></i></a>
                                    <a href="{{route('edit.admin', $item->id)}}" class="btn btn-inverse-primary" title="edit"><i data-feather="edit"></i></a>
                                    <a href="{{route('delete.admin', $item->id)}}" class="btn btn-inverse-warning" title="delete" id="delete"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
					</div>
				</div>

                <!-- Modal Import -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import User Admin</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
      
      <form id="myForm" method="post" action="{{route('admin.store.import')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
											<div class="col-sm-12">
												<div class="form-group mb-3">
													<label class="form-label">Xlsx File Import</label>
													<input type="file" name="import_file" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->

                                            
										</div><!-- Row -->

										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
                                                <a href="{{route('download.template.admin')}}" class="btn btn-inverse-danger mb-1 mb-md-0">Download Template</a>
                                               
									
										</div>
											    </div>
												</div>
									
									
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import User</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Import -->

@php
$roles = Spatie\Permission\Models\Role::all();
@endphp

<div class="modal fade bd-example-modal-xl" id="adduser" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="labeladduser">Add Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <div id="add"></div>
        <!-- Form Add Admin -->
      
    </div>
  </div>
</div>

		</div>

        <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                import_file: {
                    required : true,
                },
                
            },
            messages :{
                import_file: {
                    required : 'Please Upload Template User',
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
    $(document).ready(function(){

    });
    function create(){
        $.get("{{ url('/add/admin')}}", {}, function(data, status){
            $("#labeladduser").html('Create User Admin');
            $("#add").html(data);
            $('#adduser').modal('show');
        }); 
    }

    function store(){
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var password = $("#password").val();
        $.ajax({
            type: "post",
            url: "{{url('/store/admin')}}",
            data:"name" + name,
            success:function(data){
                // $("#add").html('');
                $(".btn-close").click();
            }
        });
    }
</script>
	
@endsection