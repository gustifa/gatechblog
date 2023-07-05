 <div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Add Roles</h6>
									
                                        <div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Name</label>
													<input type="text" name="name" id="name" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Email</label>
													<input type="email" name="email" id="email" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
                                        
                                        <div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Phone</label>
													<input type="text" name="phone" id="phone" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Address</label>
													<input type="text" name="address" id="address" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
                                        
                                        <div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Admin Password</label>
													<input type="password" name="password" id="password" class="form-control" >
                                                   
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <div class="form-group col-md-12">
                                                        <label for="group_name">Select Roles</label>
                                                        <select name="roles" id="group_name" class="form-control">
                                                            <option selected="" disabled="">Select Roles</option>
                                                            @foreach($roles as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
									
									<button class="btn btn-primary" onClick="store()">save</button>
									
										</div>
											    </div>
												</div>
									
									
									
							</div>
						</div>
					</div>

        </div>