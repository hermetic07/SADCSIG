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
                      <label  class="col-sm-1">Employee ID</label>
                        <input type="text" name="Employee-id" id="emp-id" list="emp-list" class="col-sm-3" >
                        <datalist id="emp-list">
                          @foreach($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->id}}</option>
                          @endforeach
                        </datalist>
                    </div>
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
                <section id="section-shape-2">

                    <div class="col-sm-12">
                      <div class="row">
                        <label  class="col-sm-1">Client ID</label>
                        <input type="text" name="Client-id" id="client-id" list="client-list" class="col-sm-3" >
                        <datalist id="client-list">
                          @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->id}}</option>
                          @endforeach
                        </datalist>
                      </div>
                      <br>
                      <div class="row">
                        <label for="cfirst" class="col-sm-1">First Name</label><input type="text" id="cfirst" value="" class="col-sm-3">
                        <label for="cmid" class="col-sm-1">Middle Name</label><input type="text" id="cmid" value="" class="col-sm-3">
                        <label for="clast" class="col-sm-1">Last Name</label><input type="text" id="clast" value="" class="col-sm-3">
                      </div>
                      <div class="row">
                        <label for="cstreet" class="col-sm-1">Address</label><input type="text" id="cstreet" value="" class="col-sm-3">
                        <label for="ccity" class="col-sm-1">City</label><input type="text" id="ccity" value="" class="col-sm-3">
                        <label for="cemail" class="col-sm-1">Email</label><input type="text" id="cemail" value="" class="col-sm-3">
                      </div>
                      <br>
                      <div class="row">
                        <input type="button" class="btn btn-success col-sm-12" id="cgo" value="GO">
                      </div>
                      <br>
                    </div>
                    <table id="table" class="table table-bordered table-hover toggle-circle color-bordered-table muted-bordered-table">
                      <thead>
                        <th>Client ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Cellphone</th>
                        <th>Telephone</th>
                      </thead>
                      <tbody id="ctablebody">

                      </tbody>
                    </table>

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
    // $("input[name='Employee-id']").on('input', function(e){
    //     var selected = $(this).val();
    //     alert(selected);
    // });
    $("#go").click(function() {
     //alert($("input[name='Employee-id']").val());
      $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      }); 
      
      $.ajax({
        type: 'post',
        url: '/Admin-Queries-Employee',
        data: {
            'id':$("input[name='Employee-id']").val(),
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
          //alert("Panget ni Ernest!! Walang Leeg...");
         // alert(data);
          
          if (data == 1) {
            alert("Panget ni Ernest!! Walang Leeg...");
            swal("No Record Found", "Please try to input other values.", "error");
          }
          else
          {
            $("#tablebody").html(data);
          }
        }
      });
    });
    $("#cgo").click(function() {
      $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      }); 
      $.ajax({
        type: 'post',
        url: '/Admin-Queries-Client',
        data: {
            'id':$("input[name='Client-id']").val(),
            'first':$("#cfirst").val(),
            'mid': $("#cmid").val(),
            'last': $("#clast").val(),
            'street': $("#cstreet").val(),
            'city': $("#ccity").val(),
            'email': $("#cemail").val(),
        },
        success: function(data){
          if (data == 1) {
            alert("Panget ni Ernest!! Walang Leeg...");
            swal("No Record Found", "Please try to input other values.", "error");
          }
          else
          {
            $("#ctablebody").html(data);
          }
        }
      });
    });
  </script>
  @endsection
