@extends('AdminPortal.master2')

@section('Title') Pending request @endsection


@section('mtitle') Client's pending request  @endsection

@section('mtitle2')
                      <li>Client</li>
                         <li class="active"><a href="{{url('/PendingClientRequest')}}"> Pending requests</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
    <div class="sttabs tabs-style-linetriangle white-box">
      <nav>
            <ul>
              <li><a href="#section-linetriangle-1"><span>Service</span></a></li>
              <li><a href="#section-linetriangle-2"><span>Additional guns</span></a></li>
              <li><a href="#section-linetriangle-3"><span>Additional guards</span></a></li>
              <li><a href="#section-linetriangle-3"><span>Guard replacement</span></a></li>
            </ul>
          </nav>
            <div class="content-wrap">
              <section id="section-linetriangle-1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="row ">
                   </div>
                   </div>
        </section>

                               <section id="section-linetriangle-2"><h2>Tabbing 2</h2></section>
                               <section id="section-linetriangle-3"><h2>Tabbing 3</h2></section>
                                    <section id="section-linetriangle-3"><h2>Tabbing 4</h2></section>
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
             
                        <h4><center><strong>List of available guards for replacement</strong></center></h4>
                       <div class="row  el-element-overlay">
                          <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
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
        $("#table_body").html(result.body);
        if (result.status!=="pending") {
          $("#accept").hide();
          $("#reject").hide();
        }
        else {
          $("#accept").show();
          $("#reject").show();
        }
        
        $('#Swap').modal('show');
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
