@extends('AdminPortal.master2')

@section('Title') Deliver Guns @endsection


@section('mtitle') Deliver Guns  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/DeliverGuns')}}">Deliver Guns</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect active"> @endsection


@section('content')


<div class="row">
           <div class="col-lg-12">
               <div class="white-box">
                                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                  <th>Client's name</th>
                  <th>Client's establishment</th>
                  <th>location</th>        
                  <th data-sort-ignore="true" width="310px">Actions</th>
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
                              <td>Abel mandap</td>
                              <td>pup</td>
                              <td> sta. mesa, manila </td>
                              <td>
			<button class="btn btn-info"  data-toggle="modal" data-target="#ReqInfo"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View order slip</button>
                              <button class="btn  btn-success"  data-toggle="modal" data-target="#Delgun"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver guns</button>
                              </td>
                 </tr>
                 <tr>
                              <td>Abel mandap</td>
                              <td>pup</td>
                              <td> sta. mesa, manila </td>
                              <td>
							  <button class="btn btn-info"  data-toggle="modal" data-target="#ReqInfo"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View order slip</button>
                              <button class="btn  btn-success"  data-toggle="modal" data-target="#Delgun"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-truck"></i> Deliver guns</button>
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
    <!-- Reques info by client -->
  <div id="ReqInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Order slip</strong></center></h4>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator">
                    <div class="form-group">
                    <div class="row">  
                       <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><b>Abel mandap</b>
              <p style="margin-top:0px;">Order #123</p></td>
            <td align="right" width="100"> 07/11/28 07:25 </td>
          </tr>
          <tr>
            <td colspan="2" style="padding:20px 0; border-top:1px solid #f6f6f6;"><div>
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;">Dessert eagle</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;"  align="right">x2</td>
                    </tr>
                                      <tr>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;">m4a1</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;"  align="right">x3</td>
                    </tr>
                                        <tr class="total">
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" width="80%">Total</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" align="right">x5</td>
                    </tr>

                  </tbody>
                </table>
              </div></td>
          </tr>
          <tr>
            <td colspan="2">
          </tr>
        </tbody>
      </table>
    </div>


                </div>
                 </div>
                          <div class="modal-footer">
      
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
             </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
              </div>

                  <!-- Gun delivery -->
  <div id="Delgun" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator">
                    <div class="form-group">
                    <div class="row">  
                             <div class="table-responsive">
                                 <table class="table color-bordered-table dark-bordered-table">
                                    <thead>
                                        <tr>
                                            <th>Gun type</th>
                                            <th>Gun name</th>
                                            <th width="150px">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pistol</td>
                                            <td>Dessert eagle</td>
                                            <td>
                                                 <input type="number" class="form-control"  min="1"  step="1" >
       
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            </br>
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
          <button type="button" class="btn btn-info waves-effect waves-light" >Deliver</button>

          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
             </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
              </div>
  @endsection

  @section('script')

  @endsection
