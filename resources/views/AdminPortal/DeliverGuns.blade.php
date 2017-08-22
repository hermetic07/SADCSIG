@extends('AdminPortal.master2')

@section('Title') Deliver Guns @endsection


@section('mtitle') Deliver Guns  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/DeliverGuns')}}">Deliver Guns</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect active"> @endsection


@section('content')


<div class="row">
<div class="row">
           <div class="col-lg-12">
               <div id="table-container" class="white-box">
                                
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
                @if($gunRequest->strGunReqID == $gunRequestID)

                 <tr style="background-color: gray;">
                              <td>{{$gunRequest->strGunReqID}}</td>
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
                 @else
                 <tr>
                              <td>{{$gunRequest->strGunReqID}}</td>
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
            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>  

          </div>


<input type="hidden" id="gunRequestID" value="{{$gunRequestID}}">


              <div class="col-lg-5 animated slideInRight guards" style="display:none">

      <div class="white-box">
    
       <h4><center><strong>Items	</strong></center></h4>
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
             <tr>
                          <td>
            
                          <div class="checkbox checkbox-success checkbox-circle">
                           <input id="gun1" type="checkbox" >
                           <label for="gun1"></label>
                         </div>
                          </td>
                          <td>Pistol</td>
                          <td>Glock 49</td>
                          <td>
                          <input type="text" class="form-control">
                          </td>
              </tr>
              <tr>
                          <td>
                 
                          <div class="checkbox checkbox-success checkbox-circle">
                           <input id="gun2" type="checkbox" >
                           <label for="gun2"></label>
                         </div>
                          </td>
                          <td>shotgun</td>
                          <td>spas</td>
                          <td>
                          <input type="text" class="form-control">
                          </td>
                      </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
            </tr>
          </tfoot>
      </table>

       </br>

        <center><button class="btn  btn-success "   data-toggle="modal" data-target="#Delgun"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-sign-in"></i> Deliver</button></center>

          </div>

              </div>


         </div>










    <!-- Reques info by client -->
  

                  <!-- Gun delivery -->
  <div id="Delgun" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Deliver guns</strong></center></h4>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator">
                    <div class="form-group">
                    <div class="row">  
                             <div class="table-responsive">
                                 <table class="table color-bordered-table dark-bordered-table">
                                    <thead>
                                        <tr>
                                            <th>Gun type</th>
                                            <th>Gun name</th>
                                            <th width="150px">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pistol</td>
                                            <td>Dessert eagle</td>
                                            <td>
                                                 1
       
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>shotgun</td>
                                            <td>spas</td>
                                            <td>
                                                 1
       
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </br>
                            <div class="form-group col-sm-8">
                      <label class="control-label">Delivered by</label>
                       <input type="text" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
					   <div class="form-group col-sm-4">
                       <label class="control-label">Contact number</label>
                       <input type="text" class="form-control" required>
                       <div class="help-block with-errors"></div>
                    </div>
					  		  				  			<div class="form-group col-sm-9">
                       <label class="control-label">Delivery code</label>
                          <p class="form-control-static">6C4NpIo1</p>
                       <div class="help-block with-errors"></div>
					  </div>
					 <div class="col-sm-3">
						 </br>
         <button type="button" class="btn btn-info waves-effect waves-light" >Generate code</button>
					  </div>
                 </div>
                   <div class="help-block with-errors"></div>
                </div>

                        </div>



           
        
                          <div class="modal-footer">
          <button type="button" class="btn btn-info waves-effect waves-light" >Deliver</button>

          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
             </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
              </div>
  @endsection

  @section('script')
 <script type="text/javascript">
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
 $(document).ready(function(){
  gunRequestID = $('#gunRequestID').val();
  //alert(gunRequestID);

   $('.viewReq').on('click',function(){
      $.ajax({
        url : "{{route('gun.delivery.view')}}",
        type : 'GET',
        data : {gunReqstID:this.value},
        success : function(data){
          $('.viewrequest').text('');
          $('.viewrequest').append(data);
          $('#modalview').modal('show');
          console.log(data);
        }

      });
      
    });
  
 });
 // function loadTable(){
 //      $.ajax({
 //          type: 'get',
 //          url: "{{ route('gun.delivery.table') }}",
 //          dataType: 'html',
 //          data : {gunRequestID:gunRequestID},
 //          success:function(data)
 //          {
 //              $('#table-container').html(data);
 //              //$('#dataTable').DataTable();
 //          }
 //      });
 //  }
jQuery(document).ready(function($){
 var click =0;
 $('#show').on('click', function(e){
   if (click == 0){

         click++;
   $(".guards").show();
   $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-7');
   }


 });


});


</script>
  @endsection
