@extends('admin.admin_dashboard')
@section('admin')
        <div class="page-content">
			<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <a href="{{route('add.agent')}}" class="btn btn-inverse-primary mb-1 mb-md-0">Add Agent</a>
					</ol>
			</nav>
                
				<div class="row">
                
					<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Agent</h6>
                        <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($agent as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                
                                <td><img src="{{(!empty($item->photo)) ? url('upload/agent_images/'.$item->photo) : url('upload/no_image.jpg')}}" alt="" style="width:70px; height:40px;"></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    @if($item->status == 'active')
                                    <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('detail.agent', $item->id)}}" class="btn btn-inverse-info" title="detail"><i data-feather="eye"></i></a>
                                    <a href="{{route('edit.agent', $item->id)}}" class="btn btn-inverse-primary" title="edit"><i data-feather="edit"></i></a>
                                    <a href="{{route('delete.agent', $item->id)}}" class="btn btn-inverse-warning" title="delete" id="delete"><i data-feather="trash-2"></i></a>
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