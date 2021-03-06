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
                    <input type="hidden" name="srl{{$ctr}}" class="gunsID" value="{{$gun->gunID}}">
                    <input type="hidden" id="srl{{$ctr}}" class="serialNos" value="{{$quantity[$ctr]}}">
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
    
    </div>
      <div class="help-block with-errors"></div>
    </div>
    
    <div class="modal-footer">
      <button type="button" class="btn btn-info waves-effect waves-light" onclick="proceedDelivery('{{$gunReqID}}')" >Deliver</button>
      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
    </div>
  </form>
