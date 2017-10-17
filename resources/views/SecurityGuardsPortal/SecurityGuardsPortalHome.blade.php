@extends('SecurityGuardsPortal.master4')

@section('Title') Home @endsection


@section('mtitle') Home @endsection

@section('content')


      <div class="row">
		  <div class="col-lg-9">




          <div class="white-box"  style="border: 2px solid black;">
			  <center>  <h1> <i class="fa fa-bullhorn text-danger"></i> Announcement </h1></center>
			  </br>
					<div class="steamline">
            @foreach($a as $a)
                  <div class="sl-item">
                    <div class="sl-left"> <img src="plugins/images/users/admin.jpg" alt="user" class="img-circle"/> </div>
                    <div class="sl-right">
                      <div class="m-l-40"><a href="#" class="text-info">{{$a->subject}}</a> <span  class="sl-date">{{$a->created_at}}</span>
                        <p class="m-t-10"> {{$a->details}} </p>
                      </div>
                    </div>
                  </div>
            @endforeach


				  <div class="sl-item">
                    <div class="sl-left"> <img src="plugins/images/users/admin.jpg" alt="user" class="img-circle"/> </div>
                    <div class="sl-right">
                      <div class="m-l-40"><a href="#" class="text-info">(Admin)</a> <span  class="sl-date"></span>
                        <p class="m-t-10"> End Of Announcements</p>
                      </div>
                    </div>




          </div>
        </div>
      </div>

		  </div>




		  		              <div class="col-md-3">

              <div class="white-box">
			  <canvas id="canvas" width="350" height="250">
</canvas>

              </div>

	          <div class="white-box">
                <h3 class="box-title">Delivery</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-truck text-info"></i></li>
                  <li class="text-right"><span class="counter">2</span></li>
                </ul>
              </div>
		    <div class="white-box">
                <h3 class="box-title">Unread messages</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-envelope text-warning"></i></li>
                  <li class="text-right"><span class="counter">5</span></li>
                </ul>
              </div>

            </div>
    </div>


@endsection


@section('script')


 @endsection
