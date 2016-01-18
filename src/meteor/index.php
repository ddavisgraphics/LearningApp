<?php
    require_once "../includes/engine.php";

    // Log the Users has been here
    if(isset($_SESSION['data']['loggedpages'])){
        $loggedPages = session::get('loggedpages');
        if(!in_array('MeteorIndex', $loggedPages)){
            ProgressLog::logPage('MeteorIndex');
        }
    } else {
        ProgressLog::logPage('MeteorIndex');
    }


    templates::display('header');
?>

<div class="row">
    <div class="col-xs-6">
        <h2> MeteorJS </h2>
    </div>

    <div class="col-xs-6">
        <p> Your Progress: </p>
        <div class="progress progress-striped active">
            <div class="progress-bar" style="width: 5%"></div>
        </div>
    </div>
</div>

<?php
    templates::display('footer');
?>