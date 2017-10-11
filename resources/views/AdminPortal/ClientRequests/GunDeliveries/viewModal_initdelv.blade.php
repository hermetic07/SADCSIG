<div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Additional gun request</strong></center></h4>
                  </div>
                  <div class="modal-body">
                  

                  
                    <form data-toggle="validator">
                    <div class="form-group">
                    <div class="row">  
                       <div style="padding: 40px; background: #fff;">
              @php
                $qtyOrderedTotal = 0;
              @endphp
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><b></b>
              <p style="margin-top:0px;">Order No: Initial Delivery</p></td>
            <td align="right" width="100"> {{$gunRequestDetails[0]->created_at}} </td>
          </tr>
          
            <tr>
            <td colspan="2" style="padding:20px 0; border-top:1px solid #f6f6f6;"><div>
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                  @foreach($gunRequestDetails as $gunRequestDetail)
                    <tr>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;">{{$gunRequestDetail->gun}}</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;"  align="right">{{$gunRequestDetail->quantity}}x</td>
                    </tr>
                        @php
                          $qtyOrderedTotal = $qtyOrderedTotal + $gunRequestDetail->quantity;
                        @endphp        
                    @endforeach
                                        <tr class="total">
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" width="80%">Total</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" align="right">x{{$qtyOrderedTotal}}</td>
                    </tr>
         

                  </tbody>
                </table>
              </div></td>
          </tr>
          <tr>
            <td colspan="2">
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