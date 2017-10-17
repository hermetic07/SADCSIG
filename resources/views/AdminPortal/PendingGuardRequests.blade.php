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
                  @elseif($l->status==='denied')
                  <span class="label label-rouded label-danger center">DENIED</span>
                  @elseif($l->status==='ended')
                  <span class="label label-rouded label-warning center">ENDED</span>
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


        <section id="section-linetriangle-3">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="row  el-element-overlay">
      @foreach($res as $l)
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
            @elseif($l->status==='denied')
            <span class="label label-rouded label-danger center">DENIED</span>
            @elseif($l->status==='ended')
            <span class="label label-rouded label-warning center">ENDED</span>
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

                      </br>

                    <button  data-target="#pending" onclick="resaccept('{{$l->empid}}')" type="button"  data-target=".bs-example-modal-lg" class="btn btn-block btn-success" ><i class="fa fa-list"></i> </i>Accept</button>
                    <button  data-target="#pending" onclick="resreject('{{$l->empid}}')" type="button"  data-target=".bs-example-modal-lg" class="btn btn-block btn-danger" ><i class="fa fa-list"></i> </i>Reject</button>




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
                             </div><!-- /content -->
                           </div><!-- /tabs -->



        </div>


          <!-- Leave info (pending) -->
  <div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                    <label class="col-xs-3 control-label"></label>
                    <div class="deploymentdate">
                      <div class="col-md-12">
                        <div class="row text-center">
                         <div class="form-group col-sm-4">
                           <label class="control-label">Leave type</label>
                             <p class="form-control-static" id="leave"></p>
                        </div>
                         <div class="form-group col-sm-4">
                            <label class="control-label">Notification period (days)</label>
                             <p class="form-control-static" id="notifdays">3</p>
                            <div class="help-block with-errors"></div>
                         </div>
                          <div class="form-group col-sm-4">
                            <label class="control-label">Allowable days</label>
                             <p class="form-control-static" id="allowdays">5</p>
                            <div class="help-block with-errors"></div>
                         </div>
                       </div>
                       <div class="row text-center">
                        <div class="form-group col-sm-4">
                          <label class="control-label">Notification date</label>
                           <p class="form-control-static" id="daterequested"></p>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label">Start date</label>
                           <p class="form-control-static" id="datestart"></p>
                           <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label">Requested end date</label>
                          <p class="form-control-static" id="dateend"></p>
                          <div class="help-block with-errors"></div>
                        </div>
                       </div>
                       <div class="row text-center">
                        <div class="form-group col-sm-12">
                          <label class="control-label">Reason</label>
                          <p class="form-control-static" id="reason"></p>
                          <div class="help-block with-errors"></div>
                        </div>
                       </div>
                      </div>
                    </div>
                         </br> </br>
                         </div>

                        <div class="hidtable">
                        <h4 ><center><strong>List of available guards for replacement</strong></center></h4>
                        </div>
                       <div class="row  el-element-overlay hidtable">
                          <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table hidtable" data-page-size="10">
                            <thead>
                              <tr>
                               <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="80px" ></th>
                              <th>Guard's name</th>
                              <th  data-sort-ignore="true">Location</th>
                              <th data-sort-ignore="true" width="150px">Actions</th>
                             </tr>
                             </thead>

                 <div class="form-inline padding-bottom-15">
                   <div class="row">
                     <div class="col-sm-6">

             </div>
                       <div class="col-sm-6 text-right m-b-20">
                       <div class="form-group">
                           <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                 autocomplete="off">
              </div>
                        </div>
                    </div>
                 </div>


               <tbody id="table_body">

               </tbody>
               <tfoot>
                 <tr>
                   <td colspan="4"></td>
                 </tr>
               </tfoot>
             </table>



             <div class="text-right">
               <ul class="pagination">
               </ul>
             </div>
                </div>
                 </div>
                 <div class="row text-center">
                  <button id="sendreq" class="btn btn-danger hidtable">SEND REQUEST</button>
                  <button id="end" class="btn btn-danger">END LEAVE</button>
                 </div>

             </div>
                </div>

                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
              </div>
  @endsection

  @section('script')
  <script type="text/javascript">
    function resaccept(id){
      $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'post',
        url: '/Admin-Resign-Accept',
        data: {
            'id':id,

        },
        success: function(data){
              swal({
                  title: "Success" ,
                  text: "Resignation Accepted",
                }, function(){
                  window.location.href = "/Admin-Guard-Leave";
                });
        }
      });
    };
    function resreject(id){
      $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'post',
        url: '/Admin-Resign-Reject',
        data: {
            'id': id,
        },
        success: function(data){
              swal({
                  title: "Success" ,
                  text: "Resignation Rejected",
                }, function(){
                  window.location.href = "/Admin-Guard-Leave";
                });
        }
      });
    };
  </script>
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
        $("#notifdays").html(result.notifdays);
        $("#allowdays").html(result.allowdays);

        if(result.status==="accepted")
        {
          $('.hidtable').hide();
          $('#end').show();
        }
        else if(result.status==="ended" )
        {
          $('.hidtable').hide();
          $('#end').hide();
        }
        else if(result.status==="rejected")
        {
          $('.hidtable').hide();
          $('#end').hide();
        }
        else{
          $('#end').hide();
          $('.hidtable').show();
          $("#table_body").html(result.body);
        }
        $('#Swap').modal('show');
      }
    });
  }
  </script>
  <script type="text/javascript">
  $('#sendreq').on('click', function(e){

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
          empid:$('input[name="select"]:checked').val(),
      },
      success: function(data){
          swal({
              title: "Success" ,
              text: "Request Sent",
            }, function(){
              $('#Swap').modal('hide');
            });

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
            swal({
                title: "Success" ,
                text: "Leave Rejected",
              }, function(){
                location.reload();
              });
          }
          else {
            alert(data);
          }
      }
    });
  })

  $('#end').on('click', function(e){

    $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'post',
      url: '/Admin-Leave-End',
      data: {
          id:$('#rid').val(),
      },
      success: function(data){
          swal({
              title: "Success" ,
              text: "Leave Ended",
            }, function(){
              location.reload();
            });
      }
    });
  })
  </script>
  @endsection
