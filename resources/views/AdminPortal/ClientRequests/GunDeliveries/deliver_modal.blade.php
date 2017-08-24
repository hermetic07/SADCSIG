<form data-toggle="validator">
  <div class="form-group">
    <div class="row">
      <div class="table-responsive">
        <table class="table color-bordered-table dark-bordered-table">
          <thead>
            <tr>
                <th>Gun type</th>
                <th>Gun name</th>
                <th width="150px">Serial No</th>
                <th>Qyt. Ordered</th>
                <th>Qyt. To be Del.</th>
            </tr>
          </thead>
          @php
            $ctr = 0;
          @endphp
          <tbody>
            @foreach($gunsIDs as $gunsID)
              @foreach($guns as $gun)
                @if($gun->gunID == $gunsID)
                  <tr>
                    <td>{{$gun->gunType}}</td>
                    <td>{{$gun->gun}}</td>
                    <td>
                         {{$quantity[$ctr]}}

                    </td>
                    <td>
                      {{$gun->qtyOrdered}}
                    </td>
                    <td>
                      <input type="text" name="qtyDel{{$ctr}}" id="{{$gun->gunID}}" class="qtyToBeDel">
                    </td>
                </tr>
                @php
                  $ctr++;
                @endphp
                @endif
              @endforeach
            @endforeach
              
          </tbody>
      </table>
    </div>
    <br>
    <div class="form-group col-sm-8">
      <label class="control-label">Delivered by</label>
      <input type="text" class="form-control" id="deliveredBy" required>
      <div class="help-block with-errors">
        
      </div>
    </div>
    <div class="form-group col-sm-4">
      <label class="control-label">Contact number</label>
      <input type="text" class="form-control" id="delBoyContact" required>
      <div class="help-block with-errors">
        
      </div>
    </div>
    <div class="form-group col-sm-9">
      <label class="control-label">Delivery code</label>
      <input type="text" class="form-control" id="delCode" value="{{$gunDeliveryID}}" required disabled>
      <div class="help-block with-errors">
        
      </div>
    </div>
    <div class="col-sm-3">
      <br>
      <button type="button" class="btn btn-info waves-effect waves-light" >Generate code</button>
    </div>
    </div>
      <div class="help-block with-errors"></div>
    </div>
    
    <div class="modal-footer">
      <button type="button" class="btn btn-info waves-effect waves-light" onclick="proceedDelivery('{{$gunReqID}}')" >Deliver</button>
      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
    </div>
  </form>
