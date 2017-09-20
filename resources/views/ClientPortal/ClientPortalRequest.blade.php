@extends('ClientPortal.master3')
@section('Title') Requests @endsection
@section('clientName')
   {{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}
@endsection
@section('link_rqst')
  href="/Request-{{$client->id}}"
@endsection
@section('link_guardsDTR')
  href="/ClientPortalGuardsDTR-{{$client->id}}"
@endsection
@section('link_estab')
   href="/ClientPortalEstablishments-{{$client->id}}"
@endsection
@section('link_home')
  href="/ClientPortalHome-{{$client->id}}"
@endsection
@section('link_messages')
  href="/ClientPortalMessages-{{$client->id}}"
@endsection
@section('mtitle') Requests @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection

@section('content')
<form class="form-horizontal" method="GET" action="{{ url('/Request-sent') }}">
  <input type="hidden" name="establishments_id" value="{{ $client->id }}">
  <button type="submit" class="btn btn-info pull-right">View Sent Request</button>
</form>
   <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for a new service</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Got a new establishment? And want us to serve you? We would like to! Request a service on us and let's talk about it!</p>

                <label class="col-xs-6 control-label"></label>  <button class="btn btn-info m-t-10" data-toggle="modal" data-target="#Service"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</button>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for additional guns</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Request for a additional guns and the agency will process it and when it will be legallize, the agency will process it for you.</p>

                <label class="col-xs-6 control-label"></label>  <a class="btn btn-info m-t-10" data-toggle="modal" data-target="#reqGuns"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for additional guards</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Request for a additional guns and the agency will process it and when it will be legallize, the agency will process it for you.</p>

                <label class="col-xs-6 control-label"></label>  <a class="btn btn-info m-t-10" data-toggle="modal" data-target="#reqAddGuards" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>

              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Request for guard replacement</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>You don't like the guard that deployed to you? or for other reason? Request for a replacement of that guard and the agency will process it right away.</p>

                <label class="col-xs-6 control-label"></label>  <a class="btn btn-info m-t-10" data-toggle="modal" data-target="#guardReplacement" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>


              </div>
            </div>
          </div>
        </div>
      

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-r-10 m-t-10" style="border: 2px solid black;">
          <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle"></i> Qoutation</div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">

                <p>Curious about our different service fees? Fill up the form and automaticaly know our prices</p>

                <label class="col-xs-6 control-label"></label>  <a class="btn btn-info m-t-10" data-toggle="modal" data-target="#qout" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Request</a>


              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /.container-fluid -->
      <footer class="footer text-center"> 2017 </footer>
    </div>    <!-- /#page-wrapper -->
  </div>    <!-- /#wrapper -->

<!-- Deliver guns -->
  <div id="reqGuns" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Additional gun request</strong></center></h4>
        </div>
        <div class="modal-body">

          <form data-toggle="validator" method="POST" action="{{ url('/GunRequest-Save',$client->id) }}">
            {!! csrf_field() !!}
             <div class="form-group">
               <div class="row">
                 <div class="form-group col-sm-12">
                  <label class="control-label">Establishment</label>
                                           <select class="form-control"  name="establishment_id" required>
                <option value="" disabled="" selected="">Your Establishments</option>
                  @php
                    $estabCtr = 0;
                    $arr = array();
                    $a = 0;
                    $l = 0;

                  @endphp

                  @foreach($clientRegistrations as $clientRegistration)
                    @if($clientRegistration->client_id == $client->id)
                      @foreach($contracts as $contract)
                        @if($contract->id == $clientRegistration->contract_id)
                          @foreach($establishments as $establishment)
                            @if($establishment->contract_id == $contract->id)
                              @php
                                $estabID = $establishment->id;
                                  $arr[$a] = $estabID; $a++;
                                  $l = count($arr);
                              @endphp
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endif
                  @endforeach

                  @php
                    $e = 0;
                    for($q = 0; $q < count($arr); $q++){
                      for($p = $q+1; $p < count($arr); $p++){
                        if($arr[$q] == $arr[$p]){
                          $arr[$p]="-";
                        }
                      }    
                    }
                    for($f = 0; $f < count($arr); $f++){
                      if($arr[$f] != "-"){

                        @endphp
                          @foreach($establishments as $establishment) 
                            @if($establishment->id == $arr[$f])
                              <option value="{{$establishment->id}}">{{$establishment->name}}</option>
                              @break;
                            @endif
                          @endforeach
                          
                        @php
                      }
                    }

                  @endphp
              </select>
              </div>  
                <div class="form-group col-sm-6">

                        <label class="control-label">Gun type</label>
                        <select class="form-control" onchange="getGuns(this.value)">
                        <option>~~~ Select Gun Type</option>
                        @foreach($gunType as $type)
                          @if($type->status == "active")
                            <option value="{{$type->id}}">{{$type->name}}</option>
                          @endif
                        @endforeach
                        </select>
            </div>
            </br>       </br>

                <div class="form-group col-sm-12">
                </br>
            <center>
             <label class="control-label">List of available guns</label>   
            </center>
            <div class="table-responsive">
            <table id="Table" class="table table-bordered table-hover toggle-circle color-bordered-table muted-bordered-table">
              <thead>
                <tr >
                  <th>Gun name</th>
                  <th width="100px">Action</th>
                  <th width="100px">Quantity</th>
                </tr>
              </thead>
              <tbody id="gunsTable">
              
                
              </tbody>
            </table>
            </div>
                
                </div>
                 </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Deliver guns -->

  <!-- Request Service -->
  <div id="Service" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up the following</strong></center></h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator" method="POST" action="{{ url('/Request-Save',$client->id) }}">
              {!! csrf_field() !!}
            <div class="form-group">
               <div class="row">
                 <div class="form-group col-sm-12">
                      <label class="control-label">Service</label>
                       <select class="form-control"  name="service">
                        <option value="" disabled="" selected="">---</option>
                        @foreach($services as $s )
                        <option value="{{ $s->id }}">{{$s->name}}</option>
                        @endforeach
                      </select>
                      <div class="help-block with-errors"></div>
                  </div>

                 <div class="form-group col-sm-6">
                  <label class="control-label">Meeting place</label>
                    <input type="text" class="form-control" id="Nature_Name" name="meeting" pattern="[.,--&\\'a-zA-Z0-9\s]+" value="" required>
                    <div class="help-block with-errors"></div>
                </div>

                 <div class="form-group col-sm-6">
                  <label class="control-label">Meeting schedule</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="meetSched">
                    </div>
                    <div class="help-block with-errors"></div>
                 </div>
                 <div class="form-group col-sm-12 ">
                    <label class="control-label">Description of service:</label>
                    <textarea class="form-control" rows="5" required name="servDesc"></textarea>
                    <div class="help-block with-errors"></div>
                 </div>
              </div>
              <div class="help-block with-errors"></div>
            </div>
            
            <div class="modal-footer">
              <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>      <!-- modal-body -->
        </div>        <!-- /.modal-content -->
      </div>          <!-- /.modal-dialog -->
    </div>          <!-- /request service modal -->

    <!-- Additional Guards -->
  <div id="reqAddGuards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Fill up the following</strong></center></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" data-toggle="validator" method="POST" action="{{ url('/AddGuardRequests-Save',$client->id) }}">
            
                {!! csrf_field() !!}
                  
                    
                    
                      <div class="form-group">
                        <label for="no_guards" class="control-label col-md-3 pull-left">Number of Guards</label>
                        <div class="col-md-8">
                          <input type="number" class="form-control"  id="no_guards" name="no_guards" min="1"  step="0.01"  required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">Establishments</label>
                        <div class="col-md-8">
                          <select class="form-control"  name="establishment_id" onchange="getShifts(this.value)">
                          <option value="" disabled="" selected="">---</option>
                            @php
                              $e = 0;
                              for($q = 0; $q < count($arr); $q++){
                                for($p = $q+1; $p < count($arr); $p++){
                                  if($arr[$q] == $arr[$p]){
                                    $arr[$p]="-";
                                  }
                                }    
                              }
                              for($f = 0; $f < count($arr); $f++){
                                if($arr[$f] != "-"){

                                  @endphp
                                    @foreach($establishments as $establishment) 
                                      @if($establishment->id == $arr[$f])
                                        <option value="{{$establishment->id}}">{{$establishment->name}}</option>
                                        @break;
                                      @endif
                                    @endforeach
                                    
                                  @php
                                }
                              }
                            @endphp
                          </select>
                        </div>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                      <label for="shifts" class="control-label col-md-3">Shifts</label>
                      <div class="col-md-8">
                        <select class="form-control" name="shifts" id="shifts">
                          <option value="">~~ Guard Shifts ~~</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group text-center">
                      <label for="shifts" id="chooseContract" class="control-label col-md-10">You have 3 contract(s) on this establishment. choose where you want to add the new Guards.</label>
                    </div>

                    <div class="form-group">
                      
                      <div class="col-md-8">
                        <ul id="contracts">
                          
                        </ul>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="date_needed" class="col-md-3 control-label">Date needed</label>
                      <div class="col-md-8">
                        <input type="text" name="date_needed" id="date_needed" class="form-control" placeholder="Expected date when you need the Guards">
                      </div>
                    </div>
               
             <div class="form-group">
            <div class="modal-footer">
              <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" >Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
            </div>
          </form>
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Additional Guards -->

 <!-- Guard Replacement -->
  <div id="guardReplacement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Choose Guards to Replace</strong></center></h4>
        </div>
        <div class="modal-body">
          <div class="form-group text-center">
            <label for="shifts" id="chooseContract" class="control-label col-md-10">You have already {{count($clientContracts)}} active contract(s). Please choose one to show the guards.</label>
          </div>

          <div class="form-group">
            
            <div class="col-md-8">
              <ul id="contracts">
                @foreach($clientContracts as $clientContract)
                  <li><input type="radio" name="contracts" onchange="func_getGuards('{{$clientContract->contractCode}}')"> <a href="/getContractPDF-{{$contract->id}}" target="_blank">{{$clientContract->contractCode}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          
            {!! csrf_field() !!}
            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr id="earl">
                  <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="100px" ></th>
                  <th width="300px">Guard's Info</th>
                  
                  <th  data-sort-ignore="true">Reasons</th>  
                  <th data-sort-ignore="true">Action</th>
                </tr>
                </thead>
                <tbody class="guard-table-body">
                  
                    
                      
                </tbody>
              </thead>
            </table>
            <input type="hidden" name="numGuards" value="">
            <div class="modal-footer">
              <button type="button" id="guardReplacementModal" data-dismiss="modal" class="btn btn-info waves-effect waves-light" disabled>Submit</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
          
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Guard Replacement-->

  <div id="replaceGuards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: firebrick;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong style="color: white;">Are you sure you really want to replace these Guards??</strong></center></h4>
        </div>
        <div class="modal-body replaceGuard-content">
          
        </div>
      </div>    <!-- /.modal-content -->
    </div>     <!-- modal-dialog -->
  </div>      <!-- Guard Replacement-->

  <!-- qout Modal -->
<div id="qout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Quotation</strong></center></h4>
                </div>
                <div class="modal-body">
            <form data-toggle="validator" method="POST" action="{{URL::to('/Client-Qoute')}}">
              <div class="form-group">
                <div class="row">
                  {{csrf_field()}}
                  <div class="form-group col-sm-4">
                    <label class="control-label">Nature of Business</label>
                    <select class="form-control"  name="nature" id="nature">
                      <option value="" disabled="" selected="">---</option>
                      @foreach($nature as $n)
                      <option value="{{$n->id}}">{{$n->name}}</option>
                      @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                 </div>
                 <div class="form-group col-sm-4">
                     <label class="control-label">Number of Guards</label>
                      <input class="form-control" type="number" name="gnum" placeholder="0">
                     <div class="help-block with-errors"></div>
                  </div>
                   <div class="form-group col-sm-4">
                     <label class="control-label">Months</label>
                     <input class="form-control" type="number" name="months" placeholder="0">
                     <div class="help-block with-errors"></div>
                  </div>
                </div>
                
          </div>
           <div class="modal-footer">
            <button type="submit" id="edd" class="btn btn-info waves-effect waves-light" onclick="">Submit</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
           </div>
          </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
<!-- /leave -->





<input type="hidden" id="clientID" value="{{$client->id}}">

  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
      guardIDs = [];
      establishment_id = '';
      contract_id = '';
      guardCount = 0;

      function func(id,estabID,contractID){
        establishment_id = estabID;
        contract_id = contractID;
        guardIDs.push(id);

        $('#'+id).removeAttr("disabled");
        $('#guardReplacementModal').removeAttr("disabled");
      }
      $('#guardReplacementModal').on('click',function(){
        
        $.ajax({
          url : 'guardReplacementModal',
          type : 'GET',
          data : {guardIDs:guardIDs,establishment_id:establishment_id,contract_id:contract_id},
          success : function(data){
            $('.replaceGuard-content').text('');
            $('.replaceGuard-content').append(data);
            $('#replaceGuards').modal('show');
          }
        });
      });
      function func_dont_replace(id,ctr){
        guardCount = guardCount + 1;
        //alert($('#'+id).val());
        if(guardCount == ctr){
          $('#replaceBtn').attr("disabled", "disabled"); 
        }
        $('#dnt'+id).hide();
      }
      
      function getGuns(id){
        $.ajax({
          url : "{{route('getGuns')}}",
          type : 'GET',
          data : {gunTypeID:id},
          success : function(data){
            // alert(data);
            // console.log(data);
            $('#gunsTable').empty();
            $('#gunsTable').append(data);
          }
        });
      }
      function getShifts(id){
        //console.log('url("/ClientPortalEstablishments-shifts-'+id+'")');

        $.ajax({
          type : 'GET',
          url: '/ClientPortalEstablishments-shifts+'+id,
          success:function(data){
            $('#shifts').text('');
            $('#shifts').append(data[0]);

            $('#contracts').text('');
            $('#contracts').append(data[1]);

            $('#chooseContract').text('');
            $('#chooseContract').append('You have '+'<a href="/ClientPortalContracts-'+$('#clientID').val()+'+'+id+'">'+data[2]+'</a>'+' contract(s) on this establishment.Please choose where you want to add the new Guards.');
            console.log(data[1]);
          }
        });

      }
    
        $(document).ready(function(){
          $('#Table').DataTable({

            "columnDefs": [
           {
            "targets": 2,
            "orderable": false
            },
            {
            "targets": 1,
            "orderable": false
            },
            
            { "searchable": false, "targets": 1 },
            ]

            


          });
      });

  </script>
  <script type="text/javascript">
    reasons = [];
      secuIDs = [];
      function func_replace(){
        $.each($(".secuIDs"), function(){
          reasons.push($('#'+$(this).val()).val());
          alert($(this).val());
          secuIDs.push($(this).val());

          
        });
        $.ajax({
          type : 'GET',
          url: '/guardReplacement-submit',
          data : {reasons:reasons,secuIDs:secuIDs},
          success:function(data){
            
          }
        });
      }

      function func_getGuards(id){
       // alert(id);
       $.ajax({
        url : '/guardReplacement-getGuards',
        type :'GET',
        data : {contractID:id},
        success : function(data){
          console.log(data);
          $('.guard-table-body').text('');
          $('.guard-table-body').append(data);
        }
       });
      }
  </script>
@endsection
@section('script')
@endsection
