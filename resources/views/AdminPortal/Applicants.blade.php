@extends('AdminPortal.master2')

@section('Title') Applicants @endsection


@section('mtitle') Applicants  @endsection

@section('mtitle2')
                         <li class="active"><a href="{{url('/Applicants')}}"> Applicants/a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
               <div class="row">
                    <div class="col-sm-12" >
                        <div class="white-box">
                            <h3 class="box-title">Search</h3>
                            <form role="form" class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="form-group">
							           <input type="text" class="form-control" placeholder="Name"  />
                                    </div>
                                </div>
								                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <select class="selectpicker show-tick" data-style="form-control">
                                            <option value="">Province</option>
                                            <option value="1">Metro manila</option>
                                            <option value="2">Rizal</option>
                                            <option value="3">Cavite</option>
                                        </select>
                                    </div>
                                </div>
								                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <select class="selectpicker show-tick" data-style="form-control">
                                            <option value="">City</option>
                                            <option value="1">manila</option>
                                            <option value="2">caloocan</option>
                                            <option value="3">taguig</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-1">
                                    <button type="submit" class="btn btn-inverse btn-block form-control"><i class="fa fa-search"></i></button>
                                </div>

							</form>


                        </div>
                    </div>
                </div>

                    <div class="row  el-element-overlay">
            @foreach($employee as $e)
						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
                                        @if ($e->image!== null && $e->image!=="")
                                        <div class="el-card-avatar el-overlay-1">
                                           							 <a href="{{url('/SecuProfile')}}"><img src="uploads/{{$e->image}}" alt="user"  class="img-circle img-responsive"></a>
              																<div class="el-overlay">
              																	<ul class="el-info">
              																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="uploads/{{$e->image}}"><i class="icon-magnifier"></i></a></li>
                                                                  					<li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$e->id)}}"><i class="fa fa-info"></i></a></li>
                                                									</ul>
              																</div>
              													</div>
                                        @else
                                        <div class="el-card-avatar el-overlay-1">
                                                         <a href="{{url('/SecuProfile')}}"><img src="default/secu.png" alt="user"  class="img-circle img-responsive"></a>
                                              <div class="el-overlay">
                                                <ul class="el-info">
                                                  <li><a class="btn default btn-outline image-popup-vertical-fit" href="default/secu.png"><i class="icon-magnifier"></i></a></li>
                                                                            <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$e->id)}}"><i class="fa fa-info"></i></a></li>
                                                                  </ul>
                                              </div>
                                        </div>
                                        @endif

												</div>

										</div>



												<div class="col-md-8 col-sm-8" >

										 				<h3 class="box-title m-b-0" style="white-space:nowrap;">{{$e->first_name}} {{$e->middle_name}} {{$e->last_name}}</h3>


                                    					<div class="row m-t-0">
															<div class="col-md-12 b-r">
																<p>{{$e->email}}</p>
															</div>
														</div>
														<div class="row m-t-1">
															<div class="col-md-12 b-r">
																<p>{{$e->street}} {{$e->barangay}} {{$e->city}}</p>
                                        					</div>
														</div>
														<div class="row m-t-6">
                                        					<div class="col-md-6 b-r">
																<strong>Mobile</strong>
																<p>{{$e->cellphone}}</p>
                                        					</div>
															<div class="col-md-6">
																<strong>Telephone</strong>
																<p>{{$e->telephone}}</p>
															</div>
														</div>
												</div>

								</div>
              </br>
								<div class="row">
									<div class="col-sm-6">
													<button type="button" class="btn btn-block btn-success" onclick="fun_hire('{{$e->id}}')" ><i class="icon-user-following"></i> </i>Hire</button>
									</div>
											<div class="col-sm-6">
										        	<button type="button" class="btn btn-block btn-danger" onclick="fun_remove('{{$e->id}}')"><i class="icon-user-unfollow"></i> </i>Remove</button>
									</div>

								</div>

                             </div>
			  			</div>
              @endforeach



     				<div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination pagination-split">
                                <li class="pag_prev"> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
                                <li class="pag_next"> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
           </div>
        </div>
<!-- /.row -->

     </div>
<script type="text/javascript">



    $(document).ready(function()
    {
       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
       });
    })();
    function fun_hire(id)
    {

      var swalFunction = function () {
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
             showConfirmButton: false
          },
              function () {
                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
              });
      };


          swalExtend({
              swalFunction: swalFunction,
              hasCancelButton: true,
              buttonNum: 2  ,
              buttonColor: ["blue", "Blue"],
              buttonNames: ["Walk-in", "Online"],
              clickFunctionList: [
                  function () {

                    swal({
                            title: "Hire this applicant?",
                            text: "Send an email for their Account credentials",
                            type: "info",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Send email",
                            cancelButtonText: "No, cancel it",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }, function(isConfirm){
                            if (isConfirm) {
                              function doConnectFunction() {
                                $.ajax({
                                      url: '/HireEmployee',
                                      type:"POST",
                                       data: {

                                         "id":id

                                      },
                                      success: function(result){

                                          swal({
                                              title: result.fname ,
                                              text: "is now officially hired. \n\n"+ "Email: " + result.email + " Password: " + result.pw,
                                              imageUrl: "uploads/"+result.picture
                                            }, function(){
                window.location.href = "/Applicants";
              });



                                       }
                                     });
                            }
                            function doNotConnectFunction() {
                              swal({
                                      title: "No internet connection",
                                      text: "Unable to send an email. Hire the applicants anyway?",
                                      type: "warning",
                                      showCancelButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "Yes",
                                      cancelButtonText: "No, cancel it",
                                      closeOnConfirm: false,
                                      closeOnCancel: false
                                  }, function(isConfirm){
                                      if (isConfirm) {

                                          $.ajax({
                                                url: '/HireEmployee2',
                                                type:"POST",
                                                 data: {

                                                   "id":id

                                                },
                                                success: function(result){

                                                    swal({
                                                        title: result.fname ,
                                                        text: "is now officially hired. \n\n"+ "Email: " + result.email + " Password: " + result.pw,
                                                        imageUrl: "uploads/"+result.picture
                                                      }, function(){
                          window.location.href = "/Applicants";
                  });



                                                 }
                                               });



                                      } else {
                                          swal("Cancelled", "Email not sent", "error");
                                      }
                                  });
                            }

                            var i = new Image();
                            i.onload = doConnectFunction;
                            i.onerror = doNotConnectFunction;
                            // CHANGE IMAGE URL TO ANY IMAGE YOU KNOW IS LIVE
                            i.src = 'http://gfx2.hotmail.com/mail/uxp/w4/m4/pr014/h/s7.png?d=' + escape(Date());
                            // escape(Date()) is necessary to override possibility of image coming from cache



                            } else {
                                swal("Cancelled", "Email not sent", "error");
                            }
                        });
                  },
                  function () {
                    swal({
                title: "Confirmation code",
                text: "Input the stub code",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something"
              },
              function(inputValue){
                if (inputValue === false) return false;

                if (inputValue === "") {
                  swal.showInputError("You need to write something!");
                  return false
                }

                swal("Nice!", "You wrote: " + inputValue, "success");
              });
                  }
              ]
          });


    }






    function fun_remove(id)
    {
        $(".swalExtendButton").hide();
      swal({
          title: "Are you sure?",
          text: "Remove this applicant?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Proceed",
          closeOnConfirm: false
      }, function(){

        $.ajax({
            url: '/RemoveApplicant',
            type:"POST",
            data: {

              "id":id
            }

          })
        .done(function(data) {
    swal({
      title: "Deleted",
      text: "This item has been successfully deleted",
      type: "success"
    },function() {
      location.reload();
    });
    })
    .error(function(data) {
       swal("Oops", "We couldn't connect to the server!", "error");
     });
      });


    }
</script>
  @endsection
