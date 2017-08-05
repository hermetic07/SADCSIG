@extends('AdminPortal.master2')

@section('Title') Deliver ammunition @endsection


@section('mtitle') Deliver ammunitions  @endsection

@section('mtitle2')
                      <li>Delivery</li>
                         <li class="active"><a href="{{url('/Ammunition')}}"> Ammunitions</a></li>  @endsection
@section('Reg')
      <li> <a href="javascript:void(0);" class="waves-effect" ><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
            <ul class="nav nav-second-level">
              <li> <a href="{{url('/ClientRegistration')}}" class="waves-effect">Clients</a>
              </li>
              <li> <a href="{{url('/Guard-Registration')}}" class="waves-effect">Security guards</a>
              </li>
                  </ul>
          </li>
@endsection
@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect active"> @endsection


@section('content')

      <div class="row">
		          <div class="col-lg-12	">

          <div class="white-box">
			  <h4><center><strong>Clients</strong></center></h4>
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                <th data-sort-initial="true" data-toggle="true">ID</th>
                  <th>Name</th>
				  <th data-hide="phone, tablet" >Location</th>
                  <th data-sort-ignore="true" width="150px">Actions</th>
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
                              <td>1</td>
                              <td>Daisy ronquillo</td>
					 		  <td>7</td>
                              <td>
							 			  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver Ammo</button>

                              </td>
                          </tr>
				 <tr>
                              <td>2</td>
                              <td>Luigi lacsina</td>
					 		  <td>7</td>
                              <td>
       	  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver Ammo</button>
                              </td>
                          </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4"></td>
                </tr>
              </tfoot>
        	</table>

            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>

			        </div>


					   </div>

		  <!-- Deliver guns -->
  <div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver ammunitions</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					                  <div class="form-group col-sm-2">
                      <label class="control-label">Order ID</label>
                           <p class="form-control-static"> 2 </p>
                      <div class="help-block with-errors"></div>
                   </div>
					<div class="form-group col-sm-7">
                       <label class="control-label">Client name</label>
                          <p class="form-control-static"> Daisy ronquillo </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-3">
                       <label class="control-label">Contact number</label>
                           <p class="form-control-static"> 09123456789 </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  			<div class="form-group col-sm-6">
                       <label class="control-label">Establishment name</label>
                          <p class="form-control-static"> Polytechnic university of the philippines</p>
                       <div class="help-block with-errors"></div>
                    </div>
					  				  			<div class="form-group col-sm-6">
                       <label class="control-label">Address</label>
                          <p class="form-control-static"> Anonas, Santa Mesa, Maynila, Kalakhang Maynila</p>
                       <div class="help-block with-errors"></div>
                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Person in charge</label>
                          <p class="form-control-static"> Ernest john maskarino </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-6">
                       <label class="control-label">Contact number</label>
                           <p class="form-control-static"> 09123456789 </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  			  <h4><center><strong>Guns</strong></center></h4>
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="100">
              <thead>
                <tr>
                <th data-sort-initial="true" data-toggle="true">ID</th>
                  <th>Guntype</th>
				  <th >gun</th>
                  <th data-sort-ignore="true" width="150px">Rounds/ammo</th>
                </tr>
              </thead>
              <tbody>
                 <tr>
                              <td>1</td>
                              <td>Pistol</td>
					 		  <td>Glock 49</td>
                              <td>
							 	      <input type="text" class="form-control">

                              </td>
                          </tr>
				 <tr>
                              <td>2</td>
                              <td>shotgun</td>
					 		  <td>spas</td>
                              <td>
   <input type="text" class="form-control">
                              </td>
                          </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4"></td>
                </tr>
              </tfoot>
        	</table>
					  </br> </br>
					                  <div class="form-group col-sm-8">
                      <label class="control-label">Delivered by</label>
                       <input type="text" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
					   <div class="form-group col-sm-4">
                       <label class="control-label">Contact number</label>
                       <input type="text" class="form-control" required>
                       <div class="help-block with-errors"></div>
                    </div>
					  		  				  			<div class="form-group col-sm-9">
                       <label class="control-label">Delivery code</label>
                          <p class="form-control-static">6C4NpIo1</p>
                       <div class="help-block with-errors"></div>
					  </div>
					 <div class="col-sm-3">
						 </br>
         <button type="button" class="btn btn-info waves-effect waves-light" >Generate code</button>
					  </div>
                 </div>
                   <div class="help-block with-errors"></div>
                </div>
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info waves-effect waves-light" >Submit</button>
             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>

  @endsection
