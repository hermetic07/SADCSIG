@extends('AdminPortal.master2')

@section('Title') Replace @endsection


@section('mtitle') Replace  @endsection

@section('mtitle2') <li>Manual deployment</li>
                        <li class="active"><a href="{{url('/Replace')}}">Replace</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect active"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')
<div class="row">
        <div class="col-lg-12	">
            <div class="white-box">
               <h4><center><strong>Clients</strong></center></h4>
               <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                  <thead>
                   <tr>
                     <th>Name</th>
                     <th data-hide="phone, tablet" >Location</th>
                     <th data-sort-ignore="true" width="150px">Actions</th>
                   </tr>
                  </thead>
                <div class="form-inline padding-bottom-15">
                  <div class="row">
                    <div class="col-sm-6">
                    </div>
                      <div class="col-sm-6 text-right m-b-20">
                        <div class="form-group">
                          <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"  autocomplete="off">
                       </div>
                     </div>
                  </div>
                </div>
                <tbody>

                  <tr>
                  <td>Daisy ronquillo</td>
                  <td>Manila</td>
                  <td>
                  <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-user"></i> Show guards </button>
                  </td>
                  </tr>
                  
                  <tr>
                  <td>Luigi lacsina</td>
                  <td>Makati</td>
                  <td>
                  <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-user"></i> Show guards </button>
                  </td>
                  </tr>
                </tbody>
                <tfoot>
                <tr>
                <td colspan="3"></td>
                </tr>
                </tfoot>
             </table>
      <div class="text-right">
        <ul class="pagination">
        </ul>
      </div>
</div>

  <!-- Client's list of security guards -->

   <div class="col-lg-6 animated slideInRight guards" style="display:none">
      <div class="white-box">
       <h4><center><strong>Daisy's list of security guards</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
        <thead>
          <tr>
            <th>Name</th>
            <th data-sort-ignore="true" width="150px">Actions</th>
          </tr>
        </thead>
          <div class="form-inline padding-bottom-15">
            <div class="row">
               <div class="col-sm-6">
               </div>
                <div class="col-sm-6 text-right m-b-20">
                  <div class="form-group">
                      <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                   </div>
                </div>
             </div>
          </div>
        <tbody>

           <tr>        
           <td>Daisy ronquillo</td>
           <td>
            <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-exchange"></i> Replace</button>
           </td>
           </tr>

           <tr>         
            <td>Luigi lacsina</td>
            <td>
            <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-exchange"></i> Replace</button>
            </td>
           </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
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


<!-- Replace modal -->
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
                       <input type="radio" name="radio" id="radio1" value="1" checked="checked">
                       <label for="radio1"> Permanent </label>
                     </div>
                     <div class="help-block with-errors"></div>
                 </div>
                <div class="form-group col-sm-6">
                 <div class="radio radio-info">
                   <input type="radio" name="radio" id="radio2" value="2">
                   <label for="radio2"> Reliever </label>
                 </div>
                 <div class="help-block with-errors"></div>
                </div>
                   <div class="form-group col-sm-4">
                     <label class="control-label">Shift</label>
                      <p class="form-control-static" id="allow_days">5:00am-5:00pm</p>
                     <div class="help-block with-errors"></div>
                  </div>  
                   <div class="form-group col-sm-8">
                     <label class="control-label">Client's establishment name</label>
                      <p class="form-control-static" id="allow_days">Polytechnic university of the philippines</p>
                     <div class="help-block with-errors"></div>
                  </div>  
               <label class="col-xs-3 control-label"></label>
                    <div class="deploymentdate"  style="display:none;">                      
                       <div class="col-md-12">
                                         <div class="row">
                  <div class="form-group col-sm-3">
                    <label class="control-label">Leave type</label>
                      <p class="form-control-static" id="notif_days">Sick leave</p>
                 </div>
                  <div class="form-group col-sm-3">
                     <label class="control-label">Notification period (days)</label>
                      <p class="form-control-static" id="notif_days">3</p>
                     <div class="help-block with-errors"></div>
                  </div>
                 <div class="form-group col-sm-3">
                     <label class="control-label">Notification date</label>
                      <p class="form-control-static" id="notif_days">07/11/18</p>
                     <div class="help-block with-errors"></div>
                  </div>
                   <div class="form-group col-sm-3">
                     <label class="control-label">Allowable days</label>
                      <p class="form-control-static" id="allow_days">5</p>
                     <div class="help-block with-errors"></div>
                  </div>
                </div>

                   <div class="form-group col-sm-4">
                     <label class="control-label">Start date</label>
                      <p class="form-control-static" id="allow_days">07/11/18</p>
                     <div class="help-block with-errors"></div>
                  </div>  
                   <div class="form-group col-sm-4">
                     <label class="control-label">Requested end date</label>
                      <p class="form-control-static" id="allow_days">07/16/18</p>
                     <div class="help-block with-errors"></div>
                  </div>  
                                     <div class="form-group col-sm-4">
                      <label class="control-label">End date of reliever</label>
                        <div class="input-group">
                         <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control firstcal" id="firstcal" placeholder="mm/dd/yyyy" name="to"/>
                       </div>
                     <div class="help-block with-errors"></div>
                  </div>  
                </div>

                        
                    </div>
                  </br> </br>
                  </div>
 
                 <h4><center><strong>List of available guards for replacement</strong></center></h4>
                <div class="row  el-element-overlay">
                   <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                     <thead>
                       <tr>
                        <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="80px" ></th>
                       <th>Guard's name</th>
                       <th  data-sort-ignore="true">Location</th>
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
           <td>
            <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
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
          <td>
                <div class="radio radio-info">
                  <input type="radio" name="select" id="radio3" value="option3">
                  <label for="radio3"> Select </label>
                </div>

          </td>
          </tr>

           <tr>
           <td>
            <div class="el-card-item">
              <div class="el-card-avatar el-overlay-1">
                <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                  <div class="el-overlay">
                    <ul class="el-info">
                      <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                    </ul>
                  </div>
               </div>
             </div>
           </td>
          <td>Abel mandap 2</td>
          <td>Caloocan city</td>
          <td>
                <div class="radio radio-info">
                  <input type="radio" name="select" id="radio4" value="option4">
                  <label for="radio4"> Select </label>
                </div>
          </td>
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
<!-- /Replace modal -->

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


 $(function() {
     $(".firstcal").datepicker({
         dateFormat: "mm/dd/yy"

 });

 });


</script>
@endsection
