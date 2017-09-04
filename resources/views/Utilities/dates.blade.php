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
                      <a href="{{url('/Tax')}}" class="list-group-item ">Tax</a>                           
                      <a href="{{url('/AgencyFee')}}" class="list-group-item">Agency fee </a>
                      <a href="{{url('/Penalties')}}" class="list-group-item">Penalties</a>
                      <a href="{{url('/BillingDays')}}" class="list-group-item active">Billing Days</a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7  p-20 white-box" style="margin-left: 5%; height: 535px;" >
                <h3 class="box-title m-b-0">Taxes</h3>
                </br>
     
<table style="clear: both" class="table table-bordered table-striped" id="user" >
                  <tbody>
                    <tr>
                      <td width="35%">First Billing Day</td>
                      <td width="65%"><a href="#" id="one" data-type="text" data-pk="1" data-title="Enter a value">{{$a->day or "none"}}</a></td>
                    </tr>
                    <tr>
                      <td>Second Billing Day</td>
                      <td><a href="#" id="two" data-type="text" data-pk="2" data-placement="right"  data-title="Enter a value">{{$b->day or "none"}}</a></td>
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

  $('#one').editable({
     type: 'text',
     pk: 1,
     name: 'day',
     url:'/Admin-update-dayone',
     title: 'Enter username',
     mode: 'inline',
     validate: function(value) {
       if($.trim(value) == '') return 'This field is required';
     },
   });

  $('#two').editable({
     type: 'text',
     pk: 2,
     name: 'day',
     url:'/Admin-update-daytwo',
     title: 'Enter username',
     mode: 'inline',
           validate: function(value) {
       if($.trim(value) == '') return 'This field is required';
     }
   });

});

</script>
  @endsection
