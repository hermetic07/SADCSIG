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
         <a class="waves-effect waves-light" data-toggle="dropdown" href="#">
            <i class="fa fa-warning"></i>
              <div class="notify"><span class="heartbit"></span><span class="point"></span></div>

         </a>
         <ul class="dropdown-menu mailbox animated bounceInDown">
           <li>
             <div class="drop-title">4 new Incident reports</div>
           </li>
           <li>
             <div class="message-center"> <a href="#">
               <div class="user-img"> <img src="plugins\images\Clients\Active\ernest.jpg" alt="user" class="img-circle"> </div>
               <div class="mail-contnet">
                 <h5>Ernest John maskarino</h5>
                 <span class="mail-desc">Robbery</span> <span class="time">9:30 AM</span> </div>
               </a> <a href="#">
               <div class="user-img"> <img src="plugins\images\Clients\Active\evander.jpg" alt="user" class="img-circle"> </div>
               <div class="mail-contnet">
                 <h5>Evander Macandog</h5>
                 <span class="mail-desc">Police reports</span> <span class="time">9:10 AM</span> </div>
               </a>

               </a> </div>
           </li>
           <li> <a class="text-center" href="{{url('/IncidentReports')}}"> <strong>See all reports</strong> <i class="fa fa-angle-right"></i> </a></li>
         </ul>
         <!-- /.dropdown-IR -->
           </li>
           <!-- Messages-->
           <li class="dropdown">
             <a class="waves-effect waves-light"  data-toggle="dropdown" href="#">

                <i class="icon-envelope"></i>
                  <div class="notify"><span class="heartbit"></span><span class="point"></span></div>

             </a>
             <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
              <div class="drop-title">You have 4 new messages</div>
            </li>
            <li>
              <div class="message-center"> <a href="#">
                <div class="user-img"> <img src="plugins\images\Clients\Active\chris.jpg" alt="user" class="img-circle"> </div>
                <div class="mail-contnet">
                  <h5>Chris jerico</h5>
                  <span class="mail-desc">Ang ganda ng serbisyo nyo</span> <span class="time">9:30 AM</span> </div>
                </a> <a href="#">
                <div class="user-img"> <img src="plugins\images\Clients\Active\luigi.jpg"alt="user" class="img-circle">  </div>
                <div class="mail-contnet">
                  <h5>Luigi Lacsina</h5>
                  <span class="mail-desc">good morning!</span> <span class="time">9:10 AM</span> </div>
            </li>
            <li> <a class="text-center" href="{{url('/Messages')}}"> <strong>See all messages</strong> <i class="fa fa-angle-right"></i> </a></li>
          </ul>
          <!-- /.dropdown-messages -->
               </li>

           <!-- Notifications -->
           <li class="dropdown">
             <a class="waves-effect waves-light" data-toggle="dropdown" href="#">
                   <i class="fa fa-bell"></i>
            </a>
            <ul class="dropdown-menu mailbox animated bounceInDown">
           <li>
             <div class="drop-title">4 new notifications</div>
           </li>
           <li>
             <div class="message-center"> <a href="#">
               <div class="user-img"> <img src="plugins\images\Clients\Active\luigi.jpg" alt="user" class="img-circle"> </div>
               <div class="mail-contnet">
                 <h5>Luigi Lacsina</h5>
                 <span class="mail-desc">Additional guards request</span> <span class="time">9:30 AM</span> </div>
               </a> <a href="#">
               <div class="user-img"> <img src="plugins\images\Clients\Active\evander.jpg"alt="user" class="img-circle">  </div>
               <div class="mail-contnet">
                 <h5>Evander</h5>
                 <span class="mail-desc">Rejected guards  </span> <span class="time">9:10 AM</span> </div>
           </li>
           <li> <a class="text-center" href="{{url('/Messages')}}"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a></li>
         </ul>
           </li>

             <!-- task -->
             <li class="dropdown">
               <a class="waves-effect waves-light" data-toggle="dropdown" href="#">
                  <i class="icon-note"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
               </a>
               <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                 <li>
                   <div class="drop-title">Deployment status</div>
                 </li>
                           <li> <a href="#">
                             <div>
                               <p> <strong>Polytechnic university of the philippines</strong> <span class="pull-right text-muted">6/10 Complete</span> </p>
                               <div class="progress progress-striped active">
                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                               </div>
                             </div>
                             </a> </li>
                           <li class="divider"></li>
                           <li> <a href="#">
                             <div>
                               <p> <strong>Petron</strong> <span class="pull-right text-muted">2/10 Complete</span> </p>
                               <div class="progress progress-striped active">
                                 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="10" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                               </div>
                             </div>
                             </a> </li>
                           <li class="divider"></li>

                           <li class="divider"></li>
                           <li> <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a> </li>
                         </ul>
                         <!-- /.dropdown-tasks -->

                 </li>

             <!-- Announcements-->
             <li class="dropdown">
               <a class="waves-effect waves-light" href="{{url('/Announcements')}}">

                     <i class="fa fa-bullhorn"></i>

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