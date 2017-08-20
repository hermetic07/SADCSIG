@extends('AdminPortal.master2')

@section('Title') Client's details @endsection


@section('mtitle') Client's Details  @endsection

@section('mtitle2') <li>Clients</li>
                        <li><a href="{{url('/ActiveClient')}}"> Active</a></li>
                        <li><a href="{{url('/ClientEstablishment')}}"> Establishments</a></li>
                          <li class="active"><a href="{{url('/ClientsDetails')}}"> Details</a></li>   @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

@include('partials._estabDetails',['clientName'=>$client->name,'route'=>'ClientContracts'])

@endsection
