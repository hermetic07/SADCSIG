@extends('ClientPortal.master3')

@section('Title') Establishment's Contracts @endsection
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
@section('mtitle') Establishments @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('content')
  @include('partials._contracts')

  <div id="modalview" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog viewrequest">
    
  </div> <!-- /.modal-dialog -->
</div> <!-- View Modal -->
@endsection
@section('script')
  <script type="text/javascript">
    $('.view').on('click',function(){
        // alert(this.value);
        contractID = this.value;
        $.ajax({
          url : '{{route("contract.view")}}',
          type : 'GET',
          data : {contractID:contractID},
          success : function(data){
            console.log(data);
          $('.viewrequest').text('');
          $('.viewrequest').append(data);
          $('#modalview').modal('show');
          }
        });
      });
  </script>
@endsection