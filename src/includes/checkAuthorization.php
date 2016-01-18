<?php
    $localvars  = localvars::getInstance();
    $authorized = LoginAuth::checkAuthorization();

    if(!$authorized){
        $loginHTML = "<div class='login'>";
        $loginHTML .= "<a href='/registration' class='btn btn-primary'> Register For Account </a>";
        $loginHTML .= "<a href='/login' class='btn btn-primary'> Login </a>";
        $loginHTML .= "</div>";
    } else {
        $loginHTML = "<div class='login'>";
        $loginHTML .= "<a href='/login/logout' class='btn btn-primary logout'> Logout </a>";
        $loginHTML .= "</div>";
    }

    $localvars->set('login', $loginHTML);
?>