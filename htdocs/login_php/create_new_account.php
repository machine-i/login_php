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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
      
      $(document).ready(() => {
        $('#buttonCreate').on('click', (e) => {
          e.preventDefault()

          let dataForm = $('#form').serialize()

          $.ajax({
            type: 'post',
            url: 'accounts_controller.php?action=createAccount',
            data: dataForm,
            //dataType: 'json',
            success: dataForm => { console.log(dataForm) },
            error: errorCreate => { console.log(errorCreate) }
          })
        })
      })

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
              <form id="form">

                <div class="input-group">
                  <input id="firstName" name="firstName" type="text" class="form-control" placeholder="First name">
                  <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Last name">
                </div>

                <div class="form-group">
                  <input id="email" name="email" type="email" class="form-control mt-3" placeholder="Enter an email address">
                </div>

                <div class="form-group">
                  <input id="pass" name="pass" type="password" class="form-control" placeholder="Enter a password">
                </div>

                <div class="form-group">
                  <input id="cPass" name="cPass" type="password" class="form-control" placeholder="Confirm your password">

                  <?php if(isset($_GET['login']) && $_GET['login'] == 'error') { ?>

                    <div class="text-danger">
                      E-mail or password is invalid
                    </div>

                  <?php } ?>
                </div>

                <button id="buttonCreate" class="btn btn-lg btn-dark btn-block" type="submit">Create account</button>
                <a class="btn btn-lg btn-outline-dark btn-block" href="index.php">Back</a>

              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>