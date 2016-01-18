$(function(){
    $('#emailAddress').bind('change keyup', function(){
        var value = $(this).val();
        if(!isEmail(value)){
            $(this).parent().addClass('has-error').removeClass('has-success');
            $(this).parent().find('.micro-text').html('Error : Email Is Not Valid');
        } else {
            $(this).parent().removeClass('has-error').addClass('has-success');
            $(this).parent().find('.micro-text').html(' ');
        }
    });

    $('#username').bind('change', function(){
        var value = $(this).val();
        if(value !== null || value !== undefined){
            if(!checkUsername(value)){
                $(this).parent().removeClass('has-error').addClass('has-success');
                $(this).parent().find('.micro-text').html('');
            } else{
                $(this).parent().addClass('has-error').removeClass('has-success');
                $(this).parent().find('.micro-text').html('Error : Username already exsists please pick another');
            }
        }
    });

    $('#password').bind('change keyup', function(){
        var value = $(this).val();

        if(!value.trim()){
            $(this).parent().addClass('has-error').removeClass('has-success');
            $(this).parent().find('.micro-text').html('you must have a password');
        } else {
            $(this).parent().removeClass('has-error').addClass('has-success');
            $(this).parent().find('.micro-text').html('');
        }
    });

    $('#confirmPassword').bind('change keyup', function(){
        var value = $(this).val();
        var password = $('#password').val();
        if(value !== password){
            $('#password').parent().addClass('has-error').removeClass('has-success');
            $(this).parent().addClass('has-error').removeClass('has-success');
            $(this).parent().find('.micro-text').html('passwords do not match');
        } else {
            $('#password').parent().removeClass('has-error').addClass('has-success');
            $(this).parent().removeClass('has-error').addClass('has-success');
            $(this).parent().find('.micro-text').html('');
        }
    });

    if($('#togglePassVis').hasClass('showPassword')){
        $('#togglePassVis').html('<i class="glyphicon glyphicon-eye-open"></i>');
    } else {
        $('#togglePassVis').html('<i class="glyphicon glyphicon-eye-close"></i>');
    }

    $.toggleShowPassword({
        field: '#password',
        control: '#togglePassVis'
    });
});
