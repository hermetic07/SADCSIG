@extends('AdminPortal.master2')

@section('Title') Billing Period @endsection


@section('mtitle') Billing Period  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/BillingPeriod')}}"> Billing Period </a></li>  @endsection
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
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


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
				  <th data-hide="phone, tablet" >Due date</th>
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
					 		  <td>March 17,2017</td>
                              <td>
							 			  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-receipt"></i> Send invoice</button>

                              </td>
                          </tr>
				 <tr>
                              <td>2</td>
                              <td>Luigi lacsina</td>
					 		  <td>March 17,2017</td>
                              <td>
       	  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-receipt"></i> Send invoice</button>
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
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Send Statement of account</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					                  <div class="form-group col-sm-2">
                      <label class="control-label">ID</label>
                           <p class="form-control-static"> 2 </p>
                      <div class="help-block with-errors"></div>
                   </div>
					<div class="form-group col-sm-5">
                       <label class="control-label">Client name</label>
                          <p class="form-control-static"> Daisy ronquillo </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-5">
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
                       <label class="control-label">Guards deployed</label>
                          <p class="form-control-static"> 10 </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-6">
                       <label class="control-label">Service period</label>
                           <p class="form-control-static"> March 1-15, 2017 </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  								<div class="col-xs-12">
														           <label class="control-label">Statement of account</label>
                                  <input type="file" id="input-file-max-fs" class="dropify-fr"  accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
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
<!-- /Add military service modal -->

     </div>


  @endsection

  @section('script')
  <script>
              $(document).ready(function(){
                  // Basic
                  $('.dropify').dropify();

                  // Translated
                  $('.dropify-fr').dropify({
                      messages: {
  							default: 'Upload your file',
  							replace: 'Drag and drop or click to replace file',
                          remove:  'Remove',
                          error:   'Please upload a valid file'
                      }
                  });

                  // Used events
                  var drEvent = $('#input-file-events').dropify();

                  drEvent.on('dropify.beforeClear', function(event, element){
                      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                  });

                  drEvent.on('dropify.afterClear', function(event, element){
                      alert('File deleted');
                  });

                  drEvent.on('dropify.errors', function(event, element){
                      console.log('Has Errors');
                  });

                  var drDestroy = $('#input-file-to-destroy').dropify();
                  drDestroy = drDestroy.data('dropify')
                  $('#toggleDropify').on('click', function(e){
                      e.preventDefault();
                      if (drDestroy.isDropified()) {
                          drDestroy.destroy();
                      } else {
                          drDestroy.init();
                      }
                  })
              });
          </script>
  @endsection
