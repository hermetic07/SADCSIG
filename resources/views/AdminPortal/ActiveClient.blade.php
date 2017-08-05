@extends('AdminPortal.master2')

@section('Title') Active clients @endsection


@section('mtitle') Active clients  @endsection

@section('mtitle2') <li>Clients</li>
                        <li class="active"><a href="{{url('/ActiveClient')}}"> Active</a></li>  @endsection

@section('Reg')
      <li> <a href="javascript:void(0);" class="waves-effect" ><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
            <ul class="nav nav-second-level">
              <li> <a href="{{url('/ClientRegistration')}}" class="waves-effect">Clients</a>
              </li>
              <li> <a href="{{url('/Guard-Registration')}}" class="waves-effect">Security guards</a>
              </li>
                  </ul>
          </li>
@endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
                            <div class="row">

                    <div class="col-sm-12" >

                        <div class="white-box" style="float:right;" >
                            <h3 class="box-title">Search</h3>
                            <form role="form" class="row">


                                <div class="col-md-9">
                                    <div class="form-group">
									                             <input type="text" class="form-control" placeholder="Name"  />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-inverse btn-block form-control"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                    <!-- .row -->
       <div class="row">

		   	<div class="row  el-element-overlay">

					<div class="white-box">
              <div class="row el-element-overlay m-b-40">

						          @foreach($client as $c)
                      <div class="col-sm-6 col-md-4 col-lg-4 content" >
                                      <div class="white-box pro-box p-0" style="border: 1px solid black;">
          								</br>
          								                            <div class="el-card-item">
                                          <div class="el-card-avatar el-overlay-1">
                                                   <div class="pro-list-img" style="width= 200px; height: 200px; background-image: url('uploads/{{$c->image}}'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; margin:10px; ">
                                              <div class="el-overlay scrl-dwn">
                                                  <ul class="el-info">
                                                      <li><a class="btn default btn-outline image-popup-vertical-fit" href="url('uploads/{{$c->image}}')"><i class="icon-magnifier"></i></a></li>

                                                  </ul>
                                              </div>
                                          </div>
                                      </div>


          								</div>
                                          <div class="pro-content-3-col">
                                              <div class="pro-list-details">
                                                  <h4>
                                             <center> <a class="text-dark" href="javascript:void(0)">{{$c->name}}</a> </center>
                                          </h4>
                                          </div>
                                          <div class="pro-list-info-3-col">
                                              <ul class="pro-info text-muted m-b-0">
                                                  <li> <span><img src="plugins/images/Clients/Active/building.png"></span> <span>Contracts</span><span class="pull-right text-inverse">{{$c->count}}</span></li>
                                                  <li> <span><img src="plugins/images/SecurityGuards/phone.png"></span> <span>Contact Number</span><span class="pull-right text-inverse">{{$c->contact}}</span></li>
                                                  <li> <span><img src="plugins/images/SecurityGuards/email.png"></span> <span>Email address</span><span class="pull-right text-inverse"> {{$c->email}}</span></li>
                                              </ul>
                                          </div>
                                          <hr class="m-0">
                                          <div class="clearfix"></div>
          																</br>
          							<a href='/ClientEstablishment-{{"$c->id"}}'>	<button type="button" class="btn btn-block btn-info" ><i class="fa fa-list"></i> </i> View details </button> </a>
                                      </div>


                              </div>

                            </div>
                      @endforeach

							</div>

                    <!-- /.row -->
                    <!-- .row -->
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

      </div>
		        </div>
 </div>
      <!-- /.row -->
        </div>
 </div>
  @endsection
