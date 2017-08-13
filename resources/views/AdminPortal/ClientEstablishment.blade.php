@extends('AdminPortal.master2')

@section('Title') Client's Establishments @endsection


@section('mtitle') Client's Establishments  @endsection

@section('mtitle2') <li>Clients</li>
                        <li><a href="{{url('/ActiveClient')}}"> Active</a></li>
                        <li class="active"><a href="{{url('/ClientEstablishment')}}"> Establishments</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            
                 <div class="white-box">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                                   <div class="pd-agent-info text-center">
                                <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="uploads/{{$client->image}}"></a>
                                <h4>{{$client->name}}</h4>
                                <h6>Client's name</h6> </div>

                            <hr class="m-0">
                            <div class="pd-agent-contact text-center"> <i class="fa fa-phone text-danger" aria-hidden="true"></i> {{$client->contactNo}}
                                <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> {{$client->email}}
                                <br> </div>
                                <div class="pd-agent-contact text-center"> 
                                    <a href="{{route('newcontract',$client->id)}}" type="button" class="btn btn-info">
                                        <i class="fa fa-list-alt"></i> New contract</a>  
                                </div> </br>

                                    @include('partials._establishment_view',['href'=>'ClientsDetails-'. $client->id.'+'])
        </div>
    </div>

                    </div>

        </div>
      </div>
      <!-- /.row -->
        </div>
  @endsection
