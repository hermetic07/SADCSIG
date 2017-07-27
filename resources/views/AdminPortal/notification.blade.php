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
                     <p>1</p>
                 <div class="clearfix"></div>
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
                  <li class="tab active"><a data-toggle="tab" href="#1" aria-expanded="true">  <span>Deployment</span> </a> </li>
                  <li class="tab"><a data-toggle="tab" href="#2" aria-expanded="false">  <span>Request</span> </a> </li>
                  <li class="tab"><a aria-expanded="false" data-toggle="tab" href="#3">  <span >Security license</span> </a> </li>
                  </ul>
                  <div class="tab-content">
                  <div id="1" class="tab-pane active">
                     <p>1</p>
                  <div class="clearfix"></div>
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
               </div><!-- /tabs -->


        </div>
  @endsection
