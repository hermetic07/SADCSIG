@extends('AdminPortal.master2')

@section('Title') Pending request @endsection


@section('mtitle') Security Guard's pending request  @endsection

@section('mtitle2')
                      <li>Security guards</li>
                         <li class="active"><a href="{{url('/PendingGuardsRequest')}}"> Pending requests</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect active"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
    <div class="sttabs tabs-style-linetriangle white-box">
      <nav>
            <ul>
              <li><a href="#section-linetriangle-1"><span>Leave</span></a></li>
              <li><a href="#section-linetriangle-2"><span>Swap</span></a></li>
              <li><a href="#section-linetriangle-3"><span>Resignation</span></a></li>
            </ul>
          </nav>
            <div class="content-wrap">
              <section id="section-linetriangle-1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="row  el-element-overlay">
						@foreach($leavelist as $l)
            <div class="col-md-4 col-sm-4 content">
              <div class="white-box">
              <div class="row">
              <div class="col-md-4 col-sm-4 text-center">
              <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                    <a href="SecurityGuardsProfile.html"><img src="uploads/{{$l->image}}" alt="user"  class="img-circle img-responsive"></a>
                        <div class="el-overlay">
                            <ul class="el-info">
                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                    <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                            </ul>
                        </div>
                </div>
                </div>
                  @if($l->status==='pending')
                    <span class="label label-rouded label-warning center">PENDING</span>
                  @elseif($l->status==='accepted')
                  <span class="label label-rouded label-success center">ACCEPTED</span>
                  @elseif($l->status==='rejected')
                  <span class="label label-rouded label-danger center">REJECTED</span>
                  @endif

                </div>



                        <div class="col-md-8 col-sm-8">

                            <h3 class="box-title m-b-0">{{$l->fname}} {{$l->lname}}</h3>

                            <div class="row m-t-1">
                              <div class="col-md-12 b-r">
                                <p>{{$l->street}} {{$l->barangay}} {{$l->city}}</p>
                                                  </div>
                            </div>
                            <div class="row m-t-6">
                                                  <div class="col-md-6 b-r">
                                <strong>Mobile</strong>
                                <p>{{$l->cp}}</p>
                                                  </div>
                              <div class="col-md-6">
                                <strong>Telephone</strong>
                                <p>{{$l->telephone}}</p>
                              </div>
                            </div>
                        </div>

                </div>
                                <div class="pro-agent-col-3">
                                <div class="agent-img">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/establishments/pup.jpg"></a>
                                </div>
                                <div class="agent-name">
                                    <h5 class="m-b-0">Polytechnic university of the philippines</h5> <small class="text-muted">Client</small> </div>
                            </div>
                            </br>

                          <button  data-target="#pending" onclick="view('{{$l->id}}')" type="button"  data-target=".bs-example-modal-lg" class="btn btn-block btn-info" ><i class="fa fa-list"></i> </i>View leave request</button>




                             </div>
              </div>
            @endforeach

     				<div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination pagination-split">
                                <li class="pag_prev"> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
                                <li class="pag_next"> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </section>

                               <section id="section-linetriangle-2"><h2>Tabbing 2</h2></section>
                               <section id="section-linetriangle-3"><h2>Tabbing 3</h2></section>
                             </div><!-- /content -->
                           </div><!-- /tabs -->



        </div>


          <!-- Leave info (pending) -->
  <div id="pending" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Leave request</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <input type="hidden" id="rid" value="">
                <div class="form-group">
                  <div class="row">

					  			<div class="form-group col-sm-6">
                       <label class="control-label">Leave type</label>
                          <p class="form-control-static" id="leave"></p>
                    </div>
					  				  			<div class="form-group col-sm-6">
                       <label class="control-label">Date Requested</label>
                          <p class="form-control-static" id="daterequested"></p>

                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Date start</label>
                          <p class="form-control-static" id="datestart"></p>

                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Date end</label>
                          <p class="form-control-static" id="dateend"></p>

                    </div>
                    					  		<div class="form-group col-sm-12">
                       <label class="control-label">Reason</label>
                          <p class="form-control-static" id="reason"></p>

                    </div>
					    </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-success waves-effect waves-light" id="accept" >Accept</button>
              <button type="button" class="btn btn-danger waves-effect waves-light" id="reject">Reject</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
              </div>

<!-- Leave info (done) -->
  <div id="done" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Leave request</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">

					  			<div class="form-group col-sm-6">
                       <label class="control-label">Leave type</label>
                          <p class="form-control-static" id="leave2">Sick leave</p>
                    </div>
					  				  			<div class="form-group col-sm-6">
                       <label class="control-label">Date Requested</label>
                          <p class="form-control-static" id="daterequested2">14</p>

                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Date start</label>
                          <p class="form-control-static" id="datestart2"> 07/11/17 </p>

                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Date end</label>
                          <p class="form-control-static" id="dateend2"> 07/25/17 </p>

                    </div>
                    					  		<div class="form-group col-sm-12">
                       <label class="control-label">Reason</label>
                          <p class="form-control-static" id="reason2"> confined </p>

                    </div>
					    </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
  @endsection

  @section('script')
  <script type="text/javascript">
  function view(id)
  {
    $.ajax({
      url: "/View-Leave-Request",
      type:"GET",
      data: {
        'id': id,
        },
      success: function(result){
        $("#rid").val(result.id);
        $("#leave").html(result.leave);
        $("#daterequested").html(result.notif_date);
        $("#datestart").html(result.start_date);
        $("#dateend").html(result.end_date);
        $("#reason").html(result.reason);
        if (result.status!=="pending") {
          $("#accept").hide();
          $("#reject").hide();
        }
        else {
          $("#accept").show();
          $("#reject").show();
        }
        $('#pending').modal('show');
      }
    });
  }
  </script>
  <script type="text/javascript">
  $('#accept').on('click', function(e){

    $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'post',
      url: '/Admin-Leave-Accept',
      data: {
          id:$('#rid').val(),
      },
      success: function(data){
          if (data==="Leave Accepted") {
            alert(data);
            location.reload();
          }
          else {
            alert(data);
          }
      }
    });
  })

  $('#reject').on('click', function(e){

    $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'post',
      url: '/Admin-Leave-Reject',
      data: {
          id:$('#rid').val(),
      },
      success: function(data){
          if (data==="Leave Rejected") {
            alert(data);
            location.reload();
          }
          else {
            alert(data);
          }
      }
    });
  })
  </script>
  @endsection
