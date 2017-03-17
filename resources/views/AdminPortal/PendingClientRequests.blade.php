@extends('AdminPortal.master2')

@section('Title') Pending clients request @endsection


@section('mtitle') Pending clients request @endsection

@section('mtitle2') <li>Clients</li>
                        <li class="active"><a href="{{url('/PendingClientRequests')}}"> Pending request</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')



       <div class="row">


                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								     <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 content" >
                        <div class="white-box p-0 pro-box pro-horizontal" style="border: 1px solid black;">

                            <div class="col-sm-4 pro-list-img" style="background: url(plugins/images/Clients/establishments/petron.jpg) center center / cover no-repeat;"> <span class="pro-label label label-inverse"><a class="text-white"  href="ClientDetails.html"><i class="icon-info"></i>&nbsp;&nbsp;More info</a></span>  </div>

                            <div class="col-sm-8">

                                <div class="pro-content">
                                    <div class="pro-list-details col-sm-6">
                                        <h4 class="p-t-10">
                                                    <a class="text-dark" href="javascript:void(0)">Petron</a>
                                            </h4>

										<h4 class="text-danger">Gas station</h4>


									</div>

                                    <div class="pro-list-info col-sm-6">

                                    <ul class="pro-info text-muted m-b-0">

                                        <li><span><img src="plugins/images/Clients/Active/security-guard.png"></span> <span>Security guards needed</span><span class="pull-right text-inverse">2</span>
										</li>
										</br>
																	            <div class="progress progress-md">
                                                <div class="progress-bar progress-bar-info active progress-bar-striped" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width: 50%" role="progressbar">1 / 2</div>
											</div>
												 <center><small> Security guards deployed </small> </center>
                                        </ul>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="pro-agent">
                                            <div class="agent-img">
                                        <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
                                    </div>
                                    <div class="agent-name">
                                        <h5 class="m-b-0">Chris jerico albino</h5> <small class="text-muted">Person in charge</small> </div>
                                </div>
                                        <div class="pro-location hidden-xs hidden-xs hidden-xs"> <span class="pull-right text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</span> </div>
                                    </div>

                                </div>

                            </div>

                            <div class="clearfix"> </div>

                        </div>
								   </div>

								     <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 content" >
                        <div class="white-box p-0 pro-box pro-horizontal" style="border: 1px solid black;">

                            <div class="col-sm-4 pro-list-img" style="background: url(plugins/images/Clients/establishments/pup.jpg) center center / cover no-repeat;"> <span class="pro-label label label-inverse"><a class="text-white"  href="ClientDetails.html"><i class="icon-info"></i>&nbsp;&nbsp;More info</a></span>  </div>

                            <div class="col-sm-8">

                                <div class="pro-content">
                                    <div class="pro-list-details col-sm-6">
                                        <h4 class="p-t-10">
                                                    <a class="text-dark" href="javascript:void(0)">Polytechnic University of the Philippines</a>
                                            </h4>

										<h4 class="text-danger">School</h4>


									</div>

                                    <div class="pro-list-info col-sm-6">

                                    <ul class="pro-info text-muted m-b-0">

                                        <li><span><img src="plugins/images/Clients/Active/security-guard.png"></span> <span>Security guards needed</span><span class="pull-right text-inverse">4</span>
										</li>
										</br>
																	            <div class="progress progress-md">
                                                <div class="progress-bar progress-bar-info active progress-bar-striped" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width: 25%" role="progressbar">1/4</div>
											</div>
												 <center><small> Security guards deployed </small> </center>
                                        </ul>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="pro-agent">
                                            <div class="agent-img">
                                        <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
                                    </div>
                                    <div class="agent-name">
                                        <h5 class="m-b-0">Chris jerico albino</h5> <small class="text-muted">Person in charge</small> </div>
                                </div>
                                        <div class="pro-location hidden-xs hidden-xs hidden-xs"> <span class="pull-right text-muted"><i class="fa fa-map-marker text-danger m-r-5" aria-hidden="true"></i>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</span> </div>
                                    </div>

                                </div>

                            </div>

                            <div class="clearfix"> </div>

                        </div>
								   </div>

								     <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 content" >
                        <div class="white-box p-0 pro-box pro-horizontal" style="border: 1px solid black;">

                            <div class="col-sm-4 pro-list-img" style="background: url(plugins/images/Clients/establishments/up.jpg) center center / cover no-repeat;"> <span class="pro-label label label-inverse"><a class="text-white"  href="ClientDetails.html"><i class="icon-info"></i>&nbsp;&nbsp;More info</a></span>  </div>

                            <div class="col-sm-8">

                                <div class="pro-content">
                                    <div class="pro-list-details col-sm-6">
                                        <h4 class="p-t-10">
                                                    <a class="text-dark" href="javascript:void(0)">University of the Philippines</a>
                                            </h4>

										<h4 class="text-danger">School</h4>


									</div>

                                    <div class="pro-list-info col-sm-6">

                                    <ul class="pro-info text-muted m-b-0">

                                        <li><span><img src="plugins/images/Clients/Active/security-guard.png"></span> <span>Security guards needed</span><span class="pull-right text-inverse">10</span>
										</li>
										</br>
																	            <div class="progress progress-md">
                                                <div class="progress-bar progress-bar-info active progress-bar-striped" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width: 70%" role="progressbar">7 / 10</div>
											</div>
												 <center><small> Security guards deployed </small> </center>
                                        </ul>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="pro-agent">
                                            <div class="agent-img">
                                        <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
                                    </div>
                                    <div class="agent-name">
                                        <h5 class="m-b-0">Chris jerico albino</h5> <small class="text-muted">Person in charge</small> </div>
                                </div>
                                    <div class="pro-location hidden-xs hidden-xs hidden-xs"> <span class="pull-right text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>29 Matimtiman St. Teacher's Village East. Diliman, Quezon City...</span> </div>
                                    </div>

                                </div>

                            </div>

                            <div class="clearfix"> </div>

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
                    <!-- /.row -->
        </div>
  @endsection
