@extends('AdminPortal.master2')

@section('Title') Contract Terminations @endsection


@section('mtitle') Contract Terminations  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/ServiceRequest')}}">  Contract Terminations  </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay">
        <h4><center><strong>Sent Termination Notications</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
             <!--  <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th> -->
              <th>Contract Code</th>
              <th data-hide="phone, tablet" >Client</th>
              
              <th>Establishment</th>
              <th>Date sent</th>
              <th>Days left</th>
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
            @foreach($contract_termin8_notifs as $contract)
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
                  {{$contract->created_at}}
                </td>
                <td>
                  @php
                    $now = Carbon\Carbon::now();
                    $end = Carbon\Carbon::parse($contract->created_at)->addDays(30);

                    $length = $end->diffInDays($now);
                  @endphp
                  {{$length}}
                </td>
                <td>
                  {{$contract->status}}
                </td>
                <td>
                  <button type="button" class="btn btn-info servReView" value="">View Details</button>
                  @if($contract->status != 'terminated')
                    <button type="button" class="btn btn-danger" onclick="func_terminate_contract('{{$contract->contract_code}}')">Terminate</button>
                  @else
                    <button type="button" disabled class="btn btn-danger" onclick="func_terminate_contract('{{$contract->contract_code}}')">Terminate</button>
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
  <script type="text/javascript">
    $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        }); 
    function func_terminate_contract(contract_id){
      alert(contract_id);
      $.ajax({
        url : '/contract-terminate-'+contract_id,
        type : 'GET',
        data : {
          contract_id:contract_id
        },
        success : function(data){
          if(data == "success"){
            swal({
                title: 'Contract Terminated.',
                text: "Contract Terminated.",
                type: 'success',
                
                confirmButtonColor: '#3085d6',
                
                confirmButtonText: 'Ok'
              },function(){
                location.reload();
              });
          }
        }
      });
    }
  </script>
@endsection