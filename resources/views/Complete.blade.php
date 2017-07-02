<!DOCTYPE html>
<html>
  <head>

    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
     <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Footable CSS -->
     <link href="plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
     <link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Menu CSS -->
     <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
     <!-- animation CSS -->
     <link href="css/animate.css" rel="stylesheet">
   <!-- Wizard CSS -->
   <link href="plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
     <!-- Custom CSS -->
     <link href="css/style.css" rel="stylesheet">
     <!-- color CSS -->
     <link href="css/colors/MyThemeColor.css" id="theme"  rel="stylesheet">
     <!--alerts CSS -->
     <link href="js/Alert/sweetalert.css" rel="stylesheet" type="text/css">
     <!---switch -->
     <link href="plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
   	<link rel="stylesheet" href="plugins/bower_components/dropify/dist/css/dropify.min.css">
   	  <!-- Date picker plugins css -->
   <link href="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
   <!-- Daterange picker plugins css -->
   <link href="plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
   <link href="plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
   <script src="{{asset('js/jquery.min.js')}}"></script>
     <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script type="text/javascript">

   	  $(document).ready(function(){



   			var shift =1;
   			//Span for count of selected guards
               var value = parseInt($(".myspan").text(), 10) + 1;
   			//Span for the remaining guards that need to be selected to meet the limit
   			var value2 = parseInt($(".deploysecu").text(), 10) + 1;


   	  });

   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <style>
    #buttons {
      margin: auto;
    }
   </style>
  </head>
  <body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
    <!-- navbar-header -->
      <div class="navbar-header">
    <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>





     <!-- System logo-->
         <div class="top-left-part"><a class="logo" href="Dashboard.html"><b><img src="plugins/images/users/logoicon2.png" height="60" alt="Systemlogo" /></b><span class="hidden-xs"><img src="plugins/images/users/logotext2.png" height="40" alt="Systemname" /></span></a>
         </div>

     </div>
      <!-- /.navbar-header -->
    </nav>
    <!-- End Top Navigation -->

      <div class="white-box">
        <div class="row">
          <div class="alert alert-info">
            <p align="center">Below is the email where we will send your username and password</p>
          </div>
              <p align="center">Username: {{$email}} </p>
        </div>
      </div>



      <footer > <div class="navbar navbar-fixed-bottom">
        <div class="alert alert-info">
          <p align="center">2016 &copy; Evacle</p>
        </div>
      </div> </footer>
      <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Form Wizard JavaScript -->
      <script src="plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
      <!-- FormValidation -->
      <link rel="stylesheet" href="plugins/bower_components/jquery-wizard-master/libs/formvalidation/	formValidation.min.css">
      <!-- FormValidation plugin and the class supports validating Bootstrap form -->
      <script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
      <script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
      <script src="plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
      <!-- Footable -->
      <script src="plugins/bower_components/footable/js/footable.all.min.js"></script>
      <script src="plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
      <!--FooTable init-->
      <script src="js/footable-init.js"></script>
      <!--slimscroll JavaScript -->
      <script src="js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="js/waves.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="js/custom.min.js"></script>
      <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
      <!-- Date Picker Plugin JavaScript -->
      <script src="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

      	<!-- Date range Plugin JavaScript -->
      <script src="plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
      <script src="plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <script src="plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
      <script>

      $(document).ready(function() {



      });
      </script>
      <script>
                  $(document).ready(function(){
                      // Basic
                      $('.dropify').dropify();

                      // Translated
                      $('.dropify-fr').dropify({
                          messages: {
      							default: 'Please insert your 2x2 picture',
      							replace: 'Drag and drop or click to replace picture',
                              remove:  'Remove',
                              error:   'Please upload a 2x2 picture'
                          }
                      });

                      // Used events
                      var drEvent = $('#input-file-events').dropify();

                      drEvent.on('dropify.beforeClear', function(event, element){
                          return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                      });

                      drEvent.on('dropify.afterClear', function(event, element){
                          alert('File deleted');
                      });

                      drEvent.on('dropify.errors', function(event, element){
                          console.log('Has Errors');
                      });

                      var drDestroy = $('#input-file-to-destroy').dropify();
                      drDestroy = drDestroy.data('dropify')
                      $('#toggleDropify').on('click', function(e){
                          e.preventDefault();
                          if (drDestroy.isDropified()) {
                              drDestroy.destroy();
                          } else {
                              drDestroy.init();
                          }
                      })
                  });
              </script>
  </body>
</html>
