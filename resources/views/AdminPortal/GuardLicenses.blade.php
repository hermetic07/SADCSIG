@extends('AdminPortal.master2')

@section('Title') Security Guards' Licenses @endsection


@section('mtitle') Security Gsuards' Licenses  @endsection

@section('mtitle2')
                        <li><a href="{{url('/SecurityGuards')}}"> Security guards</a></li>
                         <li class="active"><a href="{{url('/GuardLicenses')}}"> Licenses</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect active"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection

      
@section('content')


      <div class="row">
        <div class="col-lg-12">
          <div class="white-box">
               <div class="row">
                    <div class="col-sm-12" >

                        <div class="white-box" style="float:right;" >
                            <h3 class="box-title">Search</h3>
                            <form role="form" class="row">


                                <div class="col-md-9">
                                    <div class="form-group">
									                             <input type="text" class="form-control" placeholder="Name"  />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-inverse btn-block form-control"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                    <div class="row  el-element-overlay">
					@foreach($all as $a)
						<div class="col-md-4 col-sm-4 content">
							<div class="white-box">
                                    <div class="row">
                        				<div class="col-md-4 col-sm-4 text-center">
                          						<div class="el-card-item">
													<div class="el-card-avatar el-overlay-1">
														@if($a->image!==null)
														  <a href="{{url('/SecuProfile')}}"><img src="uploads/{{$a->image}}" alt="uploads/secu.png"  class="img-circle img-responsive"></a>
														@else  
														  <a href="{{url('/SecuProfile')}}"><img src="default/secu.png" alt="uploads/secu.png"  class="img-circle img-responsive"></a>
														@endif		
														  		<div class="el-overlay">
																	<ul class="el-info">
																		<li><a class="btn default btn-outline image-popup-vertical-fit" href="uploads/{{$a->image}}"><i class="icon-magnifier"></i></a></li>
                                                    					<li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                  									</ul>
																</div>
													</div>
												</div>
										</div>


										<div class="col-md-8 col-sm-8">

                              			<h3 class="box-title m-b-0">{{$a->f}} {{$a->m}} {{$a->l}}</h3>
                                        <small>	{{$a->licensenum}}</small><br>
										<small>	{{$a->class}}</small>
										<div class="row m-t-20">
                                         	<div class="col-md-6 b-r">
                                  				<strong>Date issued</strong>
                                  				<p>{{$a->date_issued}}</p>
                                            </div>
                                			<div class="col-md-6">
												<strong>Date Expired</strong>
												<p>{{$a->date_expired}}</p>
                                			</div>
                              			</div>
										</div>

								</div>
                                <button type="button" class="btn btn-block btn-danger" onclick="send('{{$a->empid}}')" ><i class="fa fa-list-alt"></i> </i> Send Warning</button> <button type="button" class="btn btn-block btn-info" href="#renew" data-toggle="modal" data-target="#renew" onclick="view('{{$a->empid}}')"><i class="fa fa-list-alt"></i> </i> Renew license</button>
                             </div>
			  			</div>
						@endforeach



     				<div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination pagination-split">
                                <li class="pag_prev"> <a href="#"><i class="fa fa-angle-left"></i></a> </li>
                                <li class="pag_next"> <a href="#"><i class="fa fa-angle-right"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
           </div>
        </div>
<!-- /.row -->

     </div>

     <!-- Leave Modal -->
<div id="renew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Renew Guard License</strong></center></h4>
                </div>
                <div class="modal-body">
            <form data-toggle="validator">
              <div class="form-group">
                  <input type="hidden" id="empid">
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label class="control-label">Date Issued</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control firstcal" id="firstcal" placeholder="mm/dd/yyyy" name="from"/>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group col-sm-6">
                    <label class="control-label">Date Expire</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="icon-calender"></i></span> <input type="text" class="form-control firstcal" id="secondcal" placeholder="mm/dd/yyyy" name="to"/>
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>
               </div>
                 <div class="help-block with-errors"></div>
              </div>
          </div>
           <div class="modal-footer">
            <button type="button" id="edd" class="btn btn-info waves-effect waves-light" onclick="update()">Submit</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
           </div>
          </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
  @endsection
  @section('script')
<script>
    function view(id){
        $('#empid').val(id);
    }
    function send(id){
        $.ajaxSetup({
          headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        $.ajax({
          type: 'post',
          url: '/Send-License-Warning',
          data: {
              'id':id,
          },
          success: function(data){
            alert(data);
          }
        });
    }
    function update(){
        $.ajaxSetup({
          headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        $.ajax({
          type: 'post',
          url: '/Update-License-Info',
          data: {
              'id':$('#empid').val(),
              'issued':$('#firstcal').val(),
              'expire':$('#secondcal').val(),
          },
          success: function(data){
            alert(data);
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
  
  $(function() {


     $(".secondcal").datepicker({
         dateFormat: "yy-mm-dd",
         
     });
     
 });
  </script>
  @endsection