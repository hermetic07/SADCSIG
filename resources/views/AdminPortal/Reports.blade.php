@extends('AdminPortal.master2')

@section('Title') Reports @endsection


@section('mtitle') Reports  @endsection

@section('mtitle2')

                         <li class="active"><a href="{{url('/Reports')}}"> Reports</a></li>  @endsection

@section('Dep')<a href="javascript:void(0);" class="waves-effect"> @endsection
  @section('Cli')<a href="javascript:void(0);" class="waves-effect"> @endsection
    @section('Sec')<a href="javascript:void(0);" class="waves-effect"> @endsection
      @section('Del')<a href="javascript:void(0);" class="waves-effect"> @endsection


@section('content')


<div class="row">
        <div class="col-lg-12	">

    <div class="white-box">
          <svg class="hidden">
            <defs>
              <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
            </defs>
          </svg>

            <div class="sttabs tabs-style-shape">
              <nav>
                <ul>
                  <li>
                    <a href="#section-shape-1">
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <span>Disposition report</span>
                    </a>
                  </li>
                  <li>
                    <a href="#section-shape-2">
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <span>Number of Guns</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="#section-shape-4">
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <span>Gains and Losses Report</span>
                    </a>
                  </li>
                  <li>
                    <a href="#section-shape-5">
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
          <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <span>Guard's Daily time record</span>
                    </a>
                  </li>

         <li>
                    <a href="#section-shape-6">
                      <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                      <span>Incident reports</span>
                    </a>
                  </li>
                  
                </ul>
              </nav>
              <div class="content-wrap">
                <section id="section-shape-1"><p>It contains the information about the guards dispose in the respective client.</p>
                  <div class="app">
                      <center>
                          {!! $chart->html() !!}
                      </center>
                  </div>
                  <br>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reportRange"><i class="fa fa-list"></i> Get PDF</button>
                  <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                      <thead>
                        <tr>
                        
                          <th>Establishment</th>
                          <th data-hide="phone, tablet" >Address</th>
                          <th >Guard</th>
                          <th >Education</th>
                          <th>License</th>
                          <th>Expire date</th>
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
                        @foreach($dispositions as $disposition)
                          <tr>
                            <td>{{$disposition->establishment}}</td>
                            <td>
                              {{$disposition->address}} {{$disposition->area}},{{$disposition->province}}
                            </td>
                            <td>
                              {{$disposition->first_name}} {{$disposition->middle_name}} {{$disposition->last_name}}
                            </td>
                            <td>
                              @php
                                $ctr = 0;
                              @endphp
                              @foreach($employee_educations as $employee_education)
                                @if($employee_education->employees_id == $disposition->empID)
                                  @php

                                    $ctr++;

                                  @endphp
                                @endif
                              @endforeach

                              @if($ctr == 0)

                              @elseif($ctr == 2)
                                HS Grad
                              @elseif($ctr == 3)
                                College level
                              @endif
                            </td>
                            <td>
                              {{$disposition->license_num}}
                            </td>
                            <td>
                              {{$disposition->date_expired}}
                            </td>
                          </tr>
                          
                        @endforeach
                      </tbody>
                     </table>   
                </section>
                <section id="section-shape-2"><p>History of Client Payments.</p>
                  <div class="app">
                      <center>
                          {!! $number_of_guns_chart->html() !!}
                      </center>
                  </div>
                  <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle color-bordered-table warning-bordered-table" data-page-size="10">
                      <thead>
                        <tr>
                        
                          <th>Gun Name</th>
                          <th data-hide="phone, tablet" >Type</th>
                          <th>License</th>
                          <th>Expire date</th>
                          <th >Establishment</th>
                          <th >Date Deployed</th>
                          
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
                      </tbody>
                    </table>

                </section>
                <section id="section-shape-3"><p>it contains the information regarding the number of newly employed</p></section>
                <section id="section-shape-4"><p>Contains the attendance of security guards at their respective posts.</p></section>
                <section id="section-shape-5"><p>Contains the records of incidents during the Guard post duty.</p></section>
                <section id="section-shape-6"><h2>Tabbing 6</h2></section>
                
              </div><!-- /content -->
            </div><!-- /tabs -->


        </div>


       </div>


      </div>

      <div id="reportRange" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><center><strong>Date Range</strong></center></h4>
            </div>
            <div class="modal-body">
             <form method="GET" action="{{ url('/DispositionReports-pdf') }}">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Starts From:</label>
                  <input type="date" class="form-control" name="startFrom" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ends To:</label>
                  <input type="date" class="form-control" name="endTo" required>
                </div>
              </div>
              <br><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </form>
            </div>
            
            
          </div> 
        </div> <!-- /.modal-dialog -->
      </div> <!-- View Modal -->

      {!! Charts::scripts() !!}
      {!! $chart->script() !!}
      {!! $number_of_guns_chart->script() !!}
  @endsection

  @section('script')
  <script type="text/javascript">
        
        (function() {

                  [].slice.call( document.querySelectorAll( '.sttabs' ) ).forEach( function( el ) {
                      new CBPFWTabs( el );
                  });

              })();
  </script>
  @endsection
