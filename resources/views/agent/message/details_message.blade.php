@extends('agent.agent_dashboard')
@section('agent')	
<div class="page-content">

        <div class="row inbox-wrapper">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                 @include('agent.dashboard.message')
                  <div class="col-lg-9">
                    <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                      <div class="d-flex align-items-center">
                        <i data-feather="star" class="text-primary icon-lg me-2"></i>
                        <span>New Project</span>
                      </div>
                      <div>
                        <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Forward"><i data-feather="share" class="text-muted icon-lg"></i></a>
                        <a class="me-2" type="button" data-bs-toggle="tooltip" data-bs-title="Print"><i data-feather="printer" class="text-muted icon-lg"></i></a>
                        <a type="button" data-bs-toggle="tooltip" data-bs-title="Delete"><i data-feather="trash" class="text-muted icon-lg"></i></a>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                      <div class="d-flex align-items-center">
                        <div class="me-2">
                          <img src="https://via.placeholder.com/36x36" alt="Avatar" class="rounded-circle img-xs">
                        </div>
                        <div class="d-flex align-items-center">
                          <a href="#" class="text-body">{{$messageDetail->user->name}}</a> 
                          <span class="mx-2 text-muted">to</span>
                          <a href="#" class="text-body me-2">me</a>
                          <div class="actions dropdown">
                            <a href="#" data-bs-toggle="dropdown"><i data-feather="chevron-down" class="icon-lg text-muted"></i></a>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="#">Mark as read</a>
                              <a class="dropdown-item" href="#">Mark as unread</a>
                              <a class="dropdown-item" href="#">Spam</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item text-danger" href="#">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tx-13 text-muted mt-2 mt-sm-0"> {{$messageDetail->created_at->format('l M d')}}</div>
                    </div>
                    <div class="p-4 border-bottom">
                    <div class="mb-4 text-info"><i data-feather="eye"></i> Message</div>
                      <p>{{$messageDetail->message}}.</p>

                      <!-- <p><strong>Regards</strong>,<br> {{$messageDetail->user->name}}</p> -->
                    </div>
                    <div class="p-3">
                      <div class="mb-3 text-info"><i data-feather="eye"></i> Informasi Detail</div>
                      <ul class="nav flex-column">
                      <table class="table">
										
											
											<tr>
												<td style="width:20%;">Customer Name</td>
												<td style="width:5%">
                                                :
												</td>
												<td>
                                                {{$messageDetail->user->name}}
												</td>
												
											</tr>
                                            <tr>
												<td>Customer Email</td>
												<td>
                                                :
												</td>
												<td>
                                                {{$messageDetail->user->email}}
												</td>
												
											</tr>
                                            <tr>
												<td>Customer Phone</td>
												<td>
                                                :
												</td>
												<td>
                                                {{$messageDetail->user->phone}}
												</td>
												
											</tr>

                                            

                                            <tr>
												<td>Property Name</td>
												<td>
                                                :
												</td>
												<td>
                                                {{$messageDetail->property->property_name}}
												</td>
												
											</tr>

                                            <tr>
												<td>Property Name</td>
												<td>
                                                :
												</td>
												<td>
                                                {{$messageDetail->property->property_code}}
												</td>
												
											</tr>

                                            <tr>
												<td>Property Status</td>
												<td>
                                                :
												</td>
												<td>
                                                {{$messageDetail->property->property_status}}
												</td>
												
											</tr>
                                            <tr>
												<td>Sending Time</td>
												<td>
                                                :
												</td>
												<td>
                                                {{$messageDetail->created_at->format('l M d')}}
												</td>
												
											</tr>
											
											
										
									</table>
                      </ul>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
</div>
	

    
              
	
@endsection