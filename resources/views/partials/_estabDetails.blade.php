@php
  $estabImage = "";
  $estabLocImage = "";
  $guardCtr = 0;
@endphp
@foreach($clientPic as $clientP)
    @if($clientP->stringContractId == $contractID)
        @php
            $estabImage = $clientP->stringestablishment;
            $estabLocImage = $clientP->stringlocation;
        @endphp
    @endif
@endforeach
<div class="row">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <div class="white-box">
        <div id="image-popups" class="row">
          <h2>{{$estab_name}}</h2>
          <h4>{{$clientName}}</h4>
          <h5>
            <span class="text-muted">
              <i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>{{$adress}}, {{$area_name}}
            </span>
          </h5>
          <div class="col-sm-12 p-t-20 fw-500">
            <a href="plugins/images/Clients/establishments/pup.jpg" data-effect="mfp-zoom-out">  <img src="uploads/{{$estabImage}}" height="600" alt="esta-img" class="img-responsive"  /><br>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="white-box">
        <h5 class="box-title fw-500">{{$nature_name}} Information</h5>
        <hr class="m-0">
        <div class="table-responsive pro-rd p-t-10">
          <table class="table">
            <tbody class="text-dark">
              <tr>
                @php
                  $contractCtr = 0;
                @endphp
                <td>
                  <a href="/{{$route}}-{{$client->id}}+{{$estabID}}">Contract</a>
                </td>
                <td>
                  @foreach($contracts as $contract)
                    @if($contract->strEstablishmentID == $estabID)
                      @php
                        $contractCtr++;
                      @endphp
                    @endif
                  @endforeach
                  {{$contractCtr}}
                </td>
              </tr>
              <tr>
                  <td>Nature of business</td>
                  <td>{{$nature_name}}</td>
              </tr>
              <tr>
                  <td>Contact number(client)</td>
                  <td>{{$contactNo}}</td>
              </tr>
              <tr>
                                    <td>Person in charge</td>
                                    <td>{{$pic}}</td>
                                </tr>
                        <tr>
                                    <td>Contact number (Person in charge)</td>
                                    <td>{{$contactNo}}</td>
                                </tr>
              <tr>
                                    <td>Area Size (approx. in square meters)</td>
                                    <td>{{$area_size}}</td>
                                </tr>
              <tr>
                                    <td>Population (approx.)</td>
                                    <td>{{$population}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-block  btn-info" ><i class="fa fa-edit"></i> </i>Edit info</button>
                   <button type="button" class="btn btn-block  btn-danger" ><i class="ti-close"></i> </i>Terminate</button>
                </div>

            </div>
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h5 class="box-title fw-500">Location</h5>
                    <hr class="m-0">
                         <div class="row el-element-overlay m-b-40">
<!-- /.usercard -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="white-box">
      <div class="el-card-item">
          <div class="el-card-avatar el-overlay-1">
              <img src="uploads/{{$estabLocImage}}">
              <div class="el-overlay">
                  <ul class="el-info">
                      <li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/Clients/establishments/location.png"><i class="icon-magnifier"></i></a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
  </div>
                </div>

            </div>
</div>

<div class="col-lg-8">
   <div class="white-box">
 <div class="row  el-element-overlay">
                   <center> <h5 class="box-title fw-500">List of guards</h5>   </center>
      <center> <h5>Guards deployed: {{$guardDeployed}}</h5>   </center>
    </br>
    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
      <thead>
        <tr>
  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
        <th>Guard's name</th>
          <th  data-sort-ignore="true" width="170px">Shifts</th>
  <th  data-sort-ignore="true">Telephone number</th>
          <th data-sort-ignore="true">Contact number</th>
    <th data-sort-ignore="true" width="50px">Status</th>
        </tr>
      </thead>
        <div class="form-inline padding-bottom-15">
          <div class="row">
    <div class="col-sm-6">

    </div>
              <div class="col-sm-6 text-right m-b-20">
              <div class="form-group">
                  <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
        autocomplete="off">
     </div>
               </div>
           </div>
        </div>


      <tbody>
         
    @foreach($estabGuards as $estabGuard)
      @if($estabGuard->strEstablishmentID == $estabID)
        @foreach($employees as $employee)
          @if($employee->id == $estabGuard->strGuardID)
            <tr>
              <td>
                <div class="el-card-item">
                  <div class="el-card-avatar el-overlay-1">
                    <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-circle img-responsive"></a>
                    <div class="el-overlay">
                      <ul class="el-info">
                        <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$employee->id)}}" target="_blank"><i class="fa fa-info"></i></a></li>
                      </ul>
                    </div>
                </div>
              </div>
              </td>
              <td>{{$employee->first_name}}, {{$employee->last_name}}</td>
              <td>{{$estabGuard->shiftFrom}} am -{{$estabGuard->shiftTo}} pm</td>
              <td>{{$employee->telephone}}</td>
              <td>{{$employee->cellphone}} </td>
              <td><span class="label label-table label-success">{{$employee->status}}</span> </td>
            </tr>
          @endif
        @endforeach
      @endif
    @endforeach     
      
     


      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"></td>
        </tr>
      </tfoot>
  </table>

    <div class="text-right">
      <ul class="pagination">
      </ul>
    </div>
 </div>
</div>
  </div>

<div class="col-lg-4">
   <div class="white-box">
 <div class="row  el-element-overlay">
                   <center> <h5 class="box-title fw-500">Guns</h5>   </center>
        <center> <h5>Gun tagged: 2</h5>   </center>
   </br>
    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
      <thead>
        <tr>
        <th>Gun type</th>
          <th  data-sort-ignore="true">Gun</th>
          <th>Serial No</th>
        </tr>
      </thead>
        <div class="form-inline padding-bottom-15">
          <div class="row">
    <div class="col-sm-5">

    </div>
              <div class="col-sm-6 text-right m-b-20">
              <div class="form-group">
                  <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
        autocomplete="off">
     </div>
               </div>
           </div>
        </div>


      <tbody>
        @foreach($clientGuns as $clientGun)
          <tr>
            <td> {{$clientGun->gunType}} </td>
            <td> {{$clientGun->gun}} </td>
            <td> {{$clientGun->serialNo}} </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3"></td>
        </tr>
      </tfoot>
  </table>

    <div class="text-right">
      <ul class="pagination">
      </ul>
    </div>
 </div>
</div>
  </div>
</div>