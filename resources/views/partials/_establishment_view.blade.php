


        @php
          $estabCtr = 0;
          $arr = array();
          $a = 0;
          $l = 0;
          $imageCtr = 0;
          $estabImage = array();
          $personic = array();
          $guardsDeployed = 0;
        @endphp
       

        @foreach($clientRegistrations as $clientRegistration)
          @if($clientRegistration->client_id == $client->id)
            @foreach($contracts as $contract)
              @if($contract->id == $clientRegistration->contract_id)
              @foreach($clientPic as $clientP)
                  @if($clientP->stringContractId == $contract->id)
                      @php
                      
                          $estabImage[$imageCtr] = $clientP->stringestablishment;
                          $personic[$imageCtr] = $clientP->stringpic;
                          $imageCtr++;
                      @endphp
                  @endif
              @endforeach
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

              @endphp
              <div class="white-box p-0 pro-box pro-horizontal" style="border: 1px solid black;">
                <div class="col-sm-4 pro-list-img" style="background: url(uploads/{{$estabImage[$f]}}) center center / cover no-repeat;">
                  <span class="pro-label label label-inverse"><a class="text-white" href="{{$href}}{{$arr[$f]}}"><i class="icon-info"></i>&nbsp;&nbsp;More info</a></span>
                </div>
                  <div class="col-sm-8">
                    <div class="pro-content">
                      <div class="pro-list-details col-sm-6">
                        <h4 class="p-t-10">
                          <a class="text-dark" href="javascript:void(0)">
                          @foreach($establishments as $establishment)
                            @if($establishment->id == $arr[$f])
                              {{ $establishment->name }}
                              @php
                                $nature_id = $establishment->natures_id;
                                $pic = $establishment->pic_fname.' '.$establishment->pic_mname.' '.$establishment->pic_lname;
                                $area_id = $establishment->areas_id;
                                $province_id = $establishment->province_id;
                                $address = $establishment->address;
                                $area_size = $establishment->area_size;
                                $population = $establishment->population;
                                
                              @endphp
                              @break
                            @endif
                          @endforeach
                          </a>
                        </h4>
                        <h4 class="text-danger">
                          @foreach($natures as $nature)
                            @if($nature->id == $nature_id)
                              {{ $nature->name }}
                            @endif
                          @endforeach
                        </h4>
                        </div>
                          <div class="pro-list-info col-sm-6">
                            <ul class="pro-info text-muted m-b-0">
                              <li> <span><img src="plugins/images/Clients/Active/security-guard.png"></span> <span>Security guards</span><span class="pull-right text-inverse">
                              @foreach($estabGuards as $estabGuard)
                                  @if($estabGuard->strEstablishmentID == $arr[$f])
                                    @php
                                      $guardsDeployed++;
                                    @endphp
                                  @else
                                    
                                  @endif
                                 
                                    
                                @endforeach
                                 {{$guardsDeployed}}
                                 @php
                                    $guardsDeployed=0;
                                  @endphp
                              </span></li>
                              <li> <span><img src="plugins/images/Clients/Active/area.png"></span> <span>Area Size (approx. in square meters)</span><span class="pull-right text-inverse">{{$area_size}}</span></li>
                              <li> <span><img src="plugins/images/Clients/Active/population.png"></span> <span>Population (approx.)</span><span class="pull-right text-inverse">{{$population}}</span></li>
                            </ul>
                          </div>
                          <div class="col-sm-12">
                            <div class="pro-agent">
                              <div class="agent-img">
                                <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="uploads/{{$personic[$f]}}"></a>
                              </div>
                              <div class="agent-name">
                                <h5 class="m-b-0">{{$pic}}</h5> <small class="text-muted">Person in charge</small>
                              </div>
                            </div>
                            <div class="pro-location hidden-xs hidden-xs hidden-xs"> <span class="pull-right text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>
                            @foreach($areas as $area)
                              @if($area->id == $area_id)
                                @foreach($provinces as $province)
                                  @if($province->id == $area->provinces_id)
                                    {{ $address }}, {{$area->name}}, {{$province->name}}
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                            </span>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              @php
            }
          }

        @endphp
        
      
     