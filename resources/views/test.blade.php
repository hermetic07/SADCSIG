<!DOCTYPE html>
<html>
  <head>

    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>


      <p>button</p>
      <div id="reqq">


      </div>
      <input type="checkbox" id="testing"  name="sport" value="1">
      <input type="checkbox" id="testing" name="sport" value="2">
      <input type="checkbox" id="testing" name="sport" value="3">

      <p>button</p>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input id="sub" type="button" name="" value="Register">
      <input type="text" id="first" value="">
      <input type="text" id="last" value="">
      <div id="sent">


      </div>
      <script>

      $(document).ready(function() {

        $.ajaxSetup({
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $("p").click(function(){
            $.get('getRequest', function(data){
              $('#reqq').append(data);
            });
        });

        $("#sub").click(function(){
          var fname = $('#first').val();
            $.ajax({
              type: 'post',
              url: '/Requirement-New',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'name': $('#first').val(),
              },
              success: function(data){
                console.log(data);
              }
            });
        });

      });
      </script>
  </body>
</html>
