<?php
 //include .php files
 include('header.php');
 include_once('functions.php');


 if($_SERVER['REQUEST_METHOD'] == "POST"){
   // something was posted
   $email = $_POST['email'];
   $password = $_POST['psw'];
   $accType = $_POST['acc-type'];

   if(!empty($email) && !empty($password) && $accType == 'Seller'){
    // Save to DB
    $user_id = randomNum(20);
    $sql = "insert into Seller (sellerID, sellerFName, sellerLName, sellerEmail, productsListed) Values('$password', '', , '$email', )";

    mysqli_query($conn, $sql);

    //header("Location: login.php");
    //die;
   }else{
    echo "please enter valid information";
   }
 }

?>

<!DOCTYPE html>
<html>
  <body>
    <form method="post" style="border: 1px solid #ccc">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr />

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
          <option value="Seller">Seller</option>
          <option value="Buyer">Buyer</option>
        </select><br>
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
          <button type="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
    </form>
  </body>
</html>
