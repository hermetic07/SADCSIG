@extends('AdminPortal.master2')

@section('Title') Security guards @endsection


@section('mtitle') Security guards  @endsection

@section('mtitle2')
                        <li class="active"><a href="{{url('/SecurityGuards')}}"> Security guards</a></li>  @endsection

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
        <div class="col-sm-6 col-md-4 col-lg-4 content">
                        <div class="white-box pro-box p-0" style="border: 1px solid black;">
                                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                     <div class="pro-list-img" style="background: url('plugins/images/securityguards/2x2.jpg'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; ">
                                <div class="el-overlay scrl-dwn">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                        <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}"><i class="icon-info"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


            </div>
                            <div class="pro-content-3-col">
                                <div class="pro-list-details">
                                    <h4>
                               <center> <a class="text-dark" href="javascript:void(0)">Abel mandap</a> </center>
                            </h4>
                                  <center>    <h4 class="text-danger"><small>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</small></h4> </div></center>
                            </div>
                            <hr class="m-0"> <span class="label pro-col-label label label-table label-warning">Waitng</span>
                            <div class="pro-list-info-3-col">
                                <ul class="pro-info text-muted m-b-0">
                                    <li> <span><img src="plugins/images/SecurityGuards/license.png"></span> <span>Security license</span><span class="pull-right text-inverse">12345678910</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/phone.png"></span> <span>Contact Number (Mobile)</span><span class="pull-right text-inverse">09123456789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/tele.png"></span> <span>Contact Number (Landline)</span><span class="pull-right text-inverse"> 123-456-789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/email.png"></span> <span>Email address</span><span class="pull-right text-inverse"> Abel@gmail.com</span></li>
                                </ul>
                            </div>
                            <hr class="m-0">
                            <div class="pro-agent-col-3">
                                <div class="agent-img">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/establishment.jpg"></a>
                                </div>
                                <div class="agent-name">
                                    <h5 class="m-b-0">Finding</h5> <small class="text-muted">Client</small> </div>
                            </div>
                            <div class="clearfix"></div>
                            </br>
            <button type="button" class="btn btn-block btn-info" ><i class="icon-user-unfollow"></i> </i> Resign </button>
                        </div>


                </div>

        <div class="col-sm-6 col-md-4 col-lg-4 content">
                        <div class="white-box pro-box p-0" style="border: 1px solid black;">
                                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                     <div class="pro-list-img" style="background: url('plugins/images/securityguards/2x2 2.jpg'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; ">
                                <div class="el-overlay scrl-dwn">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2%202.jpg"><i class="icon-magnifier"></i></a></li>
                                        <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}"><i class="icon-info"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


            </div>
                            <div class="pro-content-3-col">
                                <div class="pro-list-details">
                                    <h4>
                               <center> <a class="text-dark" href="javascript:void(0)">Ernest john maskarino</a> </center>
                            </h4>
                                  <center>    <h4 class="text-danger"><small>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</small></h4> </div></center>
                            </div>
                            <hr class="m-0"> <span class="label pro-col-label label label-table label-danger">Leave</span>
                            <div class="pro-list-info-3-col">
                                <ul class="pro-info text-muted m-b-0">
                                    <li> <span><img src="plugins/images/SecurityGuards/license.png"></span> <span>Security license</span><span class="pull-right text-inverse">12345678910</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/phone.png"></span> <span>Contact Number (Mobile)</span><span class="pull-right text-inverse">09123456789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/tele.png"></span> <span>Contact Number (Landline)</span><span class="pull-right text-inverse"> 123-456-789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/email.png"></span> <span>Email address</span><span class="pull-right text-inverse"> Abel@gmail.com</span></li>
                                </ul>
                            </div>
                            <hr class="m-0">
                            <div class="pro-agent-col-3">
                                <div class="agent-img">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/establishments/pup.jpg"></a>
                                </div>
                                <div class="agent-name">
                                    <h5 class="m-b-0">PUP</h5> <small class="text-muted">Client</small> </div>
                            </div>
                            <div class="clearfix"></div>
                            </br>
            <button type="button" class="btn btn-block btn-info" ><i class="icon-user-unfollow"></i> </i> Resign </button>
                        </div>


                </div>

        <div class="col-sm-6 col-md-4 col-lg-4 content">
                        <div class="white-box pro-box p-0" style="border: 1px solid black;">
                                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                 <div class="pro-list-img" style="width= 200px; height: 210px; background: url('plugins/images/securityguards/2x2 3.jpg');background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;">
                                <div class="el-overlay scrl-dwn">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2%203.JPG"><i class="icon-magnifier"></i></a></li>
                                        <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}"><i class="icon-info"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


            </div>
                            <div class="pro-content-3-col">
                                <div class="pro-list-details">
                                    <h4>
                               <center> <a class="text-dark" href="javascript:void(0)">Evander Macandog</a> </center>
                            </h4>
                                  <center>    <h4 class="text-danger"><small>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</small></h4> </div></center>
                            </div>
                            <hr class="m-0"> <span class="label pro-col-label label label-table label-info">Deployed</span>
                            <div class="pro-list-info-3-col">
                                <ul class="pro-info text-muted m-b-0">
                                    <li> <span><img src="plugins/images/SecurityGuards/license.png"></span> <span>Security license</span><span class="pull-right text-inverse">12345678910</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/phone.png"></span> <span>Contact Number (Mobile)</span><span class="pull-right text-inverse">09123456789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/tele.png"></span> <span>Contact Number (Landline)</span><span class="pull-right text-inverse"> 123-456-789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/email.png"></span> <span>Email address</span><span class="pull-right text-inverse"> Abel@gmail.com</span></li>
                                </ul>
                            </div>
                            <hr class="m-0">
                            <div class="pro-agent-col-3">
                                <div class="agent-img">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/establishments/petron.jpg"></a>
                                </div>
                                <div class="agent-name">
                                    <h5 class="m-b-0">Petron</h5> <small class="text-muted">Client</small> </div>
                            </div>
                            <div class="clearfix"></div>
            </br>
            <button type="button" class="btn btn-block btn-info" ><i class="icon-user-unfollow"></i> </i> Resign </button>
                        </div>


                </div>
              <div class="col-sm-6 col-md-4 col-lg-4 content">
                        <div class="white-box pro-box p-0" style="border: 1px solid black;">
                                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                     <div class="pro-list-img" style="background: url('2x2.jpg') no-repeat; background-position: center; ">         <div class="pro-list-img" style="width= 200px; height: 210px; background: url('plugins/images/securityguards/2x2 4.jpg');background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;">       <div class="el-overlay scrl-dwn">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2%204.jpg"><i class="icon-magnifier"></i></a></li>
                                        <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}"><i class="icon-info"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


            </div>
                            <div class="pro-content-3-col">
                                <div class="pro-list-details">
                                    <h4>
                               <center> <a class="text-dark" href="javascript:void(0)">Earl Geraldez</a> </center>
                            </h4>
                                  <center>    <h4 class="text-danger"><small>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</small></h4> </div></center>
                            </div>
                            <hr class="m-0"> <span class="label pro-col-label label label-table label-success">Reliever</span>
                            <div class="pro-list-info-3-col">
                                <ul class="pro-info text-muted m-b-0">
                                    <li> <span><img src="plugins/images/SecurityGuards/license.png"></span> <span>Security license</span><span class="pull-right text-inverse">12345678910</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/phone.png"></span> <span>Contact Number (Mobile)</span><span class="pull-right text-inverse">09123456789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/tele.png"></span> <span>Contact Number (Landline)</span><span class="pull-right text-inverse"> 123-456-789</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/email.png"></span> <span>Email address</span><span class="pull-right text-inverse"> Abel@gmail.com</span></li>
                                </ul>
                            </div>
                            <hr class="m-0">
                            <div class="pro-agent-col-3">
                                <div class="agent-img">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/establishments/up.jpg"></a>
                                </div>
                                <div class="agent-name">
                                    <h5 class="m-b-0">University of the philippines</h5> <small class="text-muted">Client</small> </div>
                            </div>
                            <div class="clearfix"></div>
            </br>
            <button type="button" class="btn btn-block btn-info" ><i class="icon-user-unfollow"></i> </i> Resign </button>
                        </div>


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
