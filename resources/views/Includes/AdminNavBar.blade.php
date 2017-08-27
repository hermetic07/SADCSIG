
     <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse" id="slimtest4">
      <ul class="nav" id="side-menu">

                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="plugins/images/LandingPage/JUCEBER.png" alt="user-img" class="img-circle"><span class="hide-menu text-white">Jubecer security</span>
                        </a>
                    </li>

        <li> <a href="{{url('/Dashboard')}}" class="waves-effect"><i class="fa fa-dashboard fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Dashboard </span> </a>
              </li>

              <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-wrench fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Maintenance  <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
            <li> <a href="javascript:void(0)" class="waves-effect">Clients <span class="fa arrow"></span></a>
              <ul class="nav nav-third-level">
                  <li> <a href="{{url('/Nature')}}">Nature of business</a></li>
                <li> <a href="{{url('/Service')}}">Services</a> </li>

                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect">Security guards <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">

                          <li> <a href="{{url('/License')}}">Licences and clearances</a> </li>
                          <li> <a href="{{url('/Attribute')}}">Body attributes</a></li>
                          <li> <a href="{{url('/Military')}}">Military services</a></li>
                          <li> <a href="{{url('/Rank')}}">Rank</a></li>
                          <li> <a href="{{url('/Requirement')}}">Requirements</a></li>
                          <li> <a href="{{url('/Role')}}">Role</a></li>
                          <li> <a href="{{url('/Leave')}}">Leave</a></li>
              </ul>
            </li>
                    <li> <a href="javascript:void(0)" class="waves-effect">Others<span class="fa arrow"></span></a>
              <ul class="nav nav-third-level">
                <li> <a href="{{url('/Measurement')}}">Measurements</a></li>
                <li> <a href="{{url('/Province')}}">Provinces</a></li>
                <li> <a href="{{url('/Area')}}">Area</a></li>
                <li> <a href="{{url('/GunType')}}">Gun Type</a></li>
                <li> <a href="{{url('/Gun')}}">Guns</a></li>
              </ul>
            </li>
                </ul>
          </li>


                <li> <a href="javascript:void(0);" class="waves-effect {{ Request::is('ClientRegistration') ? 'active' : ''}}"><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
            <ul class="nav nav-second-level">
              <li> <a href="{{url('/ClientRegistration')}}" class="waves-effect">Clients</a>
              </li>
              <li> <a href="{{url('/Guard-Registration')}}" class="waves-effect">Security guards</a>
              </li>
                  </ul>
          </li>

              <li> <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-exchange fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Deployment<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li> <a href="{{route('manual.deployment')}}" class="waves-effect">Deploy</a>
              </li>
              <li> <a href="{{url('/Replace')}}" class="waves-effect">Replace</a>
              </li>
                <li> <a href="{{url('/Swap')}}" class="waves-effect">Swap</a>
              </li>
                </ul>
              </li>

          <li> <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-users fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></a>
           <ul class="nav nav-second-level">
             <li> <a href="{{url('/ActiveClient')}}" class="waves-effect">Active<span class="label label-rouded label-info pull-right">4</span></a>
            </li>
            <li> <a href="{{url('/PendingDeployment')}}" class="waves-effect">Pending deployment<span class="label label-rouded label-info pull-right">3</span></a>
            </li>
            <li> <a href="{{url('/PendingClientRequests')}}" class="waves-effect">Pending Request<span class="label label-rouded label-info pull-right">4</span></a>
            </li>


           </ul>
          </li>

          <li> <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-shield fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Security guards<span class="fa arrow"></span> </a>
           <ul class="nav nav-second-level">
            <li> <a href="{{url('/SecurityGuards')}}" class="waves-effect">Guards<span class="label label-rouded label-info pull-right"></span></a>
            </li>
            <li> <a href="{{url('/Admin-Guard-Leave')}}" class="waves-effect">Pending Request<span class="label label-rouded label-info pull-right"></span></a>
            </li>
            <li> <a href="{{url('/GuardLicenses')}}" class="waves-effect">Guard licenses<span class="label label-rouded label-info pull-right"></span></a>
            </li>
              <li> <a href="{{url('/GuardsDTR')}}" class="waves-effect">Guard's DTR</a>
            </li>
           </ul>
          </li>

          <li><a href="{{url('/Applicants')}}" class="waves-effect"><i class="icon-user-follow fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Applicants  </a>
          </li>

          <li> <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-truck fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Delivery <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
            <li> <a href="{{url('/DeliverGuns-index')}}" class="waves-effect">Guns</a>
            </li>
            <li> <a href="{{url('/Ammunition')}}" class="waves-effect">Ammunitions</a>
            </li>
            <li> <a href="{{url('/Pickups')}}" class="waves-effect">Pickups</a>
            </li>
           </ul>
          </li>



          <li> <a href="{{url('/Reports')}}" class="waves-effect"><i class="fa fa-file-text fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Reports</span></a>
          </li>

          <li> <a href="#" class="waves-effect"><i class="fa fa-search fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Queries</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li> <a href="#" class="waves-effect">Clients</a>
              </li>
              <li> <a href="#" class="waves-effect">Security guards</a>
              </li>
                <li> <a href="#" class="waves-effect">Recapitulation</a>
              </li>
                </ul>
          </li>


          <li> <a href="{{url('/Tax')}} " class="waves-effect"><i class="fa fa-cogs fa-2x fa-fw p-r-10"></i> <span class="hide-menu">Utilities</span></a>

          </li>
          </ul>
        </div>
    </div>
  <!-- Left navbar-header end -->
