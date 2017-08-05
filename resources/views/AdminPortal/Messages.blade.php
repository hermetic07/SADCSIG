@extends('AdminPortal.master2')

@section('Title') Messages @endsection


@section('mtitle') Messages  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/Messages')}}"> Messages</a></li>  @endsection
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
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


<div class="row">
           <div class="col-lg-12	">

       <div class="white-box">
                   <label class="col-xs-5 control-label"></label>
         <div class="col-lg-2">
       <button class="btn btn-success btn-block waves-effect waves-light"  data-toggle="modal" data-target="#Add"  type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="model_img img-responsive"><span class="btn-label"><i class="fa fa-pencil-square-o"></i></span>Compose</button>
</div>
         </br>  </br>  </br>     </br>  </br>  </br>
                <div class="row  el-element-overlay">

         <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
           <thead>
             <tr>
             <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th>
     <th width="100px">Sender</th>
              <th>Name</th>
      <th> Date </th>
     <th>Subject</th>
           <th width="50px"data-sort-ignore="true" >Actions</th>
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
                                <a href="{{url('/SecuProfile')}}"><img src="plugins/images/Clients/Active/chris.jpg" alt="user"  class="img-circle img-responsive"></a>
                     <div class="el-overlay">
                       <ul class="el-info">
                                                   <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                         </ul>
                     </div>
               </div>
               </div>
        </td>

         <td><span class="label label-table label-success">Client</span></td>
               <td>Ernest john maskarino</td>
                  <td>Jan-28-2017 09:52 PM</td>
               <td>Message</td>

                 <td> 	 &nbsp;
        <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-envelope-o"></i> </button></td>

                       </tr>
              <tr>
                           <td>								<div class="el-card-item">
               <div class="el-card-avatar el-overlay-1">
                                <a href="{{url('/SecuProfile')}}"><img src="plugins/images/Clients/Active/ernest.jpg" alt="user"  class="img-circle img-responsive"></a>
                     <div class="el-overlay">
                       <ul class="el-info">
                                                   <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                         </ul>
                     </div>
               </div>
               </div></td>

         <td><span class="label label-table label-success">Client</span></td>
               <td>Ernest john maskarino</td>
                  <td>Jan-28-2017 09:52 PM</td>
               <td>Guard replacement request</td>

                 <td> 	 &nbsp;
        <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-envelope"></i> </button></td>

                       </tr>

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

         <td><span class="label label-table label-info">Security guards</span></td>
               <td>Ernest john maskarino</td>
                  <td>Jan-28-2017 09:52 PM</td>
               <td>Leave request</td>

                 <td> 	 &nbsp;
        <button type="button" class="btn btn-info btn-circle"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-envelope"></i> </button></td>

                       </tr>
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

           </div>

        </div>
          </div>

   <!-- Deliver guns -->
<div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Message</strong></center></h4>
               </div>
               <div class="modal-body">
           <form data-toggle="validator">
             <div class="form-group">
               <div class="row">
       <div class="form-group col-sm-12">
                    <label class="control-label">Subject:</label>
                       <p class="form-control-static"> Message</p>
                    <div class="help-block with-errors"></div>
                 </div>
       <div class="form-group col-sm-12	">
                    <label class="control-label">Content:</label>
                       <p class="form-control-static"> Good morning! I would likely to show my gratitude because of awesome service!</p>
                    <div class="help-block with-errors"></div>
                 </div>


              </div>
                <div class="help-block with-errors"></div>
             </div>
         </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
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

  @endsection
