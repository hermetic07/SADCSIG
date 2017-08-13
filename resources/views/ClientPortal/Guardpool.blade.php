@extends('ClientPortal.master3')

@section('Title') Client Messages @endsection
@section('clientName')
   {{  $client->name }}
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
@section('mtitle') Messages @endsection

@section('customstyle')

            
<style>




        h3 {
          text-align: center;
          font-weight: 400;
          margin-bottom: 0;
        }

        .carousel-wrapper {
          position: absolute;
          width: 70%;
          height: 70%;
            top: 56%;
            left: 50%;
          transform: translate(-50%, -50%);
          background-color: #FFFFFF;
          background-image: linear-gradient(#FFFFFF 50%, #FFFFFF 50%, #F0F3FC 50%);
          box-shadow: 0px 12px 39px -19px rgba(0, 0, 0, 0.75);
          overflow: hidden;
        }
        .carousel-wrapper .carousel {
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          width: 100%;
          height: auto;
        }
        .carousel-wrapper .carousel .carousel-cell {
          padding: 10px;
          background-color: #FFFFFF;
          width: 20%;
          height: auto;
          min-width: 120px;
          margin: 0 20px;
          transition: transform 500ms ease;
        }
        .carousel-wrapper .carousel .carousel-cell .more {
          display: block;
          opacity: 0;
          margin: 5px 0 15px 0;
          text-align: center;
          font-size: 10px;
          color: #CFCFCF;
          text-decoration: none;
          transition: opacity 300ms ease;
        }
        .carousel-wrapper .carousel .carousel-cell .more:hover, .carousel-wrapper .carousel .carousel-cell .more:active, .carousel-wrapper .carousel .carousel-cell .more:visited, .carousel-wrapper .carousel .carousel-cell .more:focus {
          color: #CFCFCF;
          text-decoration: none;
        }
        .carousel-wrapper .carousel .carousel-cell .line {
          position: absolute;
          width: 2px;
          height: 0;
          background-color: black;
          left: 50%;
          margin: 5px 0 0 -1px;
          transition: height 300ms ease;
          display: block;
        }
        .carousel-wrapper .carousel .carousel-cell .price {
          position: absolute;
          font-weight: 700;
          margin: 45px auto 0 auto;
          left: 50%;
          transform: translate(-50%);
          opacity: 0;
          transition: opacity 300ms ease 300ms;
        }
        .carousel-wrapper .carousel .carousel-cell .price sup {
          top: 2px;
          position: absolute;
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected {
          transform: scale(1.2);
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected .line {
          height: 35px;
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected .price, .carousel-wrapper .carousel .carousel-cell.is-selected .more {
          opacity: 1;
        }
        .carousel-wrapper .flickity-page-dots {
          display: none;
        }
        .carousel-wrapper .flickity-viewport, .carousel-wrapper .flickity-slider {
          overflow: visible;
        }
        .our-team{
            background: #f5f5f5;
            text-align: center;
        }
        .our-team .pic{
            position: relative;
            overflow: hidden;
            transform: scale(1);
            transition: all 0.3s ease 0s;
        }
        .our-team:hover .pic{
            transform: scale(1.01);
        }
        .our-team .pic:after{
            content: "";
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            box-shadow: 0 0 0 900px rgba(255, 255, 255, 0.5);
            position: absolute;
            bottom: -100px;
            right: -100px;
            opacity: 0;
            transform: scale3d(0.5, 0.5, 1);
            transform-origin: 50% 50% 0;
            transition: all 0.35s ease 0s;
        }
        .our-team:hover .pic:after{
            opacity: 1;
            transform: translate3d(0px, 0px, 0px);
        }
        .our-team .pic img{
            width: 100%;
            height: auto;
        }
        .our-team .read-more{
            width: 100px;
            padding: 0 15px 15px 0;
            font-size: 14px;
            color: #fff;
            letter-spacing: 0.35px;
            text-align: right;
            text-transform: uppercase;
            position: absolute;
            bottom: 0;
            right: 0;
            opacity: 0;
            z-index: 1;
            transform: translate3d(20px, 20px, 0px);
            transition: all 0.35s ease 0s;
        }
        .our-team:hover .read-more{
            opacity: 1;
            transform: translate3d(0px, 0px, 0px);
        }
        .our-team .team-content{
            padding: 20px 0;
        }
        .our-team .title{
            font-size: 22px;
            font-weight: 700;
            color: #3b3b3b;
            text-transform: capitalize;
            margin: 0 0 8px 0;
        }
        .our-team .post{
            font-size: 13px;
            font-weight: 500;
            color: #6e6e70;
            text-transform: capitalize;
        }
        @media only screen and (max-width: 990px){
            .our-team{ margin-bottom: 30px; }
        }
        </style>

        
       <link href="css/flickity.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row  el-element-overlay">
            <div class="carousel-wrapper">
            <div class="carousel" data-flickity>
              <div class="carousel-cell">

        <a href="javascript:void(0)"><img alt="img" class="img-circle img-responsive" src="plugins/images/Clients/establishments/pup.jpg"></a>

              <h3 class="m-t-20 m-b-20">Welcome!</h3>
              <p>On this page you will select your guards to deploy them to your area. You can view their informations and hire them base on your qualifications</p>
            <center>  <span class="label label-rouded label-info">5 more</span> </center>
            </div>
            @php
              $checker = 0;
            @endphp
            @foreach($tempDeploymentDetails as $tempDeploymentDetail)
              @foreach($employees as $employee)
                @if($employee->id == $tempDeploymentDetail->employees_id)
                  @php
                    $checker++;
                  @endphp
                  <div class="carousel-cell">

                <div class="our-team">
                  <div class="el-card-item" style="padding-bottom: 5px;" >
                    <div class="el-card-avatar el-overlay-1">
                           <a href="SecurityGuardsProfile.html"><img src="uploads/{{$employee->image}}"  alt="user" ></a>
                            <div class="el-overlay">
                              <ul class="el-info">
                                      <li><a class="btn default btn-outline" href="ClientsEstablishment.html" target="_blank">More info </a></li>
                              </ul>
                        </div>
                      </div>
                  </div>
                <div class="team-content">
                    <h3 class="title">{{$employee->first_name}}, {{$employee->last_name}}</h3>
                    <span class="post">{{$tempDeploymentDetail->role}}</span>

                </div>
              <br>

            </div>
            <br>
            <div class="col-xs-12">
            <div class="form-group">
                  <div class="col-xs-6">
                    <button id="{{$employee->id}}" class="btn btn-block btn-outline btn-rounded btn-success acc">Accept</button>
                  </div>
                  <div class="col-xs-6"> 
                    <button id="{{$employee->id}}" class="btn btn-block btn-outline btn-rounded btn-danger rej">Reject</button>
                  </div>
               </div> 
              </div>
              </div>
                @endif
              @endforeach
            @endforeach
              <div class="carousel-cell">

        <a href="javascript:void(0)"><img alt="img" class="img-circle img-responsive" src="plugins/images/Clients/establishments/pup.jpg"></a>


              <h3 class="m-t-20 m-b-20">Click Finish if you are done!</h3>
              <button type="button" class="btn btn-info btn-block finish">Finish</button>
            </div>
            <input type="hidden" id="checker" value="{{$checker}}">
            <input type="hidden" id="client_notif_id" value="{{$client_notif_id}}">
@endsection


@section('script')

        
        <script src="js/flickity.pkgd.min.js"></script>
      
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

      $(document).ready(function(){
        accepted_gaurds = [];
        rejected_guards = [];
        accepted_guards_ids = '';
        rejected_guards_ids = '';

        $('.rej').on('click', function() {
              rejected_guards.push(this.id);
              rejected_guards_ids = rejected_guards.join(",");
              
              $(this).closest('.carousel-cell').fadeOut(1000, function () {
                  $(this).remove();
              });

        });

        $('.acc').on('click', function() {
              accepted_gaurds.push(this.id);
              accepted_guards_ids = accepted_gaurds.join(",");
              
            $(this).closest('.carousel-cell').fadeOut(1000, function () {
                $(this).remove();
            });
          });
        $('.finish').hover(function(){
          // var total_selected = accepted_gaurds.length + rejected_guards.length;
          // var checker = $('#checker').val();
          //alert(total_selected+"-"+checker);
          // if(total_selected < checker){
          //   this.attr('disabled',true);
          //   //alert("Please Select/Reject guards. We need to know your response");
          // }
        });
        $('.finish').on('click',function(e){

        var client_notif_id = $('#client_notif_id').val();
        //alert(client_notif_id);
        $.ajax({
          data : {client_notif_id:client_notif_id,accepted:accepted_guards_ids,rejected:rejected_guards_ids},
          type : 'GET',
          url : '{{route("saveguards")}}',
          success : function(data){
           if(data == 0){
            alert("Success! We'll notify you once we completed the guards");
           }else{
            alert("Success! We'll notify you once we completed the guards");
            location.href="/ClientPortalHome-{{$client->id}}";
            console.log(data);
           }
           //alert(data);
          }
        });
        
       });


    });





      </script>
      
 @endsection
 @section('adminPic')
    src = "uploads/{{$client->image}}"
  @endsection
