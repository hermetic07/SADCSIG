@extends('AdminPortal.master2')

@section('Title') Client Registration @endsection


@section('mtitle') Client Registration  @endsection

@section('mtitle2') <li>Clients</li>
                        <li class="active"><a href="{{url('/ClientRegistration2')}}"> Registration</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
                      <div class="alert alert-info"> Please answer the form correctly and completely base on the information given by the client.
        </div>
          </div>
        </div>
      </div>
  @endsection
