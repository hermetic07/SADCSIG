<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        
        
        <!-- Bootstrap Core CSS -->
        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body>
        <h3 class="text-center">JUBECER SECURITY GUARDS INC</h3>
        <h4 class="text-center">QUOTATION</h4>
        <hr> 
        <p class="text-center">We are pleased to submit our quotation for the following security service</p>
        <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th class="text-right" >Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>General Fees</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;Nature of Business fee ({{$nature}})</td>
                            <td class="text-right">{{number_format($price, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;Number of Guards</td>
                            <td class="text-right">{{$num}}</td>
                        </tr>
                        <tr>
                            <td><b>Sub Total:</b></td>
                            <td class="text-right">{{number_format($total, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td><b>Additional Fees</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;Agency Fee</td>
                            <td class="text-right">2,000.00</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;VAT ({{$vat}}%)</td>
                            <td class="text-right">{{number_format($totalvat, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;EWT ({{$ewt}}%)</td>
                            <td class="text-right">{{number_format($totalewt, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td><b>TOTAL</b></td>
                            <td class="text-right">{{number_format($sumtotal, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <td><b>In {{$months}} month(s)</b></td>
                            <td class="text-right">{{number_format($inmonths, 2, '.', ',')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>