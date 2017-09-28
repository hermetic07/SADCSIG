  <!DOCTYPE html>
<html>
  <head>
    <link rel="icon" type="image/png" href="plugins/images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="plugins/images/favicon-16x16.png" sizes="16x16" />
    <title>Upload picture</title>
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

  </head>
  <!-- Preloader -->
      <div class="preloader">
          <div class="cssload-speeding-wheel"></div>
      </div>
<body>

      <div class="white-box">
        <div class="row">
          <div class="alert alert-success">
            <p align="center">Registration Success! Pls upload your 2x2 picture and image of your location. If not available just click upload later.</p>
          </div>
          <form action="{{URL::to('OnlineApplicant')}}" method="post" enctype="multipart/form-data">
            <br>

                  <div class="form-group">

                    <label class="col-xs-1 control-label">2x2 picture</label>

                    <div class="col-xs-4">
                    <input type="file" name="picture" id="input-file-max-fs" class="dropify-fr" 	data-max-height="226" data-max-width="226" data-mind-height="224" data-min-width="224" accept="image/*"/  data-default-file="plugins/images/Clients/personincharge.jpg">
                    <span class="font-13 text-muted">Only 2x2 picture is accepted<span>
                    </div>
                    <label class="col-xs-1 control-label"></label>
                    <label class="col-xs-1 control-label">Image of location</label>
                    <div class="col-xs-5">
                        <input type="file" name="locationpic" id="input-file-max-fs" class="dropify-fr" accept="image/*"/  data-default-file="plugins/images/Clients/location.jpg">
                        <span class="font-13 text-muted">Recommended: Screenshot from google map<span>

                    </div>
                  </div>

                <div class="col-lg-4  col-sm-4 col-xs-12">
                </div>
                <div class="col-lg-2 col-sm-4 col-xs-12">
                  <button  type="submit" name="sub" value="Upload Pictures" class="btn btn-block  btn-rounded btn-info">Upload picture</button>
                </div>

                  <div class="col-lg-2 col-sm-4 col-xs-12">
                    <button type="submit" name="sub" value="Upload Later" class="btn btn-block  btn-rounded btn-info">Continue anyway</button>
                  </div>



            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




      <footer class="footer text-center"> 2016 &copy; Evacle </footer>

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

      $('#slimtest4').slimScroll({
          color: '#FFFFFF',
          size: '10px',
          height: '820px',
          alwaysVisible: false
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
