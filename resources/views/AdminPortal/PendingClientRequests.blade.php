@extends('AdminPortal.master2')

@section('Title') Pending request @endsection


@section('mtitle') Client's pending request  @endsection

@section('mtitle2')
                      <li>Client</li>
                         <li class="active"><a href="{{url('/PendingClientRequest')}}"> Pending requests</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
    <div class="sttabs tabs-style-linetriangle white-box">
      <nav>
            <ul>
              <li><a href="#section-linetriangle-1"><span>Service</span></a></li>
              <li><a href="#section-linetriangle-2"><span>Additional guns</span></a></li>
              <li><a href="#section-linetriangle-3"><span>Additional guards</span></a></li>
              <li><a href="#section-linetriangle-3"><span>Guard replacement</span></a></li>
            </ul>
          </nav>
            <div class="content-wrap">
              <section id="section-linetriangle-1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="row ">


                   </div>
                   </div>
        </section>

                               <section id="section-linetriangle-2">
                                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
                <th data-sort-initial="true" data-toggle="true">Date requested</th>
                  <th>Client's name</th>
                  <th>Client's establishment</th>
                  <th>location</th>        
                  <th data-sort-ignore="true" width="150px">Actions</th>
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
                 <tr>
                              <td>07/11/28 07:25</td>
                              <td>Abel mandap</td>
                              <td>pup</td>
                              <td> sta. mesa, manila </td>
                              <td>
							  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#ReqInfo"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View request</button>
                              </td>
                 </tr>
                 <tr>
                              <td>07/11/28 07:25</td>
                              <td>Abel mandap</td>
                              <td>pup</td>
                              <td> sta. mesa, manila </td>
                              <td>
							  <button class="btn btn-block btn-info"  data-toggle="modal" data-target="#ReqInfo"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View request</button>
                              </td>
                 </tr>
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

                               
                               </section>
                               <section id="section-linetriangle-3"><h2>Tabbing 3</h2></section>
                                    <section id="section-linetriangle-3"><h2>Tabbing 4</h2></section>
                             </div><!-- /content -->
                           </div><!-- /tabs -->



        </div>


          <!-- Reques info by client -->
  <div id="ReqInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
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
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><b>Abel mandap</b>
              <p style="margin-top:0px;">Order #123</p></td>
            <td align="right" width="100"> 07/11/28 07:25 </td>
          </tr>
          <tr>
            <td colspan="2" style="padding:20px 0; border-top:1px solid #f6f6f6;"><div>
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;">Dessert eagle</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;"  align="right">x2</td>
                    </tr>
                                      <tr>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;">m4a1</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; margin: 0; padding: 9px 0;"  align="right">x3</td>
                    </tr>
                                        <tr class="total">
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" width="80%">Total</td>
                      <td style="font-family: 'arial'; font-size: 14px; vertical-align: middle; border-top-width: 1px; border-top-color: #f6f6f6; border-top-style: solid; margin: 0; padding: 9px 0; font-weight:bold;" align="right">x5</td>
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
            <button type="submit" class="btn btn-info waves-effect waves-light" onClick="window.location='{{url('/DeliverGuns')}}';" >Process Delivery</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light" onclick="reject();" >Reject request</button>
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
  function reject()
{
    $('#ReqInfo').modal('hide');
  swal({
    title: "Reason for rejection",
     text: "<textarea id='text'></textarea>",
  html: true,
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    inputPlaceholder: "Write something"
  },
  function(inputValue){
    if (inputValue === false) return false;

    if (inputValue === "") {
      swal.showInputError("You need to write something!");
      return false
    }
   
  });

}
  </script>
  @endsection
