@extends('admin.admin_dashboard')
@section('admin')
<script src="{{asset('backend/assets/download/jquery.min.js')}}"></script>
<div class="page-content">
   
    <div class="row">
					<div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
							<div class="card-body">
								<h4 class="card-title">Property Detail</h4>
								
								<div class="table-responsive">
									<table class="table table-striped">
										
										<tbody>
											<tr>
												<td>Property Name</td>
												<td><code>{{$property->property_name}}</code></td>
											</tr>
											<tr>
												<td>Property Status</td>
												<td><code>{{$property->property_status}}</code></td>
											</tr>
                                            <tr>
												<td>Property Code</td>
												<td><code>{{$property->property_code}}</code></td>
											</tr>
											<tr>
												<td>Max Price</td>
												<td><code>{{$property->max_price}}</code></td>
											</tr>

                                            <tr>
												<td>bedrooms</td>
												<td><code>{{$property->bedrooms}}</code></td>
											</tr>
											<tr>
												<td>bathrooms</td>
												<td><code>{{$property->bathrooms}}</code></td>
											</tr>
                                            <tr>
												<td>garage</td>
												<td><code>{{$property->garage}}</code></td>
											</tr>
											<tr>
												<td>garage_size</td>
												<td><code>{{$property->garage_size}}</code></td>
											</tr> 
                                            <tr>
												<td>Main Image</td>
                                                <td><img src="{{(!empty($property->property_thambnail)) ? url('upload/property/thambnail/'.$property->property_thambnail) : url('upload/no_image.jpg')}}" alt="" style="width:120px; height:70px;"></td>
                                            </tr>
                                            <tr>
												<td>Status</td>
												<td><code>
                                                @if($property->status == 1)
                                                    <span class="badge rounded-pill bg-success">Active</span>
                                                @else
                                                <span class="badge rounded-pill bg-danger">Inactive</span>
                                                @endif
                                                </code></td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
                    </div>
			<div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
							<div class="card-body">
								<h4 class="card-title">Property Detail</h4>
								
								<div class="table-responsive">
									<table class="table table-striped">
										
										<tbody>
											<tr>
												<td>Property Name</td>
												<td><code>{{$property->property_name}}</code></td>
											</tr>
											<tr>
												<td>Property Status</td>
												<td><code>{{$property->property_status}}</code></td>
											</tr>
                                            <tr>
												<td>Property Code</td>
												<td><code>{{$property->property_code}}</code></td>
											</tr>
											<tr>
												<td>Max Price</td>
												<td><code>{{$property->max_price}}</code></td>
											</tr>

                                            <tr>
												<td>bedrooms</td>
												<td><code>{{$property->bedrooms}}</code></td>
											</tr>
											<tr>
												<td>bathrooms</td>
												<td><code>{{$property->bathrooms}}</code></td>
											</tr>
                                            <tr>
												<td>garage</td>
												<td><code>{{$property->garage}}</code></td>
											</tr>
											<tr>
												<td>short_descp</td>
												<td><code>{!!$property->short_descp!!}</code></td>
											</tr>
                                            

                                            <tr>
												<td>address</td>
												<td><code>{{$property->address}}</code></td>
											</tr>
											<tr>
												<td>city</td>
												<td><code>{{$property->city}}</code></td>
											</tr>
                                            <tr>
												<td>Property Amenities</td>
												<td><code>
                                                    <select name="amenities_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                        @foreach($amenities as $item)
                                                            <option value="{{$item->id}}"{{(in_array($item->id,$property_amenites)) ? 'selected' : ''}}>{{$item->amenities_name}}</option>
                                                        @endforeach
														
                                                    </select>
                                                </code></td>
											</tr>
											<tr>
												<td>Agen</td>
                                                @if($property->agen_id == NULL)
                                                <td>Admin</td>
                                                @else
                                                <td>{{$property['user']['name']}}</td>
                                                @endif
											</tr>

											
										</tbody>
									</table>
                                <br>
                            @if($property->status == '1')
                            <form id="myForm" method="post" action="{{route('inactive.property')}}">
                                        @csrf
                                <input type="hidden" name="id" value="{{$property->id}}">
                                <button type="submit" class="btn btn-primary submit">Inactive</button>

                            </form>
                            @else
                            <form id="myForm" method="post" action="{{route('active.property')}}">
                                        @csrf
                                <input type="hidden" name="id" value="{{$property->id}}">
                                <button type="submit" class="btn btn-primary submit">Active</button>

                            </form>
                            @endif
								</div>
							</div>
					</div>
			</div>
	</div>
</div>




	
@endsection