@extends('AdminPortal.master2')

@section('Title') Guard DTR @endsection


@section('mtitle') Guard Attendance Record  @endsection

@section('mtitle2')

                         <li> GuardsDTR</li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


<div class="row">
		          <div class="col-lg-12	">

          <div class="white-box">
            <div class="container">

                    <div class="col-md-10 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">Guard Daily Time Record</div>
                            <div class="panel-body">
                                {!! $calendar->calendar() !!}
                            </div>
                        </div>
                    </div>

            </div>

					 </div>
					   </div>


              <!-- /.modal-dialog -->
            </div>
<!-- /Add military service modal -->

     </div>\
  @endsection

  @section('script')

  {!! $calendar->script() !!}
  @endsection
