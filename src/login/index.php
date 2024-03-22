<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./register_css/register.css">

  <?php include_once "../../config.php"; ?>
</head>
<body>
  <header>
    <h1>Nerd_Node</h1>
  </header>
  <div class="background-wrapper">
    <div class="container">
      <input type="checkbox" id="check">
      <div class="login form">
        <header>Login</header>
        <form name="loginForm" onsubmit="return validateLoginForm()" method="post">
          Email: <input type="text" name="name" id="logName" placeholder="Enter your email">
          Password: <input type="password" name="password" id="logPassword" placeholder="***********">
          <a href="#">Forgot password?</a>
          <input type="submit" class="button" value="Login(User)">
        </form>
        <div class="signup">
          <span class="signup">Don't have an account?
            <label for="check">Register</label>
          </span>
        </div>
      </div>
      <div class="registration form">
        <header>Register</header>
        <form name="registerForm" action="newuser.php" onsubmit="return validateRegisterForm()" method="post">
          Username: <input type="username" name="username" id="username" placeholder="Username" autocomplete="off">
          Email: <input type="email" name="email" id="registerEmail" placeholder="Enter your email" autocomplete="off">
          Password: <input type="password" name="password" id="registerPassword" placeholder="Create a password" autocomplete="off">
          Confirm Password: <input type="password" placeholder="Confirm your password" autocomplete="off">
          <input type="submit" class="button" value="Register">
        </form>
        <div class="signup">
          <span class="signup">Already have an account?
            <label for="check">Login</label>
          </span>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <h4>Copyright Cosc 360</h4>
    <a href='<?php echo SITEROOT;?>'>Why we ripped off Reddit</a>
    <a href='<?php echo SITEROOT;?>'>Why we'll do it again</a>
  </footer>
  <script src="index.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</body>
</html>
