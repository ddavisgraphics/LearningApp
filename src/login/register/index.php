<?php
    require_once "../../includes/engine.php";
    templates::display('header');
    $validate = new validate;

    if(isset($_POST['MYSQL'])){
        $data        = $_POST['MYSQL'];
        $password    = $data['password'];
        $confirmPass = $data['confirmPassword'];
        $email       = $data['emailAddress'];
        $username    = $data['username'];
        $errors      = array();

        if($password !== $confirmPass){
            $errors['password'] = "passwords do not match";
        }

        if(count($password) >= 8){
            $errors['passwordLength'] = "password is not long enough";
        }

        if(!$validate->emailAddr($email)){
            $errors['email'] = "email is not valid";
        }

        if(LoginAuth::checkEmail($email)){
            $errors['email'] = "user email is already in the system, please try logging in";
        }

        if(LoginAuth::checkUsername($username)){
            $errors['username'] = "user exsists, please pick a different username";
        }

        if(is_empty($errors)){
            $test = LoginAuth::registerUser($username, $password, $email);
            $succString = "<div class='alert alert-success'> <strong> {$username} Congrats </strong>, you have been registered. </div>";
            $localvars->set('feedback', $succString);
            header( "refresh:3;url=/login" );
        } else {
            $errorString = "<div class='alert alert-danger'><ul><li>".implode("</li><li>", $errors)."</li></ul></div>";
            $localvars->set('feedback', $errorString);
        }
    }
?>

  <div class="col-xs-12 col-sm-offset-2 col-sm-8">
    <h2> Register </h2>
  </div>

  <div class="col-xs-12 col-sm-offset-2 col-sm-8 register well">
        {local var="feedback"}
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" name="registration">
        {csrf}
            <div class="form-group">
                <label for="emailAddress">Email address
                    <div class="micro-text"> </div>
                </label>
                <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="username">Username
                    <div class="micro-text"> </div>
                </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="password">Password    <span id="togglePassVis"></span>
                    <div class="micro-text"> </div>
                </label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password
                    <div class="micro-text"> </div>
                </label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
  </div>

<?php
    templates::display('footer');
?>

