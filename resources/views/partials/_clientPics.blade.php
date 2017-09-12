<form id="validation" class="form-horizontal animated fadeInUp" method="post" action="{{URL::to('clientupload')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="verifier" value="{{ $data }}">
         				</br>	</br>
         					<div class="form-group">
                    <label class="col-xs-1 control-label">Client's picture</label>
                      <div class="col-xs-5">
                        <input type="file" name="clientpicture" id="input-file-max-fs" class="dropify-fr" 	  accept="image/*"/  data-default-file="{{$clientpic}}"{{$disabled}}>
                      </div>
                    <label class="col-xs-1 control-label">Person in charge's picture</label>
                      <div class="col-xs-5">
                         <input type="file" name="picpicture" id="input-file-max-fs" class="dropify-fr" 	 accept="image/*"/  data-default-file="plugins/images/Clients/personincharge.jpg">
                      </div>
         					 </div>
          				 </br>
     							<div class="form-group">
  									<label class="col-xs-1 control-label">image of establishment </label>
             					<div class="col-xs-5">
                        <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="establishment" data-default-file="plugins/images/Clients/establishment.jpg">
                      </div>
              			<label class="col-xs-1 control-label">Image of location</label>
                      <div class="col-xs-5">
                        <input type="file" id="input-file-max-fs" class="dropify-fr" accept="image/*"/ name="location" data-default-file="plugins/images/Clients/location.jpg">
                          <span class="font-13 text-muted">Recommended: Screenshot from google map<span>
                      </div>
                   </div>
                   <div class="col-lg-4  col-sm-4 col-xs-12">
           </div>
           <div class="col-lg-2 col-sm-4 col-xs-12">
             <button  type="submit" name="sub" value="Upload Pictures" class="btn btn-block  btn-rounded btn-info">Upload picture</button>
           </div>

             <div class="col-lg-2 col-sm-4 col-xs-12">
               <button type="submit" name="sub" value="Upload Later" class="btn btn-block  btn-rounded btn-info">Continue anyway</button>
             </div>
                 </form>