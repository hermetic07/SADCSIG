


        @php
          $estabCtr = 0;
          $arr = array();
          $a = 0;
          $l = 0;
          $imageCtr = 0;
          $estabImage = array();
          $personic = array();
          $guardsDeployed = 0;

          $estabName = "";
          $personInCharge = "";
          $area_id = "";
          $province_id = "";
          $address = "";
          $estabIDs = "";
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

                        $estabIDs = $estabIDs.",".$establishment->id;
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
              <tr>
                
                <td>
                   <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                      <a href="SecurityGuardsProfile.html"><img src="uploads/{{$estabImage[$f]}}" alt="user"  class=" img-responsive"></a>
                      
                    </div>
                 </div>
                 </td>
                 <td>
                   @foreach($establishments as $establishment)
                      @if($establishment->id == $arr[$f])
                        {{ $establishment->name }}
                        @php
                          
                          $personInCharge = $establishment->pic_fname." ".$establishment->pic_mname." ".$establishment->pic_lname;
                          $area_id = $establishment->areas_id;
                          $province_id = $establishment->province_id;
                          $address = $establishment->address;
                          
                        @endphp
                        @break
                      @endif
                    @endforeach
                 </td>
                 <td>
                   <h6>{{$personInCharge}}</h6>
                 </td>
                 <td>
                   <h6>
                     @foreach($areas as $area)
                      @if($area->id == $area_id)
                        @foreach($provinces as $province)
                          @if($province->id == $area->provinces_id)
                            {{ $address }}, {{$area->name}}, {{$province->name}}
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                   </h6>
                 </td>
                 <td>
                   <input type="radio" name="" id="{{$arr[$f]}}" class="btn btn-info radioBtn" value="{{$arr[$f]}}" required>
                 </td>
              </tr> 
              
              @php
            }
          }

        @endphp

        
      
     