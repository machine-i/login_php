<?php

  $action = 'createAccount';
  require "accounts_controller.php";

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Login System</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script>
      function verify() {
        let fName = document.getElementById('firstName')
        let lName = document.getElementById('lastName')
        let email = document.getElementById('email')
        let pass = document.getElementById('pass')
        let cPass = document.getElementById('cPass')

        if(
          fName.value == lName.value || 
          email.value.indexOf('@') == -1 || 
          email.value.indexOf('.com') == -1 || 
          pass.value != cPass.value ||
          pass.value.length == 0
        ) {
          console.log('tem erro')

          if(fName.value == lName.value) {
            fName.style.border = '1px solid red'
            lName.style.border = '1px solid red'
          } else {
            fName.style.border = ''
            lName.style.border = ''
          }

          if(email.value.indexOf('@') == -1 || email.value.indexOf('.com') == -1) {
            email.style.border = '1px solid red'
          } else {
            email.style.border = ''
          }

          if(pass.value != cPass.value || pass.value.length == 0) {
            cPass.style.border = '1px solid red'
          } else {
            cPass.style.border = ''
          }

        } else {
          location.href = 'accounts_controller.php?action=createAccount'
        }
      }
    </script>
  </head>

  <body>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header center">
              <i id="user" class="fas fa-user-plus"></i>
            </div>
            <div class="card-body">
              <form id="form" action="accounts_controller.php" method="post">

                <div class="input-group">
                  <input id="firstName" name="firstName" type="text" class="form-control" placeholder="First name">
                  <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Last name">
                </div>

                <div class="form-group">
                  <input id="email" name="email" type="email" class="form-control mt-3" placeholder="Enter an email address">
                </div>

                <div class="form-group">
                  <input id="pass" name="password" type="password" class="form-control" placeholder="Enter a password">
                </div>

                <div class="form-group">
                  <input id="cPass" name="conPassword" type="password" class="form-control" placeholder="Confirm your password">
                </div>

                <?php if(isset($_GET['login']) && $_GET['login'] == 'error') { ?>

                <div class="text-danger">
                  E-mail or password is invalid
                </div>

                <?php } ?>

                <div class="btn btn-lg btn-dark btn-block" onclick="verify()">Create account</div>
                <a class="btn btn-lg btn-outline-dark btn-block" href="index.php">Back</a>

              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>