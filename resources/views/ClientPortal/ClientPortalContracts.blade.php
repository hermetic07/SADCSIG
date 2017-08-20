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
@section('mtitle') Establishments @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('content')
  @include('partials._contracts')
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.view').on('click',function(){
        alert(this.value);
      });
    });
  </script>
@endsection