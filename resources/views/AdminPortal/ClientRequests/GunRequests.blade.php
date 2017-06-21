@extends('AdminPortal.master2')

@section('Title') Gun Requests @endsection


@section('mtitle') Gun Requests  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/GunRequest')}}">  Gun Requests  </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')
 
<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay">
        <h4><center><strong>List of Gun request</strong></center></h4>
          <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th>
              <th>Name</th>
              <th data-hide="phone, tablet" >Location</th>
              <th >Gun Requested</th>
              <th>Date Requested</th>
              <th data-sort-ignore="true" width="260px">Actions</th>
            </tr>
          </thead>
          <div class="form-inline padding-bottom-15">
            <div class="row">
              <div class="col-sm-6"></div>
                <div class="col-sm-6 text-right m-b-20">
                  <div class="form-group">
                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"autocomplete="off">
                  </div>
                </div>
            </div>
          </div>
         
          <tbody>
            @foreach($gunRequests as $gunRequest)
              @if($gunRequest->status != 'deleted')
        
              <tr>
                <td>
                  <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                     <!-- <a href="{{url('/SecuProfile')}}"><img src="plugins/images/Clients/Active/chris.jpg" alt="user"  class="img-circle img-responsive"></a> -->
                     
                      <div class="el-overlay">
                      <ul class="el-info">
                        <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                      </ul>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                 @foreach($establishments as $establishment)
                    @if($gunRequest->establishments_id ==  $establishment->id)
                      @php
                        $dateRequested = $gunRequest->created_at;
                      @endphp
                      {{ $establishment->name }} 
                    @endif
                 @endforeach
                  
                </td>
                <td>
                 @foreach($establishments as $establishment)
                    @if($gunRequest->establishments_id ==  $establishment->id)
                      @foreach($areas as $area)
                        @if($establishment->areas_id == $area->id)
                          @foreach($provinces as $province)
                            @if($area->provinces_id == $province->id)
                              {{ $area->name }}, {{ $province->name }}
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endif
                 @endforeach
                </td>
                <td>
                  @foreach($establishments as $establishment)
                    @if($gunRequest->establishments_id ==  $establishment->id)
                      @foreach($guns as $gun)
                        @if($gunRequest->guns_id == $gun->id)
                          {{ $gun->name }}
                        @endif
                      @endforeach
                    @endif
                  @endforeach
              </td>
              <td>
                {{ $dateRequested }}
              </td>
              <td>
               <button class="btn btn-info"  data-toggle="modal" data-target="#{!!$gunRequest -> id!!}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>
              <button class="btn btn-danger" onclick="fun_delete('{!!$gunRequest -> id!!}')"><i class="fa fa-times"></i> Remove </button>
              </td>
            </tr>
            <!-- Deliver guns -->
    
            <div id="{!!$gunRequest -> id!!}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
                    </div>
                    <div class="modal-body">
                      <form data-toggle="validator">
                        <div class="form-group">
                          <div class="row">
                            <div class="form-group col-sm-4">
                               <label class="control-label">Client's name</label>
                                  <p class="form-control-static">
                                       @foreach($establishments as $establishment)
                                         @if($gunRequest->establishments_id ==  $establishment->id)
                                            {{$establishment->name }}
                                            @php
                                              $contactNo = $establishment->contactNo;
                                              $email = $establishment->email;
                                            @endphp
                                         @endif
                                       @endforeach
                                  </p>
                               <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-8 ">
                               <label class="control-label">Address</label>
                                  <p class="form-control-static">
                                   @foreach($establishments as $establishment)
                                      @if($gunRequest->establishments_id ==  $establishment->id)
                                        @foreach($areas as $area)
                                          @if($establishment->areas_id == $area->id)
                                            @foreach($provinces as $province)
                                              @if($area->provinces_id == $province->id)
                                                {{ $area->name }}, {{ $province->name }}
                                              @endif
                                            @endforeach
                                          @endif
                                        @endforeach
                                      @endif
                                   @endforeach
                                  </p>
                               <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-4">
                               <label class="control-label">Contact number</label>
                                   <p class="form-control-static">
                                     {{ $contactNo }}
                                   </p>
                               <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-4">
                               <label class="control-label">Email address</label>
                                   <p class="form-control-static"> {{ $email }}</p>
                               <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-4">
                               <label class="control-label">Gun Requested</label>
                                  <p class="form-control-static">
                                      @foreach($guns as $gun)
                                        @if($gunRequest->id == $gun->id)
                                          {{ $gun->name }}
                                          @php
                                              $service_desc = $gun->name;
                                          @endphp
                                        @endif
                                      @endforeach
                                  </p>
                               <div class="help-block with-errors"></div>
                            </div> 
                          </div> <!-- row -->
                          <div class="help-block with-errors"></div>
                        </div> <!-- form-group -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>  <!-- /.modal-body -->
                  </div>  <!-- /.modal-content -->
                </div>  <!-- /modal dialog -->
              </div>  <!-- /.Deliver Guns -->
                
            @endif
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
</div>
@endsection
  <input type="hidden" name="hidden_delete" id="hidden_delete" value="GunRequest-remove">
<script>
  function fun_delete(id)
   {

      swal({
          title: "Are you sure?",
          text: "Remove this item?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, remove it!",
          closeOnConfirm: false
      }, function(){
        var delete_url = $("#hidden_delete").val();
                $.ajax({
                  url: delete_url,
                  type:"POST",
                  data: {"id":id,_token: "{{ csrf_token() }}"}
                })
        .done(function(data) {
  swal({
      title: "Removed",
      text: "This item has been successfully removed",
      type: "success"
  },function() {
      location.reload();
  });
})
.error(function(data) {
       swal("Oops", "We couldn't connect to the server!", "error");
     });
      });


     
   }
</script>