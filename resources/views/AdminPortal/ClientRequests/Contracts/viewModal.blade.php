<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Terms of Contract</strong></center></h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <div class="col-md-6">
        <div class="col-md-5">
            <label class="control-label"><b>Contract Code:</b></label>
          </div>
          <div class="col-md-7">
            <label class="">{{$contract->id}}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-4">
            <label class="control-label"><b>Date Created:</b></label>
          </div>
          
          <div class="col-md-8">
            <label class="" style="font-size: 16px; color: black;">{{$contract->start_date}}</label>
          </div>
        </div>
    </div>
  <div class="form-group">
    <div class="col-md-6">
      <label class="control-label">End Date:</label>
      <label class="control-label">{{$contract->end_date}}</label>
    </div>
    <div class="col-md-6">
      <label class="control-label">Span</label>
      <label class="control-label">{{$contract->year_span}} months</label>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-6">
      <label class="control-label">Guards Deployed:</label>
      <label class="control-label">{{$contract->guardDeployed}} </label>
    </div>
    
  </div>
  <br>
  <br>
  <h3>Guards</h3>
  <div class="form-group">
    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
              <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
              <th  data-sort-ignore="true">Name</th>
              <th  data-sort-ignore="true">Date Deployed</th>
              <th data-sort-ignore="true">Shifts</th>
            </tr>
          </thead>
          <tbody>
           
             @foreach($guards as $guard)
             <tr>
              <td>
                <div class="el-card-item">
                   <div class="el-card-avatar el-overlay-1">
                      <a href="{{URL('/SecuProfile',$guard->id)}}"><img src="uploads/{{$guard->image}}" alt="user"  class="img-circle img-responsive"></a>
                      <div class="el-overlay">
                        <ul class="el-info">
                          <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$guard->id)}}" target="_blank"><i class="fa fa-info"></i></a></li>
                        </ul>
                      </div>
                   </div>
                </div>
                </td>
                <td>
                  {{$guard->first_name}},{{$guard->last_name}}
                </td>
                <td>
                  {{$guard->dtmDateDeployed}}
                </td>
                <td>
                  {{$guard->shiftFrom}} am - {{$guard->shiftTo}} pm
                </td>
                </tr>
             @endforeach
           
          </tbody>
        </table>
  </div>
</div>
<br>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
</div>
</div>