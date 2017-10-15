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
  <script>
  function fun_terminate(id) {
    $.ajaxSetup({
          headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });  
    // $.ajax({
    //       type: 'post',
    //       url: '/Terminate',
    //       data: {
    //           'id':id,
    //       },
    //       success: function(data){
    //           if(data!==null&&data!==""){
    //             alert(data);
    //             location.reload();
    //           }
    //       }
    // });
    // $('#ClaimDel').modal('hide');
      swal({
        title: "Terminate Contract",
        text: "This will send a 30 days notification to the Cclient prior to termination of contract.",
         type: "input",
        html: true,
          showCancelButton: true,
          closeOnConfirm: false,
          animation: "slide-from-top",
          inputPlaceholder: "Your Reason"
        },
        function(inputValue){
          if (inputValue === false) return false;
          if (inputValue === "") {
            swal.showInputError("You need to write something!");
            return false
          }
             
                 
                  $.ajax({
                    url:"/Contract-Terminnation-"+id,
                    type : 'POST',
                    data : {
                            contractID:id,
                            reasons:inputValue
                          },
                    success : function(data){
                       if(data == 0)
                       {
                        swal("Notification Sent!", "Thank you for your efforts!", "success");
                        location.reload();
                       }
                       else
                       {
                        swal("OOOoooppss!!", "Something went wrong! Please try again", "warning");
                      // location.reload();
                       }
                    }
                  });
            
          
      });
  }
  </script>
@endsection