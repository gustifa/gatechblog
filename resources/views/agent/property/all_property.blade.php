@extends('agent.agent_dashboard')
@section('agent')
        <div class="page-content">
			<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <a href="{{route('agent.add.property')}}" class="btn btn-inverse-primary mb-1 mb-md-0">Add Property</a>
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
                                <th>Name</th>
                                <th>P Type</th>
                                <th>Status Type</th>
                                <th>City</th>
                                <th>Property Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($property as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                
                                <td><img src="{{(!empty($item->property_thambnail)) ? url('upload/property/thambnail/'.$item->property_thambnail) : url('upload/no_image.jpg')}}" alt="" style="width:70px; height:40px;"></td>
                                <td>{{$item->property_name}}</td>
                                <td>{{$item['type']['type_name']}}</td>
                                <td>{{$item->property_status}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->property_code}}</td>
                                <td>
                                    @if($item->status == 1)
                                    <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('agent.edit.property', $item->id)}}" class="btn btn-inverse-primary" title="edit"><i data-feather="edit"></i></a>
                                    <a href="{{route('agent.delete.property', $item->id)}}" class="btn btn-inverse-warning" title="delete" id="delete"><i data-feather="trash-2"></i></a>
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