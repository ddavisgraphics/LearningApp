<?php
    require_once "../../includes/engine.php";
    templates::display('header');

    if(LoginAuth::checkAuthorization()){
        ProgressLog::saveSession();
        LoginAuth::logout();
        header("refresh:3;url=/?loggedOut=true");
    } else {
        header("refresh:3;url=/?loggedOut=false");
    }

?>

<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 well text-center">
        <h2> Logging Out</h2><br>
        <i class="fa fa-spinner fa-spin fa-5x"></i><br><br>
        <p> Please wait while we save your information and log out out of the system. </p>
    </div>
</div>

<?php
    templates::display('footer');

?>