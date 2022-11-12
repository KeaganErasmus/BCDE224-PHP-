<?php
 //include header.php file
 include('header.php');
?>

<!DOCTYPE html>
<html>
  <body>
    <form action="includes/_login.php" method="POST" style="border: 1px solid #ccc">
      <div class="container">
        <h1>Login</h1>
        <p>Please fill in this form to login to an account.</p>
        <hr />

        <label for="email"><b>Email/Username</b></label>
        <input type="text" placeholder="Enter Email" name="email" required />

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
          <button type="submit" class="signupbtn">Login</button>
        </div>
      </div>
    </form>
  </body>
</html>
