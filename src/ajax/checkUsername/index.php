<?php
    require_once "../../includes/engine.php";

    if(!isset($_GET['MYSQL']['username'])){
        header('Location:/');
    }

    $username    = $_GET['MYSQL']['username'];
    $userExsists = array(LoginAuth::checkUsername($username));
    header('Content-Type: application/json');
    print json_encode($userExsists);
?>