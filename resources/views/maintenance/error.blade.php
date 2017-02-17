<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error</title>
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/error.css')}}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>Error in Databse</h1>
                <h2>Duplicate Value</h2>
                <div class="error-details">
                    The value that you have entered is already existing
                </div>
                <div class="error-actions">
                    <a href=@yield('return') class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Return to Previous Page </a>
                </div>
            </div>
        </div>
    </div>
</div>
  </body>
</html>
