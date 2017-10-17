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
	      <div class="modal-body">
	        
	        	
              <!-- <div class="row">
                <div class="col-md-6">
                  <label>Establishment picture</label>
                    <input type="file" name="">
                </div>
                <div class="col-md-6">
                  <label>Establishment picture</label>
                    <input type="file" name="">
                </div>
              </div>
              
              <hr> -->
              <center><h3>Establishment Details</h3></center>
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label >Establishment Name</label>
                    <div>
                      <input type="text" id="estabName" class="form-control" placeholder="{{$estab_name}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Nature of Business</label>
                    <div>
                      <select class="form-control" id="natures">
                        <option value="{{$establishment2->natures_id}}">{{$nature_name}}</option>
                        @foreach($natures2 as $nature)
                          <option value="{{$nature->id}}">{{$nature->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                 </div> 
                 </div> 

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="col-md-4">Address</label>
                      <div class="col-md-8">
                        <input type="text" id="address" class="form-control" placeholder="{{$adress}}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label class="col-md-4">Province</label>
                      <div class="col-md-8">
                        <select class="form-control">
                          <option id="province" value="{{$establishment2->province_id}}">{{$provinces->name}}</option>
                          @foreach($provinces2 as $province)
                            <option value="{{$province->id}}">{{$province->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label class="col-md-3">Area</label>
                      <div class="col-md-9">
                        <select id="area" class="form-control">
                          <option value="{{$establishment2->areas_id}}">{{$area_name}}</option>
                          @foreach($areas2 as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                 </div>

                 <div class="form-group"> 
                  <div class="row">
                    <div class="col-md-6">
                      <label class="col-md-4">Area Size</label>
                      <div class="col-md-8">
                        <input type="number" id="area_size" class="form-control" placeholder="{{$population}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md-4">Population approx.</label>
                      <div class="col-md-8">
                        <input type="number" id="population" class="form-control" placeholder="{{$area_size}}">
                      </div>
                    </div>
                  </div>
                  
                </div>

                <hr>

                <center><h3>Person In Charge Info</h3></center>
                
                <div class="form-group"> 
                  <div class="row">
                    <div class="col-md-4">
                      <label class="col-md-4">First Name</label>
                      <div class="col-md-8">
                        <input type="text" id="pic_fname" class="form-control" placeholder="{{explode(' ',$pic)[0]}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="col-md-4">Middle Name</label>
                      <div class="col-md-8">
                        <input type="text" id="pic_mname" class="form-control" placeholder="{{explode(' ',$pic)[1]}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="col-md-4">Last Name</label>
                      <div class="col-md-8">
                        <input type="text" id="pic_lname" class="form-control" placeholder="{{explode(' ',$pic)[2]}}">
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="form-group"> 
                  <div class="row">
                    <div class="col-md-6">
                      <label class="col-md-4">Email</label>
                      <div class="col-md-8">
                        <input type="email" id="pic_email" class="form-control" placeholder="{{$email}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md-4">Contact No.</label>
                      <div class="col-md-8">
                        <input type="text" id="contactNo" class="form-control" placeholder="{{$contactNo}}">
                      </div>
                    </div>
                  </div>
                  
                </div>
	        
		      	<div class="modal-footer">
		      		<button type="button" onclick="func_submit('{{$estabID}}')" class="btn btn-info">Submit</button>
		      		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
	      
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
 </div>
@endsection


@section('script')
<script type="text/javascript">
	function func_submit(id){

    var estabName = "";
    var contactNo = "";
    var natures = "";
    var address = "";
    var province = "";
    var area = "";
    var area_size = "";
    var population = "";
    var pic_fname = "";
    var pic_mname = "";
    var pic_lname = "";
    var pic_email = "";

		//alert($('#contactNo').val());
    if($('#contactNo').val() == "")
    {
      contactNo = $('#contactNo').attr('placeholder');
      //alert(contactNo);
    }
    else
    {
      contactNo = $('#contactNo').val();
      //alert(contactNo);
    }


    if($('#estabName').val() == "")
    {
      estabName = $('#estabName').attr('placeholder');
     // alert(estabName);
    }
    else
    {
      estabName = $('#estabName').val();
     // alert(estabName);
    }

    if($('#address').val() == "")
    {
      address = $('#address').attr('placeholder');
     // alert(address);
    }
    else
    {
      address = $('#address').val();
     // alert(address);
    }


    if($('#area_size').val() == "")
    {
      area_size = $('#area_size').attr('placeholder');
     // alert(area_size);
    }
    else
    {
      area_size = $('#area_size').val();
     // alert(area_size);
    }


    if($('#population').val() == "")
    {
      population = $('#population').attr('placeholder');
      //alert(population);
    }
    else
    {
      population = $('#population').val();
      //alert(population);
    }


    if($('#pic_fname').val() == "")
    {
      pic_fname = $('#pic_fname').attr('placeholder');
     // alert(pic_fname);
    }
    else
    {
      pic_fname = $('#pic_fname').val();
     // alert(pic_fname);
    }


    if($('#pic_lname').val() == "")
    {
      pic_lname = $('#pic_lname').attr('placeholder');
    //  alert(pic_lname);
    }
    else
    {
      pic_lname = $('#pic_lname').val();
    //  alert(pic_lname);
    }


    if($('#pic_mname').val() == "")
    {
      pic_mname = $('#pic_mname').attr('placeholder');
     // alert(pic_mname);
    }
    else
    {
      pic_mname = $('#pic_mname').val();
     // alert(pic_mname);
    }


    if($('#pic_email').val() == "")
    {
      pic_email = $('#pic_email').attr('placeholder');
     // alert(pic_email);
    }
    else
    {
      pic_email = $('#pic_email').val();
     // alert(pic_email);
    }

   
    province = $('#province').val();
    area = $('#area').val();
    natures = $('#natures').val();

    // if($('#natures').val() == "")
    // {
    //   natures = $('#natures').attr('placeholder');
    //   alert(natures);
    // }
    // else
    // {
    //   natures = $('#contactNo').val();
    //   alert(natures);
    // }

   // alert($('#natures').val());

   $.ajax({

      url : '/UpdateContract',
      type : 'GET',
      data :  
        {
          estabName : estabName,
          contactNo : contactNo,
          natures : natures,
          address : address,
          province : province,
          area : area,
          area_size : area_size,
          population : population,
          pic_fname : pic_fname,
          pic_mname : pic_mname,
          pic_lname : pic_lname,
          pic_email : pic_email,
          estabID : id
        },
    success : function(data){
      if(data == 1){
            swal({
                title: 'Success!',
                text: "Successfully updated.",
                type: 'success',
                
                confirmButtonColor: '#3085d6',
                
                confirmButtonText: 'Ok'
              },function(){
                location.reload();
              });
      }
    }
   });

	}
</script>



 @endsection
