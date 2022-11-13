<?php
 //include .php files
 include('header.php');
 include_once('functions.php');

?>

<!DOCTYPE html>
<html>
  <body>
    <form action="includes/_signup.php" method="post" style="border: 1px solid #ccc">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr />

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uid" required />

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required />

        <label for="psw"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="psw"
          required
        />

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input
          type="password"
          placeholder="Repeat Password"
          name="psw-repeat"
          required
        />

        <label for="">Type of account</label>
        <select id="acc-type" name="acc-type">
          <option value="seller">Seller</option>
          <option value="buyer">Buyer</option>
        </select><br>

        <div class="clearfix">
          <button type="button" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn" name="submit">Sign Up</button>
        </div>
      </div>
    </form>
  </body>
</html>
