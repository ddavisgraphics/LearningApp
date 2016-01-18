<?php
    // path to my engineAPI install
    require_once '/home/www/phpincludes/engine/engineAPI/4.0/engine.php';
    $engine = EngineAPI::singleton();

    // Setup Error Rorting
    errorHandle::errorReporting(errorHandle::E_ALL);

    // Setup Database Information for Vagrant
    $databaseOptions = array(
        'username' => 'username',
        'password' => 'password',
        'dbName'   => 'learningApp'
    );

    $db  = db::create('mysql', $databaseOptions, 'appDB');

    // Set localVars and engineVars variables
    $localvars  = localvars::getInstance();
    $enginevars = enginevars::getInstance();

    if (EngineAPI::VERSION >= "4.0") {
        $localvars  = localvars::getInstance();
        $localvarsFunction = array($localvars,'set');
    }
    else {
        $localvarsFunction = array("localvars","add");
    }

    // include base variables
    recurseInsert("includes/vars.php","php");

    // require classes
    recurseInsert("includes/functions/index.php", "php");
    recurseInsert("includes/classes/index.php", "php");

    // check auth for page views
    recurseInsert("includes/checkAuthorization.php", "php");

    // load a template to use
    templates::load('default');
?>