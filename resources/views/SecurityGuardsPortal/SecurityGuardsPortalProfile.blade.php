@extends('SecurityGuardsPortal.master4')

@section('Title') Profile @endsection


@section('mtitle') Profile @endsection

@section('content')


<div class="row">
<div class="white-box">
  <div class="row bg-title">
<div class="row">
<div class="col-md-4 col-xs-12">
<div class="white-box">
<div class="user-bg"> <img width="100%" alt="user" src="{{URL::asset('plugins/images/backgrounds/profilebg.png')}}">
  <div class="overlay-box">
      @if ($employee->image)
      <div class="user-content"> <a href="{{URL::asset('javascript:void(0)')}}"><img src="{{URL::asset('uploads/'.$employee->image)}}" class="thumb-lg img-circle" alt="img"></a>
      @else
      <div class="user-content"> <a href="{{URL::asset('javascript:void(0)')}}"><img src="{{URL::asset('default/secu.png')}}" class="thumb-lg img-circle" alt="img"></a>
      @endif
      <h4 class="text-white">{{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</h4>
      <h5 class="text-white">{{$employee->email}}</h5>
    </div>
  </div>
</div>
<div class="user-btm-box">
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Client</strong>
                            <p>none</p>
                        </div>
                        <div class="col-md-6"><strong>Designation</strong>
                            <p>Security guard</p>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Telephone</strong>
                            <p>{{$employee->telephone}}</p>
                        </div>
                        <div class="col-md-6"><strong>Phone</strong>
                            <p>{{$employee->cellphone}}</p>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>
                    <!-- .row -->
                    <div class="row text-center m-t-10">
                        <div class="col-md-12"><strong>Address</strong>
                            <p>{{$employee->street}}, {{$employee->barangay}}
                                <br/> {{$employee->city}}</p>
                        </div>
                    </div>
                    <hr>
                    <!-- /.row -->       <div class="row text-center m-t-10">
            <strong>Body attributes</strong>
</div>
                      </br>

       <div class="table-responsive">
        <table class="table color-bordered-table inverse-bordered-table">
          <thead>
            <tr>
              <th>Body attribute</th>
              <th>Specification</th>
              <th>Measurement</th>
            </tr>
          </thead>
            <tbody>
              @foreach($attr as $a)
              <tr>
                <td>{{$a->attribute or 'none'}}</td>
                <td>{{$a->size or 'none'}}</td>
                <td>cm</td>
              </tr>
              @endforeach
            </tbody>
          </table>
</div>

</br>

    <div class="row text-center m-t-10">
            <strong>Location (address)</strong>
</div>
</br>
                     <div class="row el-element-overlay  m-b-40">
<!-- /.usercard -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="white-box">
  <div class="el-card-item">
      <div class="el-card-avatar el-overlay-1">
              @if ($employee->location_image)
          <img src="{{URL::asset('uploads/'.$employee->location_image)}}">
          @else
          <img src="{{URL::asset('default/location.png')}}">
          @endif
          <div class="el-overlay">
              <ul class="el-info">
                  <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{URL::asset('plugins/images/Clients/establishments/location.png')}}"><i class="icon-magnifier"></i></a></li>
              </ul>
          </div>
      </div>
  </div>
</div>
</div>

                </div>

                </div>
</div>
</div>

<div class="col-md-8 col-xs-12">
<div class="white-box">
           <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Degree obtained</strong>
                                <br>
                                @foreach($d as $d)
                                <p class="text-muted">{{$d->degree}} </p>
                                @endforeach
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Marital status</strong>
                                <br>
                                <p class="text-muted">{{$employee->marital_status}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Birthday</strong>
                                <br>
                                <p class="text-muted">{{$employee->birth}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Gender</strong>
                                <br>
                                <p class="text-muted">{{$employee->gender}}</p>
                            </div>
                        </div>

                        <h3 class="m-t-30">Education</h4>
                        <hr>
                           <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny" data-page-size="10">
  <thead>
    <tr>
<th data-sort-ignore="true" >Level</th>
      <th  data-sort-ignore="true" > Name of school </th>
<th  data-sort-ignore="true"> Attended from</th>
<th  data-sort-ignore="true">to</th>

    </tr>
  </thead>
  <tbody>

    @foreach($ed as $ed)
    <tr>

      @if($count===1)
      <td><strong>Primary</strong></td>
      @endif
      @if($count===2)
      <td><strong>Secondary</strong></td>
      @endif
      @if($count===3)
      <td><strong>Tertiary</strong></td>
      @endif
      <td>{{$ed->school_name or 'none'}}</td>
      <td>{{$ed->year_start or 'none'}}</td>
      <td>{{$ed->year_end or 'none'}}</td>
    </tr>
    <div style="display: none;">
      {{$count+=1}}
    </div>
    @endforeach

  </tbody>
</table>


    <h3 class="m-t-30">Training and exams taken</h4>
    <hr>
     <div class="table-responsive">
       <table class="table color-bordered-table inverse-bordered-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Ratings</th>
              <th>Date taken</th>
            </tr>
          </thead>
          <tbody>
            @foreach($s as $s)
            <tr>
              <td>{{$s->name or 'none'}}</td>
              <td>{{$s->rating or 'none'}}</td>
              <td>{{$s->date or 'none'}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <h3 class="m-t-30">Military service</h4>
      <hr>

       <div class="table-responsive">
        <table class="table color-bordered-table inverse-bordered-table">
          <thead>
            <tr>
              <th>Military service</th>
              <th>Rank</th>
              <th>Serial number</th>
              <th>Period of service From</th>
              <th>To</th>
            </tr>
          </thead>
          <tbody>
            @foreach($m as $m)
            <tr>
              <td>{{$m->military_services_id or 'none'}}</td>
              <td>{{$m->ranks_id or 'none'}}</td>
              <td>{{$m->serial_number or 'none'}}</td>
              <td>{{$m->from or 'none'}}</td>
              <td>{{$m->to or 'none'}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <h3 class="m-t-30">Skills</h4>
      <hr>
     <div class="table-responsive">
      <table class="table color-bordered-table inverse-bordered-table">
          <thead>
            <tr>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach($skill as $skill)
            <tr>
              <td>{{$skill->name or 'none'}}</td>
            </tr>
            @endforeach()
          </tbody>
      </table>
      </div>

  </div>

</div>
</div>
</div>



</div>



</div>
</div>

@endsection


@section('script')


 @endsection
