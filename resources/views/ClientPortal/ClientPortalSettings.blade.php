@extends('ClientPortal.master3')
@section('Title') Settings @endsection
@section('clientName')
   {{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}
@endsection
@section('link_rqst')
  href="/Request-{{$client->id}}"
@endsection
@section('link_guardsDTR')
  href="/ClientPortalGuardsDTR-{{$client->id}}"
@endsection
@section('link_estab')
   href="/ClientPortalEstablishments-{{$client->id}}"
@endsection
@section('link_home')
  href="/ClientPortalHome-{{$client->id}}"
@endsection
@section('link_messages')
  href="/ClientPortalMessages-{{$client->id}}"
@endsection
@section('mtitle') Requests @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection
@section('link_settings')
  href="/ClientPortalSettings-{{$client->id}}"
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="white-box"  style="border: 2px solid black;">
      <br>
      <form class="form-horizontal form-material">
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <div class="row">
                
                <div class="col-md-5">
                  <label for="example-email" class="col-md-1">Username</label>
                  <input type="email" placeholder="{{$client->email}}" class="form-control form-control-line" name="example-email" id="example-email">
                </div>
                
                 <div class="col-md-5">
                  <label class="col-md-1">Password</label>
                   <input type="password" value="password" class="form-control form-control-line">
                 </div>
               </div>
             </div>
            <div class="form-group">
              <div class="row">
                <label for="example-email" class="col-md-1">Phone No.</label>
                <div class="col-md-3">
                  <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                </div>
                <label class="col-md-1">Telephone No.</label>
                <div class="col-md-3">
                  <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                </div>
                <label class="col-md-1">Email address</label>
                <div class="col-md-3">
                  <input type="email" placeholder="fred@gmail.com" class="form-control form-control-line" name="example-email" id="example-email">
                </div>
               </div>
             </div>
             <div class="form-group">
               <div class="col-sm-12">
                 <button class="btn btn-success">Update Profile</button>
               </div>
             </div>
           </div>

          <div class="col-md-3">
            <center>
              <image src="uploads/{{$client->image}}">
            </center>
            <br>
            <center>
              <a href="#" class="btn btn-info btn-lg btn-block">
                <span class="glyphicon glyphicon-edit"></span> Edit
              </a>
            </center>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection


@section('script')


 @endsection
