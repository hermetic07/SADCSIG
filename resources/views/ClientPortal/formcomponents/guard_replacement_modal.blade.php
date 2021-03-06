
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr id="earl">
                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                  <th>Guard's Name</th>
                  <th>Action</th>
                  
                </tr>
                <tbody>
                  @php
                    $guardID = "";
                  @endphp
                 @for($ctr = 0; $ctr < count($guards); $ctr++)
                   @foreach($estabGuards as $estabGuard)
                      @if($estabGuard->id == $guards[$ctr]) 
                        @if($estabGuard->id == $guardID)
                          @break
                        @else
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
                                    <b>Name: {{$estabGuard->first_name}} {{$estabGuard->middle_name}} {{$estabGuard->last_name}}</b> 
                                    <br> <b>Shift: </b>
                                    From: {{$estabGuard->shiftFrom}}  To: {{$estabGuard->shiftTo}} 
                                    <br> <b>Role: {{$estabGuard->role}} </b>
                                    <br> <b>Post: {{$estabGuard->establishment}}</b>
                                  </td>
                                  
                                  
                                  <td>
                                    <button type="button" onclick="func_dont_replace('{{$estabGuard->id}}','{{$totalGuards}}')" class="btn btn-danger waves-effect waves-light" ><i class="glyphicon glyphicon-remove"></i> Don't Replace</button>
                                  </td>
                                  <input type="hidden" class="secuIDs" value="{{$estabGuard->id}}">
                                </tr>
                        @endif
                                
                                
                                @endif
                                @php
                                  $guardID = $estabGuard->id;
                                @endphp
                                @endforeach
                               @endfor
                               
                                
                </tbody>
              </thead>
            </table>
            <input type="hidden" name="numGuards" value="">
            <div class="modal-footer">
              <button type="button" id="replaceBtn" class="btn btn-info waves-effect waves-light" onclick="func_replace()">Yes. Replace</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          