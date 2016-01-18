<?php
    require_once "../../includes/engine.php";
    templates::display('header');
?>

<div class="row">
  <div class="col-xs-12 col-sm-offset-2 col-sm-8">
    <h2> Forgot Password </h2>
  </div>

  <div class="col-xs-12 col-sm-offset-2 col-sm-8 register well">
    {local var="feedback"}
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="type" name="username" class="form-control" placeholder="username">
            </div>
            <div class="form-group">
                <label for="password">Current Password    <span id="togglePassVis"></span>
                    <div class="micro-text"> </div>
                </label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Current Password">
            </div>

            <div class="form-group">
                <label for="newPassword">New Password    <span id="toggleNewPass"></span>
                    <div class="micro-text"> </div>
                </label>
                <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="New Password">
            </div>

            <div class="form-group">
                <label for="newConfirmPass">Confirm New Password
                    <div class="micro-text"> </div>
                </label>
                <input type="password" name="newConfirmPass" class="form-control" id="newConfirmPass" placeholder="Confirm New Password">
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-default pull-left">Submit</button>
                </div>
            </div>
        </form>

  </div>

</div>

<?php
    templates::display('footer');
?>