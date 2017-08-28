<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="plugins/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="plugins/images/favicon-16x16.png" sizes="16x16" />

  <!-- title -->
  <title>Maintenance || @yield('Maintenance Title')</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- datatable CSS -->
  <link href="{{asset('plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
  <!-- Menu CSS -->
  <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
  <!-- toast CSS -->
  <link href="{{asset('plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
  <!-- animation CSS -->
  <link href="{{asset('css/animate.css')}}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <!-- color CSS -->
  <link href="{{asset('css/colors/MyThemeColor.css')}}" id="theme"  rel="stylesheet">
  <!--alerts CSS -->
  <link href="{{asset('js/Alert/sweetalert.css')}}" rel="stylesheet" type="text/css">
  <!---switch -->
  <link href="{{asset('plugins/bower_components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />

  <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.js')}}"></script>
	<script
		src="{{asset('js/bootstrap.min.js')}}"></script>
  </head>

<!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

<!-- fix header and sidebar -->
<body class="fix-header fix-sidebar" >
  <div id="wrapper">

    <!-- fix header and sidebar -->
    <body class="fix-header fix-sidebar">

      <div id="wrapper">
          <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
    	  <!-- navbar-header -->
          <div class="navbar-header">
    		<a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

              <ul class="nav navbar-top-links navbar-left hidden-xs">
              	<li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
    		  </ul>

           	  <ul class="nav navbar-top-links navbar-right pull-right">

    			  	 <!-- Incident report -->
    			 <li class="dropdown">
    			   <a class="waves-effect waves-light" href="{{url('/IncidentReports')}}">
    				 <span class="mytooltip tooltip-effect-7">
                        <span class="tooltip-item">
    					  <i class="fa fa-warning"></i>
    				      <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
    					</span>
                        <span class="tooltip-table2 clearfix">
                          <span class="tooltip-texth2">
    			 Reports
    					  </span>
                        </span>
                     </span>
    			   </a>
            	 </li>
    			 <!-- Messages-->
    			 <li class="dropdown">
    			   <a class="waves-effect waves-light" href="{{url('/Messages')}}">
    				 <span class="mytooltip tooltip-effect-7">
                        <span class="tooltip-item">
    					  <i class="icon-envelope"></i>
    				      <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
    					</span>
                        <span class="tooltip-table2 clearfix">
                          <span class="tooltip-texth2">
    					  Messages
    					  </span>
                        </span>
                     </span>
    			   </a>
            	 </li>

    			 <!-- Announcements-->
    			 <li class="dropdown">
    				 <a class="waves-effect waves-light" href="{{url('/Announcements')}}">
    					 <span class="mytooltip tooltip-effect-7">
    						 <span class="tooltip-item">
    							 <i class="fa fa-bullhorn"></i>
    					 </span>
                          <span class="tooltip-table2 clearfix">
                          <span class="tooltip-texth">
    						Announcements
    					  </span>
                          </span>
                        </span>
    				</a>
                 </li>



    			 <!-- Admin account-->
                 <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/users/admin.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Ernest</b> <small>(Admin)</small>  </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a> </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>

    		 <!-- System logo-->
             <div class="top-left-part"><a class="logo" href="Dashboard.html"><b><img src="plugins/images/users/logoicon2.png" height="60" alt="Systemlogo" /></b><span class="hidden-xs"><img src="plugins/images/users/logotext2.png" height="40" alt="Systemname" /></span></a>
             </div>

         </div>
          <!-- /.navbar-header -->
        </nav>
        <!-- End Top Navigation -->

    <!-- Left navbar-header -->
     @include('includes.AdminNavBar')
	<!-- Left navbar-header end -->

 <!-- Add  Modal -->

    <div id="Add" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          	<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h4 class="modal-title">@yield('addmodaltitle')</h4>
            	</div>
            	<div class="modal-body">
        <form action=@yield('addaction') method="post" data-toggle="validator">
          {{ csrf_field() }}

            @yield('addmodalbody')


             	<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="ClearFields();">Close</button>
					<button type="submit" id="add" class="btn btn-info waves-effect waves-light" >Submit</button>
				</div>
				</form>
          		</div>
			</div>
      </div>
	</div>

   <!-- /Add Modal -->


   <!-- Edit Modal start -->
   <div class="modal fade" id="Edit" role="dialog">
     <div class="modal-dialog">

       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
           <h4 class="modal-title">Edit</h4>
         </div>
         <div class="modal-body">
           <form action=@yield('editmodalurl') method="post" data-toggle="validator">
             {{ csrf_field() }}
             @yield('editmodalcontent')
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="ClearFields();">Close</button>
              <button type="button" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <input type="hidden" id="edit_id" name="edit_id">
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
   <!-- Edit code ends -->

  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">@yield('mtitle')</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="{{url('/Dashboard')}}">Dashboard</a></li>
            <li class="active">Maintenance</li>
			<li class="active">@yield('mtitle2')</li>
          </ol>
        </div>
      </div>


      <!-- .row -->
      <div class="row">
        <div class="col-lg-12" >
          <div class="white-box">
              <label class="col-xs-5 control-label"></label>
            <div class="col-lg-2">
          <button class="btn btn-success btn-block waves-effect waves-light"  data-toggle="modal" data-target="#Add"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="model_img img-responsive"><span class="btn-label"><i class="fa fa-plus-circle"></i></span>Add</button>
</div>
        </br>  </br>  </br>
            <div class="table-responsive" >
            <table id="table" class="table table-bordered table-hover toggle-circle color-bordered-table muted-bordered-table">
              <thead>
                <tr>
                  @yield('theads')
                  <th width="100px">Status</th>
                  <th width="250px">Actions</th>

                </tr>
              </thead>
              <tbody>
                  @yield('tbodies')
              </tbody>
            </table>
            </div>

          <input type="hidden" name="hidden_view" id="hidden_view" value=@yield('hiddenediturl')>
          <input type="hidden" name="hidden_delete" id="hidden_delete" value=@yield('hiddenedeleteurl')>
          <input type="hidden" name="hidden_status" id="hidden_status" value=@yield('hiddenestatusurl')>
         </div>
        </div>
      </div>
      <!-- /.row -->
  </div>

       <footer class="footer text-center"> 2016 &copy; Evacle </footer>
    </div>
</div>
<!-- /#wrapper -->


<!-- jQuery and switch -->
<script src="{{asset('plugins/bower_components/switchery/dist/switchery.min.js')}}"></script>

<!--slimscroll JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<!-- datatables -->
<script src="{{asset('plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>

<!-- Sweet-Alert  -->
 <script src="{{asset('js/Alert/sweetalert.min.js')}}"></script>

<!-- validation -->
<script src="{{asset('js/validator.js')}}"></script>
<script src="{{asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<!-- toast -->
<script src="{{asset('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>

    <script>

    var myInput = document.querySelectorAll("input[type=number]");

function keyAllowed(key) {
  var keys = [8, 9, 13, 16, 17, 18, 19, 20, 27, 46, 48, 49, 50,
    51, 52, 53, 54, 55, 56, 57, 91, 92, 93
  ];
  if (key && keys.indexOf(key) === -1)
    return false;
  else
    return true;
}

myInput.forEach(function(element) {
  element.addEventListener('keypress', function(e) {
    var key = !isNaN(e.charCode) ? e.charCode : e.keyCode;
    if (!keyAllowed(key))
      e.preventDefault();
  }, false);

  // Disable pasting of non-numbers
  element.addEventListener('paste', function(e) {
    var pasteData = e.clipboardData.getData('text/plain');
    if (pasteData.match(/[^0-9]/))
      e.preventDefault();
  }, false);
})
$(document).ready(function() {


  $('#Add').on('hidden.bs.modal', function()
    {
  $(this).find('form').trigger('reset');
    $('.col-md-12').find('help-block with-errors').hide();
 $('.form-group').removeClass('has-error has-feedback');

    if ( $(this).hasClass('has-error') ) {
      $('.form-group').find('.help-block').show();
    } else {
      $('.form-group').find('.help-block').hide();
    }

          $(this).removeClass('selected');

    }) ;

    $('#Edit').on('hidden.bs.modal', function()
      {
        $('.selected').removeClass('selected');
    $(this).find('form').trigger('reset');
      $('.col-md-12').find('help-block with-errors').hide();
   $('.form-group').removeClass('has-error has-feedback');
    $('#table').removeClass('selected');
      if ( $(this).hasClass('has-error') ) {
        $('.form-group').find('.help-block').show();
      } else {
        $('.form-group').find('.help-block').hide();
      }

      }) ;

      $(".sw").click(function(){
           $.toast({
            heading: 'Status change',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
          });

     });

});
</script>


<!-- script for switch -->
 <script>
 jQuery(document).ready(function() {
    // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });


 });

	 //clearing textfields
           function ClearFields() {
                  Nob.value = "";
           }

           function ClearFields2() {
                  Nob2.value = "";
           }

	 //Scrollbar
        $('#slimtest4').slimScroll({
            color: '#FFFFFF',
            size: '10px',
            height: '720px',
            alwaysVisible: false
        });
 </script>
@yield('ajaxscript')

</body>
</html>
