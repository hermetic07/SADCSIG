@extends('AdminPortal.master2')

@section('Title') All Contracts @endsection


@section('mtitle') All Contracts  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/ServiceRequest')}}">  All Contracts  </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay">
        <h4><center><strong>Lis of all Contracts</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
             <!--  <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th> -->
              <th>Contract Code</th>
              <th data-hide="phone, tablet" >Client</th>
              
              <th>Establishment</th>
              <th>Start Date</th>
              <th>End Date</th>
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
         
          <tbody>
            @foreach($contracts as $contract)
              <tr>
                <td>
                  {{$contract->contract_code}}
                </td>
                <td>
                  {{$contract->first_name}} {{$contract->middle_name}} {{$contract->last_name}}
                </td>
                <td>
                  {{$contract->establishment}}
                </td>
                
                <td>
                  {{$contract->start_date}}
                </td>
                <td>
                  {{$contract->end_date}}
                </td>
                <td>
                  {{$contract->status}}
                </td>
                <td>
                  <button type="button" class="btn btn-info servReView" value="">View Details</button>
                  @if($contract->status != 'terminated')
                    <button type="button" class="btn btn-danger" >Terminate</button>
                  @else
                    <button type="button" disabled class="btn btn-danger" onclick="fun_terminate('{{$contract->contract_code}}')">Terminate</button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="7"></td>
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
    

  @endsection
@section('modals')

@endsection
@section('script')
  <script>
  function fun_terminate(id) {
    $.ajaxSetup({
          headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });  
    // $.ajax({
    //       type: 'post',
    //       url: '/Terminate',
    //       data: {
    //           'id':id,
    //       },
    //       success: function(data){
    //           if(data!==null&&data!==""){
    //             alert(data);
    //             location.reload();
    //           }
    //       }
    // });
    // $('#ClaimDel').modal('hide');
      swal({
        title: "Terminate Contract",
        text: "This will send a 30 days notification to the Cclient prior to termination of contract.",
         type: "input",
        html: true,
          showCancelButton: true,
          closeOnConfirm: false,
          animation: "slide-from-top",
          inputPlaceholder: "Your Reason"
        },
        function(inputValue){
          if (inputValue === false) return false;
          if (inputValue === "") {
            swal.showInputError("You need to write something!");
            return false
          }
             
                 
                  $.ajax({
                    url:"/Contract-Terminnation-"+id,
                    type : 'POST',
                    data : {
                            contractID:id,
                            reasons:inputValue
                          },
                    success : function(data){
                       if(data == 0)
                       {
                        swal("Notification Sent!", "Thank you for your efforts!", "success");
                        location.reload();
                       }
                       else
                       {
                        swal("OOOoooppss!!", "Something went wrong! Please try again", "warning");
                      // location.reload();
                       }
                    }
                  });
            
          
      });
  }
  </script>
@endsection