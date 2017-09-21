<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Add Guard Request Details</strong></center></h4>
        </div>
        <div class="modal-body" >
          <div class="row">
            <div class="form-group">
              <label>Request Code: {{$guardReplacementDetails->requestCode}}</label>
            </div>
          
            <div class="form-group">
              <p>{{$guardReplacementDetails->c_fname}} {{$guardReplacementDetails->c_mname}} {{$guardReplacementDetails->c_lname}} wants to change some of his guards on his establishment: {{$guardReplacementDetails->establishment}} located at {{$guardReplacementDetails->estabAddress}},{{$guardReplacementDetails->area}},{{$guardReplacementDetails->province}}</p>

              <p>The following are the guard(s) he/she wants to replace</p>
            </div>
            <br>
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                          <thead>
                            <tr>
                               <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                              <th>Name</th> 
                              <th>Reasons</th>    
                              <th data-sort-ignore="true" width="200px">Actions</th>
                            </tr>
                          </thead>
                          <div class="form-inline padding-bottom-15">
                            <div class="row">
                                <div class="col-sm-6">
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
                            @foreach($guards as $guard)
                              <tr>
                                <td>
                                  <div class="el-card-item">
                                      <div class="el-card-avatar el-overlay-1">
                                        <a href="uploads/{{$guard->image}}"><img src="uploads/{{$guard->image}}" alt="user"  class="img-circle img-responsive"></a>
                                        <div class="el-overlay">
                                          <ul class="el-info">
                                              <li><a class="btn default btn-outline" href="uploads/{{$guard->image}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                                        </div>
                                      </div>
                                   </div>
                                </td>
                                <td>
                                  {{$guard->first_name}},{{$guard->middle_name}},{{$guard->last_name}}
                                </td>
                                <td>
                                  {{$guard->reasons}}
                                </td>
                                <td>
                                  
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                          </table>  
          </div>
       </div> 
      <br>
      <div class="modal-footer">
       
          <button type="button" class="btn btn-info" >Replace</button>
       
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div> 
  