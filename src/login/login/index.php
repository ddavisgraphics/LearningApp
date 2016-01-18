<?php
    require_once "../../includes/engine.php";
    templates::display('header');

    if(isset($_POST['MYSQL'])){
        $login    = $_POST['MYSQL'];
        $username = dbSanitize($login['username']);
        $pass     = dbSanitize($login['password']);
        $accepted = LoginAuth::loginUser($username, $pass);

        if($accepted){
            $feedback = "<div class='alert alert-success'> Logged In Successfully! </div>";
            header("refresh:3;url=/");
        } else {
            if(!LoginAuth::checkUsername($username)){
                $feedback = "<div class='alert alert-danger'> Login Failed, wrong <strong><u> username </u></strong> please try again </div>";
            } else {
                 $feedback = "<div class='alert alert-danger'> Login Failed, wrong <strong><u> password </u></strong> please try again </div>";
            }
        }

        $localvars->set('feedback', $feedback);
    }
?>

<div class="row">
  <div class="col-xs-12 col-sm-offset-2 col-sm-8">
    <h2> Login </h2>
  </div>

  <div class="col-xs-12 col-sm-offset-2 col-sm-8 register well">
        {local var="feedback"}
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" name="login">
        {csrf}
            <div class="form-group">
                <label for="username">Username</label>
                <input type="type" name="username" class="form-control" placeholder="username">
            </div>
            <div class="form-group">
                <label for="password">Password    <span id="togglePassVis"></span>
                    <div class="micro-text"> </div>
                </label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <a href="/login/forgotPassword" class="pull-left"> Forgot Password? </a> <br/>
                    <a href="/login/changePassword" class="pull-left"> Change Password </a>
                </div>

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-default pull-right">Submit</button>
                </div>
            </div>
        </form>

  </div>

</div>

<?php
    templates::display('footer');
?>