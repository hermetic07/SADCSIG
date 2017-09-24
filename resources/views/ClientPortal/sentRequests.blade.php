@extends('ClientPortal.master3')

@section('Title') Sent Requests @endsection
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
@section('mtitle') Sent Requests @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('content')

	<div class="row">
        <div class="col-lg-12 ">

    <div class="white-box">
             <div class="row  el-element-overlay">
  <h4><center><strong>Sent Requests to Agency</strong></center></h4>
      <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
        <thead>
          <tr>
          
            <th>Request ID</th>
            <th data-hide="phone, tablet" >Subject</th>
            <th >Date Sent</th>
            <th >Status</th>
            <th data-sort-ignore="true" width="330px">Actions</th>
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
          @forelse($clientSentRequests as $clientSentRequest)
            <tr>
              <td>
                {{$clientSentRequest->requestID}}
              </td>
              <td>
                {{$clientSentRequest->requestType}}
              </td>
              <td>
                {{$clientSentRequest->changeTime}}
              </td>
              <td>
                {{$clientSentRequest->trans_status}}
              </td>
              <td>
                <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-th-list"></i> View Details</button>
                <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i> Cancel Request</button>
              </td>
            </tr>
            @empty
              <tr>No transactions yet</tr>
          @endforelse
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
@endsection