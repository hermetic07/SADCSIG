@extends('ClientPortal.master3')

@section('Title') Establishment's details @endsection
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
@section('mtitle') Establishment's details @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection
@section('content')
  @include('partials._estabDetails',['clientName'=>$client->first_name.' '.$client->middle_name.' '.$client->last_name,'route'=>'ClientPortalContracts'])
@endsection


@section('script')


 @endsection
