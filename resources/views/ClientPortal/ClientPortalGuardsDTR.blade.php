@extends('ClientPortal.master3')

@section('Title') Guards' DTR @endsection


@section('mtitle') Your security guards daily time record @endsection

@section('content')



<div class="row">
	<div class="col-lg-12	">
    <div class="white-box">
			<div class="row  el-element-overlay white-box">
				<h4><center><strong>Security guards</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
					     <th data-sort-ignore="true" width="90px"></th>
                <th>Name</th>
                <th  width="220px" >Shift</th>
                <th>Deployed for</th>
                <th>Role</th>
                <th>Date Deployed</th>
                <th data-sort-ignore="true">Actions</th>
            </tr>
          </thead>
          <div class="form-inline padding-bottom-15">
            <div class="row">
						  <div class="col-sm-6"></div>
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
                @foreach($serviceRequests as $serviceRequest)
                  @if($deployment->service_requests_id == $serviceRequest->id)
                    @if($serviceRequest->establishments_id == $establishment->id)
                      @foreach($deploymentDetails as $deploymentDetail)
                        @if($deploymentDetail->deployments_id == $deployment->id)
                         @if($deploymentDetail->status == 'active')
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
                              <td>
                                @foreach($employees as $employee)
                                  @if($employee->id == $deploymentDetail->employees_id)
                                    {{ $employee->first_name }}  {{ $employee->last_name }}
                                  @endif
                                @endforeach
                              </td>
                              <td>
                                From: {{ $deploymentDetail->shift_from }}  To: {{ $deploymentDetail->shift_to }}
                              </td>
                              <td>
                                @foreach($services as $service)
                                  @if($service->id == $serviceRequest->services_id)
                                    {{ $service->name }}
                                  @endif
                                @endforeach
                              </td>
                              <td>
                                {{ $deploymentDetail->role }}
                              </td>
                              <td>
                                {{ $deploymentDetail->created_at }}
                              </td>
                              <td>
                                <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-calendar"></i> Show DTR </button>
                              </td>
                            </tr>
                          @endif
                        @endif
                      @endforeach
                    @endif
                  @endif
                @endforeach
              @endforeach
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


		  	          <div class="col-lg-6 animated slideInRight guards" style="display:none">

          <div class="white-box">
            <div id="calendar" ></div>
          </div>


					        </div>
					   </div>


                </div>

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
