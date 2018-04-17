<?php
$_SESSION["loggedIn"] = false;
if (isset($_POST['loginsubmit'])) {
    $errors = [];
    if (isset($_POST['email']) && !empty(trim($_POST['email'])) && strlen(trim($_POST['email'])) <= 100) {
        $email = htmlspecialchars(trim($_POST['email']));
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = "Geben Sie bitte eine korrekte Email-Adresse ein<br />";
        }
    } else {
        $errors[] = "Geben Sie bitte eine korrekte Email-Adresse ein.<br />";
    }

    if (isset($_POST['password'])) {
        $password = htmlspecialchars(trim($_POST['password']));
    } else {
        $errors[] = "Geben Sie bitte ein Passwort ein.<br />";
    }

    if (empty($errors)) {
        $loginservice = LoginService::getSerivce();
        $result = $loginservice->checkUserCredentials($email, $password);
        if ($result) {
            $_SESSION["loggedIn"] = true;
            $_SESSION["user"] = $result;
            header("Location: ?page=memberlist");
            die();
        } else {
            $errors[] = "No User found";
        }
    }

}


?>

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?page=login";?>">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp"
                           placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password"
                           required>
                </div>
                <input type="submit" name="loginsubmit" value="Login" class="btn btn-primary btn-block"
                       href="&action=login">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="?page=register">Register an Account</a>
            </div>
            <?php
            if (isset($errors)) {
                foreach ($errors as $error) {
                    ?>
                    <div class="text-center text-danger">
                        <?= $error ?>
                    </div>
                    <?php

                }
            }
            ?>
        </div>
    </div>
</div>
</div>

