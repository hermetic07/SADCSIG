<div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
                  </div>
                  <div class="modal-body">
                    
                    <div class="form-group">
                    <div class="row">  
                             <div class="table-responsive">
                                 <table class="table color-bordered-table dark-bordered-table">
                                    <thead>
                                        <tr>
                                            <th width="10px">Claimed</th>
                                            <th>Gun name</th>
                                            <th>Gun type</th>
                                            <th>Serial No.</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($gunDeliveryDetails as $gunDeliveryDetail)
                                        <tr>
                                            <td>
                                              <div class="checkbox checkbox-success checkbox-circle">
                                                <input id="{{$gunDeliveryDetail->gunID}}" type="checkbox" class="claimChckBx" value="{{$gunDeliveryDetail->serialNo}}" >
                                                 <label for="gun1"></label>
                                              </div>
                                            </td>
                                             <td>{{$gunDeliveryDetail->gun}}</td>
                                            <td>{{$gunDeliveryDetail->gunType}}</td>
                                            <td>{{$gunDeliveryDetail->serialNo}}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="form-group col-sm-8">
                      <label class="control-label">Delivered by</label>
                       <p class="form-control-static">{{$gunDeliveryDetails[0]->deliveryPerson}}</p>
                      <div class="help-block with-errors"></div>
                   </div>
             <div class="form-group col-sm-4">
                       <label class="control-label">Contact number</label>
                       <p class="form-control-static">{{$gunDeliveryDetails[0]->deliveryPersonContact}}</p>
                       <div class="help-block with-errors"></div>
                    </div>

          
                 </div>
                   <div class="help-block with-errors"></div>
                </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-success waves-effect waves-light" onclick="claim('{{$gunDeliveryDetails[0]->deliveryCode}}');">Claim</button>
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
         </div>
         </div>
