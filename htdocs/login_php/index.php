<?php

  $action = 'verifyAuthentication';
  require "accounts_controller.php";

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Login System</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  </head>

  <body>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header center">
              <i id="user" class="far fa-user"></i>
            </div>
            <div class="card-body">
              <form id="form" action="accounts_controller.php?action=verifyAuthentication" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control" placeholder="Password">
                </div>

                <?php if(isset($_GET['login']) && $_GET['login'] == 'error') { ?>

                <div class="text-danger mb-2">
                  E-mail or password is invalid
                </div>

                <?php } ?>

                <?php if(isset($_GET['login']) && $_GET['login'] == 'error2') { ?>

                <div class="text-danger mb-2">
                  Please provide a valid email address and password before accessing protected pages.
                </div>

                <?php } ?>

                <button class="btn btn-lg btn-dark btn-block" type="submit">Log in</button>
                <a class="btn btn-lg btn-outline-dark btn-block" href="create_new_account.php">Create new account</a>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>