@extends('SecurityGuardsPortal.master4')

@section('Title') Attendance @endsection


@section('mtitle') Your daily time record @endsection

@section('content')


<div class="row">

  <div class="col-md-12">
    <div class="white-box"  style="border: 2px solid black;">

    <div class="white-box">
      <div class="container">

              <div class="col-md-12 ">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          {!! $calendar->calendar() !!}
                      </div>
                  </div>
              </div>

      </div>
    </div>
    </div>
  </div>
</div>
@endsection


@section('script')
{!! $calendar->script() !!}

 @endsection
