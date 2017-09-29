@extends('AdminPortal.master2')

@section('Title') Queries @endsection


@section('mtitle') Queries  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/Reports')}}"> Reports</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


<div class="row">
        <div class="col-lg-12	">

    <div class="white-box">
          <svg class="hidden">
            <defs>
              <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
            </defs>
          </svg>

            <div class="sttabs tabs-style-shape">
              <nav>
                <ul>
                  <li>
                    <a href="#section-shape-1">
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <span>Employees</span>
                    </a>
                  </li>
                  <li>
                    <a href="#section-shape-2">
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <span>Clients</span>
                    </a>
                  </li>


                </ul>
              </nav>
              <div class="content-wrap">
                <section id="section-shape-1">
                  <div class="col-sm-12">
                    <div class="row">
                      <label for="first" class="col-sm-1">First Name</label><input type="text" id="first" value="" class="col-sm-3">
                      <label for="mid" class="col-sm-1">Middle Name</label><input type="text" id="mid" value="" class="col-sm-3">
                      <label for="last" class="col-sm-1">Last Name</label><input type="text" id="last" value="" class="col-sm-3">
                    </div>
                    <div class="row">
                      <label for="street" class="col-sm-1">Street</label><input type="text" id="street" value="" class="col-sm-3">
                      <label for="barangay" class="col-sm-1">Barangay</label><input type="text" id="barangay" value="" class="col-sm-3">
                      <label for="city" class="col-sm-1">City</label><input type="text" id="city" value="" class="col-sm-3">
                    </div>
                    <br>
                    <div class="row">
                      <label for="gender" class="col-sm-1">Gender</label><input type="text" id="gender" value="" class="col-sm-3">
                      <label for="email" class="col-sm-1">Email</label><input type="text" id="email" value="" class="col-sm-3">
                      <label for="status" class="col-sm-1">Status</label><input type="text" id="status" value="" class="col-sm-3">
                    </div>
                    <br>
                    <div class="row">
                      <input type="button" class="btn btn-success col-sm-12" id="go" value="GO">
                    </div>
                    <br>
                  </div>
                  <table id="table" class="table table-bordered table-hover toggle-circle color-bordered-table muted-bordered-table">
                    <thead>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Status</th>
                    </thead>
                    <tbody id="tablebody">

                    </tbody>
                  </table>
                </section>
                <section id="section-shape-2"></section>
                <section id="section-shape-3"></section>
              </div><!-- /content -->
            </div><!-- /tabs -->


        </div>


       </div>


      </div>

  @endsection

  @section('script')
  <script type="text/javascript">
        (function() {

                  [].slice.call( document.querySelectorAll( '.sttabs' ) ).forEach( function( el ) {
                      new CBPFWTabs( el );
                  });

              })();
  </script>
  <script type="text/javascript">
    $("#go").click(function() {
      $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      }); 
      $.ajax({
        type: 'post',
        url: '/Admin-Queries-Employee',
        data: {
            'first':$("#first").val(),
            'mid': $("#mid").val(),
            'last': $("#last").val(),
            'street': $("#street").val(),
            'barangay': $("#barangay").val(),
            'city': $("#city").val(),
            'gender': $("#gender").val(),
            'email': $("#email").val(),
            'status': $("#status").val(),
        },
        success: function(data){
            $("#tablebody").html(data);
        }
      });
    });
  </script>
  @endsection
