@extends('AdminPortal.master2')

@section('Title') Security guards' DTR @endsection


@section('mtitle') Security Guards' <br>Daily Time Record  @endsection

@section('mtitle2')
                        <li><a href="{{url('/SecurityGuards')}}"> Security guards</a></li>
                         <li class="active"><a href="{{url('/GuardsDTR')}}"> DTR</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect active"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
            <div class="col-lg-12	">

        <div class="white-box sttabs tabs-style-bar">
          <nav>
            <ul>
              <li><a href="#section-bar-1" class="sticon fa fa-list-alt"><span>Add Record</span></a></li>
              <li><a href="#section-bar-2" class="sticon fa fa-plus"><span>View Records</span></a></li>
            </ul>
          </nav>
          <div class="content-wrap">
            <section id="section-bar-1">

              		<div class="panel panel-warning ">
              		  <div class="panel-heading">
              		    <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Add Attendance Records</strong></h3>
              		  </div>
              		  <div class="panel-body">
                      @if ($message = Session::get('success'))
              					<div class="alert alert-success" role="alert">
              						{{ Session::get('success') }}
              					</div>
              				@endif

              				@if ($message = Session::get('error'))
              					<div class="alert alert-danger" role="alert">
              						{{ Session::get('error') }}
              					</div>
              				@endif
              				<h3>Import File Form:</h3>
              				<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

              					<input type="file" name="import_file" />
              					{{ csrf_field() }}
              					<br/>

              					<button class="btn btn-success">Import CSV or Excel File</button>

              				</form>
              				<br/>
              		  </div>
              		</div>

            </section>
            <section id="section-bar-2">
              <div class="row  el-element-overlay white-box">
                    <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><center><strong>Attendance Records</strong></center></h3>
                     <h4><center><strong></strong></center></h4>
           <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
             <thead>
               <tr>
         <th data-sort-ignore="true" width="80px"></th>
                 <th>Name</th>
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
              @foreach($emp as $e)
                        <tr>
                             <td>
                               <div class="el-card-item">
                                 <div class="el-card-avatar el-overlay-1">
                                                  <a href="{{URL('/SecuProfile',$e->id)}}"><img src="uploads/{{$e->image}}" alt="image"  class="img-circle img-responsive"></a>
                                       <div class="el-overlay">
                                         <ul class="el-info">
                                            <li><a class="btn default btn-outline" href="{{URL('/SecuProfile',$e->id)}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                                       </div>
                                 </div>
                               </div>
                              </td>
                             <td>{{$e->first_name}} {{$e->middle_name}} {{$e->last_name}}</td>
                             <td>
                               <form class="" action="/Admin-View-DTR" method="post">
                                 {{csrf_field()}}
                                    <input type="hidden"  name="id" id="id" value="{{$e->id}}">
                                   <button type="submit"class="btn btn-info" ><i class="fa fa-calendar"></i> Show DTR </button>
                               </form>
                             </td>
                        </tr>
                @endforeach
             </tbody>
             <tfoot>
               <tr>
                 <td colspan="3"></td>
               </tr>
             </tfoot>
         </table>

           <div class="text-right">
             <ul class="pagination">
             </ul>
           </div>

                          </div>
            </section>

          </div>

            </div>


                <div class="col-lg-6 animated slideInRight guards" style="display:none">

        <div class="white-box">
          <div id="calendar" ></div>
        </div>


                </div>
           </div>


              </div>

  @endsection

  @section('script')

  <script type="text/javascript">
  jQuery(document).ready(function($){
  	var click =0;
    $('.show').on('click', function(e){
  	  if (click == 0){

  		  	  click++;
  	  $(".guards").show();
      $(this).parent().parent().parent().parent().parent().toggleClass('col-lg-12').toggleClass('col-lg-6');
  	  }


    });


  });
  		 $( document ).ready(function() {

  			 		$('input[name="radio"]').click(function(){
  				if($(this).attr("value")=="2"){
  						$(".deploymentdate").show();
  					}else{
  					 $(".deploymentdate").hide();
  					}
  				});

  			 $('#slimtest4').slimScroll({
              color: '#FFFFFF',
              size: '10px',
              height: '820px',
              alwaysVisible: false
  		  });

  });

  </script>
  @endsection
