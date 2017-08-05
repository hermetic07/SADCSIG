@extends('AdminPortal.master2')

@section('Title') Security guards' DTR @endsection


@section('mtitle') Security guards' Daily time record  @endsection

@section('mtitle2')
                        <li><a href="{{url('/SecurityGuards')}}"> Security guards</a></li>
                         <li class="active"><a href="{{url('/GuardsDTR')}}"> DTR</a></li>  @endsection
@section('Reg')
      <li> <a href="javascript:void(0);" class="waves-effect" ><i class="fa fa-pencil-square-o fa-2x fa-fw p-r-10"></i> <span class="hide-menu"> Registration <span class="fa arrow"></span> </a>
            <ul class="nav nav-second-level">
              <li> <a href="{{url('/ClientRegistration')}}" class="waves-effect">Clients</a>
              </li>
              <li> <a href="{{url('/Guard-Registration')}}" class="waves-effect">Security guards</a>
              </li>
                  </ul>
          </li>
@endsection
@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect active"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
            <div class="col-lg-12	">

        <div class="white-box">

             <div class="row  el-element-overlay white-box">

                    <h4><center><strong>Security guards</strong></center></h4>
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
               <tr>
                            <td>								<div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                                 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2.jpg" alt="user"  class="img-circle img-responsive"></a>
                      <div class="el-overlay">
                        <ul class="el-info">
                                                    <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                      </div>
                </div>
              </div></td>
                            <td>Daisy ronquillo</td>
                            <td>
                <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-calendar"></i> Show DTR </button>

                            </td>
                        </tr>
       <tr>
                            <td>					<div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                                 <a href="{{url('/SecuProfile')}}"><img src="plugins/images/SecurityGuards/2x2 2.jpg" alt="user"  class="img-circle img-responsive"></a>
                      <div class="el-overlay">
                        <ul class="el-info">
                                                    <li><a class="btn default btn-outline" href="{{url('/SecuProfile')}}" target="_blank"><i class="fa fa-info"></i></a></li>
                                          </ul>
                      </div>
                </div>
              </div></td>
                            <td>Luigi lacsina</td>
                            <td>
      <button type="button" class="btn btn-block btn-info show" ><i class="fa fa-calendar"></i> Show DTR </button>
                            </td>
                        </tr>
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
