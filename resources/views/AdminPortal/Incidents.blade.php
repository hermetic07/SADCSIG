@extends('AdminPortal.master2')

@section('Title') Incidents @endsection


@section('mtitle') Incidents  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/Admin-Incidents')}}"> Incidents</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


<div class="row">
		          <div class="col-lg-12	">

          <div class="white-box">
			                <label class="col-xs-4 control-label"></label>
            <div class="col-lg-3">

</div>
			      <
			  					 <div class="row  el-element-overlay">

            <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
              <thead>
                <tr>
				        <th >Guard</th>
                <th >Establishment</th>
                <th width="500px">Content</th>
								<th >Date</th>
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
                @foreach($a as $a)
                <tr>
                  <td>{{$a->f}} {{$a->l}}</td>
                  <td>{{$a->name}}</td>
                  <td>{{$a->report}}</td>
                  <td>{{$a->date}}</td>
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
					   </div>
              <!-- /.modal-dialog -->
            </div>
<!-- /Add military service modal -->

     </div>\
  @endsection

  @section('script')

  @endsection
