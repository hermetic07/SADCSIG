@foreach($estabGuards as $estabGuard)
	<tr>
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
        <textarea id="{{$estabGuard->id}}" name="" class="form-control" rows="3" placeholder="Reasons for replacing " disabled required="true"></textarea>
      </td>
      <td>
        <input class="selectGuard" type="checkbox" name="" value="" onchange="func('{{$estabGuard->id}}','{{$estabGuard->estabID}}','{{$estabGuard->contractID}}')">
      </td>
    </tr>
@endforeach