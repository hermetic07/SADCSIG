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
                      <span>Client's payment report</span>
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


      </section>
                <section id="section-shape-2"><p>History of Client Payments.</p></section>
                <section id="section-shape-3"><p>it contains the information regarding the number of newly employed</p></section>
                <section id="section-shape-4"><p>Contains the attendance of security guards at their respective posts.</p></section>
                <section id="section-shape-5"><p>Contains the records of incidents during the Guard post duty.</p></section>
      <section id="section-shape-6"><h2>Tabbing 6</h2></section>
              </div><!-- /content -->
            </div><!-- /tabs -->


        </div>


       </div>


      </div>

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
