@extends('admin.admin_dashboard')
@section('admin')
        <div class="page-content">
			<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <a href="{{route('add.property')}}" class="btn btn-inverse-primary mb-1 mb-md-0">Add Property</a>
					</ol>
			</nav>
                
				<div class="row">
                
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Type</h6>
                        <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Nama Agent</th>
                                <th>P Type</th>
                                <th>Status Type</th>
                                <!-- <th>Featured</th> -->
                                <!-- <th>Property Code</th> -->
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($property as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                
                                <td><img src="{{(!empty($item->property_thambnail)) ? asset($item->property_thambnail) : url('upload/no_image.jpg')}}" alt="" style="width:70px; height:40px;"></td>
                                <td>{{$item->property_name}}</td>
                                @if($item->agen_id == NULL)
                                <td>Admin</td>
                                @else
                                <td>{{$item->user->name}}</td>
                                @endif
                                <td>{{$item->type->type_name}}</td>
                                <td>{{$item->property_status}}</td>
                                <!-- <td>
                                    @if($item->featured == 1)
                                    <span class="badge rounded-pill bg-success">featured</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">No</span>
                                    @endif
                                </td> -->
                                <!-- <td>{{$item->property_code}}</td> -->
                                <td>
                                    @if($item->status == 1)
                                    <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('detail.property', $item->id)}}" class="btn btn-inverse-info" title="detail"><i data-feather="eye"></i></a>
                                    <a href="{{route('edit.property', $item->id)}}" class="btn btn-inverse-primary" title="edit"><i data-feather="edit"></i></a>
                                    <a href="{{route('delete.property', $item->id)}}" class="btn btn-inverse-warning" title="delete" id="delete"><i data-feather="trash-2"></i></a>
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

		</div>
	
@endsection