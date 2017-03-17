@extends('AdminPortal.master2')

@section('Title') Swap @endsection


@section('mtitle') Swap  @endsection

@section('mtitle2') <li>Manual deployment</li>
                        <li class="active"><a href="{{url('/Swap')}}">Swap</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect active"> @endsection
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
								  <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-user"></i> Show guards </button>

                              </td>
                          </tr>
				 <tr>
                              <td>2</td>
                              <td>Luigi lacsina</td>
					 		  <td>7</td>
                              <td>
        <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-user"></i> Show guards </button>
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


		  	          <div class="col-lg-6 animated slideInRight guards" style="display:none">

          <div class="white-box">
			   <h4><center><strong>Daisy's list of security guards</strong></center></h4>
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                <th data-sort-initial="true" data-toggle="true">ID</th>
                  <th>Name</th>
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

                              <td>
								  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-exchange"></i> Swap</button>

                              </td>
                          </tr>
				 <tr>
                              <td>2</td>
                              <td>Luigi lacsina</td>
                              <td>
               			  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-exchange"></i> Swap</button>
                              </td>
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

		  <!-- Add military service modal -->
  <div id="Swap" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Luigi lacsina</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <div class="form-group">
				   <h4><center><strong>Clients</strong></center></h4>
					 <div class="row  el-element-overlay">
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
							        <button type="button" class="btn btn-block btn-info showguards" ><i class="fa fa-user"></i> Show guards </button>
                              </td>
                          </tr>
				 <tr>
                              <td>2</td>
                              <td>Luigi lacsina</td>
					 		  <td>7</td>
                              <td>
        <button type="button" class="btn btn-block btn-info showguards" ><i class="fa fa-user"></i> Show guards </button>
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
				    	          <div class="col-lg-12 animated slideInUp guardlist" style="display:none">
						 	   <h4><center><strong>Daisy's list of security guards</strong></center></h4>
					 <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>

			    <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="80px" ></th>
                <th>Guard's name</th>
                  <th  data-sort-ignore="true">Location</th>
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

                </div>
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
					 		  <td>Caloocan city</td>
						 				    <td>
								   <div class="radio radio-info">
                  <input type="radio" id="select1">
                  <label for="select1"> Select</label>
									   </td>
                          </tr>



              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4"></td>
                </tr>
              </tfoot>
        	</table>
			       </div>
            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>
               </div>
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
  @endsection


@section('script')
<script type="text/javascript">
jQuery(document).ready(function($){
 var click =0;
 $('.show').on('click', function(e){
   if (click == 0){

         click++;
   $(".guards").show();
   $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-6');
   }


 });

   var click2 =0;
 $('.showguards').on('click', function(e){
   if (click2 == 0){

         click++;
   $(".guardlist").show();
   }


 });


});
    $( document ).ready(function() {

         $('input[name="radio"]').click(function(){
       if($(this).attr("value")=="2"){
           $(".deploymentdate").show();
         }else{
          $(".deploymentdate").hide();
         }
       });

      $('#slimtest4').slimScroll({
           color: '#FFFFFF',
           size: '10px',
           height: '820px',
           alwaysVisible: false
     });

});

</script>
@endsection
