@extends('AdminPortal.master2')

@section('Title') Utilities @endsection


@section('mtitle') Utilities  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/Tax')}}"> Utilities</a></li>  @endsection


@section('content')



             <div class="row">

                <div class="col-md-4 col-sm-4 p-20 white-box" >
                    <h3 class="box-title">billing and collection </h3>
                    <div class="list-group">
                      <a href="{{url('/Tax')}}" class="list-group-item active">Tax</a>                           
                      <a href="javascript:void(0)" class="list-group-item">Agency fee </a>
                      <a href="javascript:void(0)" class="list-group-item">Penalties</a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7  p-20 white-box" style="margin-left: 5%; height: 535px;" >
                <h3 class="box-title m-b-0">Taxes</h3>
                </br>
     
<table style="clear: both" class="table table-bordered table-striped" id="user" >
                  <tbody>
                    <tr>
                      <td width="35%">VAT(%)</td>
                      <td width="65%"><a href="#" id="tax" data-type="text" data-pk="1" data-title="Enter a value">{{$v->value or none}}</a></td>
                    </tr>
                    <tr>
                      <td>EWT(%)</td>
                      <td><a href="#" id="ewt" data-type="text" data-pk="1" data-placement="right"  data-title="Enter a value">{{$e->value or none}}</a></td>
                    </tr>
                    
                  </tbody>
                </table>

                </div>
       
              </div>
          </div>



  @endsection

  @section('script')
<script>

$(function(){

  $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  $('#tax').editable({
     type: 'text',
     pk: 1,
     name: 'value',
     url:'/Admin-update-tax',
     title: 'Enter username',
     mode: 'inline',
     validate: function(value) {
       if($.trim(value) == '') return 'This field is required';
     },
   });

  $('#ewt').editable({
     type: 'text',
     pk: 1,
     name: 'value',
     url:'/Admin-update-ewt',
     title: 'Enter username',
     mode: 'inline',
           validate: function(value) {
       if($.trim(value) == '') return 'This field is required';
     }
   });

});

</script>
  @endsection
