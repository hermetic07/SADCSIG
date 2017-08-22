@extends('AdminPortal.master2')

@section('Title') Pickup @endsection


@section('mtitle') Pick up details  @endsection

@section('mtitle2')
                      <li>Delivery</li>
                         <li class="active"><a href="{{url('/Pickups')}}"> Pick up</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect active"> @endsection


@section('content')

<div class="row">
          <div class="col-lg-12	">

      <div class="white-box">
    <h4><center><strong>Delivery history</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
            <th data-sort-initial="true" data-toggle="true">ID</th>
              <th>Name</th>
      <th data-hide="phone, tablet" >Location</th>
    <th>Date delivered</th>
              <th data-sort-ignore="true" width="150px">Actions</th>
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
                          <td>1</td>
                          <td>Daisy ronquillo</td>
         <td>Manila</td>
            <td>Feb 11,2016</td>
                          <td>
              <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-list"></i> Show details </button>

                          </td>
                      </tr>
     <tr>
                          <td>2</td>
                          <td>Luigi lacsina</td>
        <td>Manila</td>
            <td>Feb 11,2016</td>

                          <td>
    <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-list"></i> Show details </button>
                          </td>
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


              <div class="col-lg-6 animated slideInRight guards" style="display:none">

      <div class="white-box">
     <h4><center><strong>Delivery details</strong></center></h4>
          </br>		  </br>		  </br>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="100">

          <tbody>
             <tr>
                          <td>Delivered by: </td>
                          <td>Daisy ronquillo</td>

                      </tr>
     <tr>
                          <td>Contact number:</td>
                          <td>091234567890</td>
                      </tr>
             <tr>
                          <td>Delivery code:</td>
                          <td>lxvLERIH</td>
                      </tr>
           <tr>
                          <td>Status:</td>
                          <td>On delivery</td>
                      </tr>
                     <tr>
                          <td>Received by:</td>
                          <td>Claimed</td>
                      </tr>
                       <tr>
                          <td>Item:</td>
                          <td>Guns</td>
                      </tr>

          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"></td>
            </tr>
          </tfoot>
      </table>
  </br>
       <h4><center><strong>Items</strong></center></h4>

                  <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="100">
          <thead>
            <tr>
              <th>Guntype</th>
      <th >gun</th>
      <th >serial number</th>
              <th data-sort-ignore="true" width="150px">status</th>
            </tr>
          </thead>
          <tbody>
             <tr>
                
                          <td>Pistol</td>
            <td>Glock 49</td>
                      <td>1223312</td>
                          <td>
                          claimed

                          </td>
                      </tr>
     <tr>
  
                          <td>shotgun</td>
            <td>spas</td>
              <td>1223312</td>
                          <td>
                          unclaimed
                          </td>
                      </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
            </tr>
          </tfoot>
      </table>

          </div>

              </div>
         </div>

  <!-- Add military service modal -->
<div id="Swap" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Luigi lacsina</strong></center></h4>
              </div>
              <div class="modal-body">
          <form data-toggle="validator">
            <div class="form-group">
      <label class="control-label">Choose an option</label>
              <div class="row">

               <div class="form-group col-sm-6">
             <div class="radio radio-info">
              <input type="radio" name="radio" id="radio3" value="1" checked="checked">
              <label for="radio3"> Permanent </label>
            </div>

                  <div class="help-block with-errors"></div>
               </div>
         <div class="form-group col-sm-6">

     <div class="radio radio-info">
              <input type="radio" name="radio" id="radio1" value="2">
              <label for="radio1"> Reliever </label>
            </div>
                   <div class="help-block with-errors"></div>
                </div>
       <label class="col-xs-3 control-label"></label>
              <div class="col-md-6">
              <div class="deploymentdate animated slideInLeft "  style="display:none;">
          <label class="control-label">To</label>
                                    <div class="input-group">
                  <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="noblank">
                </div>
        </div>
              </div>

             </div>
       <div class="row  el-element-overlay">
       <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
      <th data-sort-ignore="true" width="150px">Actions</th>
      <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="80px" ></th>
            <th>Guard's name</th>
              <th  data-sort-ignore="true">Location</th>

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
              <td>
               <div class="radio radio-info">
              <input type="radio" id="select1">
              <label for="select1"> Select</label>
            </div>
                          <td>
            <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                               <a href="{{url('/SecuProfile')}}"><img src="2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                    <div class="el-overlay">
                      <ul class="el-info">
                                                  <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                        </ul>
                    </div>
              </div>
            </div>
             </td>
                          <td>Abel mandap</td>
            <td>Caloocan city</td>
                      </tr>



          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
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
         <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info waves-effect waves-light" >Submit</button>
         </div>
        </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- /Add military service modal -->

 </div>

  @endsection
  @section('script')
  <script type="text/javascript">
jQuery(document).ready(function($){
 var click =0;
 $('.show').on('click', function(e){
   if (click == 0){

         click++;
   $(".guards").show();
   $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-6');
   }


 });


});
    $( document ).ready(function() {

         $('input[name="radio"]').click(function(){
       if($(this).attr("value")=="2"){
           $(".deploymentdate").show();
         }else{
          $(".deploymentdate").hide();
         }
       });

      $('#slimtest4').slimScroll({
           color: '#FFFFFF',
           size: '10px',
           height: '820px',
           alwaysVisible: false
     });

});

</script>
  @endsection
