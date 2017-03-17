@extends('AdminPortal.master2')

@section('Title') Client's Establishments @endsection


@section('mtitle') Client's Establishments  @endsection

@section('mtitle2') <li>Clients</li>
                        <li><a href="{{url('/ActiveClient')}}"> Active</a></li>
                        <li class="active"><a href="{{url('/ClientEstablishment')}}"> Establishments</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="white-box">

                    <div class="row">

                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								   <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
									                               <div class="pd-agent-info text-center">
                                <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
                                <h4>Chris jerico albino</h4>
                                <h6>Client's name</h6> </div>

                            <hr class="m-0">
                            <div class="pd-agent-contact text-center"> <i class="fa fa-phone text-danger" aria-hidden="true"></i> 123456789
                                <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> email@gmail.com
								</br> </div>
								             <div class="pd-agent-contact text-center">  <button type="button" class="btn   btn-info" ><i class="fa fa-list-alt"></i> </i> New contract</button>  </div> </br>




								               <div class="white-box p-0 pro-box pro-horizontal " style="border: 1px solid black;">

                            <div class="col-sm-4 pro-list-img" style="background: url(plugins/images/Clients/establishments/pup.jpg) center center / cover no-repeat;"> <span class="pro-label label label-inverse"><a class="text-white"  href="{{url('/ClientsDetails')}}"><i class="icon-info"></i>&nbsp;&nbsp;More info</a></span> </div>
                            <div class="col-sm-8">
                                <div class="pro-content">
                                    <div class="pro-list-details col-sm-6">
                                        <h4 class="p-t-10">
                                                    <a class="text-dark" href="javascript:void(0)">Polytechnic University of the Philippines</a>
                                            </h4>

										<h4 class="text-danger">School</h4></div>
                                    <div class="pro-list-info col-sm-6">
                                    <ul class="pro-info text-muted m-b-0">
                                        <li> <span><img src="plugins/images/Clients/Active/security-guard.png"></span> <span>Security guards</span><span class="pull-right text-inverse">2</span></li>
                                        <li> <span><img src="plugins/images/Clients/Active/area.png"></span> <span>Area Size (approx. in square meters)</span><span class="pull-right text-inverse">10.00</span></li>
                                        <li> <span><img src="plugins/images/Clients/Active/population.png"></span> <span>Population (approx.)</span><span class="pull-right text-inverse"> 5000</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="pro-agent">
                                            <div class="agent-img">
                                        <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/personincharge.jpg"></a>
                                    </div>
                                    <div class="agent-name">
                                        <h5 class="m-b-0">Abel mandap</h5> <small class="text-muted">Person in charge</small> </div>
                                </div>
                                        <div class="pro-location hidden-xs hidden-xs hidden-xs"> <span class="pull-right text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

									   					               <div class="white-box p-0 pro-box pro-horizontal" style="border: 1px solid black;">

                            <div class="col-sm-4 pro-list-img" style="background: url(plugins/images/Clients/establishments/up.jpg) center center / cover no-repeat;"> <span class="pro-label label label-inverse"><a class="text-white"  href="{{url('/ClientsDetails')}}"><i class="icon-info"></i>&nbsp;&nbsp;More info</a></span> </div>
                            <div class="col-sm-8">
                                <div class="pro-content">
                                    <div class="pro-list-details col-sm-6">
                                        <h4 class="p-t-10">
                                                    <a class="text-dark" href="javascript:void(0)">University of the Philippines</a>
                                            </h4>

										<h4 class="text-danger">School</h4></div>
                                    <div class="pro-list-info col-sm-6">
                                    <ul class="pro-info text-muted m-b-0">
                                        <li> <span><img src="plugins/images/Clients/Active/security-guard.png"></span> <span>Security guards</span><span class="pull-right text-inverse">2</span></li>
                                        <li> <span><img src="plugins/images/Clients/Active/area.png"></span> <span>Area Size (approx. in square meters)</span><span class="pull-right text-inverse">10.00</span></li>
                                        <li> <span><img src="plugins/images/Clients/Active/population.png"></span> <span>Population (approx.)</span><span class="pull-right text-inverse"> 5000</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="pro-agent">
                                            <div class="agent-img">
                                        <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/personincharge.jpg"></a>
                                    </div>
           <div class="agent-name">
                                        <h5 class="m-b-0">Abel mandap</h5> <small class="text-muted">Person in charge</small> </div>
                                </div>
                                        <div class="pro-location hidden-xs hidden-xs hidden-xs"> <span class="pull-right text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>29 Matimtiman St. Teacher's Village East. Diliman, Quezon City...</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
								   </div>






                    </div>

                    </div>

        </div>
      </div>
      <!-- /.row -->
        </div>
  @endsection
