@extends('ClientPortal.master3')

@section('Title') Client Messages @endsection
@section('clientName')
   {{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}
@endsection
@section('link_rqst')
  href="/Request-{{$client->id}}"
@endsection
@section('link_guardsDTR')
  href="/ClientPortalGuardsDTR-{{$client->id}}"
@endsection
@section('link_estab')
   href="/ClientPortalEstablishments-{{$client->id}}"
@endsection
@section('link_home')
  href="/ClientPortalHome-{{$client->id}}"
@endsection
@section('link_messages')
  href="/ClientPortalMessages-{{$client->id}}"
@endsection
@section('mtitle') Messages @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('link_settings')
  href="/ClientPortalSettings-{{$client->id}}"
@endsection

@section('content')

<!-- @php
  $estabImage = "";
  $clientPicture = "";
@endphp -->
<input type="hidden" id="clientID" value="{{$client->id}}">
<!-- /.row -->
<div class="row">
  <div class="col-lg-12	">
    <div class="white-box">
      <label class="col-xs-5 control-label"></label>
      <div class="col-lg-2">
        <button class="btn btn-success btn-block waves-effect waves-light"  data-toggle="modal" data-target="#Add"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="model_img img-responsive"><span class="btn-label"><i class="fa fa-pencil-square-o"></i></span>Compose</button>
      </div>
      <br><br><br><br><br><br>
      <div class="row  el-element-overlay">
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th width="100px"></th>
              <th>Sender</th>
              <th> Date </th>
              <th>Subject</th>
              <th width="50px"data-sort-ignore="true" >Actions</th>
            </tr>
          </thead>
          <div class="form-inline padding-bottom-15">
            <div class="row">
              <div class="col-sm-6"></div>
              <div class="col-sm-6 text-right m-b-20">
                <div class="form-group">
                  <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
               autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          @php
            $tempDeploymentID = "";
            $client_notif_id = "";

          @endphp
          <tbody>
            @foreach($termination_message as $message)
              <tr>
                <td>
                  <center>
                    <div class="el-card-item" style="padding-bottom: 5px;" >
                      <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                        <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
                        <div class="el-overlay">
                          <ul class="el-info">
                            <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <span class="label label-table label-danger">Agency</span>
                  </center>
                </td>
                <td>
                  Management
                </td>
                <td>
                  {{$message->date_sent}}
                </td>
                <td>
                  Contract Termination
                </td>
                <td>   &nbsp;
                  <button  type="button" onclick="alert('{{$message->termination_id}}')" class="btn btn-info btn-circle viewMessage"  data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
                </td>
              </tr>
            @endforeach
            @foreach($clientInboxMessages as $clientInboxMessage)

              @if($clientInboxMessage->status == "done")
              <tr style="background-color:gray">
                <td>
                  <center>
                    <div class="el-card-item" style="padding-bottom: 5px;" >
                      <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                        <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
                        <div class="el-overlay">
                          <ul class="el-info">
                            <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <span class="label label-table label-danger">Agency</span>
                  </center>
                </td>
                <td>
                  @foreach($adminMessages as $adminMessage)
                    @if($adminMessage->notif_id == $clientInboxMessage->notif_id)
                      Earl Pogi
                      @php
                         $client_notif_id = $clientInboxMessage->client_deloyment_notif_id;
                      @endphp
                      @foreach($tempDeployments as $tempDeployment)
                        @if($tempDeployment->messages_ID == $adminMessage->notif_id)
                          @php
                            $tempDeploymentID = $tempDeployment->temp_deployment_id;

                          @endphp
                        @endif
                      @endforeach
                    @endif
                  @endforeach

                </td>
                <td>
                  {{$clientInboxMessage->date_received}}
                </td>
                <td>
                  @foreach($adminMessages as $adminMessage)
                    @if($adminMessage->notif_id == $clientInboxMessage->notif_id)
                      {{$adminMessage->subject}}
                    @endif
                  @endforeach
                </td>
                <td>   &nbsp;
                  <button disabled  type="button" onclick="showMessage('{{$tempDeploymentID}}','{{$clientInboxMessage->client_deloyment_notif_id}}')" class="btn btn-info btn-circle viewMessage"  data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
                </td>
              </tr>
              @else
                <tr>
                <td>
                  <center>
                    <div class="el-card-item" style="padding-bottom: 5px;" >
                      <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                        <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
                        <div class="el-overlay">
                          <ul class="el-info">
                            <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <span class="label label-table label-danger">Agency</span>
                  </center>
                </td>
                <td>
                  @foreach($adminMessages as $adminMessage)
                    @if($adminMessage->notif_id == $clientInboxMessage->notif_id)
                      Earl Pogi
                      @php
                         $client_notif_id = $clientInboxMessage->client_deloyment_notif_id;
                      @endphp
                      @foreach($tempDeployments as $tempDeployment)
                        @if($tempDeployment->messages_ID == $adminMessage->notif_id)
                          @php
                            $tempDeploymentID = $tempDeployment->temp_deployment_id;

                          @endphp
                          @foreach($contracts as $contract)
                             @if($contract->id == $tempDeployment->contract_ID)
                              <!-- @foreach($clientPic as $clientP)
                                @if($clientP->stringContractId == $contract->id)
                                    @php
                                        $estabImage = $clientP->stringestablishment;
                                        $clientPicture = $clientP->stringpic;

                                    @endphp
                                @endif
                            @endforeach -->
                             @endif
                            @endforeach
                        @endif
                      @endforeach
                    @endif
                  @endforeach

                </td>
                <td>
                  {{$clientInboxMessage->date_received}}
                </td>
                <td>
                  @foreach($adminMessages as $adminMessage)
                    @if($adminMessage->notif_id == $clientInboxMessage->notif_id)
                      {{$adminMessage->subject}}
                    @endif
                  @endforeach
                </td>
                <td>   &nbsp;
                  <button type="button" onclick="showMessage('{{$tempDeploymentID}}','{{$clientInboxMessage->client_deloyment_notif_id}}')" class="btn btn-info btn-circle viewMessage"  data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
                </td>
              </tr>

              @endif
            @endforeach
            @foreach($accepted_serv_req as $serv_req)
              <tr>
                <td>
                  <center>
                    <div class="el-card-item" style="padding-bottom: 5px;" >
                      <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                        <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
                        <div class="el-overlay">
                          <ul class="el-info">
                            <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <span class="label label-table label-danger">Agency</span>
                  </center>
                </td>
                <td>
                  Earl Pogi
                </td>
                <td>
                  {{$serv_req->updated_at}}
                </td>
                <td>
                  SERVICE REQUEST
                </td>
                <td>
                  &nbsp;
                  <button type="button" onclick="showServReqMessage('{{$serv_req->id}}','{{$clientInboxMessage->client_deloyment_notif_id}}')" class="btn btn-info btn-circle viewMessage"  data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
                </td>
              </tr>

            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <td colspan="5"></td>
            </tr>
          </tfoot>
         </table>

           <div class="text-right">
             <ul class="pagination">
             </ul>
           </div>

             </div>

          </div>
            </div>
            <input type="hidden" id="client_notif_id" value="{{$client_notif_id}}">

            <div class="col-lg-12	">

      <div class="white-box">

        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th width="150px">Reciept Number</th>
              <th>Status</th>
              <th>Contract Code</th>
              <th>Service period</th>
              <th>Due date</th>
              <th data-sort-ignore="true" width="280px">Actions</th>
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
          <tbody>
                      @foreach($all as $a)
                      <tr>
                          <td>{{$a->intid}}</td>
                          <td>
                            @if($a->strStatus==="sent")
                            <span class="label label-rouded label-info">SOA SENT</span>
                            @elseif($a->strStatus==="paid")
                            <span class="label label-rouded label-success">Paid</span>
                            @else
                            <span class="label label-rouded label-danger">{{$a->strStatus}}</span>
                            @endif
                          </td>
                          <td>{{$a->strContractId}}</td>
                          <td>{{$a->dateFrom}} - {{$a->strbillingId}}</td>
                          <td>{{$a->strbillingId}}</td>
                          <td>
                             <button class="btn btn-success"  onclick="fun_download({{$a->intid}})" ><i class="ti-receipt"></i> Download SOA</button>

                          </td>
                      </tr>
                      @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6"></td>
            </tr>
          </tfoot>
      </table>

        <div class="text-right">
          <ul class="pagination">
          </ul>
        </div>

          </div>

          <div class="white-box">
          <h3>Swap Requests</h3>
          <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th width="10%">Image</th>
              <th>Guard Name</th>
              <th>Establishment</th>
              <th>Establishment Address</th>
              <th width="15%" >Status</th>
              <th width="20%"data-sort-ignore="true" >Actions</th>
            </tr>
          </thead>
          <div class="form-inline padding-bottom-15">
            <div class="row">
              <div class="col-sm-6"></div>
              <div class="col-sm-6 text-right m-b-20">
                <div class="form-group">
                  <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
               autocomplete="off">
                </div>
              </div>
            </div>
          </div>

          <tbody>
          @foreach($swap as $r)
            <tr>
              <td><img src='{{ asset("uploads/$r->image")}}' alt="user-img" width="100" class="img-circle"></td>
              <td>{{$r->fname}} {{$r->lname}}</td>
              <td>{{$r->estab}}</td>
              <td>{{$r->address}}</td>
              <td class="text-center"><p class="label label-rouded label-info center">PENDING</p></td>
              <td><button id="info" class="btn btn-info" onclick="swap_info('{{$r->empid}}')">View</button> <button id="accept" class="btn btn-success" onclick="swap_accept('{{$r->id}}')">ACCEPT</button> <button id="reject" class="btn btn-danger" onclick="swap_reject('{{$r->id}}')">REJECT</button></td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
           <tr>
             <td colspan="6"></td>
           </tr>
          </tfoot>
          </table>

        <div class="text-right">
          <ul class="pagination">
          </ul>
        </div>

          </div>

         </div>

     </div>

@endsection
@section('modals')
  <div id="servReqModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog serv-req-modal-content">

              <!-- /.modal-dialog -->
      </div>
  </div>
       <!-- Inbox -->
 <div id="guardPool" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Message</strong></center></h4>
                 </div>
                 <div class="modal-body">
                   <form data-toggle="validator">
                    <div class="form-group">
                      <div class="row">
                        <div class="form-group col-sm-12">
                          <label class="control-label">Subject:</label>
                          <p class="form-control-static">Guard's pool</p>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12 ">
                          <label class="control-label">Content:</label>
                          <p class="form-control-static"> Good Day! We got you the best of our security team! Select guards and we will deploy them to you.</p>
                          <br>
                          <center>
                            <button  type="button" onclick="location.href='/GuardPool+'+'{{$tempDeploymentID}}+'+'{{$client->id}}'+'+{{$client_notif_id}}'" class="fcbtn btn btn-info btn-outline btn-1e">Select guards</button>
                          </center>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="help-block with-errors"></div>
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

<!-- Inbox -->
<div id="guardSwap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Swap Request</strong></center></h4>
                 </div>
                 <div class="modal-body">
                   <form data-toggle="validator">
                    <div class="form-group">
                      <div class="row">
                        <div class="form-group col-sm-12 text-center">
                          <label class="control-label text-center">Content:</label>
                          <p class="form-control-static"> An employee wants to switch places with one of your guards. Click the link below to view the information of the guard who requested</p>
                          <br>
                          <center class="guardlink">


                          </center>
                        </div>
                      </div>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </form>
                 </div>
               </div>
               <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
           </div>


           <div id="messageInboxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Message</strong></center></h4>
                 </div>
                 <div class="modal-body">
                   <form data-toggle="validator">
                    <div class="form-group">
                      <div class="row">
                        <div class="form-group col-sm-12">
                          <label class="control-label">Subject:</label>
                          <p class="form-control-static">Guard's pool</p>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12">
                          <label class="control-label">Your Request:</label>
                          <p class="form-control-static yourRequest"></p>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12 ">
                          <label class="control-label">Content:</label>
                          <p class="form-control-static"> Good morning! We got you the best of our security team! Select guards and we will deploy them to you.</p>
                          <br>
                          <center>
                           <div class="selectGuard">

                           </div>
                          </center>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="help-block with-errors"></div>
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
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
      // function getShifts(id){
      //   //console.log('url("/ClientPortalEstablishments-shifts-'+id+'")');

      //   $.ajax({
      //     type : 'GET',
      //     url: '/ClientPortalEstablishments-shifts+'+id,
      //     success:function(data){
      //       $('#shifts').text('');
      //       $('#shifts').append(data);
      //       console.log(data);
      //     }
      //   });

      // }
      // $('.viewMessage').on('click',function(e){
      //   //var client_notif_id = $('#client_notif_id').val();
      //   //alert(client_notif_id);
      //   $.ajax({

      //     type : 'GET',
      //     url : '/ClientPortalMessages/modal/'+this.id,
      //     success : function(data){
      //      $('#messageInboxModal').modal('show');
      //     }
      //   });
      //  });
      function showMessage(tempDeploymentID,notif_id){
       // alert(notif_id//);
       // alert('<button  type="button" onclick="location.href="'+'/GuardPool+'+tempDeploymentID+'+'+$('#clientID').val()+'+'+notif_id+'" class="fcbtn btn btn-info btn-outline btn-1e">Select guards</button>');
       var transID = notif_id.split('-')[1]+"-"+notif_id.split('-')[2];
       var transLink = '<a id="requestLink" href="">'+transID+'</a>';
       var urlLink = tempDeploymentID+'+'+$('#clientID').val()+'+'+notif_id;
        $.ajax({

          type : 'GET',
          url : '/ClientPortalMessages/modal/'+notif_id,
          success : function(data){
            $('.yourRequest').append(transLink);
            $('#requestLink').attr("href", "http://localhost:8000/Sent-request-"+$('#clientID').val()+"-"+transID);
            $('.selectGuard').html("");
            $('.selectGuard').append('<button  type="button" onclick="location.href=\''+'/GuardPool+'+urlLink+'\'" class="fcbtn btn btn-info btn-outline btn-1e">Select guards</button>');
 +           $('#messageInboxModal').modal('show');
           $('#messageInboxModal').modal('show');
          }
        });
      }

  </script>

  <script>
  function swap_info(id)
  {
      $('.guardlink').html("<a href='/SecuProfile/"+id+"' target='_blank'>View Info</a>");

      $('#guardSwap').modal('show');
  }

  function swap_accept(id)
  {
    $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    }); 
    $.ajax({
      type: 'post',
      url: '/Client-Accept-Swap',
      data: {
          'id':id,
      },
      success: function(data){
        alert(data);
        location.reload();
      }
    });
  }
  function swap_reject(id)
  {
    $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    }); 
    $.ajax({
      type: 'post',
      url: '/Client-Reject-Swap',
      data: {
          'id':id,
      },
      success: function(data){
        alert(data);
        location.reload();
      }
    });
  }
    function fun_download(id) {
    $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    }); 
    $.ajax({
      type: 'post',
      url: '/Client-download-soa',
      data: {
          'id':id,
      },
      success: function(data){
        console.log(data);
        var ur = '/SOA2/'+data.con+'/'+data.col+'/'+data.cli+'/'+data.diff+'/'+data.date+'/'+data.date1+'/'+data.date2+'/'+data.day+'/'+data.night+'/'+data.vat+'/'+data.ewt+'/'+data.ac;
        window.open(ur,"_blank");
      }
    });
    }
     function showServReqMessage(servReqID){
      //alert(servReqID);
      $.ajax({
        url : '/open-servicerequest',
        type : 'GET',
        data : {servReqID:servReqID,clientID:$('#clientID').val()},
        success : function(data){
          console.log(data);
          $('.serv-req-modal-content').html('');
          $('.serv-req-modal-content').append(data);
          $('#servReqModal').modal('show');

        }
      });
     }
  </script>
 @endsection
<!-- @section('adminPic')
          src = "uploads/{{$clientPicture}}"
        @endsection -->
