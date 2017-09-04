@php
                                    $ctr =0;
                                  @endphp
<nav class="navbar navbar-fixed-right navbar-minimal animate" role="navigation">
                 <span class="label label-rouded2 label-custom pull-right myspan" id="cnt">0</span>
                   <div class="navbar-toggler animate">
                     <span class="menu-icon"></span>
                  </div>
                    <ul class=" navbar-menu animate">
                      <div id="slimtest4">
                        <div id="cart">
                          <span class="empty">No guards. Select guards to deploy.</span>
                        </div>
                      </div>
                      <button type="button" class="btn btn-block btn-info" id="deployguards"  data-toggle="modal" data-target="#Addtse"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" >
                        <i class="fa fa-plus-circle" ></i>
                          Deploy guards
                        <span class="label label-rouded3 label-danger deploysecu">0</span>
                      </button>
                    </ul>
                </nav>
                <div class="row  el-element-overlay">

             <!-- alert info for the count of guards to be selected -->
                  <div class="alert alert-info sel ">
                    <i class="fa fa-exclamation-circle"></i>  Select 10 guards
                  </div>

                  <div class="row">
                    <div class="col-sm-12" >
                      <div class="white-box search-container">
                        <h3 class="box-title">Search</h3>
                        <form role="form" class="row form-search ">
                          <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                             <input type="text" class="form-control search-query" placeholder="Name" id="target"  />
                            </div>
                          </div>

                          <div class="col-sm-1 col-md-1">
                            <button type="submit" id="target2" class="btn btn-inverse btn-block form-control"><i class="fa fa-search"></i></button>
                          </div>
                         <div id="divtest"></div>
                       </form>
                      </div>
                    </div>
                  </div>

          @foreach($employees as $employee)
            @if($employee->deployed == 0)
              @if($employee->status == 'waiting')
           
                  <div class="col-md-4 col-sm-4 staff-container">
                    <div class="white-box">
                      <div class="row">
                        <div class="col-md-4 col-sm-4 text-center guard_details">
                           <div class="el-card-item">
                             <div class="el-card-avatar el-overlay-1">
                                <a href="artist-detail.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-circle img-responsive"></a>
                                <div class="el-overlay">
                                  <ul class="el-info">
                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="plugins/images/SecurityGuards/2x2.jpg"><i class="icon-magnifier"></i></a></li>
                                    <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
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
              @endif
            @endif
          @endforeach
            
        <!-- Add training, seminars, exams Modal -->
                <div id="Addtse" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Deployment details</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row  el-element-overlay">
                          <center><h5 class="box-title fw-500">List of guards</h5></center>
                          <center><h5>Guards deployed: 2</h5></center>
                          <br>
                            <form id="deploy" data-toggle="validator" method="POST" action="{{ url('/DeployGuards/Save') }}">
                            {!! csrf_field() !!}
                            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                              <thead>
                                <tr id="earl">
                                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                                  <th>Guard's name</th>
                                  <th  data-sort-ignore="true">Shifts</th>
                                  <th data-sort-ignore="true">Role</th>
                                </tr>
                              </thead>
                              <div class="form-inline padding-bottom-15">
                                <div class="row">
                                  <div class="col-sm-6"></div>
                                  <div class="col-sm-6 text-right m-b-20">
                                    <div class="form-group">
                                      <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"autocomplete="off">
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <tbody>
                                @foreach($employees as $employee)
                                  @if($employee->deployed == 0)

                                <tr id="{{ $employee->id }}">
                                  <td>
                                    <div class="el-card-item">
                                       <div class="el-card-avatar el-overlay-1">
                                          <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}" alt="user"  class="img-circle img-responsive"></a>
                                          <div class="el-overlay">
                                            <ul class="el-info">
                                              <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                            </ul>
                                          </div>
                                       </div>
                                    </div>
                                    </td>
                                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                    <td>
                                      <select class="form-control shifts" name="shift{{$ctr}}" id="shift-{{$employee->id}}" >
                                        <option value="" disabled="" selected="">---</option>
                                       @foreach($shifts as $shift)
                                        
                                          <option id="0" value="{{$shift->start}},{{$shift->end}},{{$employee->id}}">From:{{$shift->start}} - To:{{$shift->end}}</option>
                                       
                                      @endforeach
                                      </select>
                                    </td>

                                    <td>
                                      <select class="form-control" name="role{{$ctr}}" id="role">
                                        <option value="" disabled="" selected="">---</option>
                                        @foreach($roles as $role)
                                          @if($role->status == "active")
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                          @endif
                                        @endforeach
                                      </select>
                                    </td>
                                  </tr>
                                 @php
                                    $ctr = $ctr + 1;
                                  @endphp
                                  @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="4"></td>
                                  </tr>
                                </tfoot>
                              </table>


                             <input type="hidden" name="avGuards" value="{{ $ctr }}">
                             <input type="hidden" id="establishmentID" name="establishmentID" value="">
                             <input type="hidden" id="numGuards" name="numGuards" value="">
                             <input type="hidden" id="contractID" name="contractID" value="">
                             <input type="hidden" id="clientID" name="clientID" value="">
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect btnClose" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" >Deploy</button>
                              </div>
                            </form>
                            <div class="text-right">
                              <ul class="pagination">
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> <!-- /Add training, seminars, exam Modal -->
                 </div> <!-- class="row  el-element-overlay" -->