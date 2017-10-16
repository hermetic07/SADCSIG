<div class="row">
  <div class="col-lg-12 ">
    <div class="white-box">
      <div class="row  el-element-overlay white-box">
        <h4><center><strong>Contracts</strong></center></h4>
        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
          <thead>
            <tr>
               
                <th >Contract Code</th>
                
                <th>Date Created</th>
                <th>Status</th>
                <th data-sort-ignore="true" width="400px">Actions</th>
            </tr>
          </thead>
          <div class="form-inline padding-bottom-15">
            <div class="row">
              <div class="col-sm-6"></div>
                <div class="col-sm-6 text-right m-b-20">
                  <div class="form-group">
                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control"
                autocomplete="off">
                  </div>
                </div>
              </div>
          </div>
          @php
            $dateCreated;
          @endphp
          <tbody>
          
              @foreach($contracts as $contract)
               @if($contract->strEstablishmentID == $estabID)
              @php
                    $dateCreated = $contract->created_at;
                  @endphp
            <tr>
              <td>
                {{$contract->id}}
              </td>
              
              <td>
                {{$dateCreated}}
              </td>
              <td>
                
                    {{$contract->status}}
                  
              </td>
              <td>
                <button class="btn btn-info view" type="button" value="{{$contract->id}}" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>
                <button class="btn btn-success"  onclick="location.href='/getContractPDF-{{$contract->id}}'" target="_blank" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> PDF</button>
                <!-- @if($contract->status != "terminated")
                <button class="btn btn-danger" disabled onclick="fun_terminate('{{$contract->id}}')" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> Terminate</button>
                @else
                <button class="btn btn-danger"  onclick="fun_terminate('{{$contract->id}}')" type="button" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> Terminate</button>
                @endif -->
              </td>
              
            </tr>
 

                @endif
              @endforeach
            

          
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
            </tr>
          </tfoot>
        </table>

            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>
           </div>
          </div>
          <div class="col-lg-6 animated slideInRight guards" style="display:none">
            <div class="white-box">
              <div id="calendar" ></div>
            </div>
        </div>
         </div>
        </div>

        <div id="{{ $contract->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
      </div>
      <div class="modal-body">
        <form >
        {!! csrf_field() !!}
        <div class="form-group">
          
        </div>
          
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>  <!-- /.modal-content -->
  </div> <!-- /.modal-dialog -->
</div> <!-- /Add military service modal -->