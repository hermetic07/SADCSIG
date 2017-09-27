@extends('AdminPortal.master2')

@section('Title') Deployment status @endsection


@section('mtitle') Deployment status @endsection

@section('mtitle2') <li>Clients</li>
                        <li class="active"><a href="{{url('/PendingClientRequests')}}"> Pending request</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">


    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="white-box">




<div id="image-popups" class="row"
            <h4>Polytechnic University of the Philippines</h4>
            <h5><span class="text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</span></h5>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Guard/s deployed</div>
<div class="panel-wrapper p-b-10 collapse in">
    <div class="row  el-element-overlay">
<div id="client" class="owl-carousel owl-theme ">

<div class="el-card-item item avatar">
  <span class="accepted-badge">&#10004;</span>
    <div class="el-card-avatar el-overlay-1 ">
      <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-responsive"></a>
        <div class="el-overlay">
          <ul class="el-info">
            <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
          </ul>
        </div>
      </div>
            <center> <h4 class="page-title">Ernest</h4> </center>
  </div>

  <div class="el-card-item item avatar">
   <span class="accepted-badge">&#10004;</span>
      <div class="el-card-avatar el-overlay-1 ">
        <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-responsive"></a>
          <div class="el-overlay">
            <ul class="el-info">
              <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
            </ul>
          </div>
        </div>
      <center> <h4 class="page-title">Ernest</h4> </center>
    </div>

    <div class="el-card-item item avatar">
    <span class="accepted-badge">&#10004;</span>
        <div class="el-card-avatar el-overlay-1 ">
          <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-responsive"></a>
            <div class="el-overlay">
              <ul class="el-info">
                <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
              </ul>
            </div>
          </div>
                <center> <h4 class="page-title">Ernest</h4> </center>
      </div>

      <div class="el-card-item item avatar">
  <span class="accepted-badge">&#10004;</span>
          <div class="el-card-avatar el-overlay-1 ">
            <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-responsive"></a>
              <div class="el-overlay">
                <ul class="el-info">
                  <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                </ul>
              </div>
            </div>
                <center> <h4 class="page-title">Ernest</h4> </center>

        </div>

        
</div>
</div>
</div>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Gun tagging</div>
<div class="panel-wrapper p-b-10 collapse in">
</br>
<center><button type="button" class="btn btn-info"   data-toggle="modal" data-target="#tag"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Tag a gun</button></center>
</br>
                             <div class="table-responsive">
                                <table class="table color-table dark-table">
                                    <thead>
                                        <tr>                                       
                                            <th>Gun type</th>
                                            <th>Gun Name</th>
                                            <th>Serial Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ShotGun</td>
                                            <td>Spas12</td>
                                            <td>123455</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                                                               
</div>
        </div>



        </div>
    </div>


</div>
</div>
</div></div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="white-box">
<button type="button" class="btn btn-block  btn-success" >Done</button>
</div>

</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="white-box">
<div class="pd-agent-info text-center">
<a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
<h4>Chris jerico albino</h4>
<h6>Client's name</h6> </div>

<hr class="m-0">
<div class="pd-agent-contact text-center"> <i class="fa fa-phone text-danger" aria-hidden="true"></i> 123456789
<br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> email@gmail.com
</br> 	</br></div>
<h5 class="box-title fw-500">Essential Information</h5>
<hr class="m-0">
<div class="table-responsive pro-rd p-t-10">
<table class="table">
    <tbody class="text-dark">
        <tr>
            <td>No. of guards needed</td>
            <td>11</td>
        </tr>
<tr>
            <td>Status (Accepted/rejected)</td>
            <td>5/10 out of 11</td>
        </tr>
        <tr>
            <td>Expected complete date</td>
            <td>July 11,2017</td>
        </tr>
<tr>
            <td>Nature of business</td>
            <td>School	</td>
        </tr>

    </tbody>
</table>
</div>
<button type="button" class="btn btn-block  btn-info" ><i class="fa fa-edit"></i> </i>More info</button>
</div>

</div>

		  <!-- tag guns -->
  <div id="tag" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Tag guns</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					                 
                   <div class="form-group col-sm-6">
                      <label class="control-label">Gun type</label>
                       			<select class="form-control" >
												<option></option>
												<option>Dessert eagle</option>
												<option>Glock 49</option>					
											</select>
                      <div class="help-block with-errors"></div>
                   </div>
               <div class="form-group col-sm-6">
                      <label class="control-label">Gun</label>
                       			<select class="form-control" >
												<option></option>
												<option>Dessert eagle</option>
												<option>Glock 49</option>					
											</select>
                      <div class="help-block with-errors"></div>
                   </div>
       
				        <div class="form-group col-sm-12">
                           <label class="control-label">Serial number</label>
                       		    <input type="text" class="form-control" required>

                   
                      <div class="help-block with-errors"></div>
                   </div>
       	                
				
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info waves-effect waves-light" >Tag</button>
             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
<!-- /Add military service modal -->

  @endsection