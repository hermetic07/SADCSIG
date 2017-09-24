<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deployment Details</strong></center></h4>
</div>
<div class="modal-body">
  <div class="form-group">
    <b>Client:</b> {{$deployments_hist->c_fname}}, {{$deployments_hist->c_mname}} {{$deployments_hist->c_lname}} <br>
    <b>Establishment:</b> {{$deployments_hist->establishment}} <br>
    <b>Location:</b> {{$deployments_hist->address}}, {{$deployments_hist->area}}, {{$deployments_hist->province}} <br>
    <b>Deployment Date:</b> {{$deployments_hist->dateDeployed}} <br>
    <b>No.of Guards: </b> {{$deployments_hist->numGuards}} <br>
  </div>
  <button class="btn btn-info showGuards" onclick="fun_showGuards()">Show Guards</button>
</div>

<div id="guardsDeployed" style="display: none">
  <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                  <th width="300px">Guard's Name</th>
                  
                  <th  data-sort-ignore="true">Date Deployed</th>  
                </tr>
                </thead>
                <tbody class="guard-table-body">
                  
                    @forelse($guards as $guard)
                      <td>
                        <div class="el-card-item">
                          <div class="el-card-avatar el-overlay-1">
                            <a href="uploads/{{$guard->emp_image}}"><img src="uploads/{{$guard->emp_image}}" alt="user"  class="img-circle img-responsive"></a>
                            <div class="el-overlay">
                              <ul class="el-info">
                                  <li><a class="btn default btn-outline" href="uploads/{{$guard->emp_image}}" target="_blank"><i class="fa fa-info"></i></a></li>
                              </ul>
                            </div>
                          </div>
                       </div>
                      </td>
                      <td>
                        {{$guard->emp_fname}}, {{$guard->emp_mname}}, {{$guard->emp_lname}}
                      </td>
                      <td>
                        {{$guard->dateDeployed}}
                      </td>
                      @empty
                        <tr>
                          <h4>No Guards to show</h4>
                        </tr>
                    @endforelse
                      
                </tbody>
              </thead>
            </table>
</div>

<br>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
</div>
</div>