@extends('ClientPortal.master3')

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
                  <label for="example-email" class="col-md-1">Username</label>
                   <div class="col-md-5">
                     <input type="email" placeholder="sample" class="form-control form-control-line" name="example-email" id="example-email">
                   </div>
                         <label class="col-md-1">Password</label>
                   <div class="col-md-5">
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
               </form>
         </div>
       </div>
     </div>

@endsection


@section('script')


 @endsection
