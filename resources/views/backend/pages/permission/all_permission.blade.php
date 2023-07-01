@extends('admin.admin_dashboard')
@section('admin')
        <div class="page-content">
			<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                    <a href="{{route('add.permission')}}" class="btn btn-inverse-primary mb-1 mb-md-0">Add Permission</a>
                    &nbsp; &nbsp;
                    <a href="{{route('import.permission')}}" class="btn btn-inverse-info mb-1 mb-md-0">Import</a>
                    &nbsp; &nbsp;
                    <a href="{{route('export')}}" class="btn btn-inverse-danger mb-1 mb-md-0">Export</a>
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
                                <th>Role Permission</th>
                                <th>Group Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permission as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->group_name}}</td>
                                <td>
                                    <a href="{{route('details.permission', $item->id)}}" class="btn btn-inverse-info" title="detail"><i data-feather="eye"></i></a>
                                    <a href="{{route('edit.permission', $item->id)}}" class="btn btn-inverse-primary" title="edit"><i data-feather="edit"></i></a>
                                    <a href="{{route('delete.permission', $item->id)}}" class="btn btn-inverse-warning" title="delete" id="delete"><i data-feather="trash-2"></i></a>
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