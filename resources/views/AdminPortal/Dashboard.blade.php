@extends('AdminPortal.master2')

@section('Title') Dashboard @endsection


@section('mtitle') Dashboard @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@php
  $serviceReqsCtr = 0;
  $gunviceReqsCtr = 0;
@endphp
@foreach($serviceRequests as $serviceRequest)
  @if($serviceRequest->status != 'deleted')
    @php

      $serviceReqsCtr = $serviceReqsCtr + 1;

    @endphp
  @endif
@endforeach
@foreach($gunRequests as $gunRequest)
  @if($gunRequest->status != 'deleted')
    @php

      $gunviceReqsCtr = $gunviceReqsCtr + 1;

    @endphp
  @endif
@endforeach
@section('ServReqstCnt') {{ $serviceReqsCtr }} @endsection
@section('GunReqstCnt') {{ $gunviceReqsCtr }} @endsection
@section('content')
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="white-box">
            <div class="row row-in">
				            <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/quotation.png"></i>
                    <h5 class="text-muted vb">Quotation request</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">5</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
            <center><a href="{{url('/Quotation')}}"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
              </div>
              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/secu.png"></i>
                    <h5 class="text-muted vb">Guards</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">73</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>

                </div>

        <center><a href="{{url('/SecurityGuards')}}"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
              </div>

              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/applicants.png"></i>
                    <h5 class="text-muted vb">Applicants</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">51</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
                          <center><a href="Availableapplicants.html"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
                          
              </div>
              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/email.png"></i>
                    <h5 class="text-muted vb">Service request</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">
                      {{ $serviceReqsCtr }}
                    </h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
                <center><a href="{{route('serviceRequest.index')}}"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
              </div>

          </div>
	 </br> </br> </br>

            <div class="row row-in">

              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/clients.png"></i>
                    <h5 class="text-muted vb">Pending Client request</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">3</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
            <center><a href="{{url('/PendingDeployment')}}"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
              </div>

				              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/billing.png"></i>
                    <h5 class="text-muted vb">Billing period</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">15</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
  <center><a href="{{url('/BillingPeriod')}}"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
              </div>
              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/money.png"></i>
                    <h5 class="text-muted vb">Client's Payment</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">5</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
                 <center><a href="{{url('/ClientPayment')}}"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
              </div>
              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <img src="plugins/images/icons/glicencse.png"></i>
                    <h5 class="text-muted vb">Guard licenses</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">8</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
   <center><a href="{{url('/GuardLicenses')}}"><button class="btn btn-info btn-rounded waves-effect waves-light" >See all</button></a></center>
              </div>


            </div>

        </div>
        <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="white-box">
          </div>
        </div>
      </div>
  @endsection
