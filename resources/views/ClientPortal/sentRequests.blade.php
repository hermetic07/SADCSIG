@extends('ClientPortal.master3')
@section('Title') Sent Requests @endsection


@section('mtitle') Sent Requests  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/Request-sent')}}">  Sent Requests  </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')
	<div class="row">
        <div class="col-lg-12 ">

    <div class="white-box">
             <div class="row  el-element-overlay">
  <h4><center><strong>Sent Requests to Agency</strong></center></h4>
      <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
        <thead>
          <tr>
          <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th>
            <th>Request ID</th>
    <th data-hide="phone, tablet" >Subject</th>
      <th >Status</th>
            <th data-sort-ignore="true" width="260px">Actions</th>
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

     </div>
       </div>
@endsection