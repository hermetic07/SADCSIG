@extends('SecurityGuardsPortal.master4')

@section('Title') Messages @endsection


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
           <br>  <br>  <br>     <br>  <br>  <br>
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
          
          <tbody>
            @foreach($acceptedGuards as $acceptedGuard)
              @if($acceptedGuard->guard_id == $employee->id)
                @if($acceptedGuard->guard_reponse == "confirmed")
                  <tr style="background-color:gray ">
                  <td>
                    <center>
                      <div class="el-card-item" style="padding-bottom: 5px;" >
                        <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                          <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
                          <div class="el-overlay">
                            <ul class="el-info">
                              <li>
                                <a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <span class="label label-table label-danger">Agency</span> 
                    </center>
                  </td>
                  <td>Ernest john maskarino</td>
                  <td>{{$acceptedGuard->created_at}}</td>
                  <td>DEPLOYMENT</td>
                  <td>   &nbsp;
                    <button disabled type="button" value="{{$acceptedGuard->guard_id}},{{$acceptedGuard->client_deployment_notif_id}}" class="btn btn-info btn-circle view" data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
                  </td>
                </tr>
                  
                @elseif($acceptedGuard->guard_reponse == "reject")
                  <tr>
                    <td>
                      <center>
                        <div class="el-card-item" style="padding-bottom: 5px;" >
                          <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                            <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
                            <div class="el-overlay">
                              <ul class="el-info">
                                <li>
                                  <a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <span class="label label-table label-danger">Agency</span> 
                      </center>
                    </td>
                    <td>Ernest john maskarino</td>
                    <td>{{$acceptedGuard->created_at}}</td>
                    <td>DEPLOYMENT</td>
                    <td>   &nbsp;
                      <button disabled type="button" value="{{$acceptedGuard->guard_id}},{{$acceptedGuard->client_deployment_notif_id}}" class="btn btn-info btn-circle view" data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
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
                              <li>
                                <a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <span class="label label-table label-danger">Agency</span> 
                    </center>
                  </td>
                  <td>Ernest john maskarino</td>
                  <td>{{$acceptedGuard->created_at}}</td>
                  <td>DEPLOYMENT</td>
                  <td>   &nbsp;
                    <button type="button" value="{{$acceptedGuard->guard_id}},{{$acceptedGuard->client_deployment_notif_id}}" class="btn btn-info btn-circle view" data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button>
                  </td>
                </tr>
                @endif
              @endif
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
  <!-- Deliver guns -->
<div id="Message" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Message</strong></center></h4>
      </div>
      <div class="modal-body">
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection


@section('script')
<script>

function reject(e)
{
  secuID = e.split(",")[0];
  deployment_notif_id = e.split(",")[1];
  $('#Message').modal('hide');
  swal({
    title: "Awww. We do understand",
    text: "What will be the problem?",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    inputPlaceholder: "Write something"
  },
  function(inputValue){
    if (inputValue === false) return false;

    if (inputValue === "") {
      swal.showInputError("You need to write something!");
      return false
    }
    $.ajax({
      url : '{{route("guard.reject")}}',
      type : 'POST',
      data : {reason:inputValue,secuID:secuID,deployment_notif_id:deployment_notif_id},
      success: function(data){
        
        
        console.log(data);
        swal("Thank you!", "Your reason: " + inputValue, "success");
        location.reload();
      }
    });
    
  });

}
</script>

<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).ready(function(){

      
    $('.view').on('click',function(){
      
      secuID = this.value.split(",")[0];
      deployment_notif_id = this.value.split(",")[1];
      //alert(secuID+","+deployment_notif_id);
      $.ajax({
        url : '{{route("SGMessage.modal")}}',
        type : 'GET',
        data : {secuID:secuID,deployment_notif_id:deployment_notif_id},
        success:function(data){
          //console.log(data);
          $('.modal-body').empty();
          $('.modal-body').html(data);
          $('#Message').modal('show');
        }
      });
    });
  });
</script>
 @endsection
