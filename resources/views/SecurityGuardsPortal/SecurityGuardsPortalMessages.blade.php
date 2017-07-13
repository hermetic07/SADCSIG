@extends('SecurityGuardsPortal.master4')

@section('Title') Messages @endsection


@section('mtitle') Messages @endsection

@section('content')



<!-- /.row -->    <div class="row">
             <div class="col-lg-12	">

         <div class="white-box">
                     <label class="col-xs-5 control-label"></label>
           <div class="col-lg-2">
         <button class="btn btn-success btn-block waves-effect waves-light"  data-toggle="modal" data-target="#Add"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="model_img img-responsive"><span class="btn-label"><i class="fa fa-pencil-square-o"></i></span>Compose</button>
</div>
           </br>  </br>  </br>     </br>  </br>  </br>
                  <div class="row  el-element-overlay">

           <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
             <thead>
               <tr>
         <th width="100px">Sender</th>
                <th>Name</th>
        <th> Date </th>
       <th>Subject</th>
             <th width="50px"data-sort-ignore="true" >Actions</th>
               </tr>
             </thead>
               <div class="form-inline padding-bottom-15">
                 <div class="row">
           <div class="col-sm-6">
           </div>
                     <div class="col-sm-6 text-right m-b-20">
                     <div class="form-group">
                         <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
               autocomplete="off">
            </div>
                      </div>
                  </div>
               </div>
             <tbody>
                <tr>

           <td>        <center>         <div class="el-card-item" style="padding-bottom: 5px;" >
            <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                             <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
                  <div class="el-overlay">
                    <ul class="el-info">
                                                <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                      </ul>
                  </div>
            </div>
            </div>
                    <span class="label label-table label-danger">Agency</span>        </center></td>
                 <td>Ernest john maskarino</td>
                    <td>Jan-28-2017 09:52 PM</td>
                 <td>Your Security guard's pool</td>

                   <td> 	 &nbsp;
          <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Message"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button></td>

                         </tr>
                <tr>


           <td>
        <center>         <div class="el-card-item" style="padding-bottom: 5px;" >
 <div class="el-card-avatar el-overlay-1" style="width: 65%;">
                  <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
       <div class="el-overlay">
         <ul class="el-info">
                                     <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                           </ul>
       </div>
 </div>
 </div>
         <span class="label label-table label-success">Client</span>        </center>
           </td>
                 <td>Ernest john maskarino</td>
                    <td>Jan-28-2017 09:52 PM</td>
                 <td>Guard replacement request</td>

                   <td> 	 &nbsp;
          <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Message"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-envelope"></i> </button></td>

                         </tr>

                <tr>



          <td>
        <center>            <div class="el-card-item" style="padding-bottom: 5px;" >
<div class="el-card-avatar el-overlay-1" style="width: 65%;">
                 <a href="SecurityGuardsProfile.html"><img src="plugins/images/Clients/Active/ernest.jpg"  alt="user"  class="img-circle img-responsive"></a>
      <div class="el-overlay">
        <ul class="el-info">
                                    <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                          </ul>
      </div>
</div>
</div>

       <span class="label label-table label-info">Security guard</span>  </center>
     </td>
                 <td>Ernest john maskarino</td>
                    <td>Jan-28-2017 09:52 PM</td>
                 <td>Leave request</td>

                   <td> 	 &nbsp;
          <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Message"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-envelope"></i> </button></td>

                         </tr>
             </tbody>
             <tfoot>
               <tr>
                 <td colspan="5"></td>
               </tr>
             </tfoot>
         </table>

           <div class="text-right">
             <ul class="pagination">
             </ul>
           </div>

             </div>

          </div>
            </div>
  <!-- Deliver guns -->
<div id="Message" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Message</strong></center></h4>
                </div>
                <div class="modal-body">
                  <form data-toggle="validator">
                      <div class="row">
                        <div class="form-group col-sm-12">
                          <label class="control-label">Subject:</label>
                          <p class="form-control-static">Job offer from a client</p>
                        </div>
                        <div class="form-group col-sm-12 	">
                          <label class="control-label">Content:</label>
                          </br>


                          <div class="col-md-12">
                          </br>

                              <h3>PolyTechnic university of the philippines</h3>
                              <div class="text-muted"><span class="m-r-10">June 16, 2017 08:30pm </span></div>
                                        </br>
                              <p>Hello! we are proudly to announce you that our client selects you to be part of their security team! A great oppurtunity indeed. Now once you accept this offer, you must report to our office as soon as possible to process this job order. Thank you and have a good day!</p>

  </br>
                          </div>

                          <div class="col-md-6">
                            <img class="img-responsive" alt="user" src="plugins/images/Clients/establishments/pup.jpg"  >
                          </div>
                                  <div class="col-md-6">

                                                    <div class="white-box">
                                                        <h5 class="box-title fw-500">Essential Information</h5>
                                                        <hr class="m-0">
                                                        <div class="table-responsive pro-rd p-t-10">
                                                            <table class="table">
                                                                <tbody class="text-dark">
                                                                    <tr>
                                                                        <td>Client name</td>
                                                                        <td>Earl dixon Geraldez</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Starting date</td>
                                                                        <td>July 11, 2015</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Guards</td>
                                                                      <td>10</td>

                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-12">



                                                                      <div class="table-responsive pro-rd p-t-10">
                                                                          <table class="table">
                                                                              <tbody class="text-dark">
                                                                                  <tr>
                                                                                      <td>Address</td>
                                                                                      <td>Anonas, Santa Mesa, Maynila, Kalakhang Maynila</td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>Person in charge</td>
                                                                                      <td>Abel Mandap</td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                    <td>Shift</td>
                                                                                    <td>6:30am to 7:30pm  </td>
                                                                                  </tr>

                                                                              </tbody>
                                                                          </table>
                                                                      </div>
  </br>
    </br>
                                                              </div>

                                                                <div class="col-md-4"></div>
                                        <button class="fcbtn btn btn-success btn-outline btn-1e">Accept</button>
                                        <button type="button" class="fcbtn btn btn-danger btn-outline btn-1e" onclick="reject()">Reject</button>
                        </div>
                      </div>
                    </form>
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
        </div>

@endsection


@section('script')
<script>
function reject()
{
  $('#Message').modal('hide');
  swal({
    title: "Awww. We do understand",
    text: "What will be the problem?",
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

    swal("Thank you!", "Your reason: " + inputValue, "success");
  });

}
</script>
 @endsection
