<?php
  session_start();
 //include header.php file
 include('header.php');

 include_once('functions.php');
 include_once('database/DBController.php');

//  print_r($_SESSION);
//  var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
  <body>
    <form action="includes/_login.php" method="POST" style="border: 1px solid #ccc">
      <div class="container">
        <h1>Login</h1>
        <p>Please fill in this form to login to an account.</p>
        <hr />

        <label for="usersUsername"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="usersUsername" required />

        <label for="psw"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="psw"
          required
        />
        <label>
          <input
            type="checkbox"
            checked="checked"
            name="remember"
            style="margin-bottom: 15px"
          />
          Remember me
        </label>

        <div class="clearfix">
          <button type="button" class="cancelbtn">Cancel</button>
          <button type="submit" name="submit" class="signupbtn">Login</button>
        </div>
      </div>
    </form>
  </body>
</html>
