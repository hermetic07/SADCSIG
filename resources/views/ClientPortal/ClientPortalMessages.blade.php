@extends('ClientPortal.master3')

@section('Title') Client Messages @endsection
@section('clientName')
   {{  $client->name }}
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

@section('content')


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
              <th width="100px">Sender</th>
              <th>Name</th>
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
            @foreach($clientInboxMessages as $clientInboxMessage)
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
                      {{$adminMessage->sender}}
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
                  <button type="button" class="btn btn-info btn-circle viewMessage" id="{{$clientInboxMessage->client_deloyment_notif_id}}" data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
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
    


     </div>

@endsection
@section('modals')
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
                          <p class="form-control-static"> Good morning! We got you the best of our security team! Select guards and we will deploy them to you.</p>
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
      $('.viewMessage').on('click',function(e){
        //var client_notif_id = $('#client_notif_id').val();
        //alert(client_notif_id);
        $.ajax({
          
          type : 'GET',
          url : '/ClientPortalMessages/modal/'+this.id,
          success : function(data){
           $('#guardPool').modal('show');
          }
        });
       });
    
  </script>


 @endsection
