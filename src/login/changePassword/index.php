<?php
    require_once "../../includes/engine.php";
    templates::display('header');
?>

<div class="row">
  <div class="col-xs-12 col-sm-offset-2 col-sm-8">
    <h2> Change Password </h2>
  </div>

  <div class="col-xs-12 col-sm-offset-2 col-sm-8 register well">
        <form>
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