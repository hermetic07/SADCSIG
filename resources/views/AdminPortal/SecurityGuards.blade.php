@extends('AdminPortal.master2')

@section('Title') Security guards @endsection


@section('mtitle') Security guards  @endsection

@section('mtitle2')
                        <li class="active"><a href="{{url('/SecurityGuards')}}"> Security guards</a></li>  @endsection
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
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect active"> @endsection
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

              <div class="white-box" >
                <div class="row el-element-overlay m-b-40">
                          @foreach($employee as $e)
        <div class="col-sm-6 col-md-4 col-lg-4 content">
                        <div class="white-box pro-box p-0" style="border: 1px solid black;">
                                        <div class="el-card-item">
                                            @if ($e->image)
                            <div class="el-card-avatar el-overlay-1">
                                     <div class="pro-list-img" style="background: url('uploads/{{$e->image}}'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; ">
                                <div class="el-overlay scrl-dwn">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="uploads/{{$e->image}}"><i class="icon-magnifier"></i></a></li>
                                        				<li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$e->id)}}"><i class="fa fa-info"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      @else
                      <div class="el-card-avatar el-overlay-1">
                               <div class="pro-list-img" style="background: url('default/secu.png'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; ">
                          <div class="el-overlay scrl-dwn">
                              <ul class="el-info">
                                  <li><a class="btn default btn-outline image-popup-vertical-fit" href="default/secu.png"><i class="icon-magnifier"></i></a></li>
                                          <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$e->id)}}"><i class="fa fa-info"></i></a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  @endif
            </div>
                            <div class="pro-content-3-col">
                                <div class="pro-list-details">
                                    <h4>
                               <center> <a class="text-dark" href="javascript:void(0)">{{$e->first_name}} {{$e->middle_name}} {{$e->last_name}} </a> </center>
                            </h4>
                                  <center>    <h4 class="text-danger"><small>{{$e->street}} {{$e->barangay}} {{$e->city}}</small></h4> </div></center>
                            </div>

                            <hr class="m-0"> <span class="label pro-col-label label label-table label-warning">{{$e->status}}</span>
                            <div class="pro-list-info-3-col">
                                <ul class="pro-info text-muted m-b-0">
                                    <li> <span><img src="plugins/images/SecurityGuards/license.png"></span> <span>Security license</span><span class="pull-right text-inverse">12345678910</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/phone.png"></span> <span>Contact Number (Mobile)</span><span class="pull-right text-inverse">{{$e->cellphone}}</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/tele.png"></span> <span>Contact Number (Landline)</span><span class="pull-right text-inverse"> {{$e->telephone}}</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/email.png"></span> <span>Email address</span><span class="pull-right text-inverse"> {{$e->email}}</span></li>
                                </ul>
                            </div>
                            <hr class="m-0">
                            @if ($e->status == "waiting")
                            <div class="pro-agent-col-3">
                                <div class="agent-img">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/establishment.jpg"></a>
                                </div>
                                <div class="agent-name">
                                    <h5 class="m-b-0">Stand by</h5> <small class="text-muted">Client</small> </div>
                            </div>
                          @else
                          <div class="pro-agent-col-3">
                              <div class="agent-img">
                                  <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src=""><!--Client's establishments --></a>
                              </div>
                              <div class="agent-name">
                                  <h5 class="m-b-0"><!-- Client's name --></h5> <small class="text-muted">Client</small> </div>
                          </div>\
                          @endif
                            <div class="clearfix"></div>
                            </br>
            <button type="button" class="btn btn-block btn-info" ><i class="icon-user-unfollow"></i> </i> Resign </button>
                        </div>


                </div>
      @endforeach


                </div>
              </div>
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

  </div></div>
        </div> </div>
  <!-- /.row -->
    </div>
  @endsection
