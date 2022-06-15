<?php
require './header.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <!-- login form -->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <!-- top image -->
                    <img src="./images/Logo.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="post" action="./database/login.inc.php">
                        <!-- Email or UID input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="mailuid" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Email address or user name</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>

                        <!-- Submit button -->
                        <input type="submit" name="login" id="login" class="btn btn-primary btn-lg btn-block" />

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">Create new account</p>
                        </div>

                        <!-- Sing Up -->
                        <button type="submit" class="btn btn-lg btn-block"><a href="sing-up.php">Sing Up</a></button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>