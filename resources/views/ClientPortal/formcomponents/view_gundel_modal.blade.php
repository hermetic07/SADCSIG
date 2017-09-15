<div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Delivery slip</strong></center></h4>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator">
                    <div class="form-group">
                    <div class="row">  
                       <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td>
              <p style="margin-top:0px;">Deliver by</p>
                  <b>{{$gunDeliveryDetails[0]->deliveryPerson}}</b></td>
          
            <td align="right" width="100">Deliver Date: {{$gunDeliveryDetails[0]->deliveryDate}}</td>
          </tr>

          <tr>
            <td style=" border-top:1px solid #f6f6f6;">
            <div>
                 <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table">
                  <thead>
                    <th>Gun Name</th>
                    <th>Gun Type</th>
                    <th>Serial No.</th>
                    
                    </thead>
                  <tbody>
                  @php
                    $totalQtyDelivered = 0;
                  @endphp
                  @foreach($gunDeliveryDetails as $gunDeliveryDetail)
                    <tr>
                      <td>{{$gunDeliveryDetail->gun}}</td>
                      <td>{{$gunDeliveryDetail->gunType}}</td>
                      <td>{{$gunDeliveryDetail->serialNo}}</td>
                      
                    </tr>
                    @php
                      $totalQtyDelivered++;
                    @endphp
                  @endforeach
                  </tbody>
                </table>
              </div>
            </td>
          </tr>
          <tr class="total">
                    <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" width="80%">Total</td>
                    <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" align="right">x{{$totalQtyDelivered}}</td>
                  </tr>
          <tr>
            <td colspan="3">
          </tr>
        </tbody>
      </table>
    </div>


                </div>
                 </div>
                          <div class="modal-footer">
      
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
             </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->