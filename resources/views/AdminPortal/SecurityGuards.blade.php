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

                            @if($e->status==="waiting")
                            <hr class="m-0"> <span class="label pro-col-label label label-table label-warning">{{$e->status}}</span>
                            @elseif($e->status==="reliever")
                            <hr class="m-0"> <span class="label pro-col-label label label-table label-danger">{{$e->status}}</span>
                            @else
                            <hr class="m-0"><span class="label pro-col-label text-center label-rouded label-info">{{$e->status}}</span>
                            @endif
                            <div class="pro-list-info-3-col">
                                <ul class="pro-info text-muted m-b-0">
                                    <li> <span><img src="plugins/images/SecurityGuards/license.png"></span> <span>Security license</span><span class="pull-right text-inverse">12345678910</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/phone.png"></span> <span>Contact Number (Mobile)</span><span class="pull-right text-inverse">{{$e->cellphone}}</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/tele.png"></span> <span>Contact Number (Landline)</span><span class="pull-right text-inverse"> {{$e->telephone}}</span></li>
                                    <li> <span><img src="plugins/images/SecurityGuards/email.png"></span> <span>Email address</span><span class="pull-right text-inverse"> {{$e->email}}</span></li>
                                </ul>
                            </div>


                            <div class="clearfix"></div>
                            </br>

                              <button type="button" class="btn btn-block btn-info" onclick="edit('{{$e->id}}')"><i class="icon-user-follow"></i> </i> Edit Info </button>
                              <button type="button" class="btn btn-block btn-info" onclick="resign('{{$e->id}}')"><i class="icon-user-unfollow"></i> </i> Resign </button>

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
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Guard Information</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" id="empid">
          <h4>Name</h4>
          <input type="text" id="first" placeholder="first name">
          <input type="text" id="middle" placeholder="middle name">
          <input type="text" id="last" placeholder="lastname">
        </div>
        <div class="form-group">
          <h4>Contact</h4>
          <input type="text" id="cp" placeholder="Cellphone">
          <input type="text" id="tel" placeholder="Telephone">
          <input type="text" id="email" placeholder="Email">
        </div>
        <div class="form-group">
          <h4>Address</h4>
          <input type="text" id="st" placeholder="Street">
          <input type="text" id="bar" placeholder="Barangay">
          <input type="text" id="city" placeholder="City">
        </div>
      </div>
      <div class="modal-footer ">
        <button type="button" onclick="save()" class="btn btn-success col-sm-12">Update</button>
      </div>
    </div>

  </div>
</div>
    <!-- Modal -->
<div id="myModalresign" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Terminate Employee</h4>
      </div>
      <div class="modal-body text-center">
        <input type="hidden" id="resid" value="">
        Are you sure you want to terminate <br>
        <h3 id="empname"></h3>
      </div>
      <div class="modal-footer ">
        <div class="form-group">
          <button type="button" onclick="yes()" class="btn btn-warning col-sm-12">Yes</button> <br>
          <button type="button" class="btn btn-danger col-sm-12" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>

  </div>
</div>
  @endsection

  @section('script')
  <script type="text/javascript">
  function edit(id){
    $.ajax({
      type: 'GET',
      url: '/Admin-Get-Employee',
      data: {
          'id':id,
      },
      success: function(data){
        $('#empid').val(data.id);
        $('#first').val(data.first_name);
        $('#middle').val(data.middle_name);
        $('#last').val(data.last_name);

        $('#cp').val(data.cellphone);
        $('#tel').val(data.telephone);
        $('#email').val(data.email);

        $('#st').val(data.street);
        $('#bar').val(data.barangay);
        $('#city').val(data.city);
        $('#myModal').modal('show');
      }
    });

  }
  function resign(id){
    $.ajax({
      type: 'GET',
      url: '/Admin-Get-Employee',
      data: {
          'id':id,
      },
      success: function(data){
        var name = data.first_name + " " +data.middle_name+" "+data.last_name;
        $('#resid').val(data.id);
        $('#empname').html(name);
        $('#myModalresign').modal('show');
      }
    });
  }
  function save(){
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
      type: 'post',
      url: '/Admin-Save-Employee',
      data: {
          'id':$('#empid').val(),
          'f':$('#first').val(),
          'm':$('#middle').val(),
          'l':$('#last').val(),

          'cp':$('#cp').val(),
          't':$('#tel').val(),
          'e':$('#email').val(),

          's':$('#st').val(),
          'b':$('#bar').val(),
          'ct':$('#city').val(),

      },
      success: function(data){
          swal({
              title: "Success" ,
              text: "Guard Information has been updated",
            }, function(){
              window.location.href = "/SecurityGuards";
            });

      }
    });
  }
  function yes(){
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
      type: 'post',
      url: '/Admin-Resign-Employee',
      data: {
          'id':$('#resid').val(),
      },
      success: function(data){
          swal({
              title: "Success" ,
              text: "Guard Has Benn Terminated",
            }, function(){
              window.location.href = "/SecurityGuards";
            });

      }
    });
  }
  </script>
  @endsection
