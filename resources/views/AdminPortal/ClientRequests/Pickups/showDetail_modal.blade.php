<div class="white-box">
     <h4><center><strong>Delivery details</strong></center></h4>
          </br>		  </br>		  </br>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="100">

          <tbody>
             <tr>
                          <td>Delivered by: </td>
                          <td>{{$delivery->deliveryPerson}}</td>

                      </tr>
     <tr>
                          <td>Contact number:</td>
                          <td>{{$delivery->deliveryPersonContact}}</td>
                      </tr>
             <tr>
                          <td>Delivery code:</td>
                          <td>{{$delivery->strGunDeliveryID}}</td>
                      </tr>
           <tr>
                          <td>Status:</td>
                          <td>{{$delivery->status}}</td>
                      </tr>
                     <tr>
                          <td>Received by:</td>
                          <td>Claimed</td>
                      </tr>
                       <tr>
                          <td>Item:</td>
                          <td>Guns</td>
                      </tr>

          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"></td>
            </tr>
          </tfoot>
      </table>
  </br>
       <h4><center><strong>Items</strong></center></h4>

                  <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="100">
          <thead>
            <tr>
              <th>Guntype</th>
      <th >gun</th>
      <th >serial number</th>
              <th data-sort-ignore="true" width="150px">status</th>
            </tr>
          </thead>
          <tbody>
          @foreach($claimedDeliveries as $claimedDelivery)
              <tr>
                <td>{{$claimedDelivery->gunType}}</td>
            <td>{{$claimedDelivery->gun}}</td>
              <td>{{$claimedDelivery->serialNo}}</td>
                          <td>
                          {{$claimedDelivery->status}}
                          <input type="hidden" name="{{$claimedDelivery->serialNo}}" class="{{$claimedDelivery->status}}" value="{{$claimedDelivery->gunID}}">
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
      <button type="button" onclick="funcDeliverRelacement()" class="btn btn-info delRepl">Deliver Replacement</button>

          </div>

              </div>