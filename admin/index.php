<?php
require_once "php/functions.php";
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_ROOT;?>google-fonts.css">
  <style>
        *, *::after, *::before {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          user-select: none;
        }

        /* Generic */
        body {
          width: 100%;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          font-family: "Montserrat", sans-serif;
          font-size: 12px;
          background-color: #ecf0f3;
          color: #a0a5a8;
        }

        /**/
        .main {
          position: relative;
          width: 500px;
          height: 400px;
          background-color: #ecf0f3;
          box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
          border-radius: 12px;
          overflow: hidden;
        }

        .container {
          display: flex;
          justify-content: center;
          align-items: center;
          position: absolute;
          top: 0;
          width: 500px;
          height: 100%;
          background-color: #ecf0f3;
          transition: 1.25s;
        }

        .form {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          width: 100%;
          height: 100%;
        }

        .form__input {
          width: 350px;
          height: 40px;
          margin: 10px 0;
          padding-left: 25px;
          font-size: 13px;
          letter-spacing: 0.15px;
          border: none;
          outline: none;
          font-family: "Montserrat", sans-serif;
          background-color: #ecf0f3;
          transition: 0.25s ease;
          border-radius: 8px;
          box-shadow: inset 2px 2px 4px #d1d9e6, inset -2px -2px 4px #f9f9f9;
        }
        .form__input:focus {
          box-shadow: inset 6px 6px 4px #d1d9e6, inset -6px -6px 4px #f9f9f9;
        }

        .title {
          font-size: 34px;
          font-weight: 700;
          line-height: 3;
          color: #181818;
        }

.button {
    width: 180px;
    height: 50px;
    border-radius: 25px;
    margin-top: 10px;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1.15px;
    background-color: #5393fa;
    color: #ffffff;
    box-shadow: 8px 8px 20px #d1d9e6, -10px -10px 16px #f9f9f9;
    border: none;
    outline: none;
    transition: all 0.5s ease-in-out;
    }
.button:hover{
    background:#1068f5;
    
}
  
  </style>
  </head>
  <body>
    <div class="main">
      <div class="container b-container" id="b-container">
        <form class="form" id="b-form" method="" action="">
          <h2 class="form_title title">Sign in to Website</h2>
          <input class="form__input" type="text" placeholder="Email">
          <input class="form__input" type="password" placeholder="Password">
          <p class="error">Error</p>
          <button class="form__button button submit">SIGN IN</button>
        </form>
      </div>
    </div>
  </body>
</html>
