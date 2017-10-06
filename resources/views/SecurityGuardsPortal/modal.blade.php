<form data-toggle="validator" method="POST" action='{{route("save.guard.response")}}'>
{!! csrf_field() !!}
  <div class="row">
    <div class="form-group col-sm-12">
      <label class="control-label">Subject:</label>
      <p class="form-control-static">Job offer from a client</p>
    </div>
    <div class="form-group col-sm-12 	">
      <label class="control-label">Content:</label>
      <br>
      <div class="col-md-12"><br>
        <h3>{{$establishment->name}}</h3>
        <div class="text-muted"><span class="m-r-10">{{$clientDeploymentNotif->created_at}}</span></div>
        <br>
        <p>Hello! we are proudly to announce you that our client selects you to be part of their security team! A great oppurtunity indeed. Now once you accept this offer, you must report to our office as soon as possible to process this job order. Thank you and have a good day!</p><br>
      </div>
      <div class="col-md-6">
        <img class="img-responsive" alt="user" src="uploads/{{$client->image}}"  >
      </div>
        <div class="col-md-6">
          <div class="white-box">
            <h5 class="box-title fw-500">Essential Information</h5>
              <hr class="m-0">
                <div class="table-responsive pro-rd p-t-10">
                  <table class="table">
                    <tbody class="text-dark">
                      <tr>
                        <td>Client name</td>
                        <td>{{$client->first_name}} {{$client->middle_name}}, {{$client->last_name}}</td>
                      </tr>
                      <tr>
                        <td>Establishment</td>
                        <td><a href="">{{$establishment->name}}</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive pro-rd p-t-10">
                <table class="table">
                  <tbody class="text-dark">
                    <tr>
                      <td>Address</td>
                      <td>{{$completeAdd}}</td>
                    </tr>
                    <tr>
                      <td>Person in charge</td>
                      <td>{{$establishment->pic_fname}} {{$establishment->pic_mname}}, {{$establishment->pic_lname}}</td>
                    </tr>
                    <tr>
                      <td>Shift</td>
                      <td>{{$shift}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </br>
              </br>
            </div>
            <input type="hidden" name="secuID" value="{{$secuID}}">
            <input type="hidden" name="deployment_notif_id" value="{{$deployment_notif_id}}">
         
          </div>
             <div class="col-md-4"></div>
            <button type="submit" class="fcbtn btn btn-success btn-outline btn-1e accept">Accept</button>
            <button type="button" class="fcbtn btn btn-danger btn-outline btn-1e" onclick="reject('{{$secuID}},{{$deployment_notif_id}}')">Reject</button>
        </div>
      </form>
