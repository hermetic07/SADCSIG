@extends('AdminPortal.master2')

@section('Title') Client's Establishments @endsection


@section('mtitle') Client's Establishments  @endsection

@section('mtitle2') <li>Clients</li>
                        <li><a href="{{url('/ActiveClient')}}"> Active</a></li>
                        <li class="active"><a href="{{url('/ClientEstablishment')}}"> Establishments</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect active"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            
                 <div class="white-box">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                                   <div class="pd-agent-info text-center">
                                <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="uploads/{{$client->image}}"></a>
                                <h4>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</h4>
                                <h6>Client's name</h6> </div>

                            <hr class="m-0">
                            <div class="pd-agent-contact text-center"> <i class="fa fa-phone text-danger" aria-hidden="true"></i> {{$client->contactNo}}
                                <br> <i class="fa fa-envelope-o text-danger p-r-10 m-t-10" aria-hidden="true"></i> {{$client->email}}
                                <br> </div>
                                <br>
                                  <h4 class=" text-center" >New Contract for:</h4>
                                <div class="pd-agent-contact text-center" > 
                                    <!-- <a href="{{route('newcontract',$client->id)}}" type="button" class="btn btn-info">
                                        <i class="fa fa-list-alt"></i> New contract</a>   -->
                                        <button class="btn btn-info" data-toggle="modal" data-target="#existing">
                                          <i class="fa fa-list-alt"></i> Existing Establishment
                                        </button>
                                        <a href="{{route('newcontract',$client->id)}}" type="button" class="btn btn-info">
                                        <i class="fa fa-list-alt"></i> New Establishment</a>
                                </div> </br>

                                    @include('partials._establishment_view',['href'=>'ClientsDetails-'. $client->id.'+'])
        </div>
    </div>

                    </div>

        </div>
      </div>
      <!-- /.row -->
        </div>
    <div id="existing" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Choose {{$client->name}} Establishments</strong></center></h4>
        </div>
        <div class="modal-body">
          <form method="GET" action="">
          <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
            <thead>
              <tr>
                <th  data-sort-ignore="true" data-sort-initial="true" data-toggle="true" width="10px" >Establishment
                </th>
                <th>Name</th>
                <th>Person In Charge</th>
                <th >Address</th>
                <th width="30px">Actions</th>
              </tr>
            </thead>
            <tbody>
              @include('partials._estab_list',['href'=>'ClientsDetails-'. $client->id.'+'])
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info ok">OK</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
     </div>
    </div>  
  @endsection
  @section('script')
    <script type="text/javascript">
      $(document).ready(function(){
        
        $('.radioBtn').click(function(){
          var notRadio = "#"+this.id;
          var estabID = this.value;
          
          //alert(estabID);
          $(".radioBtn:not("+notRadio+")").prop('checked', false);
          $('form').attr('action','/NewContract-ExistingEstablishment-{{$client->id}}-'+estabID );
         // alert($('form').attr('action'));
        });
        $('.ok').on('click',function(){

        });
      });
    </script>
  @endsection
