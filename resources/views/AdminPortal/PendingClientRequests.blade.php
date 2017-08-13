@extends('AdminPortal.master2')

@section('Title') Pending clients request @endsection


@section('mtitle') Pending clients request @endsection

@section('mtitle2') <li>Clients</li>
                        <li class="active"><a href="{{url('/PendingClientRequests')}}"> Pending request</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')
@php
    $deployedCtr = 0;
    $estabImage = "";
@endphp

<div class="row">
   <div class="sttabs tabs-style-linetriangle white-box">
       <nav>
            <ul>
              <li><a href="#section-linetriangle-1"><span>Deployment</span></a></li>
               <li><a href="#section-linetriangle-2"><span>Guard replacement</span></a></li>
               <li><a href="#section-linetriangle-3"><span>Service</span></a></li>
             </ul>
           </nav>
             <div class="content-wrap">
               <section id="section-linetriangle-1">
    @foreach($contracts as $contract)
        @if($contract->status == 'pending')
            @foreach($tempDeployments as $tempDeployment)
                @if($tempDeployment->contract_ID == $contract->id)
                    @foreach($tempDeploymentDetails as $tempDeploymentDetail)
                        @if($tempDeploymentDetail->temp_deployments_id == $tempDeployment->temp_deployment_id)
                            @foreach($clientDeploymentNotifs as $clientDeploymentNotif)
                                @if($clientDeploymentNotif->notif_id == $tempDeployment->messages_ID)
                                    @foreach($acceptedGuards as $acceptedGuard)
                                        @if($acceptedGuard->client_deployment_notif_id == $clientDeploymentNotif->client_deloyment_notif_id)
                                            @if($acceptedGuard->guard_reponse == 'confirmed')
                                                @php
                                                    $deployedCtr++;
                                                @endphp
                                            @endif
                                            
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
            @foreach($clientPic as $clientP)
                @if($clientP->stringContractId == $contract->id)
                    @php
                        $estabImage = $clientP->stringestablishment;
                    @endphp
                @endif
            @endforeach
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 content" >
                <div class="white-box p-0 pro-box pro-horizontal" style="border: 1px solid black;">
                    <div class="col-sm-4 pro-list-img" style="background: url(uploads/{{$estabImage}}) center center / cover no-repeat;">
                        <span class="pro-label label label-inverse">
                            <a class="text-white"  href="ClientDetails.html">
                                <i class="icon-info"></i>&nbsp;&nbsp;More info
                            </a>
                        </span> 
                    </div>
                    <div class="col-sm-8">
                        <div class="pro-content">
                            <div class="pro-list-details col-sm-6">
                                <h4 class="p-t-10">
                                    <a class="text-dark" href="javascript:void(0)">{{$contract->establishment_name}}</a>
                                </h4>
                                <h4 class="text-danger">
                                    @foreach($establishments as $establishment)
                                        @if($establishment->contract_id == $contract->id)
                                            @foreach($natures as $nature)
                                                @if($nature->id == $establishment->natures_id)
                                                    {{$nature->name}}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </h4>
                            </div>
                            <div class="pro-list-info col-sm-6">
                                <ul class="pro-info text-muted m-b-0">
                                    <li>
                                        <span><img src="plugins/images/Clients/Active/security-guard.png"></span>
                                        <span>Security guards needed</span>
                                        <span class="pull-right text-inverse">
                                            {{$contract->guard_count}}
                                        </span>
                                    </li>
                                    
                                    <br>
                                    <div class="progress progress-md">
                                        <div class="progress-bar progress-bar-info active progress-bar-striped" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" style="width: 50%" role="progressbar">{{$deployedCtr}} / {{$contract->guard_count}}
                                        </div>
                                    </div>
                                    <center><a id="deployedGuards" href="/DeploymentStatus+{{$contract->id}}" name="{{$contract->id}}"> <small> Security guards deployed </small></a> </center>
                                </ul>
                                </div>
                                <div class="col-sm-12">
                                    <div class="pro-agent">
                                        <div class="agent-img">
                                            <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/Active/chris.jpg"></a>
                                        </div>
                                        <div class="agent-name">
                                            <h5 class="m-b-0">{{$contract->pic_fname}},{{$contract->pic_lname}}</h5> <small class="text-muted">Person in charge</small>
                                        </div>
                                    </div>
                                    <div class="pro-location hidden-xs hidden-xs hidden-xs">
                                        <span class="pull-right text-muted">
                                            <i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>
                                            @foreach($areas as $area)
                                                @if($area->id == $contract->areas_id)
                                                    @foreach($provinces as $province)
                                                        @if($area->province_id == $province->id)
                                                            {{$contract->address}},{{$area->name}}, {{$province->name}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
   
    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="pagination pagination-split">
                <li class="pag_prev" onclick="sentGuards()"> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
                <li class="pag_next"> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
            </ul>
        </div>
    </div>

       </section>
       
<section id="section-linetriangle-2">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="row  el-element-overlay">
						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
                             							 <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
																<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>
                                                <span class="label label-rouded label-warning center">Pending</span>

										</div>
                          
										

												<div class="col-md-8 col-sm-8">
							
										 				<h3 class="box-title m-b-0">Ernest john maskarino</h3>
						
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>Pureza, sta.mesa, manila, philippines.</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>9999999999</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>99999999999</p>
															</div>
														</div>
												</div>

								</div>
                                <div class="pro-agent-col-3">
                                <div class="agent-img">
                                    <a href="javascript:void(0)"><img alt="img" class="thumb-md img-circle" src="plugins/images/Clients/establishments/pup.jpg"></a>
                                </div>
                                <div class="agent-name">
                                    <h5 class="m-b-0">Polytechnic university of the philippines</h5> <small class="text-muted">Client</small> </div>
                            </div>
						
		
                             </div>
                             	<div class="row">
													<button data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-block btn-info" >
                                                    replace guards</button>

											                         
								</div>
			  			</div>
			
			  
			  
     				<div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination pagination-split">
                                <li class="pag_prev"> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
                                <li class="pag_next"> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>

</section>
                               <section id="section-linetriangle-3"><h2>Tabbing 3</h2></section>
                             </div><!-- /content -->
                           </div><!-- /tabs -->
<script type="text/javascript">
    // $.ajaxSetup({
    //   headers: {
    //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   }
    // });
    //    $('#deployedGuards').on('click',function(){
    //     //alert(this.name);
    //     $.ajax({
    //         data: this.name,
    //         type: 'GET',
    //         url : this.href,
    //         success:function(data){
    //             alert(data);
    //         }

    //     });
    //    });
    </script>
  @endsection
  @section('script')

  @endsection
