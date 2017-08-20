@extends('AdminPortal.master2')

@section('Title') Service Requests @endsection


@section('mtitle') Service Requests  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/ServiceRequest')}}">  Service Requests  </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay">
        <h4><center><strong>List of service request</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th>
              <th>Client Name</th>
              <th data-hide="phone, tablet" >Address</th>
              
              <th>Date Requested</th>
              <th>Status</th>
              <th data-sort-ignore="true" width="260px">Actions</th>
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
            $ctr = 0;
            $ctr2 = 0;
            $areas_id = "";
            $clientPic = "";
            $clientName = "";
          @endphp
          <tbody>
            @foreach($serviceRequests as $serviceRequest)
              @if($serviceRequest->status != 'deleted')
                @if($serviceRequest->status != 'done')
                @else
                @endif
                @php
                
                  $ctr = $ctr + 1;
                  
                @endphp

                @foreach($clients as $client)
                  @if($serviceRequest->client_id ==  $client->id)
                    @php
                      $clientID = $client->id;
                      $areas_id = $client->areas_id;
                      $clientName = $client->name;
                      $clientPic = $client->image;
                    @endphp 
                  @endif
               @endforeach

                <tr>
                  <td>
                    <div class="el-card-item">
                      <div class="el-card-avatar el-overlay-1">
                        <a href="#"><img src="uploads/{{$clientPic}}" alt="user"  class="img-circle img-responsive"></a>
                       
                        <div class="el-overlay">
                        <ul class="el-info">
                          <li><a class="btn default btn-outline" href="{{route('admin.client.estab',$clientID)}}" target="_blank"><i class="fa fa-info"></i></a></li>
                        </ul>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                   {{$clientName}}
                  </td>
                  <td>
                   @foreach($areas as $area)
                      @if($area->id == $areas_id)
                        @foreach($provinces as $province)
                          @if($province->id == $area->provinces_id)
                            {{$client->address}},{{$area->name}},{{$province->name}}
                          @endif
                        @endforeach
                      @endif
                   @endforeach
                  </td>
                  
                <td>
                  {{ $serviceRequest->created_at }}
                </td>
                <td>
                  {{ $serviceRequest->status }}
                </td>
                <td>
                 <button class="btn btn-info viewReqetails" value="{{$serviceRequest->id}}" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>
                <button class="btn btn-danger" onclick="fun_delete('{!!$serviceRequest -> id!!}')"><i class="fa fa-times"></i> Remove </button>
                </td>
              </tr>


              @endif
            @endforeach
            @section('ReqstCnt') {{ $ctr }} @endsection
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
      </div>  <!--  class="row  el-element-overlay" -->
    </div>   <!-- white-box -->
  </div>  <!-- class="col-lg-12 " -- >
</div>  <!-- row -->




<!-- Deliver guns -->
    @foreach($serviceRequests as $serviceRequest)
      @if($serviceRequest->status != 'deleted')
         @php
            $ctr2 = $ctr2 + 1;
            
        @endphp


      @endif
    @endforeach
  
  <input type="hidden" name="hidden_delete" id="hidden_delete" value="ServiceRequest-remove">

  @endsection
@section('modals')

@endsection
    
  
  @section('script')
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

<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function(){
      $('.viewReqetails').on('click',function(){
       $.ajax({
        url : "{{route('serviceRequest.viewModal')}}",
        type : 'GET',
        data : {serviceRequestID:this.value},
        success : function(data){
          //alert(data);
          console.log(data);
            $('.viewrequest').empty();
            $('.viewrequest').html(data);
            $('#modalview').modal('show');
        }
       });
      });
    });
</script>
@endsection