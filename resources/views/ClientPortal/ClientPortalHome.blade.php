@extends('ClientPortal.master3')

@section('Title') Home @endsection
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
@section('mtitle') Home @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

<!-- @php
  $estabImage = "";
@endphp -->

@section('content')

      <div class="row">
      <div class="col-lg-9">




          <div class="white-box"  style="border: 2px solid black;">

            <div class="user-bg"> <img width="100%" height="250px" alt="user" src="plugins/images/backgrounds/profilebg.png">
              <div class="overlay-box">
                <div class="user-content"> <a href="javascript:void(0)"><img src = "uploads/{{$client->image}}" class="thumb-lg img-circle" alt="img"></a>
                  <h4 class="text-white">
                    
                        {{ $client->name }}
                      
                  </h4>
                  <h5 class="text-white">Client</h5>
                </div>
              </div>
            </div>


          <div class="user-btm-box">
                                <!-- .row -->
                                <div class="row text-center m-t-12">
                    <div class="col-md-4 b-r"><strong>Telephone</strong>
                                        <p>{{ $client->contactNo }}</p>
                                    </div>
                                    <div class="col-md-4"><strong>Phone</strong>
                                        <p>{{ $client->contactNo }}</p>
                                    </div>
                          <div class="col-md-4"><strong>Email</strong>
                                        <p>{{ $client->email }}</p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>


                                @php
                                  $estabCtr = 0;
                                  $arr = array();
                                  $a = 0;
                                  $l = 0;

                                @endphp
                                <!-- /.row -->
                                <div class="col-md-6 col-sm-6 text-center">
                                  <p class="text-purple">Establishment/s</p>
                                  <h1>
                                    @foreach($clientRegistrations as $clientRegistration)
                                      @if($clientRegistration->client_id == $client->id)
                                        @foreach($contracts as $contract)
                                          <!-- @foreach($clientPic as $clientP)
                                            @if($clientP->stringContractId == $contract->id)
                                                @php
                                                    $estabImage = $clientP->stringpic;
                                                @endphp
                                                @section('adminPic')
                                                  src = "uploads/{{$estabImage}}"
                                                @endsection
                                            @endif
                                            
                                        @endforeach -->
                                          @if($contract->id == $clientRegistration->contract_id)
                                            @foreach($establishments as $establishment)
                                              @if($establishment->contract_id == $contract->id)
                                                @php
                                                  $estabID = $establishment->id;
                                                    $arr[$a] = $estabID; $a++;
                                                    $l = count($arr);
                                                @endphp
                                              @endif
                                            @endforeach
                                          @endif
                                        @endforeach
                                      @endif
                                    @endforeach

                                    @php
                                      $e = 0;
                                      for($q = 0; $q < count($arr); $q++){
                                        for($p = $q+1; $p < count($arr); $p++){
                                          if($arr[$q] == $arr[$p]){
                                            $arr[$p]="-";
                                          }
                                        }    
                                      }
                                      for($f = 0; $f < count($arr); $f++){
                                        if($arr[$f] != "-"){

                                          $e++;
                                        }
                                      }

                                    @endphp
                                    {{$e}}
                                    
                                  </h1>
                                </div>

                                <div class="col-md-6 col-sm-6 text-center">
                                    <p class="text-danger"><a href="/ClientPortalGuardsDTR-{{$client->id}}"><h3><b style="color: firebrick;">Guards</b></h4></a></i></p>
                                    <h1><a href="/ClientPortalGuardsDTR-{{$client->id}}">
                                    @php
                                      $ctr = 0;
                                    @endphp
                                      
                                        @foreach($deployments as $deployment)
                                          @if($deployment->clients_id == $client->id)
                                            @foreach($deploymentDetails as $deploymentDetail)
                                              @if($deploymentDetail->deployments_id == $deployment->id)
                                                @php
                                                  $ctr++;
                                                @endphp
                                              @endif
                                            @endforeach
                                          @endif
                                        @endforeach
                                      {{ $ctr }}
                                      </a>
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
                <h3 class="box-title"><a href="/ClientPortalHome-GunDelivery-{{$client->id}}">Delivery</a></h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-truck text-info"></i></li>
                  @php
                    $deliveryCtr = 0;
                  @endphp

                  <li class="text-right"><span class="counter">
                  <a class="loadDelivery" href="/ClientPortalHome-GunDelivery-{{$client->id}}">
                  @foreach($gunRequests as $gunRequest)
                    @if($gunRequest->strClientID == $client->id)
                      @foreach($clientRegistrations as $clientRegistration)
                        @if($clientRegistration->client_id == $gunRequest->strClientID)
                          @foreach($contracts as $contract)
                            @if($contract->id == $clientRegistration->contract_id)
                              @foreach($gunDeliveries as $gunDelivery)
                                @if($gunDelivery->status == "ONDELIVERY")
                                  @if($gunDelivery->strGunReqID == $gunRequest->strGunReqID)
                                  
                                        @php
                                          $deliveryCtr++;
                                        @endphp
                                  @endif
                                @endif
                                
                              @endforeach
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endif
                  @endforeach
                  {{ $deliveryCtr }}
                   
            </a>
                  </span></li>
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
 
