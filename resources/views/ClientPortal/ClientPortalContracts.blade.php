@extends('ClientPortal.master3')

@section('Title') Establishment's Contracts @endsection
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
@section('mtitle') Establishment's Contracts @endsection

@section('content')
  <div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay white-box">
        <h4><center><strong>Contracts</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
               
                <th>Contract Code</th>
                <th  width="220px" >Description</th>
                <th>Date Created</th>
                <th data-sort-ignore="true" width="240px">Actions</th>
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
            $dateCreated;
          @endphp
          <tbody>
          
              @foreach($contracts as $contract)
               @if($contract->strEstablishmentID == $estabID)
              @php
                    $dateCreated = $contract->created_at;
                  @endphp
            <tr>
              <td>
                {{$contract->id}}
              </td>
              <td>
                
                    
                  
              </td>
              <td>
                {{$dateCreated}}
              </td>
              <td>
                <button class="btn btn-info"  data-toggle="modal" data-target="#{{$contract->id}}"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>
                <button class="btn btn-success"  type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> PDF</button>
              </td>
            </tr>
 

                @endif
              @endforeach
            

          
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
          <div class="col-lg-6 animated slideInRight guards" style="display:none">
            <div class="white-box">
              <div id="calendar" ></div>
            </div>
        </div>
         </div>
        </div>

        <div id="{{ $contract->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
      </div>
      <div class="modal-body">
        <form >
        {!! csrf_field() !!}
        <div class="form-group">
          
        </div>
          
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>  <!-- /.modal-content -->
  </div> <!-- /.modal-dialog -->
</div> <!-- /Add military service modal -->
@endsection