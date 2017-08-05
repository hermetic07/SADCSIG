@extends('AdminPortal.master2')

@section('Title') Announcements @endsection


@section('mtitle') Announcements  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/Announcements')}}"> Announcements</a></li>  @endsection
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
			                <label class="col-xs-4 control-label"></label>
            <div class="col-lg-3">
          <button class="btn btn-success btn-block waves-effect waves-light" data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive"><span class="btn-label"><i class="fa fa-bullhorn"></i></span>Make an announcement</button>
</div>
			      </br>  </br>  </br>     </br>  </br>  </br>
			  					 <div class="row  el-element-overlay">

            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
				<th>Subject</th>
								<th>Content</th>
						  <th width="250px"data-sort-ignore="true" >Actions</th>
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

                     <td>Onsite visit</td>
                  <td>We will visit tomorrow caloocan city.</td>

					 				  <td> 	 &nbsp;
										       <button class="btn btn-warning  waves-effect waves-light" ><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>


                          </tr>
				                   <tr>

                     <td>Fire drill</td>
                  <td>On march 25, 2017, Be ready for the national fire drill day.</td>

					 				  <td> 		 &nbsp;
										       <button class="btn btn-warning  waves-effect waves-light" ><span class="btn-label"><i class="fa fa-edit"></i></span>Edit</button>
            <button class="btn btn-danger  waves-effect waves-light"><span class="btn-label"><i class="fa fa-times"></i></span>delete</button>

                          </tr>

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

		  <!-- Deliver guns -->
  <div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Message</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
                  <div class="row">
					<div class="form-group col-sm-6">
                       <label class="control-label">Subject:</label>
                     <input type="text" class="form-control" required>
                       <div class="help-block with-errors"></div>
                    </div>
					<div class="form-group col-sm-12	">
                       <label class="control-label">Content:</label>
                                    <textarea class="form-control"  rows="5"></textarea>
              <div class="help-block with-errors"></div>

                    </div>


                 </div>
                   <div class="help-block with-errors"></div>
                </div>
            </div>
             <div class="modal-footer">
				 					<button type="submit" class="btn btn-info waves-effect waves-light" >Submit</button>
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

     </div>\
  @endsection

  @section('script')

  @endsection
