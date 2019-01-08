<?php
$_SESSION["loggedIn"] = false;
if (isset($_POST['registersubmit'])) {
    $errors = [];
    if ($_POST['RegisterEmail'] != "") {
        $email = htmlspecialchars(trim($_POST['RegisterEmail']));
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = "Please fill in a valid E-Mail address<br />";
        }
    } else {
        $errors[] = "Please fill in a valid E-Mail address<br />";
    }

    if ($_POST['RegisterPassword'] != "" && $_POST['ConfirmRegisterPassword'] != "") {

        if($_POST['RegisterPassword'] != $_POST['ConfirmRegisterPassword']){
            $errors[] = "Password do not match";
        }else {
            $password = password_hash(htmlspecialchars(trim($_POST['RegisterPassword'])), PASSWORD_DEFAULT);
            $confirmpassword = htmlspecialchars(trim($_POST['RegisterPassword']));
        }
    } else {
        $errors[] = "Please fill in a Password.<br />";
    }

    if ($_POST['RegisterName'] != "") {
        $firstname = htmlspecialchars(trim($_POST['RegisterName']));
    } else {
        $errors[] = "Please fill in Firstname.<br />";
    }

    if ($_POST['RegisterName'] != "") {
        $lastname = htmlspecialchars(trim($_POST['RegisterName']));
    } else {
        $errors[] = "Please fill in Lastname.<br />";
    }

    if (empty($errors)) {
        $loginservice = LoginService::getSerivce();
        if($loginservice->userRequest($email,$firstname,$lastname,$password)){
            $success = "Thank you for your Registration.<br> You will be able to login after the Administrator accepted your registration";
        }

    }

}


?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
          <?php if(!isset($success)){?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=register';?>">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="RegisterName">First name</label>
                    <input class="form-control" name="RegisterName" id="RegisterName" type="text"  <?= isset($_POST['RegisterName']) ? "value='".$_POST['RegisterName']."' " : ""?> aria-describedby="nameHelp" placeholder="Enter first name" required >
                  </div>
                  <div class="col-md-6">
                    <label for="RegisterLastName">Last name</label>
                    <input class="form-control" name="RegisterLastName" id="RegisterLastName" <?= isset($_POST['RegisterLastName']) ? "value='".$_POST['RegisterLastName']."' " : ""?> type="text" aria-describedby="nameHelp" placeholder="Enter last name" required >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="RegisterEmail">Email address</label>
                <input class="form-control" name="RegisterEmail" id="RegisterEmail" <?= isset($_POST['RegisterEmail']) ? "value='".$_POST['RegisterEmail']."' " : ""?> type="email" aria-describedby="emailHelp" placeholder="Enter email" required >
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="RegisterPassword">Password</label>
                    <input class="form-control" name="RegisterPassword" id="RegisterPassword" type="password" placeholder="Password" required  autocomplete="off" >
                  </div>
                  <div class="col-md-6">
                    <label for="ConfirmRegisterPassword">Confirm password</label>
                    <input class="form-control" name="ConfirmRegisterPassword" id="ConfirmRegisterPassword" type="password" placeholder="Confirm password"  autocomplete="off"  required>
                  </div>
                </div>
              </div>
                <input type="submit" name="registersubmit" value="Register" class="btn btn-primary btn-block" href="&action=register">
            </form>
              <?php
              if (isset($errors) && is_array($errors)) {
                  foreach ($errors as $error) {
                      ?>
                      <div class="text-center text-danger">
                          <?= $error ?>
                      </div>
                      <?php

                  }
              }
              ?>
          <?php }else {?>
              <div class="text-center text-success"> <?php echo $success;?></div>
          <?php }?>
        <div class="text-center">
          <a class="d-block small mt-3" href="?page=login">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../plugins/vendor/jquery/jquery.min.js"></script>
  <script src="../../plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
