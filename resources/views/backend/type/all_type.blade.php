@extends('admin.admin_dashboard')
@section('admin')
        <div class="page-content">
			<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <a href="{{route('add.type')}}" class="btn btn-inverse-primary mb-1 mb-md-0">Add Property Type</a>
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
                                <th>Type Name</th>
                                <th>Icon Name</th>
                                <th>Akses</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->type_name}}</td>
                                <td>{{$item->icon_name}}</td>
                                <td>
                                    <a href="{{route('edit.type', $item->id)}}" class="btn btn-inverse-primary mb-1 mb-md-0">Edit</a>
                                    <a href="{{route('delete.type', $item->id)}}" class="btn btn-inverse-warning mb-1 mb-md-0" id="delete">Delete</a>
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