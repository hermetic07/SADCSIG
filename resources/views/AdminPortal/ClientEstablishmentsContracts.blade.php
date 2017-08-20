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
	@include('partials._contracts')
@endsection

@section('script')
	<script type="text/javascript">
    $(document).ready(function(){
      $('.view').on('click',function(){
        // alert(this.value);
        contractID = this.value;
        $.ajax({
        	url : '{{route("contract.view")}}',
        	type : 'GET',
        	data : {contractID:contractID},
        	success : function(data){
        		console.log(data);
    			$('.viewrequest').text('');
    			$('.viewrequest').append(data);
    			$('#modalview').modal('show');
        	}
        });
      });
    });
  </script>
@endsection