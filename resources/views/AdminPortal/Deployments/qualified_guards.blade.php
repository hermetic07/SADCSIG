@foreach($employees as $employee)
  <div class="col-md-4 col-sm-4 staff-container">
  <div class="white-box">
    <div class="row">
      <div class="col-md-4 col-sm-4 text-center guard_details">
         <div class="el-card-item">
           <div class="el-card-avatar el-overlay-1">
              <a href="artist-detail.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-circle img-responsive"></a>
              <div class="el-overlay">
                <ul class="el-info">
                  <li><a class="btn default btn-outline image-popup-vertical-fit" href="uploads/{{$employee->image}}"><i class="icon-magnifier"></i></a></li>
                  <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$employee->id)}}" target="_blank"><i class="fa fa-info"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
                        <!-- name of the guard to be fly to the sidebar -->
          <span style="display: none" class="guard_name">{{ $employee->first_name }}, {{ $employee->last_name }}</span>
          <span style="display: none" class="location">quezon</span>
            <button type="button"  id='AddGuard'  class="btn AddGuard btn-block btn-outline btn-info add-guard shitshit" name=",#{{ $employee->id }}"><i class="icon-user-follow"></i> <!--</i>--> Add guard</button>

            <span class="mytooltip tooltip-effect-5">
              <button type="button" style='display:none' id='AddedGuard' class="btn AddedGuard btn-block btn-success disabled">
                <i class="fa fa-check"></i>
                <!--</i>-->  <span class="tooltip-item">added</span>
              </button>
              <span class="tooltip-content clearfix">
                <span class="tooltip-text">To remove this guard. Remove it to your list.</span>
              </span>
            </span>
          </div>

          <div class="col-md-8 col-sm-8">
           <h3 class="box-title m-b-0">{{ $employee->first_name }} {{ $employee->middle_name }},{{ $employee->last_name }}</h3>
            <small>College Graduate</small>
            <div class="row m-t-10">
              <div class="col-md-6 b-r">
                <p>{{ $employee->email }}</p>
              </div>
            </div>
            <div class="row m-t-1">
              <div class="col-md-6 b-r">
                <p>{{ $employee->street }},{{ $employee->barangay }}, {{ $employee->city }}</p>
              </div>
            </div>
            <div class="row m-t-1">
              <div class="col-md-6 b-r">
               <strong>Contact number</strong>
               <p>{{ $employee->cellphone }}</p>
              </div>
              <div class="col-md-6">
                <strong>Telephone</strong>
                <p>{{ $employee->telephone }}</p>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach