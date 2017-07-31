@extends('ClientPortal.master3')

@section('Title') Establishment's details @endsection
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
@section('mtitle') Establishment's details @endsection

@section('content')


@php
  $estabImage = "";
  $clientPicture = "";
@endphp
@foreach($clientPic as $clientP)
    @if($clientP->stringContractId == $contractID)
        @php
            $estabImage = $clientP->stringestablishment;
            $clientPicture = $clientP->stringpic;
        @endphp
    @endif
@endforeach
<div class="row">

              <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="white-box">
                      <div id="image-popups" class="row">
                    <h4>{{$estab_name}}</h4>
                    <h5><span class="text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>{{$adress}}, {{$area_name}}</span></h5>
                  <div class="col-sm-12 p-t-20 fw-500"><a href="plugins/images/Clients/establishments/pup.jpg" data-effect="mfp-zoom-out">  <img src="uploads/{{$estabImage}}" height="600" alt="esta-img" class="img-responsive"  /><br/></a></div>
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
                                    <td><a href="/ClientPortalContracts-{{$client->id}}+{{$estabID}}">Contract</a></td>
                                    <td>
                                    @foreach($estabContracts as $estabContract)
                                      @if($estabContract->id == $estabID)
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
              <img src="plugins/images/Clients/establishments/location.png">
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
      <center> <h5>Guards deployed: 2</h5>   </center>
    </br>
    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
      <thead>
        <tr>
  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
        <th>Guard's name</th>
          <th  data-sort-ignore="true">Email address</th>
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
         
          @foreach($deployments as $deployment)
            @if($deployment->clients_id == $client->id)
              @foreach($deploymentDetails as $deploymentDetail)
                @if($deploymentDetail->deployments_id == $deployment->id)
                  @foreach($employees as $employee)
                    @if($employee->id == $deploymentDetail->employees_id)
                    <tr>
                      <td>
            <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                <div class="el-overlay">
                  <ul class="el-info">
                    <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                  </ul>
                </div>
            </div>
          </div>
         </td>
         <td>{{$employee->first_name}}, {{$employee->last_name}}</td>
         <td>abel@gmail.com</td>
         <td>999999999 </td>
         <td>999999999 </td>
         <td><span class="label label-table label-success">{{$employee->status}}</span> </td>
         </tr>
                    @endif
                  @endforeach
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
         <tr>
                      <td>Pistol</td>
        <td>Glock-49</td>
                  </tr>
       <tr>
                      <td>Pistol</td>
        <td>Glock-49</td>
                  </tr>

       <tr>
                      <td>Pistol</td>
        <td>Glock-49</td>
                  </tr>



      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"></td>
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
@section('adminPic')
          src = "uploads/{{$clientPicture}}"
        @endsection
@endsection


@section('script')


 @endsection
