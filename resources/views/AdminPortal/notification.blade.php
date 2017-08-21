@extends('AdminPortal.master2')

@section('Title') Notification @endsection


@section('mtitle') Notification @endsection

@section('mtitle2')
                        <li class="active"><a href="{{url('/Notifications')}}"> Notifications</a></li>  @endsection


                        @section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
                          @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
                            @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
                              @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection

@section('content')

<div class="row">
  <div class="white-box sttabs tabs-style-bar">
                 <nav>
                   <ul>
                     <li><a href="#section-bar-1" class="sticon fa fa-user"><span>Clients</span></a></li>
                     <li><a href="#section-bar-2" class="sticon fa fa-shield"><span>Security Guards</span></a></li>
                   </ul>
                 </nav>
                 <div class="content-wrap">
                   <section id="section-bar-1">
                     <div class="vtabs">
             <ul class="nav tabs-vertical">
               <li class="tab active"><a data-toggle="tab" href="#1" aria-expanded="true">  <span>Deployment</span> </a> </li>
               <li class="tab"><a data-toggle="tab" href="#2" aria-expanded="false">  <span>Request</span> </a> </li>
               <li class="tab"><a aria-expanded="false" data-toggle="tab" href="#3">  <span >Payment</span> </a> </li>
             </ul>
             <div class="tab-content">
               <div id="1" class="tab-pane active">
                    <div class="col-lg-12 col-sm-6 col-xs-6">
                    <div class="comment-center">
                      <div class="comment-body">
                        <div class="user-img"> <img src="plugins\images\Clients\Active\ernest.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>Ernest john maskariño (polytechnic university of the philippines)</h5>
                          <span class="mail-desc">4 guards accepted and 3 guards rejected out of 8. 1 more guard. </span>
                          <span class="label label-rounded label-info">PENDING</span>
                          <span class="time pull-right">April 14, 2016 6:30 pm</span></div>
                      </div>
                      <div class="comment-body">
                        <div class="user-img"> <img src="plugins\images\Clients\Active\evander.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>Evander Macandog (Petron)</h5>
                          <span class="mail-desc">Accepted all guards. </span>
                          <span class="label label-rounded label-success">Complete</span>
                          <span class="time pull-right">April 14, 2016 6:30 pm</span>
                        </div>
                      </div>
                      @foreach($notifications as $notification)
                        @if($notification->status == "active")
                          <a href="ClientsDetails-{{$notification->client_id}}+{{$notification->estab_id}}"> 
                            <div class="comment-body">
                              <div class="user-img"> <img src="uploads/{{$notification->image}}" alt="user" class="img-circle"></div>
                              <div class="mail-contnet">
                                <h5>{{$notification->name}} ({{$notification->establishment}})</h5>
                                <span class="mail-desc">All Guards are deployed. </span>
                                <span class="label label-rounded label-success">Complete</span>
                                <span class="time"><h6>{{$notification->date}}</h6></span>
                              </div>
                            </div>
                          </a>
                        @else
                          <a href="{{route('manual.deployment')}}"> 
                            <div class="comment-body">
                              <div class="user-img"> <img src="uploads/{{$notification->image}}" alt="user" class="img-circle"></div>
                              <div class="mail-contnet">
                                <h5>{{$notification->name}} ({{$notification->establishment}})</h5>
                                <span class="mail-desc">New establisment to serve. Need {{$notification->guard_count}} initial guards.</span>
                                <span class="label label-rounded label-danger">Initial deployment</span>
                                <span class="time"><h6>{{$notification->date}}</h6></span>
                              </div>
                            </div>
                          </a>
                        @endif
                      @endforeach
                    </div>
                </div>
              </div>
               <div id="2" class="tab-pane">
                     <p>2.</p>
               </div>
               <div id="3" class="tab-pane">
                   <p>3</p>
               </div>
             </div>
           </div>
</section>
                   <section id="section-bar-2">
                     <div class="vtabs">
                  <ul class="nav tabs-vertical">
                  <li class="tab active"><a data-toggle="tab" href="#11" aria-expanded="true">  <span>Deployment</span> </a> </li>
                  <li class="tab"><a data-toggle="tab" href="#22" aria-expanded="false">  <span>Request</span> </a> </li>
                  <li class="tab"><a aria-expanded="false" data-toggle="tab" href="#33">  <span >Security license</span> </a> </li>
                  </ul>
                  <div class="tab-content">
                  <div id="11" class="tab-pane active">
                    <div class="col-lg-12 col-sm-6 col-xs-6">
                    <div class="comment-center">
                      <div class="comment-body">
                        <div class="user-img"> <img src="plugins/images/SecurityGuards/2x2 2.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>Guard 1</h5>
                          <span class="mail-desc">Rejected the offer from Polytechnic university of the philippines </span>
                          <span class="label label-rounded label-danger">Rejected</span>
                          <span class="time pull-right">April 14, 2016 6:30 pm</span></div>
                      </div>
                      <div class="comment-body">
                        <div class="user-img"> <img src="plugins/images/SecurityGuards/2x2.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>Guard 2 </h5>
                          <span class="mail-desc">Accepted the offer from Petron</span>
                          <span class="label label-rounded label-success">Accepted</span>
                          <span class="time pull-right">April 14, 2016 6:30 pm</span>
                        </div>
                      </div>
                    </div>
                </div>
                  <div class="clearfix"></div>
                  </div>
                  <div id="22" class="tab-pane">
                    <div class="col-lg-12 col-sm-6 col-xs-6">
                    <div class="comment-center">
                      <div class="comment-body">
                        <div class="user-img"> <img src="plugins/images/SecurityGuards/2x2 2.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>Guard 1</h5>
                          <span class="mail-desc">Requesting for a sick leave from 07/17/17 to 08/15/17.</span>
                          <span class="label label-rounded label-info">Polytechnic university of the philippines</span>
                          <span class="time pull-right">April 14, 2016 6:30 pm</span></div>
                      </div>
                      <div class="comment-body">
                        <div class="user-img"> <img src="plugins/images/SecurityGuards/2x2.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>Guard 2 </h5>
                          <span class="mail-desc">equesting for a vacation leave from 07/17/17 to 08/15/17.</span>
                          <span class="label label-rounded label-info">Petron</span>
                          <span class="time pull-right">April 14, 2016 6:30 pm</span>
                        </div>
                      </div>
                    </div>
                       </div>
                  </div>
                  <div id="33" class="tab-pane">
                   <p>3</p>
                  </div>
                  </div>
                  </div>

                   </section>
               </div><!-- /tabs -->


  @endsection
        </div>

     
