@extends('SecurityGuardsPortal.master4')

@section('Title') Notifications @endsection


@section('mtitle') Notifications @endsection

@section('content')


<div class="row">




               <div class="col-lg-12 col-sm-6 col-xs-6">
                   <div class="white-box">
                    <div class="comment-center">
                      @foreach($swap as $s)
                      <div class="comment-body">
                        <div class="user-img"> <img src="plugins\images\Clients\Active\ernest.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>(admin)</h5>
                          <span class="mail-desc">{{$s->message}}</span>
                          <span class="time pull-right">{{$s->created_at}}</span></div>
                      </div>
                      @endforeach
                     <!-- <div class="comment-body">
                        <div class="user-img"> <img src="plugins\images\Clients\Active\evander.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                          <h5>Ernest john maskariño (admin)</h5>
                          <span class="mail-desc">Your request for sick leave from 07/11/17 to 08/15/17 has been rejected</span>
                          <span class="label label-rounded label-danger">Rejected</span>
                          <span class="time pull-right">April 14, 2016 6:30 pm</span>
                        </div>
                      </div>!-->
                           </div>
                            </div>
      </div>
        </div>

@endsection


@section('script')


 @endsection
