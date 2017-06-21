@extends('ClientPortal.master3')

@section('Title') Home @endsection
@section('clientName')
  {{  $establishment->person_in_charge }}
@endsection

@section('mtitle') Home @endsection

@section('content')

      <div class="row">
		  <div class="col-lg-9">




          <div class="white-box"  style="border: 2px solid black;">

            <div class="user-bg"> <img width="100%" height="250px" alt="user" src="plugins/images/backgrounds/profilebg.png">
              <div class="overlay-box">
                <div class="user-content"> <a href="javascript:void(0)"><img src="plugins/images/Clients/Active/evander.jpg" class="thumb-lg img-circle" alt="img"></a>
                  <h4 class="text-white">
                    @foreach($clients as $client)
                      @if($client->id == $establishment->clients_id)
                        {{ $client->name }}
                      @endif
                    @endforeach
                  </h4>
                  <h5 class="text-white">Client</h5>
                </div>
              </div>
            </div>


          <div class="user-btm-box">
                                <!-- .row -->
                                <div class="row text-center m-t-12">
								    <div class="col-md-4 b-r"><strong>Telephone</strong>
                                        <p>123456789</p>
                                    </div>
                                    <div class="col-md-4"><strong>Phone</strong>
                                        <p>+123 456 789</p>
                                    </div>
								          <div class="col-md-4"><strong>Email</strong>
                                        <p>Chris@gmai.com</p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>


                                <div class="row text-center m-t-12">
                                    <div class="col-md-12"><strong>Address</strong>
                                        <p>Sta.mesa, manila</p>
                                    </div>
                                </div>
                                <hr>
                                <!-- /.row -->
                                <div class="col-md-6 col-sm-6 text-center">
                                    <p class="text-purple">Establishment/s</p>
                                    <h1>3</h1> </div>

                                <div class="col-md-6 col-sm-6 text-center">
                                    <p class="text-danger">Guards</i></p>
                                    <h1>
                                    @php
                                      $ctr = 0;
                                    @endphp
                                      @foreach($deploymentDetails as $deploymentDetail)
                                        @foreach($deployments as $deployment)
                                          @if($deploymentDetail->deployments_id == $deployment->id)
                                            @foreach($serviceRequests as $serviceRequest)
                                              @if($deployment->service_requests_id == $serviceRequest->id)
                                                @if($serviceRequest->establishments_id == $establishment->id)
                                                  @if($deploymentDetail->status == 'active')
                                                    @php
                                                      $ctr = $ctr + 1;
                                                    @endphp
                                                  @endif
                                                @endif
                                              @endif
                                            @endforeach
                                          @endif
                                        @endforeach
                                      @endforeach
                                      {{ $ctr }}
                                    </h1> </div>

                            </div>

          </div>
        </div>


		  		              <div class="col-md-3">

              <div class="white-box">
			  <canvas id="canvas" width="350" height="250">
</canvas>

              </div>

	          <div class="white-box">
                <h3 class="box-title">Delivery</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-truck text-info"></i></li>
                  <li class="text-right"><span class="counter">2</span></li>
                </ul>
              </div>
		    <div class="white-box">
                <h3 class="box-title">Swap request</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-exchange text-warning"></i></li>
                  <li class="text-right"><span class="counter">1</span></li>
                </ul>
              </div>

            </div>
      </div>

@endsection


@section('script')


 @endsection
