<?php

/**
 * Login Form
 */

require_once "php/config.php";
require_once "php/session.php";
if(isset($_SESSION['user']) && $_SESSION['user'] == 'yes'){
  header('Location:'. BASE_URL);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $site_name . ' | Login'; ?></title>
  <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>google-fonts.css">
  <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>login-form.css">
  <script src="<?php echo JS_ROOT; ?>sweetalert2.all.min.js"></script>
</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="<?php echo IMG_ROOT; ?>frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="<?php echo IMG_ROOT; ?>backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form id="login-form">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" autocomplete="off" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="Enter Valid Email" value="<?php echo (isset($_COOKIE['email'])) ? $_COOKIE['email'] : ''; ?>" required="required">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" pattern=".{6,}" title="At least 6 or more characters needed" value="<?php echo (isset($_COOKIE['pass'])) ? $_COOKIE['pass'] : ''; ?>" required="required">
              </div>

              <div class="text">
                <a href="#" class="forgot-pass">Forgot password?</a>
              </div>
              <div class="remember" style="margin-top:10px;font-size:15px; font-weight:500;">
                <input type="checkbox" class="check-input" name="remember" value="rem" id="remember">
                <label for="remember" class="remember-label">Remember me</label>
              </div>
              <div id="login-error"></div>
              <div class="button input-box">
                <input type="submit" value="Login" id="login-btn">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form id="signup-form">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Enter your name" autocomplete="off" pattern="[^'\$<>]+" title="Invalid Name. Doesn't support special characters" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your email" autocomplete="off" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="Enter Valid Email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" pattern=".{6,}" title="At least 6 or more characters needed" required>
              </div>
              <div id="signup-error"></div>
              <div class="button input-box">
                <input type="submit" value="Sumbit" id="signup-btn">
              </div>
              <div class=" text sign-up-text">Already have an account? <label for="flip">Login now</label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo JS_ROOT; ?>jquery.min.js"></script>
  <script>
    jQuery(document).ready(function($) {

      /** @SignUp */
      $('#signup-btn').click(function(e) {
        if ($("#signup-form")[0].checkValidity()) {
          e.preventDefault();
          let btn = $(this);
          btn.val('Please Wait...');

          $.ajax({
            url: "php/actions.php",
            method: "POST",
            data: $('#signup-form').serialize() + "&action=signup",
            success: function(data) {
              if (data == 'inserted') {
                Swal.fire({
                  title: "Contrates! You are signed up.Please Login",
                  icon: "success",
                })
                btn.val('Submit');
                $("#signup-form")[0].reset();

              } else {
                $('#signup-error').html(data);
                setTimeout(() => $('.alert-dismissible').remove(), 10000);
                btn.val('Submit');
              }

            }
          })
        }
      })

      /** @Login */
      $("#login-btn").click(function(e) {
        if ($('#login-form')[0].checkValidity()) {
          e.preventDefault();
          let btn = $(this);
          btn.val('Please wait');

          $.ajax({
            url: "php/actions.php",
            method: "POST",
            data: $("#login-form").serialize() + "&action=login",
            success: (data) => {
              if (data == 'logged') {
                btn.val('Login');
                location.href = "index.php";

              } else {
                $('#login-error').html(data);
                setTimeout(() => $('.alert-dismissible').remove(), 10000);
                btn.val('Login');
              }
            }
          })
        }
      })

    })
  </script>
</body>

</html>