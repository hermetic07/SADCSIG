<table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                  <th>Client's name</th>
                  <th>Client's establishment</th>
                  <th>location</th>   
                  <th>Status</th>     
                  <th data-sort-ignore="true" width="310px">Actions</th>
                </tr>
              </thead>
              	<div class="form-inline padding-bottom-15">
                	<div class="row">
						<div class="col-sm-6">
						</div>
                    	<div class="col-sm-6 text-right m-b-20">
                    	<div class="form-group">
                      		<input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
						    autocomplete="off">
					   </div>
                  	   </div>
                   </div>
                </div>
              <tbody>
              @foreach($gunRequests as $gunRequest)
                @if($gunRequest->strGunReqID = $gunRequestID)

                 <tr>
                              <td>{{$gunRequest->client}}</td>
                              <td>{{$gunRequest->establishment}}</td>
                              <td>{{$gunRequest->address}},{{$gunRequest->area}},{{$gunRequest->province}}</td>
                              <td>
                                {{$gunRequest->status}}
                              </td>
                              <td>
			<button class="btn btn-info viewReq" value="{{$gunRequest->strGunReqID}}" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View order slip</button>
                              <button class="btn  btn-success " id="show" type="button"><i class="fa fa-truck"></i>  Deliver guns</button>
                              </td>
                 </tr>
                 
                 @endif
                 @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5"></td>
                </tr>
              </tfoot>
        	</table>