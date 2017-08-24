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

 <div class="col-md-12">
          <div class="white-box printableArea">
            <h3><b>Statement&nbsp;of&nbsp;account</b> <span class="pull-right">#5669626</span></h3>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <div class="pull-left">
                  <address>
                  <h4 style="font-weight: 700;"> Jubecer&nbsp;security&nbsp;agency</h4>
                  <p class="text-muted m-l-5"> Rm 301 Sujeco Bldg. E. Rodriguez Sr. Ave,<br/>
                  Brgy. Immaculate Conception <br/>
                     Cubao, Quezon City <br/>
                  </p>
                  </address>
                </div>
                </br>
                <div  class="pull-right text-right">
                  <p class="m-t-30"><b>Invoice Date :</b>  23rd Jan 2016</p>
                  <p><b>Due Date :</b>  25th Jan 2016</p>
  
                </div>
              </div> </br> 
         <div class="col-md-12">
         </br>
         </br>
              <p>Payments for security services rendered by Three(3) security guards </br>
              detailed at Polytechnic university of the philippines located at </br>
              Anonas, Manila city. period of April 1-15, 2015. 
               </p>
               </br>  
               </br>
               </br>  
        </div>
              <div class="col-md-12">
                <div class="table-responsive m-t-40" style="clear: both;">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">Monthly CP (per guard)</th>
                        <th>Total No. guards</th>
                        <th class="text-right">Total No. of days work</th>
                 
                 
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">12,000.00</td>
                        <td class="text-center">3</td>
                        <td class="text-center">38 </td>
              

                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-12">
              </br>
              </br>
                <div class="pull-right m-t-30 text-right">
                <p>Agency fee  : 2,956.71</p>
                 <p>VAT (12%) : 354.81</p>
                       <p>Sub-Total amount: 15,200.00 </p>
                       </br>
                      <p>EWT(10%) : 59.13 </p>
                    
                  <hr>
                  </br>
                  <h3><b>Total :</b> 15,140.87</h3>
                </div>
                <div class="clearfix"></div>
                <hr>
              </div>
            </div>







<script src="js/jspdf.debug.js"></script>
<script src="js/html2pdf.js"></script>

	<script>
		var pdf = new jsPDF('p', 'pt', 'letter');
		var canvas = pdf.canvas;
		var width = 600;
		//canvas.width=8.5*72;
		document.body.style.width=width + "px";
pdf.setProperties({
    title: 'ErnestSOA-071117',

});

		html2canvas(document.body, {
		    canvas:canvas,
		    onrendered: function(canvas) {
		        var iframe = document.createElement('iframe');
		        iframe.setAttribute('style', 'position:absolute;top:0;right:0;height:100%; width:100%');
		        document.body.appendChild(iframe);
		        iframe.src = pdf.output('datauristring');
				//pdf.save('doc.pdf');	
		       //var div = document.createElement('pre');
		       //div.innerText=pdf.output();
		       //document.body.appendChild(div);
		    }
		});
     </script>


</body>

</html>
