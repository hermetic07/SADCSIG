@extends('SecurityGuardsPortal.master4')

@section('Title') Settings @endsection


@section('mtitle') Settings @endsection

@section('content')



      <div class="row">
       <div class="col-md-12">
         <div class="white-box"  style="border: 2px solid black;">
         </br>
                <form class="form-horizontal form-material">
                 <div class="form-group">
                     <div class="row">
                            <label for="example-email" class="col-md-1">Email</label>
                            <div class="col-md-3">
                              <input type="email" placeholder="sample" value="{{$employee->email}}" class="form-control form-control-line" name="email">
                            </div>
                            <label for="example-email" class="col-md-1">Phone No.</label>
                             <div class="col-md-3">
                                <input type="text" placeholder="123 456 7890" value="{{$employee->cellphone or 'none' }}" class="form-control form-control-line" name="cellphone">
                             </div>
                             <label class="col-md-1">Telephone No.</label>
                             <div class="col-md-3">
                                 <input type="text" value="{{$employee->telephone or 'none' }}" class="form-control form-control-line" name="telephone">
                             </div>
                     </div>
                 </div>
                 <div class="form-group">
                   <div class="col-sm-12">
                     <button id="updateprofile" class="btn btn-success">Update Profile</button>
                   </div>
                 </div>
               </form>
         </div>
       </div>
     </div>

     <div class="row">
      <div class="col-md-12">
        <div class="white-box"  style="border: 2px solid black;">
        </br>
               <form class="form-horizontal form-material">
                <div class="form-group">
                    <div class="row">
                      <label class="col-md-1">Old Password</label>
                      <div class="col-md-3">
                        <input type="password" name="old_pass" value="{{$employee->password}}" class="form-control form-control-line">
                      </div>
                      <label class="col-md-1">New Password</label>
                      <div class="col-md-3">
                        <input type="password" name="new_pass" class="form-control form-control-line">
                      </div>
                      <label class="col-md-1">Confirm Password</label>
                      <div class="col-md-3">
                        <input type="password" name="confirm_pass" class="form-control form-control-line">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-5">
                    <button id="updatepass" class="btn btn-success">Change Password</button>
                  </div>
                </div>
              </form>
        </div>
      </div>
     </div>
@endsection


@section('script')

<script type="text/javascript">
$('#updateprofile').on('click', function(e){

  $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type: 'post',
    url: '/EmployeeUpdateProfile',
    data: {
        '_token': $('input[name=_token]').val(),
        email:$('input[name=email]').val(),
        cellphone:$('input[name=cellphone]').val(),
        telephone:$('input[name=telephone]').val(),
    },
    success: function(data){
        alert(data);
    }
  });
})

$('#updatepass').on('click', function(e){

  $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var newp = $('input[name=new_pass]').val();
  var confp = $('input[name=confirm_pass]').val();
  if (newp===confp) {
    $.ajax({
      type: 'post',
      url: '/EmployeeUpdatePassword',
      data: {
          '_token': $('input[name=_token]').val(),
          oldp:$('input[name=old_pass]').val(),
          newp:$('input[name=new_pass]').val(),
      },
      success: function(data){
          alert(data);
      }
    });
  }
  else {
    alert("Confirm Password doest not match");
  }
})
</script>

 @endsection
