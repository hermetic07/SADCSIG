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
                  <th>Status</th>    
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
                 
                  @foreach($gunRequests as $gunRequest)
                    @if($gunRequest->isRead == 1)
                  <tr style="background-color: gray;">
                    <td>{{$gunRequest->created_at}}</td>
                              <td>{{$gunRequest->client_fname}},{{$gunRequest->client_mname}},{{$gunRequest->client_lname}}</td>
                              <td>{{$gunRequest->establishment}}</td>
                              <td>{{$gunRequest->address}},{{$gunRequest->area}},{{$gunRequest->province}}</td>
                              <td>
                                {{$gunRequest->status}}
                              </td>
                              <td>
                <button class="btn btn-block btn-info viewReq" type="button" value="{{$gunRequest->strGunReqID}}" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View request</button>
                              </td>
                  
                              </tr>
                      @else
                        <tr>
                    <td>{{$gunRequest->created_at}}</td>
                              <td>{{$gunRequest->client_fname}},{{$gunRequest->client_mname}},{{$gunRequest->client_lname}}</td>
                              <td>{{$gunRequest->establishment}}</td>
                              <td>{{$gunRequest->address}},{{$gunRequest->area}},{{$gunRequest->province}}</td>
                              <td>
                                {{$gunRequest->status}}
                              </td>
                              <td>
                <button class="btn btn-block btn-info viewReq" type="button" value="{{$gunRequest->strGunReqID}}" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View request</button>
                              </td>
                  
                              </tr>
                      @endif
                 @endforeach
                </tbody>
              <tfoot>
                <tr>
                  <td colspan="6"></td>
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
    $('.viewReq').on('click',function(){
      $.ajax({
        url : "{{route('view.gunRequest')}}",
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