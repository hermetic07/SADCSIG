@extends('AdminPortal.master2')

@section('Title') Deployment History @endsection


@section('mtitle') Deployment History @endsection

@section('mtitle2')
                        <li class="active"><a href="{{url('/DeploymentHistory')}}"> Deployment History</a></li>  @endsection


                        @section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
                          @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
                            @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
                              @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection

@section('content')

<div class="row">
  <div class="white-box sttabs tabs-style-bar">
                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                          <thead>
                            <tr>
                              <th>Client</th>
                              <th>Post</th> 
                              <th>Date Deployed</th>    
                              <th data-sort-ignore="true" width="200px">Actions</th>
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
                          	@forelse($deployments_hist as $history)
                          		<tr>
                          			<td>
                          				<a href="{{route('admin.client.estab',$history->c_id)}}">{{$history->c_fname}}, {{$history->c_mname}} {{$history->c_lname}}</a>
                          			</td>
                          			<td>
                          				<a href="/ClientsDetails-{{$history->c_id}}+{{$history->estabID}}" target="_blank">{{$history->establishment}}</a>
                          				<p>{{$history->address}}, {{$history->area}}, {{$history->province}}</p>
                          			</td>
                          			<td>
                          				{{$history->dateDeployed}}
                          			</td>
                          			<td>
                          				<button class="btn btn-info btn-block view" value="{{$history->deploymentID}}"><i class="fa fa-list"></i> View Details</button>
                          			</td>
                          		</tr>
                          		@empty
                          			<tr>
                          				<h4>No History yet to show.</h4>
                          			</tr>
                          	@endforelse
                          </tbody>
                        </table>  	
                        <div class="row">
					        <div class="col-md-12 text-center">
					            <ul class="pagination pagination-split">
					                <li class="pag_prev" onclick="sentGuards()"> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
					                <li class="pag_next"> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
					            </ul>
					        </div>
					    </div>
  </div>
</div>

@endsection
@section('script')
	<script type="text/javascript">
	  $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	      });
	  	$(document).ready(function(){
	  		$('.view').on('click',function(){
	  			//alert($(this).val());
	  			$.ajax({
	  				url : '/DeploymentHistory-view',
	  				type : 'GET',
	  				data : {deploymentID:$(this).val()},
	  				success : function(data){
			    			console.log(data);
			    			$('.viewrequest').text('');
			    			$('.viewrequest').append(data);
			    			$('#modalview').modal('show');
			    		}
	  			});
	  		})

	  	});
	  	function fun_showGuards(){
	  		//alert("eRAL");
	  		$('#guardsDeployed').slideDown("slow");
	  	}
	  </script>    
@endsection

