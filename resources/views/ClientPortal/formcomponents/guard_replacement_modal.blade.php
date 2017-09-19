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
                  
                 @for($ctr = 0; $ctr < count($guards); $ctr++)
                   @foreach($estabGuards as $estabGuard)
                      @if($estabGuard->id == $guards[$ctr])
                                <tr id="dnt{{$estabGuard->id}}">
                                  <td>
                                    <div class="el-card-item">
                                      <div class="el-card-avatar el-overlay-1">
                                        <a href="uploads/{{$estabGuard->image}}"><img src="uploads/{{$estabGuard->image}}" alt="user"  class="img-circle img-responsive"></a>
                                        <div class="el-overlay">
                                          <ul class="el-info">
                                              <li><a class="btn default btn-outline" href="uploads/{{$estabGuard->image}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                                        </div>
                                      </div>
                                   </div>
                                  </td>
                                  <td>
                                  
                                    <br> <b>Shift: </b>
                                    
                                  </td>
                                  
                                  
                                  <td>
                                    <button type="button" onclick="func_dont_replace('dnt{{$estabGuard->id}}')" class="btn btn-danger waves-effect waves-light" ><i class="glyphicon glyphicon-remove"></i> Don't Replace</button>
                                  </td>
                                </tr>
                                @endif
                                @endforeach
                               @endfor
                               
                                
                </tbody>
              </thead>
            </table>
            <input type="hidden" name="numGuards" value="">
            <div class="modal-footer">
              <button type="submit" id="" class="btn btn-info waves-effect waves-light" >Replace</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </form>