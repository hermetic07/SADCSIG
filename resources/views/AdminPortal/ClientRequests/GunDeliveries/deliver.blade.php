<h4><center><strong>Items</strong></center></h4>
       </br>
                  <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="100">
          <thead>
            <tr>
            <th data-sort-initial="true" data-toggle="true" width="10px">Select</th>
              <th>Guntype</th>
                <th >gun</th>
              <th data-sort-ignore="true" >Serial number</th>
            </tr>
          </thead>
          <tbody>
            @foreach($gunRequestDetails as $gunRequestDetail)
              <tr>
                <td>
  
                <div class="checkbox checkbox-success checkbox-circle">
                 <input id="{{$gunRequestDetail->gunID}}" type="checkbox" >
                 <label for="{{$gunRequestDetail->gun}}"></label>
               </div>
                </td>
                <td>{{$gunRequestDetail->gun}}</td>
                <td>{{$gunRequestDetail->gunType}}</td>
                <td>
                <input type="text" class="form-control">
                </td>
              </tr>
            @endforeach
             
              
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
            </tr>
          </tfoot>
      </table>

       </br>

        <center><button class="btn  btn-success " value="{{$gunReqstID}}"  data-toggle="modal" data-target="#Delgun"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-sign-in"></i> Deliver</button></center>

          </div>