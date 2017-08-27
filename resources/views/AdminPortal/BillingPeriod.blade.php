@extends('AdminPortal.master2')

@section('Title') Billing Period @endsection


@section('mtitle') Billing Period  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/BillingPeriod')}}"> Billing Period </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

      <div class="row">
		          <div class="col-lg-12	">

          <div class="white-box">
			  <h4><center><strong>Clients</strong></center></h4>
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Contract Code</th>
				  <th data-hide="phone, tablet" >Due date</th>
                  <th data-sort-ignore="true" width="300px">Actions</th>
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
                        @foreach($all as $a)
                          <tr> 
                              <td>{{$a->first}} {{$a->last}}</td>
                              <td> {{$a->cid}} </td>
					 		                <td> {{$a->due}} </td>
                              <td>
							 			          <button class="btn btn-info" onclick="fun_view('{{$a->cid}}','{{$a->client}}','{{$a->collection}}','{{$a->bill}}')" data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ti-receipt"></i> Send invoice</button>
                              <button class="btn btn-success"  ><i class="fa fa-list"></i> View records</button>
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

            <div class="text-right">
              <ul class="pagination">
              </ul>
            </div>

			        </div>


					   </div>

		  <!-- Deliver guns -->
  <div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Send Statement of Account</strong></center></h4>
                  </div>
                  <div class="modal-body">
              <form data-toggle="validator">
                <input type="hidden" id="col_id">
                <input type="hidden" id="cli_id">
                <input type="hidden" id="con_id">
                <div class="form-group">
                  <div class="row">
					          <div class="form-group col-sm-6">
                       <label class="control-label">Client name</label>
                          <p class="form-control-static" id="name">  </p>
                       <div class="help-block with-errors"></div>
                    </div>
										<div class="form-group col-sm-6">
                       <label class="control-label">Contact number</label>
                           <p class="form-control-static" id="cn">  </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  			<div class="form-group col-sm-6">
                       <label class="control-label">Establishment name</label>
                          <p class="form-control-static" id="es"> </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  				  			<div class="form-group col-sm-6">
                       <label class="control-label">Address</label>
                          <p class="form-control-static" id="ad"> </p>
                       <div class="help-block with-errors"></div>
                    </div>
					  		<div class="form-group col-sm-6">
                       <label class="control-label">Guards deployed</label>
                          <p class="form-control-static" id="gd">  </p>
                       <div class="help-block with-errors"></div>
                </div>
								<div class="form-group col-sm-6">
                  <label class="control-label">Contract Date</label>
                      <p class="form-control-static" id="cd"> </p>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-6">
                  <label class="control-label">Service period from</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calender"></i>   </span> <input type="text" class="form-control firstcal" id="firstcal" placeholder="yyyy/mm/dd" name="from"  required />
                  </div>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-6">
                  <label class="control-label">Service period to</label>
                      <p class="form-control-static" id="st"> </p>
                  <div class="help-block with-errors"></div>
                </div>
					  								<div class="col-xs-12">
														    
                  <button class="btn btn-block btn-success"  onclick="fun_soa()" ><i class="ti-receipt"></i> CREATE SOA</button>
							    </div>

                   <div class="help-block with-errors"></div>
                </div>
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info waves-effect waves-light" onclick="fun_submit()">Submit</button>
             </div>
            </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
<!-- /Add military service modal -->

     </div>


  @endsection
  
  @section('script')
  <script>
    function fun_submit(params) {
      var id = $( "#col_id" ).val();
      $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      }); 
      $.ajax({
          type: 'post',
          url: '/Submit-Billing',
          data: {
              'id':id,
          },
          success: function(data){
            alert(data);
            if(data==="SOA SENT"){
              location.reload();
            }
          }
      });
    }

    function fun_soa() {
      var con =$( "#con_id" ).val();
      var cli =$( "#cli_id" ).val();
      var col =$( "#col_id" ).val();
      var date1 = $( "#firstcal" ).val();
      var date2 = $( "#st" ).html();
      var diff =  Math.floor(( Date.parse(date2) - Date.parse(date1) ) / 86400000);

      var d = new Date();
      var day = d.getDate();
      var today = new Date();
      var mm = today.getMonth()+1;
      if(day<10) {
          day = '0'+dd
      } 
      
      if(mm<10) {
            mm = '0'+mm
      } 
      var date = today.getFullYear()+'-'+mm+'-'+day;

      var ur = '/SOA/'+con+'/'+col+'/'+cli+'/'+diff+'/'+date+'/'+date1+'/'+date2;
      window.open(ur,"_blank");    
    }

    function fun_view(contract,client,collection,bill){
        $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        }); 
        $.ajax({
          type: 'post',
          url: '/GetBilling',
          data: {
              'client':client,
              'contract':contract,
          },
          success: function(data){
            $( "#col_id" ).val(collection);
            $( "#cli_id" ).val(client);
            $( "#con_id" ).val(contract);

            $( "#name" ).html(data.name);
            $( "#cn" ).html(data.con);
            $( "#es" ).html(data.es);
            $( "#ad" ).html(data.add);
            $( "#gd" ).html(data.gd);
            $( "#cd" ).html(data.cd);
            $( "#st" ).html(bill);
          }
        });
    }
  </script>
  <script>
  
  $(function() {


     $(".firstcal").datepicker({
         dateFormat: "yy-mm-dd",
         
     });
     
 });
  </script>
  <script>
              $(document).ready(function(){
                  // Basic
                  $('.dropify').dropify();

                  // Translated
                  $('.dropify-fr').dropify({
                      messages: {
  							default: 'Upload your file',
  							replace: 'Drag and drop or click to replace file',
                          remove:  'Remove',
                          error:   'Please upload a valid file'
                      }
                  });

                  // Used events
                  var drEvent = $('#input-file-events').dropify();

                  drEvent.on('dropify.beforeClear', function(event, element){
                      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                  });

                  drEvent.on('dropify.afterClear', function(event, element){
                      alert('File deleted');
                  });

                  drEvent.on('dropify.errors', function(event, element){
                      console.log('Has Errors');
                  });

                  var drDestroy = $('#input-file-to-destroy').dropify();
                  drDestroy = drDestroy.data('dropify')
                  $('#toggleDropify').on('click', function(e){
                      e.preventDefault();
                      if (drDestroy.isDropified()) {
                          drDestroy.destroy();
                      } else {
                          drDestroy.init();
                      }
                  })
              });
          </script>
  @endsection
