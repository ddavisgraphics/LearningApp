<?php
    require_once "../../includes/engine.php";

    // Just save the session info
    if(LoginAuth::checkAuthorization()){
        ProgressLog::saveSession();
    }

    header("refresh:5;url=/?sessionSaved");
    templates::display('header');
?>

<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 well text-center">
        <h2> Logging Out</h2><br>
        <i class="fa fa-spinner fa-spin fa-5x"></i><br><br>
        <p> Saving your information into the system so that your information and progress remains intact while finishing the course modules. </p>
    </div>
</div>

<?php
    templates::display('footer');
?>