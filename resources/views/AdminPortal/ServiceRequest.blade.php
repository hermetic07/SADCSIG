@extends('AdminPortal.master2')

@section('Title') Service Requests @endsection


@section('mtitle') Service Requests  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/ServiceRequest')}}">  Service Requests  </a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')

<div class="row">
        <div class="col-lg-12 ">

    <div class="white-box">
             <div class="row  el-element-overlay">
  <h4><center><strong>List of service request</strong></center></h4>
      <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
        <thead>
          <tr>
          <th data-sort-initial="true" data-toggle="true" data-sort-ignore="true"  width="100px"></th>
            <th>Name</th>
    <th data-hide="phone, tablet" >Location</th>
      <th >Service name</th>
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
           <tr>
                        <td>                <div class="el-card-item">
            <div class="el-card-avatar el-overlay-1">
                             <a href="{{url('/SecuProfile')}}"><img src="plugins/images/Clients/Active/chris.jpg" alt="user"  class="img-circle img-responsive"></a>
                  <div class="el-overlay">
                    <ul class="el-info">
                                                <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                      </ul>
                  </div>
            </div>
            </div></td>
                        <td>Chris jerico albino</td>
          <td>Caloocan city</td>
          <td>Campus safety</td>
                        <td>
                        <button class="btn btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>


                          <button class="btn btn-danger"><i class="fa fa-times"></i> Remove </button>

                        </td>
                    </tr>
   <tr>
                           <td>               <div class="el-card-item">
            <div class="el-card-avatar el-overlay-1">
                             <a href="{{url('/SecuProfile')}}"><img src="plugins/images/Clients/Active/luigi.jpg" alt="user"  class="img-circle img-responsive"></a>
                  <div class="el-overlay">
                    <ul class="el-info">
                                                <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank"><i class="fa fa-info"></i></a></li>
                                      </ul>
                  </div>
            </div>
            </div></td>
                        <td>Luigi lacsina</td>
          <td>Manila city</td>
            <td>Security counseling</td>
                        <td>
              <button class="btn btn-info"  data-toggle="modal" data-target="#Swap"  type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list"></i> View details</button>

            <button class="btn btn-danger"><i class="fa fa-times"></i> Remove </button>
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

        </div>

     </div>
       </div>

<!-- Deliver guns -->
<div id="Swap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Request details</strong></center></h4>
            </div>
            <div class="modal-body">
        <form data-toggle="validator">
          <div class="form-group">
            <div class="row">
    <div class="form-group col-sm-4">
                 <label class="control-label">Client's name</label>
                    <p class="form-control-static"> Daisy ronquillo </p>
                 <div class="help-block with-errors"></div>
              </div>
                            <div class="form-group col-sm-8 ">
                 <label class="control-label">Address</label>
                    <p class="form-control-static"> Anonas, Santa Mesa, Maynila, Kalakhang Maynila</p>
                 <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-4">
                 <label class="control-label">Contact number</label>
                     <p class="form-control-static"> 09123456789 </p>
                 <div class="help-block with-errors"></div>
              </div>
                    <div class="form-group col-sm-4">
                 <label class="control-label">Email address</label>
                     <p class="form-control-static"> ejmaskarino@gmail.com</p>
                 <div class="help-block with-errors"></div>
              </div>

          <div class="form-group col-sm-4">
                 <label class="control-label">Requested service</label>
                    <p class="form-control-static"> Campus safety </p>
                 <div class="help-block with-errors"></div>
              </div>
            <div class="form-group col-sm-5">
                 <label class="control-label">Description of Requested service</label>
                    <p class="form-control-static"> I need guards for our school. </p>
                 <div class="help-block with-errors"></div>
              </div>
    <div class="form-group col-sm-3">
                 <label class="control-label">Meeting place</label>
                     <p class="form-control-static"> Agency </p>
                 <div class="help-block with-errors"></div>
              </div>
     <div class="form-group col-sm-4">
                 <label class="control-label">Meeting schedule</label>
                     <p class="form-control-static"> March 30,2017, 9AM </p>
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
