@extends('ClientPortal.master3')

@section('Title') Guards DTR @endsection


@section('mtitle') Daily Time Record @endsection

@section('content')



         <div class="row">

       <div class="col-md-12">

         <div class="white-box"  style="border: 2px solid black;">
        <div class="container">

                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$emp->first_name}} {{$emp->midlle_name}} {{$emp->last_name}}'s Attendances</div>
                        <div class="panel-body">
                            {!! $calendar->calendar() !!}
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
