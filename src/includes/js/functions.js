function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function checkUsername(inputUsername){
    $.ajax({
        dataType:'json',
        url:'/ajax/checkUsername/',
        data: { username: inputUsername},
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus + ': ' + errorThrown);
        },
        complete: function(data){
            var jsonData = data.responseJSON[0];
            console.log(jsonData);
        },
    });
}

(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field);

        control.bind('click', function (){
            control.toggleClass('showPassword')
            if (control.hasClass('showPassword')) {
                field.attr('type', 'text');
                control.html('<i class="glyphicon glyphicon-eye-open"></i>');
            } else {
                field.attr('type', 'password');
                control.html('<i class="glyphicon glyphicon-eye-close"></i>');
            }
        });
    };
}(jQuery));