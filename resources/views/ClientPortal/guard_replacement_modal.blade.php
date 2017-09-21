<form data-toggle="validator">
            {!! csrf_field() !!}
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr id="earl">
                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                  <th>Guard's Name</th>
                  <th>Action</th>
                  
                </tr>
                <tbody>
                 
                                <tr id="">
                                  <td>
                                    <div class="el-card-item">
                                      <div class="el-card-avatar el-overlay-1">
                                        <a href="SecurityGuardsProfile.html"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                                        <div class="el-overlay">
                                          <ul class="el-info">
                                              <li><a class="btn default btn-outline" href="SecurityGuardsProfile.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                                        </div>
                                      </div>
                                   </div>
                                  </td>
                                  <td>
                                  
                                    <br> <b>Shift: </b>
                                    
                                  </td>
                                  
                                  
                                  <td>
                                    <button type="button" class="btn btn-info waves-effect waves-light" >Don't Replace</button>
                                  </td>
                                </tr>
                                
                </tbody>
              </thead>
            </table>
            <input type="hidden" name="numGuards" value="">
            <div class="modal-footer">
              <button type="submit" id="" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </form>