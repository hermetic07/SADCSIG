
!function($) {
    "use strict";

    var SweetAlert = function() {};


    SweetAlert.prototype.init = function() {


    //Success Message
    $('.sa-success').click(function(){
        swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.", "success")
        
    });

    //Warning Message
    $('.sa-warning').click(function(){
        swal({
            title: "Are you sure?",
            text: "Delete this item?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(){
          swal("Deleted!", "Item deleted", "success");
        });
    });

    //Parameter
    $('.sa-params').click(function(){
        swal({
            title: "Are you sure?",
            text: "Delete this item?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it",
            cancelButtonText: "No, cancel it",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                swal("Deleted!", "Item deleted", "success");
            } else {
                swal("Cancelled", "Item not deleted", "error");
            }
        });
    });




    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);
