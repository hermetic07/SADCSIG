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
  <!-- Footable CSS -->
  <link href="{{asset('plugins/bower_components/footable/css/footable.core.css')}}" rel="stylesheet">
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

  </head>

<!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

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

 			 <!-- Messages-->
 			 <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
 			 <div class="notify"><span class="heartbit"></span><span class="point"></span></div></a>
         	 </li>

 			 <!-- Announcements-->
 			 <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-bullhorn"></i></a>
              </li>

 			 <!-- Admin account-->
              <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/users/admin.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Ernest john Maskariño</b> <small>(Admin)</small>  </a>
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
          <div class="top-left-part"><a class="logo" href="index.html"><b><img src="{{asset('plugins/images/users/logoicon2.png')}}" height="60" alt="Systemlogo" /></b><span class="hidden-xs"><img src="plugins/images/users/logotext2.png" height="40" alt="Systemname" /></span></a>
          </div>

      </div>
       <!-- /.navbar-header -->
     </nav>
    <!-- End Top Navigation -->

     <!-- Left navbar-header -->
     <div class="navbar-default sidebar" role="navigation">
     <div class="sidebar-nav navbar-collapse  " id="slimtest4">
         <ul class="nav" id="side-menu">
           <span class="input-group-btn2	">
 		  		<!-- Company logo -->
 			  <li class="user-pro2"> <a href="#" class="waves-effect"><img src="{{asset('plugins/images/users/logobg.png')}}" height="80" alt="user-img"> <span class="hide-menu"></span></span ></a></li>
           </span>

           <li> <a href="index.html" class="waves-effect"><i class="fa fa-dashboard fa-4x fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
           </li>

           <li> <a href="javascript:void(0);" class="waves-effect active"><i class="fa fa-wrench fa-4x fa-fw"></i> <span class="hide-menu"> Maintenance </a>
              <ul class="nav nav-second-level">
                 <li> <a href="javascript:void(0)" class="waves-effect">Clients <span class="fa arrow"></span></a>
                     <ul class="nav nav-third-level">
                         <li> <a href="{{url('/Service')}}">Services</a> </li>
                         <li> <a href="{{url('/Nature')}}">Nature of business</a></li>
                     </ul>
                 </li>
                 <li> <a href="javascript:void(0)" class="waves-effect">Security guards <span class="fa arrow"></span></a>
                     <ul class="nav nav-third-level">
                          <li> <a href="{{url('/Requirement')}}">Requirements</a></li>
                          <li> <a href="{{url('/License')}}">Licences and clearances</a> </li>
                          <li> <a href="{{url('/Measurement')}}">Unit of Measurement</a></li>
                          <li> <a href="{{url('/Attribute')}}">Body attributes</a></li>
                          <li> <a href="{{url('/Military')}}">Military services</a></li>
                          <li> <a href="{{url('/Rank')}}">Rank</a></li>
                          <li> <a href="{{url('/Role')}}">Role</a></li>
               						<li> <a href="{{url('/Leave')}}">Leave</a></li>
                     </ul>
                 </li>
                 <li> <a href="javascript:void(0)" class="waves-effect">Others<span class="fa arrow"></span></a>
                     <ul class="nav nav-third-level">
                         <li> <a href="{{url('/Province')}}">Provinces</a></li>
                         <li> <a href="{{url('/Area')}}">Area</a></li>
                     </ul>
                 </li>
              </ul>
 		  </li>

           <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users fa-4x fa-fw"></i> <span class="hide-menu"> Clients </a>
              <ul class="nav nav-second-level">
                 <li> <a href="javascript:void(0)" class="waves-effect">Pending<span class="label label-rouded label-info pull-right">13</span></a>
                 </li>
 				<li> <a href="ActiveClients.html" class="waves-effect">Active<span class="label label-rouded label-info pull-right">13</span></a>
                 </li>
              </ul>
 		  </li>

           <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shield fa-4x fa-fw"></i> <span class="hide-menu"> Security guards </a>
              <ul class="nav nav-second-level">
                 <li> <a href="javascript:void(0)" class="waves-effect">Guards<span class="label label-rouded label-info pull-right">13</span></a>
                 </li>
 				<li> <a href="#" class="waves-effect">Guard licences<span class="label label-rouded label-info pull-right">13</span></a>
                 </li>
              </ul>
 		  </li>

 		  <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-truck fa-4x fa-fw"></i> <span class="hide-menu"> Delivery </a>
 		  </li>

 	      <li><a href="javascript:void(0);" class="waves-effect"><i class="fa fa-exchange fa-4x fa-fw"></i> <span class="hide-menu">Manual deployment</a>
 			 <ul class="nav nav-second-level">
                 <li> <a href="javascript:void(0)" class="waves-effect">Deploy</a>
                 </li>
 				<li> <a href="#" class="waves-effect">Swap</a>
                 </li>
              </ul>
 	      </li>

           <li> <a href="#" class="waves-effect"><i class="fa fa-file-text fa-4x fa-fw"></i> <span class="hide-menu">Reports<span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
               <li><a href="#">Guards</a></li>
               <li><a href="#">Client</a></li>
             </ul>
           </li>

           <li> <a href="#" class="waves-effect"><i class="fa fa-cogs fa-4x fa-fw"></i> <span class="hide-menu">Settings<span class="fa arrow"></span></span></a>
             <ul class="nav nav-second-level">
               <li><a href="#">Account settings</a></li>
             </ul>
           </li>


         </ul>
       </div>
     </div>
 	<!-- Left navbar-header end -->

 <!-- Add  Modal -->

    <div id="Add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          	<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">	</button>
					<h4 class="modal-title">@yield('addmodaltitle')</h4>
            	</div>
            	<div class="modal-body">
        <form action=@yield('addaction') method="POST" data-toggle="validator">
          {{ csrf_field() }}
          <div class="form-group">
            @yield('addmodalbody')
          </div>
            	</div>
             	<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="ClearFields();">Close</button>
					<button type="submit" class="btn btn-info waves-effect waves-light" >Submit</button>
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
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Edit</h4>
         </div>
         <div class="modal-body">
           <form action=@yield('editmodalurl') method="post">
             {{ csrf_field() }}
             @yield('editmodalcontent')
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="ClearFields();">Close</button>
              <button type="submit" class="btn btn-info waves-effect waves-light" >Submit</button>
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
            <li><a href="index.html">Dashboard</a></li>
            <li class="active">Maintenance</li>
			<li class="active"><a href="NatureOfBusiness.html">@yield('mtitle2')</a></li>
          </ol>
        </div>
      </div>


      <!-- .row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="white-box animated slideInUp ">
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                <th data-sort-initial="true" data-toggle="true" width="100px">ID</th>
                  @yield('theads')
                  <th data-sort-ignore="true" width="100px">Actions</th>
                </tr>
              </thead>
              	<div class="form-inline padding-bottom-15">
                	<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<button class="btn btn-warning btn-rounded waves-effect waves-light"  data-toggle="modal" data-target="#Add"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="model_img img-responsive"><span class="btn-label"><i class="fa fa-plus-circle"></i></span>Add</button>
								<small>Add data to the table  </small>
							</div>
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
                  @yield('tbodies')
              </tbody>
              <tfoot>
                <tr>
                  <td colspan=@yield('tdcolspan')></td>
                </tr>
              </tfoot>
        	</table>
          <input type="hidden" name="hidden_view" id="hidden_view" value=@yield('hiddenediturl')>
          <input type="hidden" name="hidden_delete" id="hidden_delete" value=@yield('hiddenedeleteurl')>
          <input type="hidden" name="hidden_status" id="hidden_status" value=@yield('hiddenestatusurl')>
            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>
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
<script src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!--slimscroll JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<!-- Footable -->
<script src="{{asset('plugins/bower_components/footable/js/footable.all.min.js')}}"></script>
<script src="{{asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<!--FooTable init-->
<script src="{{asset('js/footable-init.js')}}"></script>
<!-- Sweet-Alert  -->
 <script src="{{asset('js/Alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/Alert/jquery-alertcustom.js')}}"></script>
<!-- validation -->
<script src="{{asset('js/validator.js')}}"></script>
<!-- toast -->
<script src="{{asset('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {



      $(".switch").click(function(){
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
            height: '790px',
            alwaysVisible: false
        });
 </script>
@yield('ajaxscript')

</body>
</html>
