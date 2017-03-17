@extends('AdminPortal.master2')

@section('Title') Applicants @endsection


@section('mtitle') Applicants  @endsection

@section('mtitle2')
                         <li class="active"><a href="{{url('/Applicants')}}"> Applicants/a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
               <div class="row">
                    <div class="col-sm-112" >
                        <div class="white-box">
                            <h3 class="box-title">Search</h3>
                            <form role="form" class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="form-group">
							           <input type="text" class="form-control" placeholder="Name"  />
                                    </div>
                                </div>
								                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <select class="selectpicker show-tick" data-style="form-control">
                                            <option value="">Province</option>
                                            <option value="1">Metro manila</option>
                                            <option value="2">Rizal</option>
                                            <option value="3">Cavite</option>
                                        </select>
                                    </div>
                                </div>
								                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <select class="selectpicker show-tick" data-style="form-control">
                                            <option value="">City</option>
                                            <option value="1">manila</option>
                                            <option value="2">caloocan</option>
                                            <option value="3">taguig</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-1">
                                    <button type="submit" class="btn btn-inverse btn-block form-control"><i class="fa fa-search"></i></button>
                                </div>

							</form>


                        </div>
                    </div>
                </div>

                    <div class="row  el-element-overlay">
						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>

										</div>



												<div class="col-md-8 col-sm-8">

										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-6 b-r">
																<p>Evander@yahoo.com</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" ><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>

						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>

										</div>



												<div class="col-md-8 col-sm-8">

										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-6 b-r">
																<p>Evander@yahoo.com</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" ><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>

						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>

										</div>



												<div class="col-md-8 col-sm-8">

										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-6 b-r">
																<p>Evander@yahoo.com</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" ><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>

						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>

										</div>



												<div class="col-md-8 col-sm-8">

										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-6 b-r">
																<p>Evander@yahoo.com</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" ><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>


						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>

										</div>



												<div class="col-md-8 col-sm-8">

										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-6 b-r">
																<p>Evander@yahoo.com</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" ><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>

						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>

										</div>



												<div class="col-md-8 col-sm-8">

										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-6 b-r">
																<p>Evander@yahoo.com</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" ><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>

						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>

										</div>



												<div class="col-md-8 col-sm-8">

										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-6 b-r">
																<p>Evander@yahoo.com</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" ><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>





     				<div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination pagination-split">
                                <li class="pag_prev"> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
                                <li class="pag_next"> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
           </div>
        </div>
<!-- /.row -->

     </div>
  @endsection
