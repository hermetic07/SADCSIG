@extends('ClientPortal.master3')

@section('Title') Establishment's details @endsection
@section('clientName')
   {{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}
@endsection
@section('link_rqst')
  href="/Request-{{$client->id}}"
@endsection
@section('link_guardsDTR')
  href="/ClientPortalGuardsDTR-{{$client->id}}"
@endsection
@section('link_estab')
   href="/ClientPortalEstablishments-{{$client->id}}"
@endsection
@section('link_home')
  href="/ClientPortalHome-{{$client->id}}"
@endsection
@section('link_messages')
  href="/ClientPortalMessages-{{$client->id}}"
@endsection
@section('mtitle') Establishment's details @endsection
@section('adminPic')
  src = "uploads/{{$client->image}}"
@endsection
@section('link_settings')
  href="/ClientPortalSettings-{{$client->id}}"
@endsection

@section('content')
  @include('partials._estabDetails',['clientName'=>$client->first_name.' '.$client->middle_name.' '.$client->last_name,'route'=>'ClientPortalContracts','clientID'=>$client->id])

  <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	  <div class="modal-dialog  modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Edit Info</strong></center></h4>
	      </div>
	      <div class="modal-body deliverModal">
	        <form>
	        	<div class="form-group">

                    <label class="col-xs-1 control-label">2x2 picture</label>

                    <div class="col-xs-4">
                    <input type="file" name="picture" id="input-file-max-fs" class="dropify-fr" 	data-max-height="226" data-max-width="226" data-mind-height="224" data-min-width="224" accept="image/*"/  data-default-file="plugins/images/Clients/personincharge.jpg">
                    <span class="font-13 text-muted">Only 2x2 picture is accepted<span>
                    </div>
                    <label class="col-xs-1 control-label"></label>
                    <label class="col-xs-1 control-label">Image of location</label>
                    <div class="col-xs-5">
                        <input type="file" name="locationpic" id="input-file-max-fs" class="dropify-fr" accept="image/*"/  data-default-file="plugins/images/Clients/location.jpg">
                        <span class="font-13 text-muted">Recommended: Screenshot from google map<span>

                    </div>
                    <div
	        
		      	<div class="modal-footer">
		      		<button type="submit" class="btn btn-info">Submit</button>
		      		<button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
		      	</div>
	      </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
 </div>
@endsection


@section('script')
<script type="text/javascript">
	function func_edit(id){
		alert(id);
	}
</script>



 @endsection
