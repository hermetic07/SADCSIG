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


<div class="row">
                   <div class="white-box p-0">
                                         <div class="pd-agent-info text-center">
                            <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
                            <h4>Chris jerico albino</h4>
                            <h6>Client's name</h6> </div>

                        <hr class="m-0">
                        <div class="pd-agent-contact text-center"> <i class="fa fa-phone text-danger" aria-hidden="true"></i> 123456789
                            <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> email@gmail.com
            </br> </div>
                    </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="white-box">
                          <div id="image-popups" class="row">
                        <h4>Polytechnic University of the Philippines</h4>
                        <h5><span class="text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</span></h5>
                      <div class="col-sm-12 p-t-20 fw-500"><a href="plugins/images/Clients/establishments/pup.jpg" data-effect="mfp-zoom-out">	<img src="plugins/images/Clients/establishments/pup.jpg" height="600" alt="esta-img" class="img-responsive"  /><br/></a></div>
                    </div>




                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="white-box">
                        <h5 class="box-title fw-500">Essential Information</h5>
                        <hr class="m-0">
                        <div class="table-responsive pro-rd p-t-10">
                            <table class="table">
                                <tbody class="text-dark">
                                    <tr>
                                        <td>Contract</td>
                                        <td>24 months</td>
                                    </tr>
                                    <tr>
                                        <td>Starting date</td>
                                        <td>July 11, 2015</td>
                                    </tr>
                                    <tr>
                                        <td>End date</td>
                                        <td>July 11,2017</td>
                                    </tr>
                  <tr>
                                        <td>Nature of business</td>
                                        <td>School	</td>
                                    </tr>
                  <tr>
                                        <td>Contact number(client)</td>
                                        <td>123456789</td>
                                    </tr>
                        <tr>
                                        <td>Person in charge</td>
                                        <td>Abel mandap</td>
                                    </tr>
                            <tr>
                                        <td>Contact number (Person in charge)</td>
                                        <td>123456789</td>
                                    </tr>
                  <tr>
                                        <td>Area Size (approx. in square meters)</td>
                                        <td>10.00</td>
                                    </tr>
                  <tr>
                                        <td>Population (approx.)</td>
                                        <td>5000</td>
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
                          <td>Abel mandap</td>
            <td>abel@gmail.com</td>
                          <td>999999999	 </td>
                <td>999999999	</td>
            <td><span class="label label-table label-success">Active</span> </td>
                      </tr>
         <tr>
                          <td>
                  <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                               <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2%202.jpg" alt="user"  class="img-circle img-responsive"></a>
                    <div class="el-overlay">
                      <ul class="el-info">
                                                  <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                        </ul>
                    </div>
              </div>
            </div>
            </td>
                          <td>Earl dixon geraldez</td>
            <td>earl@gmail.com</td>
                          <td>999999999	 </td>
                <td>999999999	</td>
            <td><span class="label label-table label-warning">Reliever</span> </td>
                      </tr>

         <tr>
                          <td>
                  <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                               <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/daisy2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                    <div class="el-overlay">
                      <ul class="el-info">
                                                  <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                        </ul>
                    </div>
              </div>
            </div>
            </td>
                          <td>Daisy ronquillo</td>
            <td>daisy@gmail.com</td>
                          <td>999999999	 </td>
                <td>999999999	</td>
            <td><span class="label label-table label-danger">Leave</span> </td>
                      </tr>


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
  @endsection
