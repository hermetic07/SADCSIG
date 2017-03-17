@extends('AdminPortal.master2')

@section('Title') Incident reports @endsection


@section('mtitle') Incident reports  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/IncidentReports')}}"> Incident Reports</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


<div class="row">
		          <div class="col-lg-12	">

          <div class="white-box">

			  					 <div class="row  el-element-overlay">

            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th>
				<th width="100px">Sender</th>
                 <th>Name</th>
				 <th> Date </th>
				<th>Establishment's name</th>
					<th>Address</th>
	  <th width="50px"data-sort-ignore="true" >Actions</th>
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
                              <td>								<div class="el-card-item">
									<div class="el-card-avatar el-overlay-1">
                             			 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
												<div class="el-overlay">
													<ul class="el-info">
                                                    	<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  					</ul>
												</div>
									</div>
								  </div></td>

			      <td><span class="label label-table label-info">Security guard</span></td>
                  <td>Ernest john maskarino</td>
                     <td>Jan-28-2017 09:52 PM</td>
                  <td>University of the philippines</td>
					   <td>Quezon city</td>
				<td>
									 <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa  fa-exclamation-circle"></i> </button></td>
				</td>
                          </tr>

                 <tr>
                              <td>								<div class="el-card-item">
									<div class="el-card-avatar el-overlay-1">
                             			 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2 2.jpg" alt="user"  class="img-circle img-responsive"></a>
												<div class="el-overlay">
													<ul class="el-info">
                                                    	<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  					</ul>
												</div>
									</div>
								  </div></td>

			      <td><span class="label label-table label-info">Security officer</span></td>
                  <td>Evander macandog</td>
                     <td>Jan-28-2017 09:52 PM</td>
                  <td>Polytechnic University of the philippines</td>
					   <td>Manila city</td>
					 <td>
									 <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-exclamation"></i> </button></td>
									 </td>

                          </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="7"></td>
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

		  <!-- Deliver guns -->
  <div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Incident report</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					<div class="form-group col-sm-12">
                       <label class="control-label">Subject:</label>
                          <p class="form-control-static">Robbery</p>
                       <div class="help-block with-errors"></div>
                    </div>
					<div class="form-group col-sm-12	">
                       <label class="control-label">Content:</label>
                          <p class="form-control-static"> Good morning ser! report content here</p>
                       <div class="help-block with-errors"></div>
                    </div>


                 </div>
                   <div class="help-block with-errors"></div>
                </div>
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
<!-- /Add military service modal -->

     </div>

  @endsection

  @section('script')

  @endsection
