$(function(){
    // Toggles
    // ===========================================================================
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

