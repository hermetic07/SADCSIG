<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Client Guard Preference</strong></center></h4>
</div>
<div class="modal-body">
  <div class="form-group">
  <h3>Body Parts Preferences</h3>
    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
      <thead>
        <th>Body Parts</th>
        <th>Atleast</th>
        <th>Atmost</th>
      </thead>
      <tbody>
         @foreach($clientBodyPreferences as $clientBodyPreference)
          <tr>
            <td>
              {{$clientBodyPreference->attribute}}
            </td>
            <td>
              {{$clientBodyPreference->low}}{{$clientBodyPreference->measurement}}
            </td>
            <td>
              {{$clientBodyPreference->high}}{{$clientBodyPreference->measurement}}
            </td>
          </tr>
          
          
        @endforeach


      </tbody>
    </table>
  </div>

  <div class="form-group">
    <div class="col-md-6">
     <h3>Requirements</h3>
      <ul>
        @foreach($tbl_clientrequirementpreferences as $tbl_clientrequirementpreference)
          <li>{{$tbl_clientrequirementpreference->requirement}}</li>
        @endforeach
        
      </ul>
    </div>
    <div class="col-md-6">
      <h3>Required Licences</h3>
      <ul>
        @foreach($clientLicensePreferences as $clientLicensePreference)
          <li>{{$clientLicensePreference->license}}</li>
        @endforeach
        
      </ul>
    </div>
  </div>

   <div class="form-group">
  <h3>Personal Preference</h3>
    <ul>
      @foreach($clientPeferences as $clientPeference)
        <label>Educational Attainment:</label>{{$clientPeference->stringSchoolLevel}} <br>
        <label>Age:</label> {{$clientPeference->intAge}} <br>
        <label>Notes:</label> <p>{{$clientPeference->stringNote}}</p>
      @endforeach
    </ul>
  </div>
  
</div>
<br>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
</div>
</div>