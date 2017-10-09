<!DOCTYPE html>
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- title -->
  <title>SOA</title>

 <!-- Bootstrap Core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


  </head>



<!-- fix header and sidebar -->
<body >

            <div class="row">
                <h3><b>Statement&nbsp;of&nbsp;account</b> <span class="pull-right">#{{$col->intid}}</span></h3>
                <hr>
                <div class="">
                  <address>
                  <h4 style="font-weight: 700;"> Jubecer&nbsp;security&nbsp;agency</h4>
                  <p class="text-muted"> Rm 301 Sujeco Bldg. E. Rodriguez Sr. Ave,<br/>
                  Brgy. Immaculate Conception <br/>
                     Cubao, Quezon City <br/>
                  </p>
                  </address>
                </div>
                </br>
                <div  class="">
                  <p class="m-t-30"><b>Invoice Date :</b>  {{$date}}</p>
                  <p><b>Due Date :</b>  {{$col->strbillingId}}</p>
                </div>
            </div>

         <div class="row">
         <br>
              <p>Payments for security services <br>
              detailed at {{$es->name}} located at {{$area->name}}, {{$prov->name}}. <br>
              period of {{$date1}} to {{$date2}}.
               </p>
               <br>
               <br>
               </br>
         </div>

        <div class="row">

                <table class="table" width="100%">
                    <thead>
                      <tr>
                        <th class="text-center">Day Shift Fee</th>
                        <th class="text-center">Night Shift Fee</th>


                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">{{number_format($day, 2, '.', ',')}} php</td>
                        <td class="text-center">{{number_format($night, 2, '.', ',')}} php</td>
                      </tr>

                    </tbody>
              </table>
        </div>



              <div class="row">
              </br>
              </br>
                <div class="">
                <p>Agency fee  : {{number_format($ac->value, 2, '.', ',')}} php</p>
                <p>VAT ({{$vat->value}}%) : {{number_format($totalvat, 2, '.', ',')}} php</p>
                <p> <b>Sub-Total amount:</b>  {{number_format($subtotal, 2, '.', ',')}} php</p>
                </br>
                <p>EWT({{$ewt->value}}% of Agency Fee) : {{number_format($totalewt, 2, '.', ',')}} php</p>
                <h4><b>Total:</b> {{number_format($sumtotal, 2, '.', ',')}} php</h4>
                  <hr>
                  </br>

                </div>
                <div class=""></div>
                <hr>
              </div>










	<script>
		//var pdf = new jsPDF('p', 'pt', 'letter');
		//var canvas = pdf.canvas;
		//var width = 600;
		///canvas.width=8.5*72;
		//document.body.style.width=width + "px";
//pdf.setProperties({
    //title: 'ErnestSOA-071117',

});

		//html2canvas(document.body, {
		 //   canvas:canvas,
		 //   onrendered: function(canvas) {
		       // var iframe = document.createElement('iframe');
		       // iframe.setAttribute('style', 'position:absolute;top:0;right:0;height:100%; width:100%');
		       // document.body.appendChild(iframe);
		        //iframe.src = pdf.output('datauristring');
				//pdf.save('doc.pdf');
		       //var div = document.createElement('pre');
		       //div.innerText=pdf.output();
		       //document.body.appendChild(div);
		    }
		//});
</script>


</body>

</html>
