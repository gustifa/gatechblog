@extends('admin.admin_dashboard')
@section('admin')
        <div class="page-content">
			<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <a href="" class="btn btn-inverse-primary mb-1 mb-md-0">Add Property</a>
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
                                <th>Image</th>
                                <th>User</th>
                                <th>PACKAGE</th>
                                <th>INVOICE</th>
                                <th>AMOUNT</th>
                                <th>DATE</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packageHistory as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                
                                <td><img src="{{(!empty($item->user->photo)) ? url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg')}}" alt="" style="width:70px; height:40px;"></td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->package_name}}</td>
                                <td>{{$item->invoice}}</td>
                                <td>{{$item->package_amount}}</td>
                                <td>{{$item->created_at->format('l d M Y')}}</td>
                                
                                <td>
                                    
                                    <a href="{{route('admin.package.invoice', $item->id)}}" class="btn btn-inverse-warning" title="download" id="download"><i data-feather="download"></i></a>
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